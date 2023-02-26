<?php
    require_once('connection.php');
    $a = new ALL();
    $id='';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM baiviet WHERE ma_bviet = $id";
        if($stmt = $a->pdo->query($sql)){
            header("location: article.php");
            die();
        }else{
            echo "<script>alert('Xóa thất bại!!')</script>";
        }
    }
?>