<?php
   $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);
?>
<?php
   include 'myid/connection.php';
   //session_start();
   $sql="SELECT * FROM tbl_data22";
     $q = $pdo->query($sql);
     $count1=$q->rowcount();
   
     
     
       if($count1>0)
     {
       $sql="SELECT * FROM `tbl_data22` WHERE id=(SELECT MIN(id) FROM `tbl_data22` WHERE rfid='')";
       $q = $pdo->query($sql);
       $count=$q->rowcount(); 
       
       if($count>0){   
   		$msg="File Imported insert applcation no, then scan card and upload your image to assign ";
                  
                   }
                 else{
   				$msg="All cards assign click export to download file and then Resume";
                 }
     
         }
       
           if($count1<1)
     
   {
     $msg="NULL";
   }
   
   if(isset($_POST['submit1']))
   {
   	$app=$_POST['search'];
   	$sql="SELECT * from tbl_data22 where appno = '$_POST[search]' ";
   
   
   //   $sql="SELECT * FROM `tbl_data` WHERE id=(SELECT MIN(id) FROM `tbl_data` WHERE rfid='')";
     $q = $pdo->query($sql);
     $count=$q->rowcount();
    
     if($count>0)
     {
     $data = $q->fetch(PDO::FETCH_ASSOC);
           $id= $data['id'];
     }
   		else{
   			$data['id']="no data found";
   		$data['name']="--------";
   		$data['gender']="--------";
   		$data['department']="--------";
   		$data['mobile']="--------";
   	$data['appno']="-----------";
   	$data['graduation']="-----------------";
   	$data['date']="-----------------";	
     
     }
   }
     else{
   	$data['id']="--------";
   		$data['name']="--------";
   		$data['gender']="--------";
   		$data['department']="--------";
   		$data['mobile']="--------";
   	$data['appno']="-----------";
   	$data['graduation']="-----------------";
   	$data['date']="-----------------";
     }
   
   
   		 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Container Layout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css1/style.css">
   <link href="css1/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css1/bootstrap-grid.rtl.min.css">
 
		<script src="jquery.min.js"></script>
   <script>
			$(document).ready(function(){
				 $("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");
				}, 500);
			});
		</script>
</head>
<body>
<br><br>
         <div class="container text-center">
            <div class="row justify-content-md-center">
               <div class="col col-lg-2">
                  <img src="UcLogo.png" alt="" width="50" height="90">
               </div>
               <div class="col-md-auto">
                  <h3><font color="black">Library E-gate Register
                     System </font>
                  </h3>
               </div>
               <div class="col col-lg-2">
                  <img src="uclogo2.png" alt="" width="110" height="110">
               </div>
            </div>
         </div>
         <ul class="topnav">
            <li><a href="user data.php">Student Records</a></li>
            <li><a class="active" href="registration3.php">Registration</a></li>
            <li><a href="index.php">Read RFID Tag</a></li>
            <li><a href="download.php">Download</a></li>
            <li><a href="index2qrcode.php">Scan Qr Code</a></li>
            <div class="search-container"> <input type="submit" id = "reload" class="btn btn-primary my-3" style="float:right"onclick="deleteUser()" style=" float:right;margin-left:60px" value="Resume"  onclick="myFunction()"> </div>
            </div>
         </ul>
    <div class="container mt-4">
	<center>
            <h3  class="slideInDown animated" align="center" id="blink"><font color="brown">IMPORT YOUR FILE</h3>
            <br>
   
		  <!-- First Row: Import and Export Forms -->
		  <div class="row mb-3">
            <!-- Import Form -->
            <div class="col-md-6 d-flex justify-content-center">
                <form class="form-horizontal" action="function.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <input type="file" name="file" id="file" class="form-control d-inline-block w-auto">
                    <button type="submit" id="submit" name="submit" class="btn btn-info ms-2" data-loading-text="Loading...">Import</button>
                </form>
            </div>

            <!-- Export Form -->
            <div class="col-md-6 d-flex justify-content-center">
                <form class="form-horizontal" action="exportID.php" method="post" name="export" enctype="multipart/form-data">
                    <button type="submit" id="export" name="export" class="btn btn-info" data-loading-text="Loading..." style="margin-left: 95px;">Export File</button>
                </form>
            </div>
        </div

        <!-- Second Row: Table Display and Forms -->
        <div class="row">
            <!-- Column for Table Display -->
            <div class="col-md-7">
			<!-- <div class="table-container">
                    <div id="displayDataTable"></div>
                </div> -->
                <div style="margin: 0 auto; width:550px; border-style: solid; border-color: #f2f2f2;">
                    <div id="displayDataTable"></div>
                </div>
            </div>

            <!-- Column for Forms -->
            <div class="col-md-5">
                <!-- Search Form -->
                <br>
                     <div style="margin: 0 auto; width:350px; border-style: solid; border-color: #f2f2f2;">
                        <br><br>
                        <form class="form-horizontal" action="" method="post" >
                           <input type="text" name="search" placeholder=" Enter your Application No" required=""<br><br>
                           <button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-primary">
                           SEARCH</button>
                        </form>
                        <p id="defaultGender" hidden><?php echo $data['gender'];?></p>
                        <form class="form-horizontal" action="editdata.php" method="post"  enctype="multipart/form-data">
                           <tr>
                              ID::
                              <td><textarea name="rfid" id="getUID" placeholder="Please Scan your Card / Key Chain to display ID" rows="1" cols="1" required></textarea></td>
                           </tr>
                           </tr><br><br>
                           Name::<input id="div_refresh" name="name" type="text" value="<?php echo $data['name'];?>">
                           </td></tr><br><br>
                           Gender::
                           <td>
                              <select name="mySelect" id="mySelect">
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                              </select>
                           </td>
                           </tr>
                           </tr>		<br><br>	 
                           <tr>
                              Application Number::
                              <td><input name="appno" type="text" value="<?php echo $data['appno'];?>" ></td>
                           </tr>
                           <br><br> 
                           Department:			
                           <input name="department" type="text" value="<?php echo $data['department'];?>" ></td></tr>
                           <br><br>
                           Graduation::
                           <td>
                              <select name="graduation">
                                 <option value="">Select graduation</option>
                                 <option <?php if($data['graduation']=="UG"){echo "selected";}?>>UG</option>
                                 <option <?php if($data['graduation']=="PG"){echo "selected";}?>>PG</option>
                                 <option <?php if($data['graduation']=="Staff"){echo "selected";}?>>Staff</option>
                              </select>
                              <br><br>
                              Mobile Number::<input name="mobile" type="text" value="<?php echo $data['mobile'];?>"> 
                           </td>
                           </tr>
                           <br><br>
                           Date::
                           <td><input name="date" type="text" value="<?php echo $data['date'];?>"> </td>
                           </tr>
                           <br><br>
                           UPLOAD PIC::
                           <td><input class="form-control" type="file" name="file" value="" /></td>
                           </tr>
                           <br><br>
                           <td><input name="edit"  type="submit" class="btn btn-success" value="Save" placeholder="Save Changes"></td>
                           </tr>
                           </table>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
        </div>
        <div><h2 align="center">For Manual registration - click below</h2>
	</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script>
      var g = document.getElementById("defaultGender").innerHTML;
      if(g=="Male") {
      	document.getElementById("mySelect").selectedIndex = "0";
      } else {
      	document.getElementById("mySelect").selectedIndex = "1";
      }
      
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script>
      $(document).ready(function(){
      displayData();
      
      });
      function displayData()
      {
        var displaydata="true";
        $.ajax({
          url:"myid/display.php",
          type:"post",
          data:{
            displaySend:displaydata,
          },
          success:function(data,status){
            $('#displayDataTable').html(data)
            // console.log(data);
          }
          });
      }
      
      function deleteUser()
      {
          var displaydata="true";
          $.ajax({
              url:"myid/export2.php",
              type:"post",
              data:{
                displaySend:displaydata,
                   },
                   success:function(data,status)
                   {
                    displayData();
                        }
          });
          var e= "Import Your File";
        document.getElementById("blink").innerText=e;
      }
      
      
      
      
      
      
          
        
      
      
   </script>
   <script>
      var c="<?php echo$msg;?>";
      console.log(c);
      if (c=="NULL")
      {
        var e= "Import Your File";
        document.getElementById("blink").innerText=e;
        console.log(e);
      }else{
        document.getElementById("blink").innerText=c;
        var d=document.getElementById("blink").innerText;
        // console.log(d);
      
      }
      
      
        $("#table-id").table2excel({
            exclude: ".noExport",
            filename: "name-of-the-file",
        });
   </script>

