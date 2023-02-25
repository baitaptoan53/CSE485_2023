<?php
    require_once('../connect.class.php');
    $params = [
        'host' =>'localhost',
        'dbname' =>'btth01_cse485',
        'post' =>'3306',
        'username' =>'root',
        'password' =>'',
        'nameTable' =>'theloai',
    ];
    $pdo = new PDOs($params);
    if(isset($_GET['id'])){


        // if($pdo->queryCheckForeigin('btth01_cse485','theloai','baiviet_1')){
        //     $pdo->queryDelForeiginKey('baiviet','baiviet_1');
        // }else{
        //     $pdo->queryAddForeiginKey('baiviet','ma_tloai','theloai','ma_tloai','baiviet_1');
        // }
        
        
        $sql = "DELETE FROM $pdo->nameTable WHERE ma_tloai=?";
        $stmt = $pdo->pdo->prepare($sql);
        if($stmt->execute([$_GET['id']])){
            // $pdo->queryAddForeiginKey('baiviet','ma_tloai','theloai','ma_tloai','baiviet_1');
            header("Location:category.php");
            die();
        }else{
            echo "<script> alert('xóa thất bại!!')</script>";
        }
    }
?>