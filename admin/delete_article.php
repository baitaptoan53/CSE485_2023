<?php
                   require 'connection.php';
                   $id = $_GET['id'];
                   $sql = "DELETE FROM baiviet WHERE ma_bviet = $id";
                   $stmt = $pdo->query($sql);
                   header("location: article.php");
?>