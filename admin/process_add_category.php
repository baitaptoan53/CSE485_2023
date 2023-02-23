<?php
$id = $_GET['id'];
var_dump($id);
$sql_update = "UPDATE theloai SET ten_tloai = ten_tloai WHERE ma_tloai = $id";
if (isset($_POST['txtCatName'])) {
    $ten_tloai = $_POST['txtCatName'];
    $sql_update = "UPDATE theloai SET ten_tloai = '$ten_tloai' WHERE ma_tloai = $id";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->execute();
    header('location: category.php');
}
