<?php
include('exportdailyrecord.php');
include('inc/header.php');
?>
<title>Export Data to CSV</title> 
<link href="css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
 <script src="js/datepickers.js"></script>
<style>
.input-daterange input {
  text-align: center;
  background-color: lightgrey;
  margin:auto;
}
h2{
   text-align:center;
   color:brown;
}
body{
   background-color: white;
}
label,input{
   text-align:center;
   color:brown;
   font-family:times new roman;
   padding:auto;
   margin:auto;
   display:inline-block;
   font-size:20px;
}
ul.topnav {
			list-style-type: none;
			margin: auto;
			padding:0;
			overflow: hidden;
			background-color: #00BFFF;
			width:100%;
			
		}
		/* .button{
    		color:white;
    		background-color: blue;
    		padding: 6px 10px;
    		font-size: 18px;
    			} */

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 15px 18px;
			text-decoration:none;
		}
		

		ul.topnav li a:hover:not(.active) {background-color: #B0C4DE;}

		ul.topnav li a.active {background-color: #00BFFF;} 

		ul.topnav li.right {float: right;} 

		@media screen and (max-width: 6px) { 
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}

		.container{
			width: 600px;
      margin: auto;
      background-color: white;
      padding:auto;
      text-align:left;
      font-family:times new roman;
      font-size: 25px;
		}
		.center{
      background-color: white;
      margin: 0 auto;
       width: 495px; 
       border-style: solid; 
       border-color: #f2f2f2;"
    }
	table{
		margin: 0 auto;
	}
	.blink {
  animation: blink 3s infinite;
}

@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
    transform: scale(2);
  }
  51% {
    opacity: 0;
    transform: scale(0);
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}
</style>
<!--  -->
	<br>
	<div class="container text-center">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
	<img src="UcLogo.png" alt="" width="50" height="90">
    </div>
    <div class="col-md-auto">
	<h3><font color="black">Library E-gate Register
System </font></h3>
    </div>
    <div class="col col-lg-2">
	<img src="uclogo2.png" alt="" width="110" height="110">
    </div>
  </div>
</div> 
		<ul class="topnav">
			<li><a href="user data.php">Student Records</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="index.php">Read Tag ID</a></li>
			<li><a href="dailyrecord.php">Daily Record</a></li>
			<li><a href="index2qrcode.php">Scan Qr Code</a></li>
		</ul>
<div class="container"><br>
<h2>Please enter the date</h2>
<div class="center">
<br>
 <form method="post">
  <div class="input-daterange">
	<table>
		<tr><td>
  
	<label>From Date</label></td>

   <td><input type="date" name="fromDate" class="form-control" value="<?php echo date("Y-m-d"); ?>" />
	<?php echo $startDateMessage; ?>

   </td></tr>
   <tr><td>
  	<label>Ending    Date</label></td><td>
   <input type="date" name="toDate" class="form-control" value="<?php echo date("Y-m-d"); ?>"  />
	<?php echo $endDate; ?><br>
 

</td></tr>

  </div><br><br>
  <!-- end of input container -->
 
 <tr><td>  <br><br>
   <input type="submit" name="export" value="Download CSV file" class="btn btn-info" />
  
</tr></td>

	</table>

 </form>
</div>
</div> 
<!-- end of container -->
<br>

	<br>

<div class="row">
	<div class="col-md-8">
		<?php echo $noResult;?>
	</div>
</div>
<br />
</div>

<?php include("inc/footer.php"); ?>