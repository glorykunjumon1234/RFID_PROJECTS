<?php
ob_start();
?>
<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
       
        $name = $_POST['name'];
		$id = $_POST['id'];
		$aname=$_POST['author'];
		$edition= $_POST['edition'];
        $category = $_POST['category'];
		$quantity=$_POST['quantity'];
        $status = "Available";
		// insert data
        $pdo = Database::connect();
			 // keep track post values
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM book where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
		
		$msg = null;
		$count=$q->rowcount();
		if($count>0){
		$msg="This Id  $id is already present please Scan and register again";
		}
		else
		{

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO book (name,id,author,edition,category,quantity,status) values(?,?,?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$id,$aname,$edition,$category,$quantity,$status));
		echo"Inserted Succesfully<h3>";
		Database::disconnect();
		header("Location: readbooktag.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		</head>
	<style>
		div{
			background:red;
			color:#fff;
			text-align:center;
		}
		.container
		{
			margin-top:15%;
		}
		a{
			align:center;
		}
		
	</style>
	<body>
		<br><br><br>
		<h3 align="center"><font color="black">Library E-gate Register
System </font></h3>
			<div class="container">
<div class="row">
	<div class="col1">
		<br><br>
	<div> <?php echo"$msg";?></div><br>
	</div>
	<div class="col2">

	</div>
	<div class="col3">
	<a class="btn btn-info float-right" href="registration.php">Back To Registration Form</a>
	<br><br><br>
	</div>
</div>

		





		</div>
	
</body>
</html>
<?php
ob_flush();
?>