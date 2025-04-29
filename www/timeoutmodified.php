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
		$oper=0;
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
			font-size:60px;
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
		<div class="container">
		<div class="row">
			<div class="col-md-4 my-3" ">
			<form>
				<table  width="452" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
					<tr>
						<td  height="40" align="center"  bgcolor="#10a0c5"><font  color="#FFFFFF">
						<b>User Data</b></font></td>
					</tr>
					<tr>
						<td bgcolor="#f9f9f9">
							<table align="left" width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
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
				// $dept=$data['department'];
				// $name=$data['name'];
				?>
				<!-- <h1 id="link"><?php echo "Welcome  ".$data['name'];?></h1><br> -->
			
			
				

			</form>
			<?php
					if(isset($_SESSION['error'])){
					  echo "
						<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
			
			 echo "<div id='link' class='alert alert-success alert-dismissible' style='background:ghostwhite;color:brown;font-family:cursive;font-size:20px;'>
						 					
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
				  ?>
		</div>
		<p style="color:red;"><?php echo $msg;?></p>
		<div class="col-md-8 my-3">
		
		
		<?php
		
		session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="rfid2";
	// $_SESSION['userid']=$id;
	// $_SESSION['DEPT']=$dept;
	// $_SESSION['NAME']=$name;
	
    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }
	
	//  echo "   your id  :  ".$id ;
   

    if(isset($id)){
           
            $text=$id;
            date_default_timezone_set("Asia/Calcutta");
               $t=date("h:i:sa");
            $date = date('Y-m-d');
            $time = date('H:i:s');

			// $studentID =$_POST['studentID'];
			// $date = date('Y-m-d');
			// $time = date('H:i:s A');
			$sql = "SELECT * FROM tbl_data WHERE id = '$text'";
		$query = $conn->query($sql);
        
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find RFID number '.$text.'Please Register';
		}else{
				$row = $query->fetch_assoc();
				$id = $row['id'];
				$dept=$row['department'];
				$name=$row['name'];
				$sql ="SELECT * FROM `attendence2rfid` WHERE cardid='$id' AND logdate='$date' AND status='0'";
				$query=$conn->query($sql);
				if($query->num_rows>0){
				$sql = "UPDATE `attendence2rfid` SET timeout ='$time', STATUS='1' WHERE cardid='$text' AND logdate='$date'";
				$query=$conn->query($sql);
				
				$_SESSION['success'] = 'THANKS YOU: '.$row['name'].'  HAVE A NICE DAY';
			}else{
				// $sql = "INSERT INTO table_attendance(STUDENTID,TIMEIN,NAME,LOGDATE) VALUES('$text',NOW(),'$name',CURDATE())";
				$sql = "INSERT INTO `attendence2rfid`(name,department,cardid,timein,logdate,status) VALUES('$name','$dept','$text','$time','$date','0')";
				if($conn->query($sql) ===TRUE){
					
				 $_SESSION['success'] = 'WELCOME: '.$row['name'];
		 }else{
		  $_SESSION['error'] = $conn->error;
	   }	
	}
}

}else{
	$_SESSION['error'] = 'Please scan your rfid number';
}
       
           
        $conn->close();
    ?>
			 <table class="table table-bordered">
                    <thead>
                        <tr>
							<td>S-No</td>
                            <td>ID</td>
                            <td>STUDENT ID</td>
							<td>NAME</TD>
							<TD>DEPARTMENT</TD>
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
						$q="SELECT * FROM `attendence2rfid` WHERE logdate=CURDATE()";
                        $result=mysqli_query($conn,$q);
                        $numrows=mysqli_num_rows($result);
						echo"<p id='link'>   Today's Total Entries   $numrows</p>";
						$sql ="SELECT * FROM `attendence2rfid` WHERE DATE(LOGDATE)=CURDATE() ORDER BY sno DESC LIMIT 8";
						$query = $conn->query($sql);
						   
						   while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
							 <td><?php echo $numrows;?></td>
                                 <td><?php echo $row['sno'];?></td>
                                <td><?php echo $row['cardid'];?></td>
								<td><?php echo $row['name'];?></td>
								<td><?php echo $row['department'];?></td>
                                <td><?php echo $row['timein'];?></td>
                                <td><?php echo $row['timeout'];?></td>
                                <td><?php echo $row['logdate'];?></td>
                                <td><?php echo $row['status'];?></td>
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
    </body>
</html>