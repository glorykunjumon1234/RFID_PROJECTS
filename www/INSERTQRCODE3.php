<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";    
	$dbname="rfid2";


    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['studentID'])){
        
        $studentID =$_POST['studentID'];
		date_default_timezone_set("Asia/Calcutta");
		$date = date('Y-m-d');
		$time = date('H:i:s A');

		$sql = "SELECT * FROM tbl_data WHERE id = '$studentID'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find QRCode number '.$studentID.'PLEASE Register';
		}else{
				$row = $query->fetch_assoc();
				$id = $row['id'];
				$dept=$row['department'];
				$name=$row['name'];
				$_SESSION['userid']=$id;
				$sql ="SELECT * FROM `attendance2` WHERE STUDENTID='$id' AND LOGDATE='$date' AND STATUS='0'";
				$query=$conn->query($sql);
				if($query->num_rows>0){
				$sql = "UPDATE `attendance2` SET TIMEOUT='$time', STATUS='1' WHERE STUDENTID='$studentID' AND LOGDATE='$date'";
				$query=$conn->query($sql);
				$_SESSION['success'] = 'THANKS YOU: '.$row['name'].'  HAVE A NICE DAY';
				
				
				echo"<p>   Thank you   $name</p>";
			}else{
					// $sql = "INSERT INTO table_attendance(STUDENTID,TIMEIN,NAME,LOGDATE) VALUES('$text',NOW(),'$name',CURDATE())";
					$sql = "INSERT INTO `attendance2`(STUDENTID,TIMEIN,LOGDATE,STATUS,name,department) VALUES('$studentID','$time','$date','0','$name','$dept')";
					if($conn->query($sql) ===TRUE){
						
					 $_SESSION['success'] = 'WELCOME: '.$row['name'];
					 
					 echo"<p>   Welcome   $name</p>";
					 
			 }else{
			  $_SESSION['error'] = $conn->error;
		   }	
		}
	}

	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';
}
header("location: index2qrcode.php");
	   
$conn->close();
?>