<?php
  session_start();
  if ($_SESSION['user'] == null) {
    header("Location: index.php");
    exit();
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrashTrack+</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Hero Section */
        .hero {
            background-image: url('photo/bg.jpg'); /* Place your image path here */
            background-size: cover;
            background-position: center;
            padding: 100px 20px;
            color: #1e7b1c;
            text-align: center;
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
        footer {
            background-color: #333333;
            color: white;
            text-align: left;
            padding: 10px 20px;
            position: relative;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            box-sizing: border-box;
        }
        footer div {
            display: flex;
            flex-direction: column;
            text-align: center;
            gap: 5px;
            padding: 5px 0;
        }
        footer a {
            background-color: #006400;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            border: 2px solid #006400;
            transition: 0.3s;
        }
        footer a:hover {
            background-color: white;
            color: #006400;
            border-color: #006400;
            text-decoration: none;
        }
        footer .footer-title {
            font-weight: bold;
            font-size: 24px;
        }
        @media (max-width: 768px) {
            footer {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }
            footer div {
                margin-bottom: 10px;
            }
            footer a {
                width: auto; /* Keep the width auto so buttons retain their normal size */
                padding: 10px 20px; /* Keep padding consistent */
                margin-top: 10px;
            }
            .footer-title {
                font-size: 20px;
            }
        }
        @media (max-width: 480px) {
            footer a {
                padding: 10px 20px; /* Keep padding consistent */
                font-size: 14px;
            }
            .footer-title {
                font-size: 18px;
            }
        }
        /* Trash Section */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            padding-top: 50px;
        }
        h1 {
            text-align: left;
            font-size: 2.5em;
            color: #4CAF50;
        }
        .Trash {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
        }
        .Trash-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 32%;
            padding: 20px;
            text-align: center;
        }
        .Trash-item img {
            width: 200px;
            height: 200px;
            border-radius: 8px;
        }
        .Trash-item h3 {
            color: #333;
            margin: 15px 0;
            font-size: 1em;
        }
        .Trash-item p {
            color: #666;
            font-size: 1em;
            margin-bottom: 20px;
        }
        .Trash a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
        .Trash a:hover {
            background-color: #45a049;
        }
        .Trash a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
        .Trash a:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 768px) {
            .Trash {
                flex-direction: column;
                align-items: center;
            }
            .Trash-item {
                width: 80%;
                margin-bottom: 20px;
            }
        }

        @media screen and (max-width: 480px) {
            .Trash {
                flex-direction: column;
                align-items: center;
            }
            .Trash-item {
                width: 100%;
                margin-bottom: 20px;
            }
            h1 {
                font-size: 2em;
            }
        }
        </style>
</head>
<body>
    <header>
        <h1>TrashTrack+ | Welcome <?= $_SESSION['user'] ?></h1>
        <div class="menu-icon-container" onclick="toggleMenu()">
            <div class="menu-icon"></div>
            <span class="menu-text">Menu</span>
        </div>
        <nav id="nav">
            <a href="home.php">HOME</a>
            <a href="#about">ABOUT</a>
            <a href="#Trash">TRASH</a>
            <a href="#Dashborad">BIN MAP</a>
            <a href="#footer">CONTACT</a>
            <a href="creator.php">CREATORS</a>
            <a href="logout.php">LOGOUT</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="hero">
        <p>&nbsp;</p>
        <h2>TrashTrack+</h2>
        <div class="contact-info">
            <div>
                <h3>Call with Us</h3>
                <p>+66801234567</p>
            </div>
            <div>
                <h3>Reach Out Email</h3>
                <p>66010024@kmitl.ac.th</p>
            </div>
        </div>
        <p>&nbsp;</p>
    </div>
    <section id="about" class="about-section">
        <div class="container">
            <h1>ABOUT</h1>
            <div class="about">
                <img src="photo/Trash.png">
                <div class="content">
                    <p>&nbsp;</p>
                    <h3>About TrashTrack+</h3>
                    <p>เปลี่ยนอนาคตของการจัดการขยะด้วย TrashTrack+ ถังขยะอัจฉริยะที่ใช้ระบบ AI ในการคัดแยกขยะอัตโนมัติ พร้อมติดตามสถานะได้แบบเรียลไทม์ระบบสามารถเรียนรู้และพัฒนาโมเดลการแยกขยะอย่างแม่นยำจากข้อมูลที่เก็บรวบรวม ช่วยลดของเสีย เพิ่มประสิทธิภาพการรีไซเคิล และเปลี่ยนเรื่องยุ่งยากให้กลายเป็นเรื่องง่ายและยั่งยืน</p>
                    <a href="https://0ncsnvlr-3000.asse.devtunnels.ms/" target="_blank">MORE</a>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </section>
    <p>&nbsp;</p>

    <section id="Trash" class="Trash-section">
        <div class="container">
            <h1>TRASH</h1>
            <div class="Trash">
                <div class="Trash-item">
                    <h3>General trash</h3>
                    <img src="photo/general_trash.jpg">
                    <p>ขยะทั่วไป</p>
                    <a href="https://drive.google.com/drive/folders/1HDi7bB0BJCFwNKiOZkDiBgqvaEjIIEit" target="_blank">MORE</a>
                </div>
                <div class="Trash-item">
                    <h3>Glass</h3>
                    <img src="photo/glass.jpg">
                    <p>แก้ว</p>
                    <a href="https://drive.google.com/drive/folders/1bK7lq8Z_KErq2Yu06K3ZboT0CNP5NcDB" target="_blank">MORE</a>
                </div>    
                <div class="Trash-item">
                    <h3>Hazardous waste</h3>
                    <img src="photo/hazardous_waste.jpg">
                    <p>ขยะอันตราย</p>
                    <a href="https://drive.google.com/drive/folders/1XdjbxbSzYN6RJzuj76wYzvcgAzHCxvbH" target="_blank">MORE</a>
                </div>
                <div class="Trash-item">
                    <h3>Plastic bottle</h3>
                    <img src="photo/Plastic_bottle.jpg">
                    <p>ขวดพลาสติก</p>
                    <a href="https://drive.google.com/drive/folders/1RcRxso9pqxUCBw5hDNuER4PbJTAWFo5j" target="_blank">MORE</a>
                </div>
                <div class="Trash-item">
                    <h3>Unknow</h3>
                    <img src="photo/unknow.jpg">
                    <p>ไม่สามารถระบุได้</p>
                    <a href="https://drive.google.com/drive/folders/1VUsydvRVITaRf1VoXlbWZ7nIumlgkB5v" target="_blank">MORE</a>
                </div>
            </div>
        </div>
    </section>
    <p>&nbsp;</p>

    <section id="Dashborad" class="Dashborad-section">
        <div class="container">
            <h1>BIN MAP</h1>
            <div class="Dashborad">
                <div class="Dashborad-item">
                    <h3>ตำแหน่งจุดถังขยะที่ 1</h3>
                    <img src="photo/bin1.png">
                    <p>บริเวณใต้ตึกโหล</p>
                    <a href="Google_Map.html">MORE</a>
                </div>
                <div class="Dashborad-item">
                    <h3>ตำแหน่งจุดถังขยะที่ 2</h3>
                    <img src="photo/bin2.png">
                    <p>บริเวณใต้โรงซี</p>
                    <a href="Google_Map.html">MORE</a>
                </div>
                <div class="Dashborad-item">
                    <h3>ตำแหน่งจุดถังขยะที่ 3</h3>
                    <img src="photo/bin3.png">
                    <p>บริเวณใต้ตึกเครื่องกล</p>
                    <a href="Google_Map.html">MORE</a>
                </div>
            </div>
        </div>
    </section>
    <p>&nbsp;</p>

    <footer id="footer">
        <p class="footer-title">TrashTrack+</p>
        <div>
            <p>10th floor, King Mongkut's Institute of Technology Ladkrabang</p>
            <p>Copyright©2025, TrashTrack+, Inc. All Rights Reserved</p>
        </div>
        <a href="contact.php">CONTACT US</a>
    </footer>
    <script>
        function toggleMenu() {
            const nav = document.getElementById("nav");
            const menuIcon = document.querySelector(".menu-icon");
            const menuText = document.querySelector(".menu-text");
            nav.classList.toggle("active");
            menuIcon.classList.toggle("close");
            if (menuIcon.classList.contains("close")) {
                menuText.textContent = "Close";
            } else {
                menuText.textContent = "Menu";
            }
        }
    </script>
</body>
</html>