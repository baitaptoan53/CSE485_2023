<?php
 $conn = new mysqli("localhost", "root", "", "btth01_cse485");
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error();
  exit();
}

  function selectCount($table)
  {
    global $conn;
    $sql = "SELECT COUNT(*) FROM $table";
    $stmt = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($stmt);
    return $count;
  }
  function delAutoPrimaryKey($my_table, $column_id_key)
  {
    global $conn;
    $sql = "ALTER TABLE $my_table MODIFY COLUMN $column_id_key INT";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }
  function addAutoPrimaryKey($my_table, $column_id_key)
  {
    global $conn;
    $sql = "ALTER TABLE $my_table MODIFY COLUMN $column_id_key INT AUTO_INCREMENT";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }
   function delForeiginKey($table_name, $foreign_key_name)
  {
    global $conn;
    $sql = "ALTER TABLE $table_name DROP FOREIGN KEY $foreign_key_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }
   function addForeiginKey($parent_table, $parent_column, $child_table, $child_column, $foreign_key_name)
  {
    global $conn;
    $sql = "ALTER TABLE $parent_table ADD  CONSTRAINT $foreign_key_name FOREIGN KEY ($parent_column) REFERENCES $child_table($child_column) ON DELETE RESTRICT ON UPDATE RESTRICT";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }
// Check connection
?>