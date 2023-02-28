<?php
require 'connection.php';
$a = new ALL(); 
$id = '';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM baiviet WHERE ma_tgia = $id";
    $stmt = $a->pdo->query($sql);
    $sql = "DELETE FROM tacgia WHERE ma_tgia = $id";
    $stmt = $a->pdo->query($sql);
    header("location: author.php");
}
?>