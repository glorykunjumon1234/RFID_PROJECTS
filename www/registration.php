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
		<!-- <link href="style1.css" rel="stylesheet"> -->
		<script src="js/bootstrap.min.js"></script>
		<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				 $("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");
				}, 500);
			});
		</script>
	<style>
		font-design{
			color:white;
		}
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}
		 body {
			background-color:black;
			 }
			 label{
				margin-top:5px;
				font-size:25px;
				color:brown;
			 }
			 p {
  animation: blink 1.5s infinite;
  font-size:18px;
  font-family:cursive;
  color:brown;
  text-align:center;
}
h4 {
  animation: blink 1.5s infinite;
  font-size:18px;
  font-family:cursive;
  color:white;
  text-align:center;
}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #F14A00;
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

		ul.topnav li a:hover:not(.active) {background-color: grey;}

		ul.topnav li a.active {background-color: black;}
		
		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		td.lf {
			padding-left: 15px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
		.rowdesign
{
	background-image: linear-gradient(to left, rgba(241, 74, 0, 0.336), rgba(255, 255, 255, 0.1));

}
#divvideo{
			 box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
		}
		</style>
		
		<title>Registration : UNION CHRISTIAN COLLEGE - ALUVA</title>
	</head>
	
	<body>
	<br><br>
	<div class="container text-center">
  <div class="row justify-content-md-center">
 
    </div>
    <div class="col-md-auto">
	<h3><font color="white"> E-gate Register
System </font></h3>
    </div>

  </div>
</div>
		

<br><br>

		<ul class="topnav">
			<li><a href="#">Student Records</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="index.php">Read Tag ID</a></li>
			<li><a href="#">Daily Record</a></li>
			<li><a href="#">Scan Qr Code</a></li>
		</ul>

		<div class="container">
			<br>
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				 <div class="row">
					<h3 align="center"><font color="white">Registration Form</font></h3>
				 </div>
				<br>
				<form class="form-horizontal" action="insertDB.php" method="post" enctype="multipart/form-data">
				<!-- seperrate container for id name gender	 -->
				<table align ="center">
             <tr>  
<td>        <label class="font-design">ID</label></td>
			<td><textarea name="id" id="getUID" placeholder="Please Scan your Card / Key Chain to display ID" rows="1" cols="1" required></textarea></td></tr>
			<tr><td>	
			<label class="font-design">Application No</label></td>
			<td><input id="div_refresh" name="appno" type="text"  placeholder="" required></td></tr>
			<tr><td>	
			<label class="font-design">Name</label></td>
			<td><input id="div_refresh" name="name" type="text"  placeholder="" required></td></tr>
							
				<tr><td><label class="font-design">Gender</label></td>						
						<td>	<select name="gender">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select></td></tr>
    </tr>			
			
                    <tr><td><label class="font-design">Department</label></td>
					
							<td><input name="department" type="text" placeholder="" required></td></tr>
							<tr><td><label class="font-design">UG/PG/Staff<label></td>
					
					<td>	<select name="graduation">
								<option value="UG">UG</option>
								<option value="PG">PG</option>
								<option value="Staff">Staff</option>
							</select></td></td></tr>
					
                    <tr><td><label class="font-design">Mobile Number</label></td>
					
                    <td><input name="mobile" type="text"  placeholder="" required> </td></tr>
                    <tr><td><label class="font-design">Date</label></td>
					
                    <td><input name="date" type="date"  placeholder="" required></td></tr>

					<tr><td><label class="font-design">Upload Image</label></td>
					<td>	<input class="form-control" type="file" name="file" value="" />
</td><tr>
					<td><label></label></td>
					<!-- <div class="form-actions"> -->
						<td><button type="submit" class="btn btn-success">Save</button></td>
						<!-- <button class="btn">SUBMIT</button> -->
					<!-- </div> -->
					
					

				</form></font>
				
			</div>               
		</div> <!-- /container -->	
	</body>
	<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
</html>