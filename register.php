<?php
$error_email = false;
$error_username = false;
?>
 <?php
    require "admin/connection.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usersname']) && isset($_POST['emailaddress']) && isset($_POST['password'])) {
        $error = false;
        $usersname = $_POST['usersname'];
        $email = $_POST['emailaddress'];
        $password = $_POST['password'];
        // kiểm tra email đã tồn tại chưa
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $stmt = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($stmt);
        if ($count > 0) {
            $error = true;
            $error_email = true;
        }
        // kiểm tra tên tài khoản đã tồn tại chưa
        $sql = "SELECT * FROM users WHERE usersname = '$usersname'";
        $stmt = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($stmt);

        if ($count > 0) {
            $error = true;
            $error_username = true;
        }
        if ($error == false) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user_id,usersname, email, password) VALUES ('','$usersname', '$email', '$password')";
            $stmt = mysqli_query($conn, $sql);
            header("Location: login.php");
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>
    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-left">
                        <a href="index.php" class="logo-dark">
                            <span><img src="images/logo.png" alt="" height="24"></span>
                        </a>
                    </div>
                    <!-- title-->
                    <h4 class="mt-0">Đăng kí miễn phí</h4>
                    <p class="text-muted mb-4">
                        Bạn chưa có tài khoản? Tạo tài khoản của bạn, chỉ mất chưa đầy một phút</p>
                    <!-- form -->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="fullname">Tên tài khoản</label>
                            <input class="form-control" type="text" id="usersname" name="usersname" placeholder="Nhập tên tài khoản" required>
                            <?php
                            if ($error_username == true) {
                                echo '<div class="alert alert-danger" role="alert">
                                 Tên tài khoản bạn vừa nhập đã tồn tại!
                               </div>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="emailaddress">Email</label>
                            <input class="form-control" type="email" id="emailaddress" name="emailaddress" required placeholder="Nhập email email">
                            <?php
                            if ($error_email == true) {
                                echo '<div class="alert alert-danger" role="alert"> Email bạn vừa nhập đã tồn tại!</div>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input class="form-control" type="password" required id="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                <label class="custom-control-label" for="checkbox-signup">Tôi chấp nhận <a href="javascript: void(0);" class="text-muted">Các điều khoản và điều kiện</a></label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-account-circle"></i> Đăng kí </button>
                        </div>

                        <!-- social-->
                        <div class="text-center mt-4">
                            <p class="text-muted font-16">Đăng kí với</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="fa-brands fa-facebook"></i></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fa-brands fa-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="fa-brands fa-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <!-- end form-->

                    <!-- Footer-->
                    <footer class="footer footer-alt">
                        <p class="text-muted">Bạn đã có tài khoản? <a href="login.php" class="text-muted ml-1"><b>Đăng nhập</b></a></p>
                    </footer>

                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">Nghe nhạc online mễn phí</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i>Không lo các quảng cáo giữa chừng làm chúng ta khó chịu .<i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    TLU'S MUSIC GARDEN
                </p>
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->
</body>


</html>