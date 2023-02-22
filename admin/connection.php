<?php
// ket noi database
$type     = 'mysql';                 // Type of database
$server   = 'localhost';             // Server the database is on
$db       = 'btth01_cse485';             // Name of the database
$port     = '3306';                      // Port is usually 8889 in MAMP and 3306 in XAMPP             // UTF-8 encoding using 4 bytes of data per character

$username = 'root';          // Enter YOUR username here
$password = '';         // Enter YOUR password here

$options  = [                        // Options for how PDO works
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];                                                                  // Set PDO options

// DO NOT CHANGE ANYTHING BENEATH THIS LINE
$dsn = "$type:host=$server;dbname=$db;port=$port"; // Create DSN
try {                                                               // Try following code
    $pdo = new PDO($dsn, $username, $password, $options);           // Create PDO object                               // If successful, print message
} catch (PDOException $e) {                                         // If exception thrown
    echo $e->getMessage();                                          // Print error message
}
