<?php
include 'connection.php';

if(!isset($_POST['searchTerm'])){ 
  $fetchData = mysqli_query($conn,"select * from theloai order by ten_tloai limit 5");
}else{ 
  $search = $_POST['searchTerm'];   
  $fetchData = mysqli_query($conn,"select * from theloai where ten_tloai like '%".$search."%' limit 5");
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
  $data[] = array("id"=>$row['ma_tloai'], "text"=>$row['ten_tloai']);
}
echo json_encode($data);
?>