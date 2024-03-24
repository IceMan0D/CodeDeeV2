<?php
$servername = "localhost";
$username = "root";
$password = "";
<<<<<<< HEAD
$dbName = "dataset_code_lastest";  //database name
=======
<<<<<<< HEAD
$dbName = "4461399_codev";  //database name
=======
$dbName = "dd";  //database name
>>>>>>> fed7c669b0cadf4795c61800cf86a086046d220b
>>>>>>> 65e2a75b18df7a2f3119a0713556630bcdbf0993

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();

}
?>