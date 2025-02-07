<?php
include("../connect.php");
$search = $_POST['search'];

$qData = $conn->query("select * from tb_member where m_name like '%$search%' or m_user like '%$search%'");
if ($qData->num_rows > 0) { // ตรวจสอบว่ามีข้อมูลหรือไม่
    while ($data = $qData->fetch_object()) { ?>
        <tr>
            <td><?php echo $data->m_user ?></td>
            <td><?php echo $data->m_pass ?></td>
            <td><?php echo $data->m_name ?></td>
            <td><?php echo $data->m_phone ?></td>
            <td><a href="pages/page.edit.php?user=<?php echo $data->m_user ?>" class='btn btn-success'>แก้ไขข้อมูล</a></td>
            <td><a href="pages/page.delete.php?user=<?php echo $data->m_user ?>" class='btn btn-danger'>ลบข้อมูล</a></td>
        </tr>
    <?php
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>ไม่พบข้อมูล</td></tr>"; // แสดงข้อความเมื่อไม่มีข้อมูล
}
?>