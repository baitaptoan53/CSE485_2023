<?php
    require_once('../connect.class.php');
    $params = [
          'host' => 'localhost',
          'dbname' => 'btth01_cse485',
          'post' => '3306',
          'username' => 'root',
          'password' => '',
          'nameTable' => 'theloai'
    ];
    $pdo = new PDOs($params);
    $sql = "UPDATE $pdo->nameTable SET ten_tloai=? WHERE ma_tloai=?";
    if (isset($_POST['txtCatId'])&&isset($_POST['txtCatName'])) {
        $txtCatId = $_POST['txtCatId'];
        $txtCatName = $_POST['txtCatName'];

        $stmt = $pdo->pdo->prepare($sql);
        echo $stmt->execute([$txtCatName, $txtCatId]);
        if($stmt->execute([$txtCatName, $txtCatId])==1){
            header('location:category.php');
            die();
        }else{
            echo "<script>alert('Sửa thất bại')</script>";
        }

    }
?>