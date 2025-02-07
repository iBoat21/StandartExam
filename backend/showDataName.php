<?php  
    include("../connect.php");
    
    $name = $_POST['name'];
    
    $res = [];

    $sql ="SELECT * FROM tb_member WHERE m_user = '$name'";
    $qSql = $conn->query($sql);
    $data = $qSql->fetch_object();

    if ($data) {
        $res['status'] = 1;
        $res['name'] = $data->m_name;
        $res['id'] = $data->m_user;
    } else {
        $res['status'] = 0;
        $res['message'] = "ไม่พบข้อมูลที่ตรงกับเงื่อนไข";
    }
    echo json_encode($res);
?>