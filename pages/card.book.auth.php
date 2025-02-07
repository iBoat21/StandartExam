<?php
include("../connect.php");
$search = $_POST['search'];

$qData = $conn->query("SELECT * FROM tb_book WHERE 
                        b_writer LIKE '%$search%'");

if ($qData->num_rows > 0) {
    while ($data = $qData->fetch_object()) { 
        // แปลงค่า b_category เป็นชื่อหมวดหมู่
        switch ($data->b_category) {
            case 1:
                $category = "วิชาการ";
                break;
            case 2:
                $category = "วรรณกรรม";
                break;
            case 3:
                $category = "เบ็ดเตล็ด";
                break;
            default:
                $category = "อื่น ๆ";
                break;
        }
    ?>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="cart-title"><?php echo $data->b_id; ?></h4>
                    <h5 class="card-title"><?php echo $data->b_name; ?></h5>
                    <h6 class="card-subtitle text-muted"><?php echo $data->b_writer; ?></h6>
                    <p class="card-text"><strong>หมวดหมู่:</strong> <?php echo $category; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-primary fw-bold"><?php echo number_format($data->b_price, 2); ?> บาท</span>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} else {
    echo "<div class='col-12 text-center text-muted'>ไม่พบข้อมูล</div>";
}
?>
