<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Trang ngoài</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="category.php">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="author.php">Tác giả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                        </li>
                    </ul>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <form action="" method=POST>
            <div class="row">
                <div class="col-sm">
                    <h3 class="text-center text-uppercase fw-bold">Thêm tác giả mới</h3>
                    <form action="process_add_category.php" method="post">
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text" id="tieude">Tiêu đề</span>
                            <input type="text" class="form-control" name="tieude">
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text" id="ten_bhat">Tên bài hát</span>
                            <input type="text" class="form-control" name="ten_bhat">
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text">Tên thể loại</span>
                            <select id='ten_tloai' style="width:250px" name="ten_tloai">
                                <option value='0'>Chọn tên thể loại</option>
                            </select>
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text" id="tomtat">Tóm tắt</span>
                            <input type="text" class="form-control" name="tomtat">
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text" id="noidung">Nội dung</span>
                            <input type="text" class="form-control" name="noidung">
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text">Tên tác giả</span>
                            <select id='ten_tgia' style="width:250px" name="ten_tgia">
                                <option value='0'>Chọn tên tác giả</option>
                            </select>
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text" id="ngayviet">Ngày viết</span>
                            <input name="ngayviet" type="datetime-local" id="myDatetimeField" style="border : 1px solid var(--bs-border-color)" />
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text" id="hinhanh">Hình ảnh</span>
                            <input type="file" class="form-control" name="hinhanh">
                        </div>
                        <div class="form-group  float-end ">
                            <input type="submit" value="Thêm" class="btn btn-success">
                            <a href="category.php" class="btn btn-warning ">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </form>

    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {

        $("#ten_tgia").select2({
            ajax: {
                url: "get_ten_tgia.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#ten_tloai").select2({
            ajax: {
                url: "get_ten_tloai.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        window.addEventListener("load", function() {
            var now = new Date();
            var offset = now.getTimezoneOffset() * 60000;
            var adjustedDate = new Date(now.getTime() - offset);
            var formattedDate = adjustedDate.toISOString().substring(0, 16); // For minute precision
            var datetimeField = document.getElementById("myDatetimeField");
            datetimeField.value = formattedDate;
        });

    });
</script>

</html>
<?php
$check = false;
require 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tieude']) && isset($_POST['ten_bhat']) && isset($_POST['ten_tloai']) && isset($_POST['tomtat']) && isset($_POST['noidung']) && isset($_POST['ten_tgia']) && isset($_POST['ngayviet'])) {
    $tieude = $_POST['tieude'];
    $ten_bhat = $_POST['ten_bhat'];
    $ten_tloai = $_POST['ten_tloai'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $ten_tgia = $_POST['ten_tgia'];
    $ngayviet = $_POST['ngayviet'];
    $hinhanh = $_POST['hinhanh'];
    $sql = "INSERT INTO baiviet (ma_bviet,tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUES ('','$tieude', '$ten_bhat', '$ten_tloai', '$tomtat', '$noidung', '$ten_tgia', '$ngayviet', '$hinhanh')";
    $result = mysqli_query($conn, $sql);
    $check = true;
    if ($check) {
        echo "<script>alert('Thêm thành công')</script>";
    } else {
        echo "<script>alert('Thêm thất bại')</script>";
    }
}
?>