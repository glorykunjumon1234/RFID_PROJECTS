    <?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>
<?php
include 'myid/connection.php';
session_start();

if(isset($_POST['submit1']))
{
	$app=$_POST['search'];
	$sql="SELECT * from tbl_data where appno = '$_POST[search]' ";
	echo $app;

//   $sql="SELECT * FROM `tbl_data` WHERE id=(SELECT MIN(id) FROM `tbl_data` WHERE rfid='')";
  $q = $pdo->query($sql);
  $count=$q->rowcount();
  echo$count;
  if($count>0)
  {
  $data = $q->fetch(PDO::FETCH_ASSOC);
        $id= $data['id'];
  }
		else{
			$data['id']="no data found";
		$data['name']="--------";
		$data['gender']="--------";
		$data['department']="--------";
		$data['mobile']="--------";
	$data['appno']="-----------";
	$data['graduation']="-----------------";
	$data['date']="-----------------";	
  
  }
}
  else{
	$data['id']="--------";
		$data['name']="--------";
		$data['gender']="--------";
		$data['department']="--------";
		$data['mobile']="--------";
	$data['appno']="-----------";
	$data['graduation']="-----------------";
	$data['date']="-----------------";
  }


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
		<form class="form-horizontal" action="" method="post" >
		<input class="form-control" type="text" name="search" value="MCA0965" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">
				<span class="glyphicon glyphicon-search"></span> SEARCH HERE
				</button>
		</form>
			<br>
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				 <div class="row">
				 <p id="defaultGender" hidden><?php echo $data['gender'];?></p>
					<h3 align="center"><font color="black">Registration Form</font></h3>
				 </div>
				<br>
				<form class="form-horizontal" action="editdata.php" method="post" >
				<!-- seperrate container for id name gender	 -->
				<table align ="center">
             <tr>  
<td>        <label><font color="black">ID</label></td>
			<td><textarea name="rfid" id="getUID" placeholder="Please Scan your Card / Key Chain to display ID" rows="1" cols="1" required></textarea></td></tr>
			
			<tr><td>	
			
			<label><font color="black">Name</label></td><td>

                <input id="div_refresh" name="name" type="text" value="<?php echo $data['name'];?>">
        </td></tr>
							
				 <tr><td><label>Gender</label></td>						
						<td>	<select name="gender" id="mySelect">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select></td></tr>
    </tr>			 
	<tr><td><label>App <Noscript></Noscript></label></td>
					
                    <td><input name="appno" type="text" value="<?php echo $data['appno'];?>" ></td></tr>
                    <tr><td><label>Department</label></td>
					
                    <td><input name="department" type="text" value="<?php echo $data['department'];?>" ></td></tr>
					
					<tr><td><label>BSc/MSc/Staff</label></td>
					 <td><select name="graduation">
						 <option value="">Select graduation</option>
						<option <?php if($data['graduation']=="UG"){echo "selected";}?>>UG</option>
						<option <?php if($data['graduation']=="PG"){echo "selected";}?>>PG</option>
						<option <?php if($data['graduation']=="Staff"){echo "selected";}?>>Staff</option>
					</select>
                            </td></tr>
					
            
            <tr><td><label>Mobile Number</label></td>
            
            <td><input name="mobile" type="text" value="<?php echo $data['mobile'];?>"> </td></tr>
          
			<tr><td><label>Date</label></td>
            
            <td><input name="date" type="text" value="<?php echo $data['date'];?>"> </td></tr>
            <br>
            <tr><td><label></label></td>
                    <td><input name="edit"  type="submit" class="btn btn-success" value="Save" placeholder="Save Changes"></td></tr>
	</table>
			</div>  
					

				</form></font>
				
			</div>               
		</div> <!-- /container -->	
	</body>
	<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
</html>
<script>
			var g = document.getElementById("defaultGender").innerHTML;
			if(g=="Male") {
				document.getElementById("mySelect").selectedIndex = "0";
			} else {
				document.getElementById("mySelect").selectedIndex = "1";
			}
			
		</script>