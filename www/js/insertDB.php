<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$id = $_POST['id'];
		$appno=$_POST['appno'];
		$gender = $_POST['gender'];
        $department = $_POST['department'];
		$graduation=$_POST['g'];
        $mobile = $_POST['mobile'];
		$date = $_POST['date'];
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO tbl_data (name,id,appno,gender,department,graduation,mobile,date) values(?,?,?, ?, ?, ?, ?,?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$id,$appno,$gender,$department,$graduation,$mobile,$date));
		Database::disconnect();
		header("Location: user data.php");
    }
?>