

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>

</head>
<body>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 <div class="h"> <a href="add.php">Add Books</a> </div> 
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________search bar________________________-->

	<div class="srch">
	<!-- <form class="navbar-form" method="post" action="return2.php" name="form1"> -->
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
		
	</div>

	<h2>List Of Books</h2>
	<?php
 $server = "localhost";
 $username="root";
 $password="";
 $dbname="rfid2";

 $conn = new mysqli($server,$username,$password,$dbname);
 if(isset($_POST['submit']))
	{
			$id=$_POST['search'];
 			$sql ="SELECT * FROM issue WHERE bookid='$id'";
			 $query = $conn->query($sql);
			 $count=mysqli_num_rows($query);
				$i=0;
				if($count==0)
				{
					 $row['bookname']="-------";
					 $row['bookid']="------";
					 $row['studentname']="------";
					 $row['studentid']="------";
					 $row['returndate'] ="------";
					 $row['issuedate']="------";
					 $row['Status'] ="------";
					 		echo "Sorry! No book found. Try searching again.";
				}
				else
				{
					echo "<table class='table table-bordered table-hover' >";
					echo "<tr style='background-color: #6db6b9e6;'>";
					//Table header
					echo "<th>"; echo "Book-Name";  echo "</th>";
					echo "<th>"; echo "Book-ID";	echo "</th>";
					echo "<th>"; echo "Student Name";  echo "</th>";
					echo "<th>"; echo "Student-ID";  echo "</th>";
					echo "<th>"; echo "Return Date";  echo "</th>";
					echo "<th>"; echo "Issue Date";  echo "</th>";
					echo "<th>"; echo "Status";  echo "</th>";
					echo "</tr>";	
					while ($row = $query->fetch_assoc() && $i<=$count)
			
			// foreach($data)
			{
				echo "<tr>";
				echo '<tr>';
				echo '<td>'. $row['bookname'] . '</td>';
				echo '<td>'. $row['bookid'] . '</td>';
				echo '<td>'. $row['studentname'] . '</td>';
				echo '<td>'. $row['studentid'] . '</td>';
				echo '<td>'. $row['returndate'] . '</td>';
				echo '<td>'. $row['issuedate'] . '</td>';
				echo '<td>'. $row['Status'] . '</td>';

				echo "</tr>";
				$i++;
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		

		
		?>
</div>
</body>
</html>