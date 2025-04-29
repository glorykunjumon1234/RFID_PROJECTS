
<?php
   	  $server = "localhost";
	  $username="root";
	  $password="";    
	  $dbname="rfid2";
	  $conn = new mysqli($server,$username,$password,$dbname);
	  if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['studentID'])){
        
		$text =$_POST['studentID'];
		date_default_timezone_set("Asia/Calcutta");
		$date = date('Y-m-d');
		$time = date('H:i:s');

		$sql = "SELECT * FROM tbl_data WHERE id = '$text'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error']= 'The ID of your Card '.$text.' is not registered !!! PLEASE Register';
		}else{
				$data = $query->fetch_assoc();
				$name=$data['name'];
				$dept=$data['department'];
				$gender=$data['gender'];
				$appno=$data['appno'];
				$graduation=$data['graduation'];
				$id = $data['id'];
				
				$sql ="SELECT * FROM attendance WHERE studentid='$text' AND logdate='$date' AND STATUS='1'";
				$query=$conn->query($sql);
				if($query->num_rows>0){
					$sql = "UPDATE attendance SET timeout='$time', STATUS='0' WHERE studentid='$text' AND logdate='$date'";
				$query=$conn->query($sql);

				$_SESSION['success']= 'THANKS YOU: '.$name.'  HAVE A NICE DAY';
				
				
				echo"<p>   Thank you   $name</p>";
			}else{
					// $sql = "INSERT INTO table_attendance(STUDENTID,TIMEIN,NAME,LOGDATE) VALUES('$text',NOW(),'$name',CURDATE())";
					
					$sql = "INSERT INTO attendance(studentid,timein,logdate,status,name,department,appno,gender,graduation) VALUES('$text','$time','$date','1','$name','$dept','$appno','$gender','$graduation')";
               
					if($conn->query($sql) ===TRUE){
						
						$_SESSION['success']= 'WELCOME: '.$data['name'];
					 
					 echo"<p>   Welcome   $name</p>";
					 
			 }else{
			  $_SESSION['error'] = $conn->error;
		   }	
		}
	}

	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';

		
}
// header("Location: index.php?id=".$msg);
// ob_end_flush();

?>
