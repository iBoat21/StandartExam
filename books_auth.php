<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 fs-3 mt-4 text-center">การจัดการข้อมูลหนังสือ</div>
    </div>

    <!-- ช่องค้นหา -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-4">
            <div class="input-group">
                <input type="text" class="form-control" id="search" placeholder="ค้นหาหนังสือ...">
                <button class="btn btn-outline-success" id="btnSearch">ค้นหา</button>
            </div>
        </div>
    </div>

    <a href="index.php?menu=books" class="btn btn-outline-success">ทั้งหมด</a>
    <a href="index.php?menu=bookId" class="btn btn-outline-success">รหัสหนังสือ</a>
    <a href="index.php?menu=bookName" class="btn btn-outline-success">ชื่อเรื่อง</a>
    <a href="index.php?menu=bookAuthor" class="btn btn-outline-success">นักเขียน</a>

    <!-- ตารางสมาชิก -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row g-3" id="contentCards">
                        <!-- ข้อมูลหนังสือจะถูกเติมที่นี่ -->
                    </div>
                </div>
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
            url: "pages/card.book.auth.php",
            type: "POST",
            data: formdata,
            dataType: "html",
            contentType: false,
            processData: false,
            success: function(data) {
                $('#contentCards').html(data);
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