<?php
include("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $m_user = $_POST['m_user'];
    $m_pass = $_POST['m_pass'];
    $m_name = $_POST['m_name'];
    $m_phone = $_POST['m_phone'];

    // ตรวจสอบว่ามีผู้ใช้อยู่ในฐานข้อมูลแล้วหรือไม่
    $check_user_stmt = $conn->prepare("SELECT m_user FROM tb_member WHERE m_user = ?");
    $check_user_stmt->bind_param("s", $m_user);
    $check_user_stmt->execute();
    $check_user_stmt->store_result();

    if ($check_user_stmt->num_rows > 0) {
        // พบผู้ใช้ซ้ำ
        echo "<script>
            alert('ชื่อผู้ใช้นี้มีอยู่ในระบบแล้ว กรุณาใช้ชื่อผู้ใช้อื่น');
            window.history.back();
        </script>";
    } else {
        // ไม่พบผู้ใช้ซ้ำ ทำการเพิ่มข้อมูลใหม่
        $stmt = $conn->prepare("INSERT INTO tb_member (m_user, m_pass, m_name, m_phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $m_user, $m_pass, $m_name, $m_phone);

        if ($stmt->execute()) {
            echo "<script>
                alert('เพิ่มสมาชิกสำเร็จ!');
                window.location.href='../index.php';
            </script>";
        } else {
            echo "<script>
                alert('เกิดข้อผิดพลาด: " . $stmt->error . "');
                window.history.back();
            </script>";
        }

        $stmt->close();
    }

    $check_user_stmt->close();
    $conn->close();
}
