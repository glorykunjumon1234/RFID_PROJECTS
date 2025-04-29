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
	$sql1 = "SELECT * FROM attendance where id = ?";
	$q1 = $pdo->prepare($sql1);
	$q1->execute(array($id));
	$row = $q1->fetch(PDO::FETCH_ASSOC);
	$count1=$q1->rowcount();
	Database::disconnect();
	
	$msg = null;
	$count=$q->rowcount();
	// if($count<1)
	if($count<1)
	
	{
		$oper=0;
		$msg = 'The ID of your Card '.$id.' is not registered !!! PLEASE Register!!!';
		date_default_timezone_set("Asia/Calcutta");
		$date = date('Y-m-d');
		$name="visitor";
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql1 = "SELECT * FROM visiter where id = ?";
		$q1 = $pdo->prepare($sql1);
		$q1->execute(array($id));
		$count1=$q1->rowcount();
		if($count1<1)
		{
		$sql = "INSERT INTO visiter (name,date,id) values(?,?,?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$date,$id));
		}
		$q="SELECT * FROM visiter WHERE date=CURDATE()";
		$res = $pdo->query($q);
		$i = $res->rowcount();
		if ($count1<1)
		{                
		$data['id']=$id;
		$data['name']=" Visitor !!! ".$i;
		$data['gender']="--------";
		$data['department']="--------";
		$data['mobile']="--------";
		$data['appno']="-----------";
		$data['graduation']="-----------------";
		$data['pic']=null;
		}
		else
		{
		$oper=0;

		$msg = 'The ID of your Card '.$id.' is not registered !!! PLEASE Register!!!';
		$data['id']=$id;
		$data['name']=$row['NAME'];
		$data['gender']="--------";
		$data['department']="--------";
		$data['mobile']="--------";
		$data['appno']="-----------";
		$data['graduation']="-----------------";
		$data['pic']=null;

		}
	
	} 
	else {
		$msg = null;
	}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="refresh" content="2;url=index.php">

		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
</head>
<style>
	p{
		margin-left:20px;
	}
	#blink{
  animation: blink 3s infinite;
  font-size:20px;
  color:white;
  
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
{
	background-image: linear-gradient(to left, rgba(241, 74, 0, 0.336), rgba(255, 255, 255, 0.1));

}
body{
	background-color:black; }
	</style>
 
	<body>	
	
	<div class="container text-center  rowdesign" width="1000" height="10000" style="margin-top:115px;">
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
					<br>	
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
			echo"<p>   </p>";
		}
		?>
						
					  
		
	
		<div class="col-md-8 my-3">
		<!-- code for time in time out -->


		<?php
	 // session_start();
	 $msg1 = null;
    $server = "localhost";
	
    $username="root";
    $password="";
    $dbname="rfid2";
	
	
    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

	$name=$data['name'];
	$dept=$data['department'];
	$gender=$data['gender'];
	$appno=$data['appno'];
	$graduation=$data['graduation'];
	$pic=$data['pic'];
	
	if($pic=="uploads/"||$pic==null)
					{
						$pic="uploads/user.jpg";
						
					}
	//  echo "   your id  :  ".$id ;
       if(isset($id)){
           
            $text=$id;
            date_default_timezone_set("Asia/Calcutta");
               $t=date("h:i:sa");
            $date = date('Y-m-d');
            $time = date('H:i:sa');
             $sql ="SELECT * FROM attendance WHERE studentid='$text' AND logdate='$date' AND STATUS='1'";
            $query=$conn->query($sql);
			$row = $query->fetch_assoc();
			if($query->num_rows>0)
			{
				
				$nameattendance=$row['NAME'];
				// $sql1="UPDATE attendance SET name='$name'WHERE studentid='$text' AND logdate='$date'";;
				// $query1=$conn->query($sql1);
				$sql = "UPDATE attendance SET timeout='$t', STATUS='0' WHERE studentid='$text' AND logdate='$date'";
			$query=$conn->query($sql);
				
			echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=110 width=120 src='".$pic."'>
 				</div>";
			echo"</center><p  id='blink'>   Thank you :  $nameattendance   Have a nice day</p></center>";
		}else{
                // $sql = "INSERT INTO attendance(studentid,timein,logdate,status) VALUES('$text','$time','$date','0')";
                $sql = "INSERT INTO attendance(studentid,timein,logdate,status,name,department,appno,gender,graduation) VALUES('$text','$t','$date','1','$name','$dept','$appno','$gender','$graduation')";
                if($conn->query($sql) ===TRUE){
					echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=110 width=120 src='".$pic."'>
 				</div>";
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
<!-- http://localhost:8081/colorchange/timeout2.php?id=A1C29E1B -->
<!-- http://localhost:8081/Mylibrary/www/timeout2.php?id=A1C29E1B -->
<!-- http://localhost:8081/Mylibrary/www/timeout2.php?id=DD8C286C -->