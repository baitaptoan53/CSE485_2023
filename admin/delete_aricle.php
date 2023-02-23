<?php
                   require 'connection.php';
                   $id = $_GET['id'];
                   $sql = "DELETE FROM tacgia WHERE ma_bviet = $id";
                   $stmt = $pdo->query($sql);
                   header("location: aricle.php");
?>