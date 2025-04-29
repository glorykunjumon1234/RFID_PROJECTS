<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>
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
	
	$msg = null;
	if (null==$data['name']) {
		$msg = "The ID of your Card / KeyChain is not registered !!!";
		$data['id']=$id;
		
	} else {
		$msg = null;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
	<title>Document</title>
	<style>
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
			color: black;
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
  color:red;
  text-align:center;
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
</style>
</head>
<body>
<br><br>
<h2 align="center" margin-top="50px"><font color="black">UC College Attendance Management System
</font></h2> 
		<ul class="topnav">
			<li><a href="index.php">Library</a></li>
			<li><a href="user data.php">Student Records</a></li>
			<li><a class="active" href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read RFID Tag</a></li>
            <li><a href="dailyrecord.php">Daily Record</a></li>
		</ul>
  
<br>
<br>
<input name="rfidno" type ="text" class="textfield" id="fname" value='<?php echo $data['id'];?>'>
<h2 font-color="red" align="center">DAILY RECORDS</h2> 
	<div class = "container">

	<table class="table table-striped table-bordered" style="background-color:#669999">
                    <thead>
                    <tr bgcolor="#0066cc#00BFFF" color="#FFFFFF">
                            <td>ID</td>
                            <td>STUDENT ID</td>
							<td>NAME</TD>
                            <td>TIMEIN</td>
							<td>DATE</TD>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        session_start();
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $dbname="qrcodeb";
                    
                        $conn = new mysqli($server,$username,$password,$dbname);
                       

                        
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
                        $q="SELECT * FROM table_attendance WHERE logdate=CURDATE()";
                        $result=mysqli_query($conn,$q);
                        $numrows=mysqli_num_rows($result);
                       echo $_SESSION['userid'];
                        echo"<p>   Today's Total Entries   $numrows</p>";
                          //  $sql ="SELECT ID,STUDENTID,TIMEIN,NAME,LOGDATE FROM table_attendance WHERE logdate=CURDATE() ORDER BY id DESC";
                           $sql ="SELECT STUDENTID,TIMEIN,NAME,LOGDATE FROM table_attendance WHERE logdate=CURDATE() ORDER BY id DESC LIMIT 8";
                           $query = $conn->query($sql);


                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                                <!-- <td><?php echo $row['ID'];?></td> -->
                                <td><?php echo$numrows;?></td>
                                <td><?php echo $row['STUDENTID'];?></td>
								                <td><?php echo $row['NAME'];?></td>
                                <td><?php echo $row['TIMEIN'];?></td>
							                  <td><?php echo $row['LOGDATE'];?></td>
                            </tr>
                        <?php
                       $numrows--;
                      }
                        ?>
                    </tbody>
                  </table>

                  <div><h3 align="center"><font color="black"><a href="downloaddailyrecords.php">Click here to download daily records</h3>
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
					xmlhttp.open("GET","dailyrecordscheck.php?id="+str,true);
					
					xmlhttp.send();
				}
			}
			//auto refresh of page



			var blink = document.getElementById('blink');
			setInterval(function() {
				blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
			}, 750); 
		</script>
</body>
</html>