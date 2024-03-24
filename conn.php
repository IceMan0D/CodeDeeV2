<?php
$servername = "localhost";
$username = "root";
$password = "";
<<<<<<< HEAD
$dbName = "4461399_codev";  //database name
=======
$dbName = "dd";  //database name
>>>>>>> fed7c669b0cadf4795c61800cf86a086046d220b

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();

}
?>