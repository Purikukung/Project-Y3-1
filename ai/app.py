import os
import time
import numpy as np
from flask import Flask, render_template, request, flash
from werkzeug.utils import secure_filename
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing.image import img_to_array
from PIL import Image

# ---------------------------
# CONFIG
# ---------------------------
MODEL_PATH = "KLEENEX_model_v3.h5"  # เปลี่ยนเป็น path โมเดลของคุณ
UPLOAD_FOLDER = os.path.join('static', 'images')
ALLOWED_EXTENSIONS = {'png', 'jpg', 'jpeg', 'gif'}

app = Flask(__name__)
app.secret_key = "trashtrack_secret_key"
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

# ---------------------------
# โหลดโมเดล
# ---------------------------
model = load_model(MODEL_PATH)
print("✅ Loaded model:", MODEL_PATH)

CLASS_NAMES = ['Plastic_bottle', 'Unknown', 'general_trash', 'glass', 'hazardous_waste']
INPUT_SHAPE = (224, 224)


# ---------------------------
# ฟังก์ชันช่วยตรวจไฟล์
# ---------------------------
def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS


# ---------------------------
# ฟังก์ชันทำนายภาพ
# ---------------------------
def predict_image(image: Image.Image):
    # ✅ ใช้ Resampling.LANCZOS แทน ANTIALIAS
    img = image.resize(INPUT_SHAPE, Image.Resampling.LANCZOS)
    img_array = img_to_array(img).astype("float32") / 255.0
    img_array = np.expand_dims(img_array, axis=0)

    preds = model.predict(img_array)
    idx = int(np.argmax(preds, axis=1)[0])
    label = CLASS_NAMES[idx]
    confidence = float(preds[0][idx] * 100)

    return label, confidence


# ---------------------------
# ROUTES
# ---------------------------
@app.route("/", methods=["GET", "POST"])
def index():
    prediction = None
    confidence = None
    filename = None

    if request.method == "POST":
        file = request.files.get("imagefile")
        if file and allowed_file(file.filename):
            os.makedirs(app.config['UPLOAD_FOLDER'], exist_ok=True)

            # ตั้งชื่อไฟล์ใหม่กันทับ
            original_name = secure_filename(file.filename)
            name, ext = os.path.splitext(original_name)
            new_filename = f"{name}_{int(time.time())}{ext}"
            save_path = os.path.join(app.config['UPLOAD_FOLDER'], new_filename)

            # เปิดภาพและบันทึก
            image = Image.open(file.stream).convert("RGB")
            image.save(save_path, format="JPEG", quality=90)

            # ทำนาย
            label, conf = predict_image(image)
            prediction = label
            confidence = round(conf, 2)
            filename = new_filename
        else:
            flash("⚠️ Please upload a valid image file (png, jpg, jpeg, gif).")

    return render_template(
        "index.html",
        prediction=prediction,
        confidence=confidence,
        filename=filename,
    )

if __name__ == "__main__":
    app.run(debug=True, port=3000)