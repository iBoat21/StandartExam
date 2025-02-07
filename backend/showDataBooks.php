<?php  
    include("../connect.php");

    $bookId = $_POST['bookId'];
    $res = [];

    $sqlBook = "SELECT * FROM tb_book WHERE b_id = '$bookId'";
    $qBook = $conn->query($sqlBook);
    $data = $qBook->fetch_object();
    if($data){
        $res['status'] = 1;
        $res['name'] = $data->b_name;
        $res['id'] = $data->b_id;
    }else{
        $res['status'] = 0;
    }
    echo json_encode($res);
?>