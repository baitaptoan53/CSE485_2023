<?php
    class PDOs {
        public $pdo;
        public $nameTable;
        public function __construct($params){
            $dsn = 'mysql:host='.$params['host'].';dbname='.$params['dbname'].';post='.$params['post'];
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            try {
                $this->pdo = new PDO($dsn,$params['username'],$params['password'],$options);
                $this->nameTable = $params['nameTable'];
            }catch (PDOException $e) {
                echo 'Connect failed: '.$e->getMessage();
            }
        }
        public function setNameTable($setnameTable){
            $this->nameTable = $setnameTable;
        }
        public function queryAddForeiginKey($parent_table ,$parent_column,$child_table ,$child_column,$foreign_key_name ){
            $sql = "ALTER TABLE $parent_table ADD  CONSTRAINT $foreign_key_name FOREIGN KEY ($parent_column) REFERENCES $child_table($child_column) ON DELETE RESTRICT ON UPDATE RESTRICT";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        public function queryDelForeiginKey($table_name,$foreign_key_name){
            $sql = "ALTER TABLE $table_name DROP FOREIGN KEY $foreign_key_name";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        public function queryDelAutoPrimaryKey($my_table,$column_id_key){
            $sql = "ALTER TABLE $my_table MODIFY COLUMN $column_id_key INT";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        public function queryAddAutoPrimaryKey($my_table,$column_id_key){
            $sql = "ALTER TABLE $my_table MODIFY COLUMN $column_id_key INT AUTO_INCREMENT";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        public function queryCheckForeigin($database_name,$my_table,$check){
            $isCheck = false;
            $sql = "SELECT 
            TABLE_NAME,COLUMN_NAME,CONSTRAINT_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME 
        FROM 
            INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
        WHERE 
            REFERENCED_TABLE_SCHEMA = '$database_name' 
            AND REFERENCED_TABLE_NAME = '$my_table'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['CONSTRAINT_NAME']==="$check") $isCheck = true;
            }
            return $isCheck;
        }
    }
?>
