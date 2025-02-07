<?php
include("connect.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Libary</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 fs-3 mt-4 text-center">การจัดการข้อมูลการยืม - คืนหนังสือ</div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-4">
                <div class="input-group">
                    <input type="text" class="form-control" id="search">
                    <button class="btn btn-outline-success mx-2" id="btnSearch">ค้นหา</button>
                </div>
            </div>
        </div>

        <div class="row justify-content-end my-3">
            <div class="col-auto">
                <a href="borrow.php" class="btn btn-warning mx-2" id="borrow">ยืม-คืนหนังสือ</a>
                <a href="index.php?menu=summarize" class="btn btn-primary mx-2" id="summarize">ข้อมูลสถิติ</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive overflow-auto">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">รหัสหนังสือ</th>
                                <th scope="col">ชื่อหนังสือ</th>
                                <th scope="col">ผู้ยืม-คืน</th>
                                <th scope="col">วันที่ยืม</th>
                                <th scope="col">วันที่คืน</th>
                                <th scope="col">ค่าปรับ</th>
                            </tr>
                        </thead>
                        <tbody class="table-hover" id="contentTable">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var valSearch = $('#search').val()
            search(valSearch)
        })

        const search = (valSearch) => {
            var formdata = new FormData();
            formdata.append("search", valSearch);
            $.ajax({
                url: "pages/table.home.php",
                type: "POST",
                data: formdata,
                dataType: "html",
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#contentTable').html(data);
                }
            })
        }

        $(document).on("click", "#btnSearch", function() {
            var valSearch = $('#search').val()
            search(valSearch)
        })
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>