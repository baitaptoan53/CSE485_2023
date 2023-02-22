
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "btth01_cse485";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
}
?>