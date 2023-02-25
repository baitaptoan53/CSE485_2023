<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "btth01_cse485"; 
$con = mysqli_connect($host, $user, $password,$dbname);

if(!isset($_POST['searchTerm'])){ 
  $fetchData = mysqli_query($con,"select * from baiviet order by ten_bhat limit 5");
}else{ 
  $search = $_POST['searchTerm'];   
  $fetchData = mysqli_query($con,"select * from baiviet where ten_bhat like '%".$search."%' limit 5");
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
  $data[] = array("text"=>$row['ten_bhat'] , "id"=>$row['ma_bviet']);
}
echo json_encode($data);
?>