<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM tbl_data where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
	if (isset($_POST['edit']))
{
    
    $name=$_POST['name'];
	$appno=$_POST['appno'];
    $gender=$_POST['gender'];
	$department=$_POST['department'];
	$graduation=$_POST['graduation'];
    $mobile=$_POST['mobile'];
    $date=$_POST['date'];

    
   //$sql= "UPDATE `register` SET `name`='$name',`email`='$email',`phone`='$mobile',`age`='$age' WHERE id=$id";
   $sql= "UPDATE tbl_data SET name = '$name',appno = '$appno', gender='$gender', department='$department',graduation='$graduation',mobile='$mobile', date='$date' WHERE id='$id'";
   
    if($pdo->query($sql))
    {
    //    echo "data updated";
	Database::disconnect();
	   header("Location: user data.php");
             
    }
    else
    {
        echo "eror";
    }
}
       ?>
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
             <tr>  
<td>        <label><font color="black">ID</label></td>
<td>
<input name="id" type="text"  placeholder="" value="<?php echo $data['id'];?>" readonly> </td>
</tr> 
	<tr>
        <td>	
			<label><font color="black">Name</label></td>

			<td>
                <input id="div_refresh" name="name" type="text" value="<?php echo $data['name'];?>">
        </td></tr>
							
				 <tr><td><label>Gender</label></td>						
						<td>	<select name="gender" id="mySelect">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select></td></tr>
    </tr>			 
			
                    <tr><td><label>Department</label></td>
					
                    <td><input name="department" type="text" value="<?php echo $data['department'];?>" ></td></tr>
					
					<tr><td><label>BSc/MSc/Staff</label></td>
					 <td><select name="graduation">
						 <option value="">Select graduation</option>
						<option <?php if($data['graduation']=="BSc"){echo "selected";}?>>BSc</option>
						<option <?php if($data['graduation']=="MSc"){echo "selected";}?>>MSc</option>
						<option <?php if($data['graduation']=="Staff"){echo "selected";}?>>Staff</option>
					</select>
                            </td></tr>
					
            
            <tr><td><label>Mobile Number</label></td>
            
            <td><input name="mobile" type="text" value="<?php echo $data['mobile'];?>"> </td></tr>
            <tr><td><label>Date</label></td>
            
            <td><input name="date" type="date" value="<?php echo $data['date'];?>"></td></tr>
            
            <br>
            <tr><td><label></label></td>
                    <td><input name="edit"  type="submit" class="btn btn-success" value="Save" placeholder="Save Changes"></td></tr>
	</table>
			</div>               
		</div> <!-- /container -->	
		<div>
	</div>
	
	<a class="btn btn-info" href="user data.php">Back</a>
		</form>
		
		<script>
			var g = document.getElementById("defaultGender").innerHTML;
			if(g=="Male") {
				document.getElementById("mySelect").selectedIndex = "0";
			} else {
				document.getElementById("mySelect").selectedIndex = "1";
			}
			
		</script>
	</body>
</html>