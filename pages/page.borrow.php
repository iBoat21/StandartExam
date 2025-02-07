<?php
include("../connect.php");
$page = $_POST['page'];

if ($page === 'y') { ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 fs-3 text-center">
            ยืมหนังสือ
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="input-group">
                <label for="inName" class="col-form-label me-2">ผู้ที่ต้องการยืม :</label>
                <input type="text" class="form-control" id="inName" placeholder="กรอกชื่อผู้ใช้">
                <button class="btn btn-success" id="btnName">ตกลง</button>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="input-group">
                <label for="inBook" class="col-form-label me-2">รหัสหนังสือ :</label>
                <input type="text" class="form-control" id="inBook" placeholder="กรอกรหัสหนังสือ">
                <button class="btn btn-success" id="btnBook">ตกลง</button>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th scope="col">ชื่อ-สกุลผู้ยืม: <input type="hidden" value="0" id="checkName"></th>
                    <td id="ColName"></td>
                </tr>
                <tr>
                    <th>รหัสหนังสือ: <input type="hidden" value="0" id="checkBook"></th>
                    <td id="ColCodeBook"></td>
                </tr>
                <tr>
                    <th>ชื่อหนังสือ: </th>
                    <td id="ColNameBook"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-success mx-2" id="btnBorrowSubmit">ยืมหนังสือ</button>
                            <button class="btn btn-outline-danger mx-2">ยกเลิก</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
    <script>

        $(document).on("click", "#btnBorrowSubmit", function () {
            var m_user = $('#checkName').val()
            console.log(m_user)
            var checkBook = $('#checkBook').val()
            if (m_user == 0 || checkBook == 0) {
                Swal.fire({
                    icon: "error",
                    title: "ไม่พบข้อมูลสมาชิกหรือหนังสือ",
                    showConfirmButton: false,
                    timer: 1200
                })
            } else {
                var inBook = $('#inBook').val()
                var formdata = new FormData();
                formdata.append("id", m_user)
                formdata.append("b_id", inBook)
                $.ajax({
                    url: "./backend/borrow.php",
                    type: "POST",
                    data: formdata,
                    dataType: "html",
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data)
                        if (data == 1) {
                            Swal.fire({
                                title: "ทำรายการเสร็จสิ้น",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1200
                            }).then((result) => {
                                window.location.reload()
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "หนังสือถูกคุณยืมไปแล้ว",
                                showConfirmButton: false,
                                timer: 1200
                            })
                        }
                    }
                })
            }
        })

        $(document).on("click", "#btnName", function () {
            var inName = $('#inName').val()
            var formdata = new FormData()
            formdata.append("name", inName)
            $.ajax({
                url: "./backend/showDataName.php",
                type: "POST",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data['status'] == 1) {
                        $('#ColName').html(data['name'])
                        $('#checkName').val(data['id'])
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "ไม่พบข้อมูลสมาชิกหรือหนังสือ",
                            showConfirmButton: false,
                            timer: 1200
                        })
                    }
                }
            })
        })

        $(document).on("click", "#btnBook", function () {
            var inBook = $('#inBook').val()
            var formdata = new FormData()
            formdata.append("bookId", inBook)
            $.ajax({
                url: "./backend/showDataBooks.php",
                type: "POST",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data['status'] == 1) {
                        $('#ColCodeBook').html(data['id'])
                        $('#ColNameBook').html(data.name)
                        $('#checkBook').val(1)
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "ไม่พบข้อมูลสมาชิกหรือหนังสือ",
                            showConfirmButton: false,
                            timer: 1200
                        })
                    }
                }
            })
        })


    </script>
<?php }
if ($page === 'k') { ?>
    <div class="fs-3 text-center">
        คืนหนังสือ
    </div>

    <div class="d-flex justify-content-center mb-5">
        <label for="" style="width:200px">รหัสหนังสือที่ต้องการคืน : </label>
        <input type="text" class="form-control me-2" id="searchBook" style="width:500px">
        <button class="btn btn-primary" id="btnsearchBook">ค้นหา</button>
    </div>
    <div class="d-flex justify-content-center">
        <table class="table table-striped table-hover" style="width:700px">
            <tr>
                <th>รหัสหนังสือ: <input type="hidden" value="0" id="checkBook"></th>
                <td id="ColCodeBook"></td>
            </tr>
            <tr>
                <th>ชื่อหนังสือ: </th>
                <td id="ColNameBook"></td>
            </tr>
            <tr>
                <th scope="col">ผู้ยืม - คืนหนังสือ: </th>
                <td id="ColName"></td>
            </tr>
            <tr>
                <th scope="col">วันที่ยืมหนังสือ: </th>
                <td id="ColDate"></td>
            </tr>
            <tr>
                <th scope="col">ค่าปรับ</th>
                <td> <input type="text" class="form-control" id="fine" value="0"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-success mx-2" id="btnBorrowSubmitIn">คืนหนังสือ</button>
                        <button class="btn btn-outline-danger">ยกเลิก</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <script>

        $(document).on("click", "#btnBorrowSubmitIn", function () {
            var check = $('#checkBook').val()
            if (check == 1) {
                var searchBook = $('#searchBook').val()
                var fine = $('#fine').val();

                var formdata = new FormData();
                formdata.append("b_id", searchBook)
                formdata.append("fine", fine);

                $.ajax({
                    url: "./backend/borrow_Up.php",
                    type: "POST",
                    data: formdata,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data == 1) {
                            Swal.fire({
                                title: "ทำรายการเสร็จสิ้น",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1200
                            })
                        }
                    }
                })
            } else {
                Swal.fire({
                    icon: "error",
                    title: "ไม่พบรหัสหนังสือที่มีการยืม",
                    showConfirmButton: false,
                    timer: 1200
                })
            }
        })

        $(document).on("click", "#btnsearchBook", function () {
            var searchBook = $('#searchBook').val()
            var formdata = new FormData();
            formdata.append("searchBook", searchBook)

            $.ajax({
                url: "./backend/showBorrow.php",
                type: "POST",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data)
                    if (data.status == 1) {
                        $('#checkBook').val(1)
                        $('#ColCodeBook').html(data.CodeBook)
                        $('#ColNameBook').html(data.NameBook)
                        $('#ColDate').html(data.date)
                        $('#ColName').html(data.Name)
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "ไม่พบรหัสหนังสือที่มีการยืม",
                            showConfirmButton: false,
                            timer: 1200
                        })
                    }
                }

            })
        })
    </script>
<?php 
}
?>