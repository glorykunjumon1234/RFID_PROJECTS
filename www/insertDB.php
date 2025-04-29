<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$id = $_POST['id'];
		$appno=$_POST['appno'];
		$gender = $_POST['gender'];
        $department = $_POST['department'];
		$graduation=$_POST['graduation'];
        $mobile = $_POST['mobile'];
		$date = $_POST['date'];

		
		$image=$_FILES['file'];
		$filename = $image['name'];
		
	$tempname = $_FILES['file']['tmp_name'];
	$folder = "uploads/" . $filename;
    if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}

		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO tbl_data(name,id,appno,gender,department,graduation,mobile,date,pic) values(?,?,?, ?, ?, ?, ?,?,?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$id,$appno,$gender,$department,$graduation,$mobile,$date,$folder));
		if($q)
		{
			//echo"success";
		}
		Database::disconnect();
		echo "<script>
    alert('Data inserted successfully!');
    window.location.href = 'registration.php';
</script>";
exit;
}
else{
	echo"enter all details";
}
?>