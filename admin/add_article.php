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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

    $a = new ALL();
    $tieude = $ten_bhat = $ma_tloai = $tomtat = $noidung = $ma_tgia = $ngayviet = $hinhanh = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['tieude'])) {
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $ma_tloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $ma_tgia = $_POST['ma_tgia'];
            $ngayviet = $_POST['ngayviet'];
            $hinhanh = $_POST['hinhanh'];

            $a->addAutoPrimaryKey('baiviet','ma_bviet');
            $sql3 = "INSERT INTO baiviet(tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,ngayviet,hinhanh) 
            VALUE('$tieude','$ten_bhat','$ma_tloai','$tomtat','$noidung','$ma_tgia','$ngayviet','$hinhanh')";
            $stmt3 = $a->pdo->prepare($sql3);
            if ($stmt3->execute()) {
                $a->delAutoPrimaryKey('baiviet','ma_bviet');
                header('location:article.php');
                die();
            } else {
                echo "<script>alert('Thêm thất bại')</script>";
            }
        }
    }
    ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm thông tin bài viết</h3>
                <form action="" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude" value="">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Tên bài hát</span>
                        <input type="text" class="form-control" name="ten_bhat" value="">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                        <select class="form-select" aria-label="Default select example" name="ma_tloai">
                            <?php
                            $sql1 = "SELECT*FROM theloai";
                            $stmt1 = $a->pdo->query($sql1);
                            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                $isSeclected = '';
                                if ($row1['ma_tloai'] == $id2) {
                                    $isSeclected = 'selected';
                                } else {
                                    $isSeclected = '';
                                }
                                echo '
                                    <option ' . $isSeclected . ' value="' . $row1['ma_tloai'] . '">' . $row1['ma_tloai'] . '-' . $row1['ten_tloai'] . '</option>
                                ';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Tóm tắt</span>
                        <textarea type="text" class="form-control" name="tomtat"></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Nội dung</span>
                        <textarea type="text" class="form-control" name="noidung"></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                        <select class="form-select" aria-label="Default select example" name="ma_tgia">
                            <?php
                            $sql2 = "SELECT*FROM tacgia";
                            $stmt2 = $a->pdo->query($sql2);
                            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                $isSeclected = '';
                                if ($row2['ma_tgia'] == $id3) {
                                    $isSeclected = 'selected';
                                } else {
                                    $isSeclected = '';
                                }
                                echo '
                                    <option ' . $isSeclected . ' value="' . $row2['ma_tgia'] . '">' . $row2['ma_tgia'] . '-' . $row2['ten_tgia'] . '</option>
                                ';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Ngày viết</span>
                        <input type="datetime-local" class="form-control" name="ngayviet" value="">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                        <input type="file" class="form-control" name="hinhanh" value="">
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