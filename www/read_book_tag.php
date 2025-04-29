<!-- http://127.0.0.1/LIBRARYFULLMODIFIED/library/read_book_tag.php -->
<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
	// header("Refresh:10");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- <link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css"> -->
		<link href="style1.css" rel="stylesheet">
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
			 background-color: rgba(2, 20, 29, 0.144);
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
  overflow-x: hidden; */
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
		
		td.lf {
			padding-left: 15px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
		.con-font
 {
	height:550px;
	background-color:rgba(1, 10, 14, 0.838);
	/* background-color:ghostwhite; */
	
	width:100%;
 }
		</style>
		
		<title>UNION CHRISTIAN COLLEGE</title>
	</head>
	
	<body>
	<br>
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                
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
<h3><b><font color="brown">UC College Book Management System</h3>
			
<h2 align="center" margin-top="50px"><font color="black">UC College Book Management System
</font></h2>
		
		<h3 align="center" id="blink"><font color="black">Scan your Book </font></h3>
		
		
		
		<div class="container text-center con-font">
		<p id="getUID" hidden></p>
		<!-- <p id="getUID"></p> -->
		
	
		
		<div id="show_user_data">
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