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
		
<!-- <link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css"> -->
		<!-- <link rel="stylesheet" type="text/css" href="style.css">  -->
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
	<style type="text/css">

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
	/* margin-left:px; */
	float: left;
	height: 300px;
	width: 1200px;
	background: #F5F5F5;
	overflow-y: scroll;
	margin-bottom: 25px;

}

.force-overflow
{
	min-height: 600px;
}

#wrapper
{
	/* text-align: center; */
	width: 100%;
	
}
		html {
			/* font-family: Arial;
			display: inline-block; */
			/* margin: 0px auto; */
			/* text-align: center; */
		}
        body {
			 background-color: rgba(2, 20, 29, 0.144);
			 }
	.actionheader{
		width:10%;
	}
		
		.table {
			/* margin: auto; */
			align:left;
			width: 100%; 
		}
		
		
		.link{
			margin-top:10px;
			align:left;
			
		}
		.buttondownload
		{
			color: rgba(255, 153, 0, 0.902);
		}
		.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
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
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.con-font
 {
	height:550px;
	 background-image:linear-gradient(to right, rgba(4, 42, 57, 0.929),rgba(255,255,255,.1)); */
	/* background-color:rgba(4, 42, 57, 0.929);  */
	/* background-color:ghostwhite; */
	
       
	
	width:100%;
 }
 
	.GFG {
       
		border-width: 4px;
		border-style: SOLID;
	   padding: 30px;
     
    }

 
		</style>
		
		<title>UC College Attendance Management System</title>
	</head>
	
	<body><br>
	<p id="getUID" hidden></p>
		<!-- <p id="getUID"></p> -->
			
		<div id="show_user_data">
		<!--_________________sidenav_______________-->
	
		<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                
            </div><br><br>
			<div class="h"><a href="readbooktag.php">Issue Book</a></div>
 <div class="h"> <a href="registrationbook.php">Add Books</a> </div> 
  <div class="h"> <a href="return.php">Book Return</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
  <div class="h"><a href="fine.php">Fine List</a></div>
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
  document.body.style.backgroundColor = " rgba(2, 20, 29, 0.144)";
}
</script>
	<br>
	<div class="container text-center  GFG con-font">
	
		<div class="row my-5">
					<div class="col" ">
	</form>
	<table width="452" border="1" bordercolor="#10a0c5" align="center" style="color:white; " cellpadding="0" cellspacing="1" style="padding: 2px" class="abc">
					<tr>
						<td  height="40" align="center"  bgcolor="#73B1B7"><font  color="#FFFFFF">
							<b>Book Details</b>
							</font>
						</td>
					</tr>
					<tr>
						<td>	<table width="452" height="250" border="0" align="center" cellpadding="5"  cellspacing="0">
								<tr>
									<td width="113" align="left" class="lf">ID</td>
									<td style="font-weight:bold">:</td>
									<td align="left">--------</td>
								</tr>
								<tr >
									<td align="left" class="lf">Name</td>
									<td style="font-weight:bold">:</td>
									<td align="left">--------</td>
								</tr>
								
							</table>
						</td>
					</tr>
				</table>
	</form>
				</div>
				
				<div class="col">
				<table width="400" height="300" style="color:white; " border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px"class="abcd">
				<tr>
						<td  height="40" align="center" bgcolor="#73B1B7"><font  color="#FFFFFF">
							<b>Student Details</b>
							</font>
						</td>
					</tr>
					<tr>
						<td >
							<table width="340"  border="0" align="center" cellpadding="5"  cellspacing="0">
								<tr>
									<td width="113" align="left" class="lf">ID</td>
									<td style="font-weight:bold">:</td>
									<td align="left">--------</td>
								</tr>
								<tr >
									<td align="left" class="lf">Name</td>
									<td style="font-weight:bold">:</td>
									<td align="left">--------</td>
								</tr>
								<tr>
									<td align="left" class="lf">Gender</td>
									<td style="font-weight:bold">:</td>
									<td align="left">--------</td>
								</tr>
								<tr >
									<td align="left" class="lf">Email</td>
									<td style="font-weight:bold">:</td>
									<td align="left">--------</td>
								</tr>
								<tr>
									<td align="left" class="lf">Mobile Number</td>
									<td style="font-weight:bold">:</td>
									<td align="left">--------</td>
								</tr>
							</table>
						</td>
					</tr>
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
					xmlhttp.open("GET","readbooktag4.php?id="+str,true);
					
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