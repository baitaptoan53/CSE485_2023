<?php
                   require 'connection.php';
                   $id = $_GET['id'];
                   var_dump($id);
                   $sql = "DELETE FROM theloai WHERE ma_tloai = $id";
                   $stmt = $pdo->query($sql);
                   header("location: category.php");
?>