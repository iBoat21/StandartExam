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
