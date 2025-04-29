<?php
include_once("inc/db_connect.php");
$query = "SELECT * FROM tbl_data ORDER BY date DESC";
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
	$start=$_POST["fromDate"];
	$end=$_POST["toDate"];
//   $orderQuery = "
// 	SELECT * FROM tbl_data
// 	WHERE date >= '".$_POST["fromDate"]."' AND date <= '".$_POST["toDate"]."' ORDER BY date DESC";
	$orderQuery = "
	SELECT * FROM tbl_data
	WHERE date >= '$start' AND date <= '$end' ORDER BY date DESC";
  $orderResult = mysqli_query($conn, $orderQuery) or die("database error:". mysqli_error($conn));
  $filterOrders = array();
  while( $order = mysqli_fetch_assoc($orderResult) ) {
	$filterOrders[] = $order;
  }
  if(count($filterOrders)) {
	  $fileName = "uc_college_library_".date('Ymd') . ".csv";
	  header("Content-Description: File Transfer");
	  header("Content-Disposition: attachment; filename=$fileName");
	  header("Content-Type: application/csv;");
	  $file = fopen('php://output', 'w');
	  $header = array("Name", "Id", "App No","Gender", "Department", "Graduation","Mobile", "Date");
	  fputcsv($file, $header);  
	  foreach($filterOrders as $order) {
	   $orderData = array();
	   $orderData[] = $order["name"];
	   $orderData[] = $order["id"];
	   $orderData[] = $order["appno"];
	   $orderData[] = $order["gender"];
	   $orderData[] = $order["department"];
	   $orderData[] = $order["graduation"];
	   $orderData[] = $order["mobile"];
	   $orderData[] = $order["date"];
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