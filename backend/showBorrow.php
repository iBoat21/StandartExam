<?php  
    include("../connect.php");

    $searchBook = $_POST['searchBook'];

    $res = [];
    $sql = "SELECT * FROM tb_borrow_book JOIN tb_member ON tb_member.m_user = tb_borrow_book.m_user JOIN tb_book ON tb_book.b_id = tb_borrow_book.b_id WHERE '$searchBook' = tb_borrow_book.b_id AND tb_borrow_book.br_date_rt = '1990-01-01'";
    $qSql = $conn->query($sql);
    $rSql = $qSql->num_rows;
   
    if($rSql == 1){
        $data = $qSql->fetch_object();
        $res['status'] = 1;
        $res['date'] = $data->br_date_br;
        $res['Name'] = $data->m_name;
        $res['NameBook'] = $data->b_name;
        $res['CodeBook'] = $data->b_id;
    }else{
        $res['status'] = 0;

    }

    echo json_encode($res);
 

?>