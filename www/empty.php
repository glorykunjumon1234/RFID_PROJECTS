<?php
    require 'database.php';
  
     
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$department=$_POST['department'];

	$sql = "SELECT * FROM tbl_data where department = 'Computer Science' AND date='0000-00-00'";
	$q1 = $pdo->query($sql);
	
	$row = $q1->fetch(PDO::FETCH_ASSOC);
	$count1=$q1->rowcount();
	if($count1>1)
	{
		$sql= "UPDATE tbl_data SET date='2022-07-02' WHERE  department = 'Computer Science'";
	}

	Database::disconnect();
	if (isset($_POST['edit']))
{
    
   
	$department=$_POST['department'];

    $date=$_POST['date'];
	

    
   //$sql= "UPDATE `register` SET `name`='$name',`email`='$email',`phone`='$mobile',`age`='$age' WHERE id=$id";
   $sql= "UPDATE tbl_data SET date='$date' WHERE department='$department'";
   
    if($pdo->query($sql))
    {
		echo"updated";
	
             
    }
    else
    {
        echo "eror";
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
		
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
		}
		body {
			background-color:white;
			 }
		
		textarea {
			resize: none;
		}
			label{
				padding-left:10px;
			}
		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		label{
			font color:black;}
			a{ 
				margin-left:45%;
				margin-top:5%;
			}
		
		</style>
		
		<title>Edit : UC College Attendance Management System</title>
		
	</head>
	
	<body>

		<h2 align="center"><font color="red">UC College Attendance Management System</font></h2>
		
		<div class="container">
     
		<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				<div class="row">
				<h3 align="center"><font color="red">Edit Student Data</font></h3>
					<p id="defaultGender" hidden><?php echo $data['gender'];?></p>
					
				</div>
				<form action="" method="post">
				<table align="center">

    </tr>			 
			
                    <tr><td><label>Department</label></td>
					
                    <td><input name="department" type="text" ></td></tr>
					
					
				
            <tr><td><label>Date</label></td>
            
            <td><input name="date" type="date"></td></tr>
            
            <br>
            <tr><td><label></label></td>
                    <td><input name="edit"  type="submit" class="btn btn-success" value="Save" placeholder="Save Changes"></td></tr>
	</table>
			</div>               
		</div> <!-- /container -->	
		<div>
	</div>
	
	</body>
</html>