<?php
                   require 'connection.php';
                   $id = $_GET['id'];
                   $sql = "DELETE FROM baiviet WHERE ma_tgia = $id";
                   $stmt = $pdo->query($sql);
                   $sql = "DELETE FROM tacgia WHERE ma_tgia = $id";
                   $stmt = $pdo->query($sql);
                   header("location: author.php");
?>