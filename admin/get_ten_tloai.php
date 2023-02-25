<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "btth01_cse485"; 
$con = mysqli_connect($host, $user, $password,$dbname);

if(!isset($_POST['searchTerm'])){ 
  $fetchData = mysqli_query($con,"select * from theloai order by ten_tloai limit 5");
}else{ 
  $search = $_POST['searchTerm'];   
  $fetchData = mysqli_query($con,"select * from theloai where ten_tloai like '%".$search."%' limit 5");
} 

$get_ten_tloai = array();
while ($row = mysqli_fetch_array($fetchData)) {    
  $get_ten_tloai[] = array("text"=>$row['ten_tloai'] , "id"=>$row['ma_tloai']);
}
echo json_encode($get_ten_tloai);
?>