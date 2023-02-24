<?php
require 'connection.php';
$id = $_GET['id'];
$sql = "DELETE FROM baiviet WHERE ma_tloai = $id";
$stmt = $pdo->query($sql);
$sql = "DELETE FROM theloai WHERE ma_tloai = $id";
$stmt = $pdo->query($sql);
header("location: category.php");
?>