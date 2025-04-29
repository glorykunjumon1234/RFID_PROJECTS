<!DOCTYPE html>
<html>
   <head>
      <title>HTML Meta Tag</title>
      <meta http-equiv = "refresh" content = "6; url = return.php" />
   </head>
   <style>
	div{
		background-color:red;
		margin-top:23%;
		float:center;
		margin-left:10%;
		height:1200px;
		text-align:center;
		font-size:50px;
	}
   </style>
   <body>
      
   </body>
</html>
<?php
    require 'config.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
	$sql ="SELECT * FROM issue WHERE id='$id'";
	$query = $conn->query($sql);
   	$row= $query->fetch_assoc();
	$bookid=$row['bookid'];
	$date2=date_create(date('Y/m/d'));
	$date1=date_create($row["returndate"]);
	if($date1<$date2)
	{
	$diff=date_diff($date1,$date2);
 	$day=$diff->format("%a");
   
	// echo"$day";	
	$fine=5*$day;
	echo"<br>";
	// echo"$fine";	
	//echo "<script type='text/javascript'>alert(You Have Fine of Rs.'$fine');</script>";
	$message="you have fine of".$fine."Rs";
		echo"<div>$message </div>";
	// header("Location: return.php?message=$message");
	
	
}


	else{
		echo '<script>alert("  Book Returned On Time")</script>';
	}
	$ret='<p style="background-color:green;color:white"> RETURNED <p>';
	$sql="UPDATE issue SET Status='$ret' WHERE bookid='$id'";
	mysqli_query($conn,"UPDATE issue SET Status='$ret' WHERE id='$id'");
	mysqli_query($conn,"UPDATE book SET quantity=quantity+1 WHERE id='$bookid'");
		// header("Location: return.php");
	
	?>