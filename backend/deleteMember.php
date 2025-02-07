<?php
include("../connect.php");

if (isset($_POST['m_user'])) {
    $m_user = $_POST['m_user'];

    try {
        $stmt = $conn->prepare("DELETE FROM tb_member WHERE m_user = ?");
        if ($stmt === false) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("s", $m_user);

        if ($stmt->execute()) {
            echo "<script>
            alert('ลบข้อมูลสำเร็จ!');
            window.location.href='../index.php';
            </script>";
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "<script>
            alert('เกิดข้อผิดพลาด: " . $e->getMessage() . "');
            window.history.back();
        </script>";
    }
} else {
    // ... (no m_user)
}
