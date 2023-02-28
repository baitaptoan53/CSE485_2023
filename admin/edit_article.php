<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link active fw-bold" href="category.php">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="author.php">Tác giả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
    require_once('connection.php');

    $id = '';
    $id2 = '';
    $id3 = '';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $id2 = $_GET['id2'];
        $id3 = $_GET['id3'];
    }
    $sql = "SELECT * FROM baiviet WHERE ma_bviet = '$id'";
    $stmt = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($stmt);    

    $ma_bviet = $tieude = $ten_bhat = $ma_tloai = $tomtat = $noidung = $ma_tgia = $ngayviet = $hinhanh = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['ma_bviet'])) {
            $ma_bviet = $_POST['ma_bviet'];
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $ma_tloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $ma_tgia = $_POST['ma_tgia'];
            $ngayviet = $_POST['ngayviet'];
            $hinhanh = $_POST['hinhanh'];
            $sql3 = "UPDATE baiviet SET tieude='$tieude',ten_bhat='$ten_bhat',ma_tloai='$ma_tloai',tomtat='$tomtat',noidung='$noidung',ma_tgia='$ma_tgia',ngayviet='$ngayviet',hinhanh='$hinhanh' WHERE ma_bviet=$ma_bviet";
            $stmt3 = mysqli_query($conn,$sql3);
            echo $stmt3;
            if($stmt3){
                header('location:article.php');
                die();
            }else{
                echo"<script>alert('Sửa thất bại')</script>";
            }
        }
    }
    ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
                <form action="" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã bài viết</span>
                        <input type="text" class="form-control" name="ma_bviet" readonly value="<?= $id ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude" value="<?= $row['tieude'] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Tên bài hát</span>
                        <input type="text" class="form-control" name="ten_bhat" value="<?= $row['ten_bhat'] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                        <select class="form-select" aria-label="Default select example" name="ma_tloai">
                            <?php
                            $sql1 = "SELECT*FROM theloai";
                            $stmt1 = mysqli_query($conn,$sql1);
                            while ($row1 =mysqli_fetch_assoc($stmt1)) {
                                $isSeclected = '';
                                if ($row1['ma_tloai'] == $id2) {
                                    $isSeclected = 'selected';
                                } else {
                                    $isSeclected = '';
                                }
                                echo '
                                    <option ' . $isSeclected . ' value="'.$row1['ma_tloai'].'">' . $row1['ma_tloai'] . '-' . $row1['ten_tloai'] . '</option>
                                ';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Tóm tắt</span>
                        <textarea type="text" class="form-control" name="tomtat"><?= $row['tomtat'] ?></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Nội dung</span>
                        <textarea type="text" class="form-control" name="noidung"><?= $row['noidung'] ?></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                        <select class="form-select" aria-label="Default select example" name="ma_tgia">
                            <?php
                            $sql2 = "SELECT*FROM tacgia";
                            $stmt2 = mysqli_query($conn,$sql2);
                            while ($row2 = mysqli_fetch_assoc($stmt2)) {
                                $isSeclected = '';
                                if ($row2['ma_tgia'] == $id3) {
                                    $isSeclected = 'selected';
                                }else {
                                    $isSeclected = '';
                                }
                                echo '
                                    <option ' . $isSeclected . ' value="'.$row2['ma_tgia'].'">' . $row2['ma_tgia'] . '-' . $row2['ten_tgia'] . '</option>
                                ';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Ngày viết</span>
                        <input type="text" class="form-control" name="ngayviet" value="<?= $row['ngayviet'] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                        <input type="file" class="form-control" name="hinhanh" value="<?= $row['hinhanh'] ?>">
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="category.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2"
        style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>