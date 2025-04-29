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
		<link href="style1.css" rel="stylesheet">
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
		html {
			font-family: Arial;
			display: inline-block; 
			margin: auto;

		}
         body { 
			 background-color: white;
			 }
		
		textarea {
			resize: none;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding:0;
			overflow: hidden;
			background-color: #00BFFF;
			width:100%;
			
		}
		/* .button{
    		color:white;
    		background-color: blue;
    		padding: 6px 10px;
    		font-size: 18px;
    			} */

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 15px 18px;
			text-decoration:none;
		}
		

		ul.topnav li a:hover:not(.active) {background-color: grey;}

		ul.topnav li a.active {background-color: #00BFFF;} 

		ul.topnav li.right {float: right;} 

		@media screen and (max-width: 6px) { 
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		.font-design {
    color: black;   /* Set font color to black */
    font-weight: bold;  /* Make the text bold */
}

		</style>
		
		<title>Registration : UNION CHRISTIAN COLLEGE - ALUVA</title>
	</head>
	
	<body>
	<br><br>
	<div class="container text-center">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
	<img src="UcLogo.png" alt="" width="50" height="90">
    </div>
    <div class="col-md-auto">
	<h3><font color="black">Library E-gate Register
System </font></h3>
    </div>
    <div class="col col-lg-2">
	<img src="uclogo2.png" alt="" width="110" height="110">
    </div>
  </div>
</div>
		


		<ul class="topnav">
			<li><a href="user data.php">Student Records</a></li>
			<li><a class="active" href="registration.php">Registration</a></li>
			<li><a href="index.php">Read RFID Tag</a></li>
			<li><a href="download.php">Download</a></li>
			<li><a href="index2qrcode.php">Scan Qr Code</a></li>
		</ul>

		<div class="container">
			<br>
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				 <div class="row">
					<h3 align="center"><font color="black">Registration Form</font></h3>
				 </div>
				<br>
				<form class="form-horizontal" action="insertDB.php" method="post" enctype="multipart/form-data">
				<!-- seperrate container for id name gender	 -->
				<table align ="center">
             <tr>  
<td>        <label class="font-design"><font color="black">ID</label></td>
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