<?php
    class ALL{
            public $pdo;
            public function __construct(){
                $dsn = "mysql:host=localhost;dbname=btth01_cse485;port=3306";
                $options  = [                      
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];                                                                  
                try {
                    $this->pdo = new PDO($dsn,'root','',$options);
                }catch(PDOException $e){
                    echo "Error: " .$e ->getMessage();
                }
            }
            public function selectCount($table){
                $sql = "SELECT COUNT(*) FROM $table";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(); 
                $count = $stmt->fetchColumn();
                return $count;        
            }
            public function delAutoPrimaryKey($my_table,$column_id_key){
                $sql = "ALTER TABLE $my_table MODIFY COLUMN $column_id_key INT";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
            public function addAutoPrimaryKey($my_table,$column_id_key){
                $sql = "ALTER TABLE $my_table MODIFY COLUMN $column_id_key INT AUTO_INCREMENT";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
            public function delForeiginKey($table_name,$foreign_key_name){
                $sql = "ALTER TABLE $table_name DROP FOREIGN KEY $foreign_key_name";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
            public function addForeiginKey($parent_table ,$parent_column,$child_table ,$child_column,$foreign_key_name ){
                $sql = "ALTER TABLE $parent_table ADD  CONSTRAINT $foreign_key_name FOREIGN KEY ($parent_column) REFERENCES $child_table($child_column) ON DELETE RESTRICT ON UPDATE RESTRICT";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
    }

$conn = new mysqli("localhost","root","","btth01_cse485");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>