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
    if(isset($_POST['txtCatName'])){
        $txtCatName = $_POST['txtCatName'];
        

        
        $pdo->queryDelForeiginKey('baiviet','baiviet_1');
        $pdo->queryAddAutoPrimaryKey('theloai','ma_tloai');


        $sql = "INSERT INTO $pdo->nameTable(ten_tloai) VALUES('$txtCatName')";
        $stmt = $pdo->pdo->prepare($sql);
        if ($stmt->execute()){
            $pdo->queryDelAutoPrimaryKey('theloai','ma_tloai');
            $pdo->queryAddForeiginKey('baiviet','ma_tloai','theloai','ma_tloai','baiviet_1');
            header("Location:category.php");
            die();
        }else{
            echo "<script>alert(Thêm thất bại)</script>";
        }
    }
?>