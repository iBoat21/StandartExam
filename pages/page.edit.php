<?php
include("../connect.php");
$user = $_GET['user']; // รับค่า m_user จาก URL

$qData = $conn->query("SELECT * FROM tb_member WHERE m_user = '$user'");
$data = $qData->fetch_object();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="fs-3 mt-4">
                แก้ไขข้อมูลสมาชิก
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="../backend/updateMember.php" method="post">
                            <input type="hidden" name="m_user" value="<?php echo $data->m_user ?>">
                            <div class="mb-3">
                                <label class="form-label">ชื่อผู้ใช้</label>
                                <input type="text" class="form-control" name="m_user" value="<?php echo $data->m_user ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">รหัสผ่าน</label>
                                <input type="text" class="form-control" name="m_pass" value="<?php echo $data->m_pass ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">ชื่อ-สกุล</label>
                                <input type="text" class="form-control" name="m_name" value="<?php echo $data->m_name ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">เบอร์โทรศัพท์</label>
                                <input type="number" class="form-control" name="m_phone" value="<?php echo $data->m_phone ?>">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="../index.php" class="btn btn-secondary">กลับ</a>
                                <button type="submit" class="btn btn-success">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</body>

</html>