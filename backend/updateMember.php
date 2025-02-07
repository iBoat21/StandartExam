<?php
    include("../connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $m_user = $_POST['m_user'];
        $m_pass = $_POST['m_pass'];
        $m_name = $_POST['m_name'];
        $m_phone = $_POST['m_phone'];

        $sql = "UPDATE tb_member SET m_pass='$m_pass', m_name='$m_name', m_phone='$m_phone' WHERE m_user='$m_user'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('แก้ไขข้อมูลสำเร็จ!');
                window.location.href='../index.php';
            </script>";
        } else {
            echo "<script>
                alert('เกิดข้อผิดพลาด: " . $conn->error . "');
                window.history.back();
            </script>";
        }
    }
?>
