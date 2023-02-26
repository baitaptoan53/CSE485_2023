<?php
include 'connection.php';

if(!isset($_POST['searchTerm'])){ 
  $fetchData = mysqli_query($conn,"select * from tacgia order by ten_tgia limit 5");
}else{ 
  $search = $_POST['searchTerm'];   
  $fetchData = mysqli_query($conn,"select * from tacgia where ten_tgia like '%".$search."%' limit 5");
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
  $data[] = array("id"=>$row['ma_tgia'], "text"=>$row['ten_tgia']);
}
echo json_encode($data);
?>