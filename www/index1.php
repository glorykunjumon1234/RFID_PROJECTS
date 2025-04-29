<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}
		body {
			background-color: white;
			}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #00BFFF;
			width: 100%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #00BFFF;}

		ul.topnav li a.active {background-color: #00BFFF;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		</style>
		
		<title>UC COLLEGE LIBRARY-ATTENDANCE MANAGEMENT SYSTEM</title>
	</head>
	
	<body><br><br>
<h2 align="center" margin-top="50px"><font color="black">UC College Attendance Management System
</font></h2>
		<ul class="topnav">
			<li><a class="active" href="index.php">Library</a></li>
			<li><a href="user data.php">Student records</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read RFID ID</a></li>
			<li><a href="dailyrecord.php">Daily Record</a></li>
			<li><a href="index2qrcode.php">Scan Qr Code</a></li>
		</ul>
		<br>
		<img src="UcLogo.png" alt="" width="100" height="50"> <h3><font color="black">UC College Library-Attendance Management System</font></h3>
		<h5><i>Affiliated To Mahatma Gandhi University,Kottayam</i></h5>
		<img src="ucpic.jpeg" alt="" width="650" height="500">
	</body>
</html>