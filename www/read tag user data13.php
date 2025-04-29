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
		$data['name']="--------";
		$data['gender']="--------";
		$data['department']="--------";
		$data['mobile']="--------";
	} else {
		$msg = null;
	}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
		td.lf {
			padding-left: 15px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
		h1{
			font-size:80px;
			color:brown;
			font-family:cursive;

		}
		p {
  animation: blink 1.5s infinite;
  font-size:20px;
  font-family:cursive;
  color:red;
  text-align:center;
}

		#link {
  animation: blink 1.5s infinite;
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
		<div>
			<form>
				<table  width="452" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
					<tr>
						<td  height="40" align="center"  bgcolor="#10a0c5"><font  color="#FFFFFF">
						<b>User Data</b></font></td>
					</tr>
					<tr>
						<td bgcolor="#f9f9f9">
							<table width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
								<tr>
									<td width="113" align="left" class="lf">ID</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $data['id'];?></td>
								</tr>
								<tr bgcolor="#f2f2f2">
									<td align="left" class="lf">Name</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $data['name'];?></td>
								</tr>
								<tr>
									<td align="left" class="lf">Gender</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $data['gender'];?></td>
								</tr>
								<tr bgcolor="#f2f2f2">
									<td align="left" class="lf">Department</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $data['department'];?></td>
								</tr>
								<tr>
									<td align="left" class="lf">Mobile Number</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $data['mobile'];?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table><br><br>
				<?php date_default_timezone_set("Asia/Calcutta");
				$t=date("h:i:sa");
				$id = $_REQUEST['id'];
				?>
				<h1 id="link"><?php echo "Welcome  ".$data['name'];?></h1><br>
			
				<h2><?php echo "   Time_in :  ".$t ;?></h2>
				<!-- <h2><?php echo "   your id  :  ".$id ;?></h2> -->
				<?php
    //session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="qrcodeb";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($id)){
        
       $text =$_REQUEST['id'];
	   date_default_timezone_set("Asia/Calcutta");
	   $t=date("h:i:sa");
	   $name=$data['name'];
        $message = "   Hi   Your attendance has been successfully added. Thank you  ";
		   $sql = "INSERT INTO table_attendance(STUDENTID,TIMEIN,NAME,LOGDATE) VALUES('$text',NOW(),'$name',CURDATE())";
		   if($conn->query($sql) ===TRUE){
			echo"<p>  $message</p>";
		    
			

			}else{
			 $_SESSION['error'] = $conn->error;
		  }
	}
    
	   
	  
    $conn->close();
	header("Refresh:30");
?>
<DIV>
<a href="dailyrecord.php">DAILY ENTRY</a></DIV>
			</form>
		</div>
		<p style="color:red;"><?php echo $msg;?></p>
	</body>
</html>