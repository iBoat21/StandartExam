<?php  
    include("../connect.php");

    $m_user = $_POST['id'];
    $b_id = $_POST['b_id'];
    $br_date_br = date("Y-m-d");

    $sql = "INSERT INTO tb_borrow_book (br_date_br,b_id,m_user) VALUES ('$br_date_br','$b_id','$m_user')";
    $qIn = $conn->query($sql);
    if($qIn){
        echo json_encode(1);
    }else{
        echo json_encode(0);
    }
?>

<?php  
    // include("../connect.php");

    // $m_user = $_POST['id'];
    // $b_id = $_POST['b_id'];
    // $br_date_br = date("Y-m-d");

    // // ตรวจสอบว่าหนังสือถูกยืมไปแล้วโดยผู้ใช้คนเดิมหรือไม่
    // $sqlCheck = "SELECT * FROM tb_borrow_book WHERE b_id = '$b_id' AND m_user = '$m_user' AND br_status = 'borrowed'";
    // $qCheck = $conn->query($sqlCheck);

    // if ($qCheck->num_rows > 0) {
    //     // ถ้าพบว่าผู้ใช้เคยยืมหนังสือเล่มนี้อยู่แล้ว
    //     echo json_encode("borrowed");
    // } else {
    //     // ถ้ายังไม่มีการยืม ให้เพิ่มข้อมูลการยืม
    //     $sql = "INSERT INTO tb_borrow_book (br_date_br, b_id, m_user, br_status) VALUES ('$br_date_br', '$b_id', '$m_user', 'borrowed')";
    //     $qIn = $conn->query($sql);
    //     if($qIn){
    //         echo json_encode(1);
    //     } else {
    //         echo json_encode(0);
    //     }
    // }
?>
