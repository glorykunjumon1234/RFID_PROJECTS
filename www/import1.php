<?php
// code for insert data
if(isset($_POST["submit"]))
{

                $url='localhost';
                $username='root';
                $password='';
                //  $conn=mysqli_connect($url,$username,$password,"rfid2");
                $conn= new PDO("mysql:host=localhost;dbname=rfid2","root","");
                if(!$conn){
          die('Could not Connect My Sql:' .mysqli_error());
    }
          $file = $_FILES['file']['tmp_name'];
         
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
          $name = $filesop[0];
          $id = $filesop[1];
          $appno=$filesop[2];
          $gender=$filesop[3];
          $department=$filesop[4];
          $graduation=$filesop[5];
          $mobile = $filesop[6];
          $date = $filesop[7];
          $pic = $filesop[8];
          $date1=date_create("$date");
          $date2=date_format($date1,"y/m/d");
          // $sql = "insert into tbl_data(name,id,gender,department,mobile,date) values ('$name','$id','$gender','$department','$mobile','$date')";
          // $stmt = mysqli_prepare($conn,$sql);
          // mysqli_stmt_execute($stmt);
          $sql="INSERT INTO tbl_data(id,name,appno,gender,department,graduation,mobile,date,pic) VALUES (?, ?, ?,?, ?, ?, ?, ?,?)";
          $result=$conn->prepare($sql);
          
          $result->execute(array($id,$name,$appno,$gender,$department,$graduation,$mobile,$date2,$pic));

         $c = $c + 1;
           }

            if($result){
              header("Location: user data.php");
             } 
   else
   {
            echo "Sorry! Unable to impo.";
          }
        }
       


?>
<!-- main body -->
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>QR Code | Log in</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="js/instascan.min.js"></script>
		<!-- DataTables -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-grid.rtl.min.css">
    
		<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
		<script src="instascan.min.js"></script>
  <style>
    .container{
      
      width: 600px;
      margin: auto;
      background-color: white;
      padding:auto;
      /* text-align:left; */
      font-family:times new roman;
      font-size: 25px;
      /* background-color: #00BFFF; */
    }.center{
      background-color: white;
      margin: 0 auto;
       width: 495px; 
       border-style: solid; 
       border-color: #f2f2f2;"
    }
    label{
       align:left;
    }
    p{
      font-size:20px;
      
      padding-left:80px;
    }
    #bt
    {
      color:black;
         width: 100px;
      font-size:16px;
      background-color: #00BFFF;
       margin-left: 190px;
       margin-bottom: 50px
    }
    #file
    {
      color:black;
         width: 100px;
      font-size:16px;
      background-color: #00BFFF;
      
    }
    body{
      background-color:white;
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
    label,input,p{
      margin-left: 30px;
    }
    
    /* .input-daterange input {
  text-align: center;
  background-color: lightgrey;
} */
    </style>
<body>
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
			<li><a href="registration3.php">Registration</a></li>
			<li><a class="active" href="index.php">Read Tag ID</a></li>
			<li><a href="dailyrecord.php">Daily Record</a></li>
			<li><a href="index2qrcode.php">Scan Qr Code</a></li>
		</ul>
		<br><div class="container">   
    <form enctype="multipart/form-data" method="post" role="form">
    <div class="center">
<div class="form-group"><br><br><div class="input-daterange">
<p class="help-block"> Choose CSV file to Import</p>
<table>
          <tr><td>

        <label for="exampleInputFile"><font color="brown"><h4>File upload:<h4></label>
</td><td>
       
        <input type="file" name="file" id="file" color="red" size="100" class="btn"></td>
</tr>  
<tr>
         
        
<td>
    
    <button class="btn btn-info" id="bt" type="submit"  name="submit" value="submit" align="center">Upload</button>
    </form>
</td>
</tr>
</table>

 
  </div>
</body>
</html>