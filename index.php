<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="admin.css">
  <style>
    .hero {
        background-image: url('photo/bg.jpg'); /* Place your image path here */
        background-size: cover;
        background-position: center;
        color: #1e7b1c;
    }
    .hero h2 {
        font-size: 80px;
        font-weight: bold;
    }
    @media (max-width: 768px) {
        .hero {
            padding: 60px 15px;
        }
        .hero h2 {
            font-size: 50px;
        }
    }
    @media (max-width: 480px) {
        .hero {
            padding: 40px 10px;
        }
        .hero h2 {
            font-size: 30px;
        }
    }
  </style>
</head>
<body>
  <div class="hero">
  <div class="container-fluid contentlogin">
    <div class="row justify-content-center w-100">
      <div class="col-md-5 col-lg-4 col-xl-3">
        <div class="card shadow-lg login-card">
          <div class="card-body p-4">
            <h4 class="card-title text-center mb-4">User Login</h4>

            <!-- แสดงข้อความผิดพลาดถ้ามี -->
            <?php if (isset($_GET['error'])): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <small><?= $_GET['error'] ?></small>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 0.5rem 1rem;"></button>
              </div>
            <?php endif; ?>

            <form method="POST" action="process_login.php">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                   <span class="input-group-text"><i class="bi bi-person"></i></span>
                   <input type="text" class="form-control" id="username" name="username" placeholder="your username" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-lock"></i></span>
                  <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                  
                  <button class="btn password-toggle-btn" type="button" onclick="togglePassword()">
                    <i class="bi bi-eye" id="toggleIcon"></i>
                  </button>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Bootstrap JS (Needed for alert dismissal) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Toggle password visibility -->
  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const toggleIcon = document.getElementById("toggleIcon");

      const isPassword = passwordInput.type === "password";
      passwordInput.type = isPassword ? "text" : "password";

      toggleIcon.classList.toggle("bi-eye");
      toggleIcon.classList.toggle("bi-eye-slash");
    }
  </script>
</body>
</html>