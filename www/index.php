
<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="refresh"content="15">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
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
		
		<title>UNION CHRISTIAN COLLEGE</title>
	</head>
	
	<body>
	<br>
	<div class="container text-center">
  <div class="row align-items-center justify-content-center">
    
  

    <!-- Center Text -->
    <div class="col-auto">
      <h3 style="color: white; margin: 0;">E-gate Register System</h3>
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
		
		<!-- <marquee><h5 style="font-size:12px;color:white;">Contact Us : gloryk.224466@gmail.com / jibinjosemathew@uccollege.edu.in<br><label style="margin-left:86px;font-size:18px;color:white;">7907061428 / 9495266482<label></marquee></span><br><br> -->
		
				
		<p id="getUID" hidden></p>
	
				<div id="show_user_data">
		
				<div class="container text-center">
					<div class="row row row-cols-1 rowdesign">
					<div class="col">
					<center> <h3 align="center" id="blink"><font color="white"> Please Scan Your Card</h3>
					<?php
					 date_default_timezone_set("asia/CALCUTTA");
					 $time = date("h:i A",strtotime("+0 HOURS"));
					 $date = date("M-d-Y");
					 $day = date("l");
					?>
					
					<strong style="font-size: 18px;"><?php echo  $day."  ".$date."  ".$time;?>  <font style="color:white;">!</font>&nbsp;&nbsp; <span style="color: #ff6666;font-size: 1em;" id="tick2" class="timeh1"></strong>
          
					<center>
					</p></DIV>
					<div class="row row-cols-2">
                <div class="col-md-4 my-3" style="padding:10px;;border-radius: 5px;" id="divvideo">
				<table width="289" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
					<tr>
						<td  height="40" align="center"  bgcolor="#F14A00"><font  color="#FFFFFF">
							<b>Read RFID</b>
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
						</td>
					</tr>
				</table>
				
				</div>
				<div class="col-md-8  abcd">
				<div style="border-radius: 5px;padding:10px;" id="divvideo">
			      


<table class="table table-bordered text-center" style="margin-left:17px">
  <thead class="text-white" style="background-color: #F14A00;">
                        <tr bgcolor="#F14A00" color="#FFFFFF">
						<td>S-No</td>
                           
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
						$q="SELECT * FROM attendance WHERE logdate=CURDATE()";
                        $result=mysqli_query($conn,$q);
                        $numrows=mysqli_num_rows($result);
						echo"<h4 id='blink'>   Today's Total Entries   $numrows</h4>";
						$sql ="SELECT * FROM attendance WHERE DATE(logdate)=CURDATE() ORDER BY id DESC LIMIT 8";
						$query = $conn->query($sql);
						   
						   while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
							 <td><?php echo $numrows;?></td>
                                 
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