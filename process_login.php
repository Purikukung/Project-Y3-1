<?php
    session_start();

    // รับค่าจากฟอร์ม
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // fix user + password
    if (($user == "myadmin" && $pass == "IoTEAdmin$") || 
            ($user == "user1" && $pass == "IoTEUser$") || 
            ($user == "user2" && $pass == "IoTEUser$") ||
            ($user == "admin" && $pass == "123456")) { 
        $_SESSION['user'] = $user;
        header("Location: home.php");
        exit();
    } 
    else {
        header("Location: index.php?error=ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
        exit();
    }
?>