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
    }
?>
