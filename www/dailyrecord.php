

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
	<title>Document</title>
	<script>
					setTimeout(function(){

window.location.href = "index.php";},10000);
</script>
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
	height: 500px;
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
.input-daterange input {
  text-align: center;
  background-color: lightgrey;
  margin:auto;
}
h2{
   text-align:center;
   color:brown;
}
body{
   background-color: white;
}
label,input{
   text-align:center;
   color:brown;
   font-family:times new roman;
   padding:auto;
   margin:auto;
   display:inline-block;
   font-size:20px;
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
		

		ul.topnav li a:hover:not(.active) {background-color: #B0C4DE;}

		ul.topnav li a.active {background-color: #00BFFF;} 

		ul.topnav li.right {float: right;} 

		@media screen and (max-width: 6px) { 
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}

		
		.center{
      background-color: white;
      margin: 0 auto;
       width: 495px; 
       border-style: solid; 
       border-color: #f2f2f2;"
    }
	table{
		margin: 0 auto;
        font-color:red;
	}
	p {
  animation: blink 1.5s infinite;
  font-size:20px;
  font-family:cursive;
  color:brown;
  text-align:right;
}

@keyframes blink {
  0% {
    opacity: 0;
  }
  50% {
    opacity: .5;
   
  }
  100% {
  
    opacity: 1;
  }
}
h4{
  font-style:bold;
  color:brown;
}
</style>
</head>
<body>

<br>
	<div class="container text-center">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
	<img src="UcLogo.png" alt="" width="50" height="90">
    </div>
    <div class="col-md-auto">
	<h4><font color="black"><b>Library E-gate Register
System</b></font></h4>
    </div>
    <div class="col col-lg-2">
	<img src="uclogo2.png" alt="" width="110" height="110">
    </div>
  </div>
</div> 
		<ul class="topnav">
    
			<li><a href="user data.php">Student Records</a></li>
			<li><a href="registration3.php">Registration</a></li>
			<li><a class="active" href="index.php">Read Tag ID</a></li>
			<li><a href="dailyrecord.php">Daily Record</a></li>
			<li><a href="index2qrcode.php">Scan Qr Code</a></li>
		</ul>
  
<br>
<br>

<div class="container">
		<div class="row">
		<div id="wrapper">
    <div class="scrollbar" id="style-default">
      <div class="force-overflow">
			<div class="col-md-12 mt-5">
				<div class="card">
					<div class="card-header">

						<h4 align="center" color="brown"><b>Daily records</b>
           
						<a href="downloaddailyrecords.php" class="btn btn-info float-right">Download Daily Records</a>
						

						</h4></div>
            <div class="cardbody">

	<table class="table table-striped table-bordered" style="background-color:#669999">
  <thead>   <tr>
							<td>S-No</td>
                            <td>ID</td>
                            <td>STUDENT ID</td>
							<td>APPLICATION NO</td>
							<td>NAME</td>
							<td>DEPARTMENT</td>
							<td>GRADUATION</td>
							<td>GENDER</td>
                            <td>TIME IN</td>
                            <td>TIME OUT</td>
                            <td>LOGDATE</td>
                            <td>STATUS</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $dbname="rfid2";
                    
                        $conn = new mysqli($server,$username,$password,$dbname);
						$date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
						$q="SELECT * FROM attendance WHERE logdate=CURDATE()";
                        $result=mysqli_query($conn,$q);
                        $numrows=mysqli_num_rows($result);
						echo"<p>   Today's Total Entries   $numrows</p>";
						$sql ="SELECT * FROM attendance WHERE DATE(LOGDATE)=CURDATE() ORDER BY id DESC";
						$query = $conn->query($sql);
						   
						   while ($row = $query->fetch_assoc()){
                        ?>
                                 <tr>
							 <td><?php echo $numrows;?></td>
                                 <td><?php echo $row['ID'];?></td>
                                <td><?php echo $row['STUDENTID'];?></td>
								<td><?php echo $row['appno'];?></td>
								<td><?php echo $row['NAME'];?></td>
								<td><?php echo $row['DEPARTMENT'];?></td>
								<td><?php echo $row['graduation'];?></td>
								<td><?php echo $row['gender'];?></td>
								
                                <td><?php echo $row['TIMEIN'];?></td>
                                <td><?php echo $row['TIMEOUT'];?></td>
                                <td><?php echo $row['LOGDATE'];?></td>
                                <td><?php echo $row['STATUS'];?></td>
                            </tr>
						   <?php
						 $numrows--;
                        }
                        ?>
                    </tbody>
                  </table>
                                  
						</div>
					</div>
				</div>
					.</div>
      
	  </div>
	  
		  </div>

			</div>
      
</div>

	</div>

                  
    
    
	</div>

					</div>
</body>
</html>