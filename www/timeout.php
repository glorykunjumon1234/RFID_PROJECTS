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
		h2{
			animation: blink 1.5s infinite;
			font-size:20px;
			color:brown;
			font-family:cursive;

		}
		p {
  animation: blink 1.5s infinite;
  font-size:35px;
  font-family:cursive;
  color:brown;
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
			

				</table><br><br>
				<?php date_default_timezone_set("Asia/Calcutta");
				$t=date("h:i:sa");
				$id = $_REQUEST['id'];
				$dept=$data['department'];
				$name=$data['name'];
				?>
				<!-- <h1 id="link"><?php echo "Welcome  ".$data['name'];?></h1><br> -->
				

			</form>
		</div>
		<p style="color:red;"><?php echo $msg;?></p>


		
		<div class="col-md-8 my-3">
		<!-- code for time in time out -->


		<?php
		 //include 'getUID.php';
	 session_start();
	 $msg1 = null;
    $server = "localhost";
	
    $username="root";
    $password="";
    $dbname="rfid2";
	$_SESSION['userid']=$id;
	$_SESSION['DEPT']=$dept;
	$_SESSION['NAME']=$name;
	
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
        
            $sql ="SELECT * FROM attendance WHERE studentid='$text' AND logdate='$date' AND STATUS='0'";
            $query=$conn->query($sql);
            if($query->num_rows>0){
                // $sql = "UPDATE attendance SET timeout='$time', STATUS='1' WHERE studentid='$text' AND logdate='$date'";
                $sql = "UPDATE attendance SET timeout='$t', STATUS='1' WHERE studentid='$text' AND logdate='$date'";
                $query=$conn->query($sql);
				
				 echo"<p>   Thank you :  $name   Have a nice day</p>";
				

            }else{
                // $sql = "INSERT INTO attendance(studentid,timein,logdate,status) VALUES('$text','$time','$date','0')";
                $sql = "INSERT INTO attendance(studentid,timein,logdate,status,name,department,appno,gender,graduation) VALUES('$text','$t','$date','0','$name','$dept','$appno','$gender','$graduation')";
                if($conn->query($sql) ===TRUE){
					
						 echo"<p>   Welcome  :  $name</p>";
					
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
			 <table class="table table-bordered">
                    <thead>
                        <tr>
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
						echo"<h2>   Today's Total Entries   $numrows</h2>";
						$sql ="SELECT * FROM attendance WHERE DATE(logdate)=CURDATE() ORDER BY id DESC LIMIT 8";
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
    </body>
</html>