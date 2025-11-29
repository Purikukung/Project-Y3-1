<?php
  session_start();
  if ($_SESSION['user'] == null) {
    header("Location: index.php");
    exit();
  } 
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        .team-members h1 {
           font-size: 60px;
        }
        body {
            background-color: transparent;
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
                width: auto;
                padding: 10px 20px;
                margin-top: 10px;
            }
            .footer-title {
                font-size: 20px;
            }
        }
        @media (max-width: 480px) {
            footer a {
                padding: 10px 20px;
                font-size: 14px;
            }
            .footer-title {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>TrashTrack+</h1>
        <div class="menu-icon-container" onclick="toggleMenu()">
            <div class="menu-icon"></div>
            <span class="menu-text">Menu</span>
        </div>
        <nav id="nav">
            <a href="home.php">HOME</a>
            <a href="#member1">NOOK</a>
            <a href="#member2">PRAEW</a>
            <a href="#member3">FANG</a>
            <a href="#member4">TANG</a>
            <a href="#member5">GUY</a>
            <a href="#footer">CONTACT</a>
            <a href="logout.php">LOGOUT</a>
        </nav>
    </header>
    <section id="member1">
        <div class="container">
            <h1>รายชื่อสมาชิกกลุ่ม</h1>
            <div class="team-members">
                <img src="photo/nook.jpg">
                <div class="content">
                    <h3>66010024 นายกฤตเมธ เพ็ชรรักษา</h3>
                    <p>&nbsp;</p>
                    <p>วิศวกรรมระบบไอโอทีและสารสนเทศและฟิสิกส์อุตสาหกรรม (2ปริญญา)</p>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
    </section>
    <section id="member2">
        <div class="container">
            <div class="team-members">
            <img src="photo/praew.jpg">
                    <div class="content">
                        <h3>66010220 นางสาวณหทัย พนาวงศ์</h3>
                        <p>&nbsp;</p>
                        <p>วิศวกรรมระบบไอโอทีและสารสนเทศและฟิสิกส์อุตสาหกรรม (2ปริญญา)</p>
                    </div>
            </div>
        </div>
        <p>&nbsp;</p>
    </section>
    <section id="member3"> 
        <div class="container">
            <div class="team-members">
                <img src="photo/fang.jpg">
                <div class="content">
                    <h3>66010263 นางสาวณัฐวดี ปานนุ้ย</h3>
                    <p>&nbsp;</p>
                    <p>วิศวกรรมระบบไอโอทีและสารสนเทศและฟิสิกส์อุตสาหกรรม (2ปริญญา)</p>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
    </section>   
    <section id="member4">
        <div class="container">
            <div class="team-members">
                <img src="photo/tang.jpg">
                <div class="content">
                    <h3>66010710 นางสาวรุ่งอรุณ แก้วสุวรรณ์</h3>
                    <p>&nbsp;</p>
                    <p>วิศวกรรมระบบไอโอทีและสารสนเทศและฟิสิกส์อุตสาหกรรม (2ปริญญา)</p>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
    </section>
    <section id="member5"> 
        <div class="container">
            <div class="team-members">
                <img src="photo/guy.jpg">
                <div class="content">
                    <h3>66010780 นายวีระชัย ศรพรหม</h3>
                    <p>&nbsp;</p>
                    <p>วิศวกรรมระบบไอโอทีและสารสนเทศและฟิสิกส์อุตสาหกรรม (2ปริญญา)</p>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
    </section>
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