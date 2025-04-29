<?php
include 'connection.php';
  if (isset($_POST['edit']))
  {
	  $rfid=$_POST['rfid'];
	  $name=$_POST['name'];
	  $appno=$_POST['appno'];
	  $gender=$_POST['gender'];
	  $department=$_POST['department'];
	  $graduation=$_POST['graduation'];
	  $mobile=$_POST['mobile'];
	  $date=$_POST['date'];
	  $image=$_FILES['file'];
	  $filename = $image['name'];
	  
  $tempname = $_FILES['file']['tmp_name'];
  $folder = "uploads/" . $filename;
  if (move_uploaded_file($tempname, $folder)) {
	  echo "<h3> Image uploaded successfully!</h3>";
  } else {
	  echo "<h3> Failed to upload image!</h3>";
  }
	  
	 //$sql= "UPDATE `register` SET `name`='$name',`email`='$email',`phone`='$mobile',`age`='$age' WHERE id=$id";
	 $sql= "UPDATE tbl_data22 SET rfid='$rfid', name = '$name',appno = '$appno', gender='$gender', department='$department',graduation='$graduation',mobile='$mobile', date='$date', pic='$folder' WHERE appno='$appno'";
	 
	  if($pdo->query($sql))
	  {
	  //    echo "data updated";
	//   Database::disconnect();

                        echo'<script>
                        window.location="registration3.php"</script>';
			   
	  }
	  else
	  {
		  echo "eror";
	  }
  }
?>