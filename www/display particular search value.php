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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">

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
	width: 1200px;
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
	.actionheader{
		width:15%;
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
		.buttondownload
		{
			color: rgba(255, 153, 0, 0.902);
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
	<h3><font color="black">Library Book Management System
System </font></h3>
    </div>
    <div class="col col-lg-2">
	<img src="uclogo2.png" alt="" width="110" height="110">
    </div>
  </div>
</div>
	
		<br>
		<div class="container">
		

            <div class="row">
                <h3><b><font color="brown">List Of Issued Books</font></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class ="btn btn-success mx-6"  href="download.php">Download</a></h3>
				
		            </div><br>
            <div class="row">
			<div id="wrapper">
    <div class="scrollbar" id="style-default">
      <div class="force-overflow">
                <table class="table table-striped table-bordered" style="background-color:rgba(255, 153, 0, 0.619)">
                  <thead>
                      <th>Book Name</th>
                      <th>Book ID</th>
					  <th>Student Name</th>
					  <th>Student ID</th>
					  <th>Return Date</th>
                      <th>Issue Date</th>
					  <th>Status</th>
					  <th class="actionheader">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				   $server = "localhost";
				   $username="root";
				   $password="";
				   $dbname="rfid2";
				  
				   $conn = new mysqli($server,$username,$password,$dbname);
				  if(isset($_POST['submit']))
				  {
					$i=0;
					$id=$_POST['search'];
						   $sql ="SELECT * FROM issue WHERE bookid='$id' and Status='Issued'";
						   $query = $conn->query($sql);
						  $row= $query->fetch_assoc();
					  		$id2=$row['bookname'];
							 echo"$id2";
							 $count=mysqli_num_rows($query);
							 
							 echo"$count";
						  $count2=$count+1;
                                   
                  
				while($count) {
                            echo '<tr>';
                            echo '<td>'. $row['bookname'] . '</td>';
                            echo '<td>'. $row['bookid'] . '</td>';
                            echo '<td>'. $row['studentname'] . '</td>';
							echo '<td>'. $row['studentid'] . '</td>';
							echo '<td>'. $row['returndate'] . '</td>';
							echo '<td>'. $row['issuedate'] . '</td>';
							echo '<td>'. $row['Status'] . '</td>';
							echo '<td><a class="btn btn-success" href="return2.php?id='.$row['id'].'">Return</a>';
						
							echo '</td>';
                            echo '</tr>';
							$count--;
							if($count==0)break;
                   }
				}
                  ?>
                  </tbody>
				</table>
				</div>
    </div></div>
    
	<!-- table container row		--></div> 
		</div> <!-- /container -->
	</body>
</html>