<?php
$conn= new mysqli("localhost","root","","rfid2");

if(!$conn){
    die(mysqli_error($conn));
}
else{
    

}
$servername = "localhost";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=rfid2", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  
  }
?>