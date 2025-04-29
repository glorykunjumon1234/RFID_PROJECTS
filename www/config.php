<?php
$server="localhost";
$username="root";
$password="";
$db="rfid2";
// $conn= new mysqli("mysql:host=localhost; dbnname=test","root","");
$conn= new mysqli($server,$username,$password,$db);
if($conn){
    // echo "success";

}
else{
    echo" error connection unsuccess";
}
?>