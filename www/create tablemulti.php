<?php


$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS rfid2";
if ($conn->query($sql) === TRUE) {

    echo "1. Database created successfully <br/>";
    $conn->select_db("rfid2");


    $sql_members = "CREATE TABLE IF NOT EXISTS `attendance2` (
        `ID` int(11) NOT NULL AUTO_INCREMENT,
        `STUDENTID` varchar(250) NOT NULL,
        `TIMEIN` varchar(250) NOT NULL,
        `TIMEOUT` varchar(250) NOT NULL,
        `LOGDATE` varchar(250) NOT NULL,
        `STATUS` varchar(250) NOT NULL,
        `name` varchar(55) NOT NULL,
        `department` varchar(55) NOT NULL,
        PRIMARY KEY (ID)
      )";

    if ($conn->query($sql_members) === TRUE) {
        echo "2. Table1 created successfully <br/>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $sql_content = "CREATE TABLE IF NOT EXISTS `attendance` (
        `ID` int(11) NOT NULL AUTO_INCREMENT,
        `STUDENTID` varchar(250) NOT NULL,
        `TIMEIN` varchar(250) NOT NULL,
        `TIMEOUT` varchar(250) NOT NULL,
        `LOGDATE` varchar(250) NOT NULL,
        `STATUS` varchar(250) NOT NULL,
        `NAME` varchar(55) NOT NULL,
        `DEPARTMENT` varchar(55) NOT NULL,
        `appno` varchar(55) NOT NULL,
        `gender` varchar(55) NOT NULL,
        `graduation` varchar(55) NOT NULL,
        PRIMARY KEY (ID)
      )";

    if ($conn->query($sql_content) === TRUE) {
        echo "3. Table2 created successfully <br/>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $sql_tbldata = "CREATE TABLE IF NOT EXISTS `tbl_data` (
        `name` varchar(55) NOT NULL,
        `id` varchar(55) NOT NULL,
        `appno` varchar(55) NOT NULL,
        `gender` varchar(55) NOT NULL,
        `department` varchar(55) NOT NULL,
        `graduation` varchar(55) NOT NULL,
        `mobile` varchar(55) NOT NULL,
        `date` date NOT NULL,
        PRIMARY KEY (id)
      )";
      
    if ($conn->query($sql_tbldata) === TRUE) {
        echo "3. Table3 created successfully <br/>";
    } else {
        echo "Error creating table: " . $conn->error;
    }




} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();


?>
