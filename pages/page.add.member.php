<?php
include("../connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="fs-3 mt-4">
                เพิ่มข้อมูลสมาชิก
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="../backend/insertMember.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">ชื่อผู้ใช้ (Username)</label>
                                <input type="text" class="form-control" name="m_user" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">รหัสผ่าน (Password)</label>
                                <input type="password" class="form-control" name="m_pass" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ชื่อ-สกุล</label>
                                <input type="text" class="form-control" name="m_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">เบอร์โทรศัพท์</label>
                                <input type="number" class="form-control" name="m_phone">
                            </div>
                            <button type="submit" class="btn btn-success">บันทึก</button>
                            <a href="../index.php?menu=main" class="btn btn-danger">ยกเลิก</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</body>

</html>