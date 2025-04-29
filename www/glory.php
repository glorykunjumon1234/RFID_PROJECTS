<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
	header("Refresh:20");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
	<!-- custom css link -->
	<!-- <link rel="stylesheet" href="style.css"> -->
	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	
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

		ul.topnav li a:hover:not(.active) {background-color: grey;}

		ul.topnav li a.active {background-color: #00BFFF;}
		
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
		h1 {
  animation: blink 1.5s infinite;
  font-size:21px;
 font-family:Apple chancery,cursive; 
 font-style:oblique;
  color:red;
}

h3 {
  
  font-size:35px;
  font-family:cursive;
 
  text-align:center;
}
		#blink {
  animation: blink 1.5s infinite;
  font-size:20px;
  color:black;
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


#link{
  animation: blink 3s infinite;
  font-size:20px;
  color:black;
  
}
@keyframes link {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
    transform: scale(2);
  }
  51% {
    opacity: 0;
    transform: scale(0);
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}



.rowdesign
{
	background-image:linear-gradient(to left, rgba( 0, 191, 255, 0.336),rgba(255,255,255,.1));
}



		#divvideo{
			 box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
		}
		.abc{
		 margin-left:80%; 
			color:white;
		}
		.abcd{
			
			color:white;

		}
					
			</style>
			

		<title>UNION CHRISTIAN COLLEGE</title>
	</head>
	
	<body>
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
			
			<li><a href="user data.php">Student Records</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a class="active" href="index.php">Read Tag ID</a></li>
			<li><a href="dailyrecord.php">Daily Record</a></li>
			<li><a href="index2qrcode.php">Scan Qr Code</a></li>
		
		<br>
		</ul>
		<br>
		<marquee><h5>Contact Us : gloryk.224466@gmail.com / jibinjosemathew@uccollege.edu.in<br><label style="margin-left:86px;">7907061428 / 9495266482<label></marquee></span><br><br>
			<p id="getUID" hidden></p>
			<div id="show_user_data">
		</div>
			
		<div class="container text-center">
<div class="row row-cols-1 rowdesign">
    <div class="col"> 
		<center>
			<h3></h3>
		<h1 align="center" id="blink"><font color="black">Please Scan Tag to Display ID </font></h1>
		
                  <?php 
                     date_default_timezone_set("asia/CALCUTTA");
                      $time = date("h:i A",strtotime("+0 HOURS"));
                      $date = date("M-d-Y");
					  $day = date("l");
                      ?>
                  <!-- <strong style="font-size: 1.6em;"><?php echo  $day."".$date."  ".$time;?>&nbsp;&nbsp;<font style="color:#ffc107;">|</font>&nbsp;&nbsp; <span style="color: #ff6666;font-size: 1em;" id="tick2" class="timeh1"></strong> -->
				  <strong style="font-size: 18px;"><?php echo  $day."  ".$date."  ".$time;?>&nbsp;&nbsp;<font style="color:black;">!</font>&nbsp;&nbsp; <span style="color: #ff6666;font-size: 1em;" id="tick2" class="timeh1"></strong>
          
				</center>
			
		<BR></p></DIV>
	<div class="row row-cols-2">
                <div class="col-md-4 my-3" style="padding:10px;;border-radius: 5px;" id="divvideo">
					
					<table width="421" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
					<tr>
						<td  height="40" align="center"  bgcolor="#00BFFO"><font  color="#FFFFFF">
							<b>RFID SCAN</b>
							</font>
						</td>
					</tr>
					<tr>
						<td  bgcolor="#f9f9f9">
						<video width="400" height="240" controls autoplay loop muted>
  <source src="RFID.webm" type="video/webm">
 
  Your browser does not support the video tag.
</video>
						</td>
					</tr>
				</table>
				<div id='link' class='alert alert-success alert-dismissible' style='background:ghostwhite;color:brown;font-family:cursive;font-size:20px;'>
						 					
						<h4> Welcome To UC Library</h4>
					  </div>
                </div>
				
                <div class="col-md-8 my-3 abcd">
				
				<div style="border-radius: 5px;padding:10px;" id="divvideo">
                  <table width="452" id="example1"class="table table-striped table-bordered" style="background-color:#669999">
                    <thead>
                        <tr bgcolor="#00BFFF" color="#FFFFFF">
							<td>S-No</td>
                            <td>ID</td>
                            <td>STUDENT ID</td>
							<td>NAME</td>
							<td>DEPARTMENT</td>
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
						$q="SELECT * FROM `attendance` WHERE logdate=CURDATE()";
                        $result=mysqli_query($conn,$q);
                        $numrows=mysqli_num_rows($result);
						echo"<p id='blink'>   Today's Total Entries   $numrows</p>";
						$sql ="SELECT * FROM `attendance` WHERE DATE(LOGDATE)=CURDATE() ORDER BY id DESC limit 6";
						$query = $conn->query($sql);
						   
						   while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
							 <td><?php echo $numrows;?></td>
                                 <td><?php echo $row['ID'];?></td>
                                <td><?php echo $row['STUDENTID'];?></td>
								<td><?php echo $row['NAME'];?></td>
								<td><?php echo $row['DEPARTMENT'];?></td>
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
				
			<script>
			var myVar = setInterval(myTimer, 1000);
			var myVar1 = setInterval(myTimer1, 1000);
			var oldID="";
			clearInterval(myVar1);

			function myTimer() {
				var getID=document.getElementById("getUID").innerHTML;
				oldID=getID;
				if(getID!="") {
					myVar1 = setInterval(myTimer1, 500);
					showUser(getID);
					clearInterval(myVar);
				}
			}
			
			function myTimer1() {
				var getID=document.getElementById("getUID").innerHTML;
				if(oldID!=getID) {
					myVar = setInterval(myTimer, 500);
					clearInterval(myVar1);
				}
			}
			
			function showUser(str) {
				if (str == "") {
					document.getElementById("show_user_data").innerHTML = "";
					return;
				} else {
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("show_user_data").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","timeout2.php?id="+str,true);
					
					xmlhttp.send();
				}
			}
			//auto refresh of page
			
				

			var blink = document.getElementById('blink');
			setInterval(function() {
				blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
			}, 750); 
		</script>
			</div>
	</div>
	</body> 
</html>