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

$query = "SELECT * FROM attendance ORDER BY logdate DESC";
$results = mysqli_query($conn, $query) or die("database error:". mysqli_error($conn));
$allOrders = array();
while( $order = mysqli_fetch_assoc($results) ) {
	$allOrders[] = $order;
}
$startDateMessage = '';
$endDate = '';
$noResult ='';
if(isset($_POST["export"])){
 if(empty($_POST["fromDate"])){
  $startDateMessage = '<label class="text-danger">Select start date.</label>';
 }else if(empty($_POST["toDate"])){
  $endDate = '<label class="text-danger">Select end date.</label>';
 } else {  
  $orderQuery = "
	SELECT * FROM attendance
	WHERE logdate >= '".$_POST["fromDate"]."' AND logdate <= '".$_POST["toDate"]."' ORDER BY logdate DESC";
  $orderResult = mysqli_query($conn, $orderQuery) or die("database error:". mysqli_error($conn));
  $filterOrders = array();
  while( $order = mysqli_fetch_assoc($orderResult) ) {
	$filterOrders[] = $order;
  }
  if(count($filterOrders)) {
	  $fileName = "uc_college_library_dailyrecord".date('Ymd') . ".csv";
	  header("Content-Description: File Transfer");
	  header("Content-Disposition: attachment; filename=$fileName");
	  header("Content-Type: application/csv;");
	  $file = fopen('php://output', 'w');
	  $header = array("ID", "STUDENTID", "NAME","DEPARTMENT","APP NO","GENDER","GRADUATION","TIMEIN", "TIMEOUT", "LOGDATE","STATUS");
	  fputcsv($file, $header);  
	  foreach($filterOrders as $order) {
	   $orderData = array();
	   $orderData[] = $order["ID"];
	   $orderData[] = $order["STUDENTID"];
	   $orderData[] = $order["NAME"];
	   $orderData[] = $order["DEPARTMENT"];
	   $orderData[] = $order["appno"];
	   $orderData[] = $order["gender"];
	   $orderData[] = $order["graduation"];
	   $orderData[] = $order["TIMEIN"];
	   $orderData[] = $order["TIMEOUT"];
	   $orderData[] = $order["LOGDATE"];
	   $orderData[] = $order["STATUS"];
	   fputcsv($file, $orderData);
	  }
	  fclose($file);
	  exit;
  } else {
	 $noResult = '<label class="text-danger">There are no record exist with this date range to export. Please choose different date range.</label>';  
  }
 }
}
?>