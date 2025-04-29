<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rfid2";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
	//print_r($conn);
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$sql="SELECT * FROM `issue` WHERE id=(SELECT MAX(id) FROM `issue`)";
$query= $conn->query($sql);
$data =  mysqli_fetch_assoc($query);
$id=$data['id'];
	
	$startDateMessage = '';
	$endDate = '';
	$noResult ='';
	if(isset($_POST["issue"]))
	{
	 if(empty($_POST["returnDate"])){
	  $startDateMessage = '<label class="text-danger">Select issue date.</label>';
	 }else if(empty($_POST["issuedate"])){
	  $endDate = '<label class="text-danger">Select return date.</label>';
	 }
	 $issuedate=$_POST["issueDate"];
	 $date1=date_create("$issuedate");
	 $date2issue=date_format($date1,"y/m/d");
	 $returndate=$_POST["returnDate"];
	 $date1r=date_create("$returndate");
	 $date2return=date_format($date1r,"y/m/d");

	 $sqlupdate="UPDATE issue SET issuedate='$date2issue',returndate='$date2return' WHERE id='$id'";
$result=$conn->query($sqlupdate);
if($result)	
{
	echo"bookissued";
	header("Location: readbooktag.php");
}
else{
	echo"book not issued"; 
}
}


?>