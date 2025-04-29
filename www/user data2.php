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
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 


		<style>
			header
{
	font-family: 'Lobster', cursive;
	text-align: center;
	font-size: 25px;	
}

#info
{
	font-size: 18px;
	color: #555;
	text-align: center;
	margin-bottom: 25px;
}

a{
	color: #074E8C;
}

.scrollbar
{
	margin-left: 20px;
	float: left;
	height: 300px;
	width: 1100px;
	background: #F5F5F5;
	overflow-y: scroll;
	margin-bottom: 25px;

}

.force-overflow
{
	min-height: 450px;
}

#wrapper
{
	text-align: center;
	width: 200%;
	margin: auto;
}
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}
         body { 
			 background-color: WHITE;
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

		ul.topnav li a:hover:not(.active) {background-color: grey;}

		ul.topnav li a.active {background-color: #00BFFF;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		.table {
			margin: auto;
			width: 100%; 
		}
		
		thead {
			color: #FFFFFF;
		}
		.link{
			margin-top:10px;
			align:left;
			
		}
		</style>
		
		<title>UC College Attendance Management System</title>
	</head>
	
	<body><br>
	<br>
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
			<li><a href="index.php">Library</a></li>
			<li><a class="active" href="user data.php">Student Records</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>
			<li><a href="dailyrecord.php">Daily Record</a></li>
			<li><a href="index2qrcode.php">Scan Qr Code</a></li>
		</ul>
		<br>
		<div class="container">
		<tr><td><label>Department</label></td>
					
					
			
			<td>	<select name="department">
						<option value="CME">CME</option>
						<option value="Economics">Economics</option>
						<option value="Physics">Physics</option>
						<option value="Computer Science">Computer Science</option>
						<option value="Maths">Maths</option>
						<option value="History">History</option>
						<option value="Malayalam">Malayalam</option>
					</select></td>
					<input name="submit"  value="submit" class="btn btn-info">
					<span class="glyphicon glyphicon-search"></span>
				</button>
				</tr>

            <div class="row">
                <h3 style="margin-left:40%"><b><font color="brown">STUDENTS RECORD</font></b></h3>
				<a class ="btn btn-info" style="margin-left:78%" href="download.php">Download Student Records</a>
		            </div><br>
            <div class="row">
			<div id="wrapper">
    <div class="scrollbar" id="style-default">
      <div class="force-overflow">
                <table class="table table-striped table-bordered" style="background-color:#669999">
                  <thead>
                    <tr bgcolor="#0066cc#00BFFF" color="#FFFFFF">
                      <th>Name</th>
                      <th>ID</th>
					  <th>Gender</th>
					  <th>Department</th>
					  <th>Graduation</th>
                      <th>Mobile Number</th>
					  <th>Entered Date</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM tbl_data ORDER BY name ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['gender'] . '</td>';
							echo '<td>'. $row['department'] . '</td>';
							echo '<td>'. $row['graduation'] . '</td>';
							echo '<td>'. $row['mobile'] . '</td>';
							echo '<td>'. $row['date'] . '</td>';
							echo '<td><a class="btn btn-success" href="user data edit page.php?id='.$row['id'].'">Edit</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="user data delete page.php?id='.$row['id'].'">Delete</a>';
							echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
				</div>
    </div></div>
    
	<!-- table container row		--></div> 
		</div> <!-- /container -->
	</body>
</html>