<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="qrcodedb";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['studentID'])){
		
        //$name=$_POST['studentID'];
        $text =$_POST['studentID'];
		date_default_timezone_set("Asia/Calcutta");
	  	 $t=date("h:i:sa");
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$sql = "SELECT * FROM student WHERE id = '$text'";
		$query = $conn->query($sql);
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find QRCode number '.$text;
		}else{
			$row = $query->fetch_assoc();
			$id = $row['id'];
			$_SESSION['userid']=$id;
			$sql ="SELECT * FROM attendance WHERE STUDENTID='$id' AND LOGDATE='$date' AND STATUS='0'";
			$query=$conn->query($sql);
			if($query->num_rows>0){
			$sql = "UPDATE attendance SET TIMEOUT='$time', STATUS='1' WHERE STUDENTID='$text' AND LOGDATE='$date'";
			$query=$conn->query($sql);
			$_SESSION['success'] = 'THANKS YOU: '.$row['name'].'  HAVE A NICE DAY';
		}else{
			$sql = "INSERT INTO attendance(STUDENTID,TIMEIN,LOGDATE,STATUS) VALUES('$text','$time','$date','0')";
					if($conn->query($sql) ===TRUE){
						$dept=$row['department'];
						$name=$row['name'];
						$_SESSION['DEPT']=$dept;
					 $_SESSION['success'] = 'WELCOME: '.$row['name'];
					 $_SESSION['name'] =$row['name'];
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





	