<?php
// starting the session
if(!isset($_SESSION)) session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "gestion_des_stocks";
$conn = null;
try {
  $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
