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
	$count=$q->rowcount();
	echo"$count";
	if($count<1)
	// if (null==$data['name'])
	{
		$oper=0;
		$msg = "The ID of your Card / KeyChain is not registered !!!";
		$data['id']=$id;
		$data['name']="--------";
		$data['gender']="--------";
		$data['department']="--------";
		$data['mobile']="--------";
	$data['appno']="-----------";
	$data['graduation']="-----------------";
	} else {
		$msg = null;
	}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
	
</head>
<style>
	p{
		margin-left:20px;
	}
	#blink{
  animation: blink 3s infinite;
  font-size:20px;
  color:black;
  
}
@keyframes blink {
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
	</style>
 
	<body>	
	<br>
	<div class="container text-center  rowdesign" width="1000" height="10000">
					<div class="row row row-cols-1 ">
					<div class="col">
					<table  class="rowdesign" width="1000" height="300" align="center" >
					<tr>
						<td  height="40" >
					<center>
						<br><br>
						
					<?php
					 date_default_timezone_set("asia/CALCUTTA");
					 $time = date("h:i A",strtotime("+0 HOURS"));
					 $date = date("M-d-Y");
					 $day = date("l");
					?>
					<strong style="font-size: 18px;"><?php echo  $day."  ".$date."  ".$time;?>&nbsp;&nbsp;<font style="color:black;">!</font>&nbsp;&nbsp; <span style="color: #ff6666;font-size: 1em;" id="tick2" class="timeh1"></strong>
          			<center>
					</p></DIV>
					<br><br><br>	
				<?php date_default_timezone_set("Asia/Calcutta");
				$t=date("h:i:sa");
				$id = $_REQUEST['id'];
				$dept=$data['department'];
				$name=$data['name'];
				?>
				

			</form>
		</div>
		<?php
		if($msg!=null)
		{
			echo "
			<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
			  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  <h4><i class='icon fa fa-warning'></i> Error!</h4>
			  ".$msg."
			</div>
		  ";
		}
		else{
			echo"<p>$msg</p>";
		}
		?>
						
					  
		
	
		<div class="col-md-8 my-3">
		<!-- code for time in time out -->


		<?php
	session_start();
	
	 $msg1 = null;
    $server = "localhost";
	
    $username="root";
    $password="";
    $dbname="rfid2";
	$_SESSION['userid']=$id;
	$_SESSION['DEPT']=$dept;
	$_SESSION['NAME']=$name;
	
	//echo $SESSION['msg2'];
    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }
	$name=$data['name'];
	$dept=$data['department'];
	$gender=$data['gender'];
	$appno=$data['appno'];
	$graduation=$data['graduation'];
	//  echo "   your id  :  ".$id ;
       if(isset($id)){
           
            $text=$id;
            date_default_timezone_set("Asia/Calcutta");
               $t=date("h:i:sa");
            $date = date('Y-m-d');
            $time = date('H:i:s');
             $sql ="SELECT * FROM attendance WHERE studentid='$text' AND logdate='$date' AND STATUS='1'";
            $query=$conn->query($sql);
            if($query->num_rows>0){
                // $sql = "UPDATE attendance SET timeout='$time', STATUS='1' WHERE studentid='$text' AND logdate='$date'";
                $sql = "UPDATE attendance SET timeout='$t', STATUS='0' WHERE studentid='$text' AND logdate='$date'";
                $query=$conn->query($sql);
				 echo"</center><p  id='blink' >   Thank you :  $name   Have a nice day</p></center>";
				}else{
                // $sql = "INSERT INTO attendance(studentid,timein,logdate,status) VALUES('$text','$time','$date','0')";
                $sql = "INSERT INTO attendance(studentid,timein,logdate,status,name,department,appno,gender,graduation) VALUES('$text','$t','$date','1','$name','$dept','$appno','$gender','$graduation')";
                if($conn->query($sql) ===TRUE){
									 echo"<center><p  id='blink' >   Welcome  :  $name</p></center>";
					
				// 	echo "<div id='link' style='background:ghostwhite;color:brown;font-family:cursive;font-size:20px;'>
				// 	<p>Welcome  ".$name." </p>
				//   </div>";
					
                 }else{
					echo"<p>  CONNECTION ERROR</p>";
					$msg1='CONNECTION ERROR';
               }	
            }
              
        }else{
			echo"<p> Please scan your RFID </p>";
			$msg1='Please scan your RFID';
        }
       
           
        $conn->close();
    ?>
	</table>
	</div>
	
			
	</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br>
	
    </body>
</html>