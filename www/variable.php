
<?php  
include 'connection.php';
session_start();

// if (isset($_GET['rfid'])) {
	if($_SERVER["REQUEST_METHOD"] == "POST"){
    $rfid=$_POST["UIDresult"];
  //$rfid = $_GET['rfid'];
  // $sql="SELECT MIN(id) FROM tbl_data WHERE rfid=null";
  $sql="SELECT * FROM `tbl_data` WHERE id=(SELECT MIN(id) FROM `tbl_data` WHERE rfid='')";
  $q = $pdo->query($sql);
  $count=$q->rowcount();
  // echo $count;
  if($count>0)
  {
  $data = $q->fetch(PDO::FETCH_ASSOC);
        $id= $data['id'];
  // echo  $data['id'];
  $sql="UPDATE tbl_data SET rfid='$rfid' WHERE id='$id'";
  $q = $pdo->query($sql);
  // $q->execute(array($c));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  // $result=$pdo->query($sql);
    

}
else
{
  $msg="All cards assign click export to download file";
}
}
  else
  {
    $rfid=" Scan ID";
  }
  
  $sql="SELECT * FROM tbl_data";
  $q = $pdo->query($sql);
  $count1=$q->rowcount();

  
  
    if($count1>0)
  {
    $sql="SELECT * FROM `tbl_data` WHERE id=(SELECT MIN(id) FROM `tbl_data` WHERE rfid='')";
    $q = $pdo->query($sql);
    $count=$q->rowcount(); 
    echo $count;
    if($count==0){   
                $msg="All cards assign click export to download file";
                }
              else{
                $msg="File Imported Scan Your Card One by One";
              }
  
      }
    
        if($count1<1)
  
{
  $msg="NULL";
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap-grid.rtl.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/manageusers.css"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/devices.css"/>

	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	        crossorigin="anonymous">
	</script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<style>
  .btn-cap{
  float:left;
  }
  .river{
  
  height:50px;
background-color:aliceblue;
  } 
  .slideInRight {
  animation-name: slideInRight;
} 
.slideInDown {
  animation-name: slideInDown;
}
.animated {
  animation-duration: 1s;
  animation-fill-mode: both;
}

@keyframes slideInRight {
  from {
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    transform: translate3d(0, 0, 0);
  }
}
@keyframes slideInDown {
  from {
    transform: translate3d(0, 100%, 0);
    visibility: visible;
  }

  to {
    transform: translate3d(0, 0, 0);
  }
}
  </style>
<body>
           
<form class="form-horizontal" action="function.php" method="post" name="upload_excel" enctype="multipart/form-data">
                
<div class="container text-center">
              <div class="row row row-cols-1 rowdesign">
                             <center> <h3  class="slideInDown animated" align="center" id="blink"><font color="brown">IMPORT YOUR FILE</h3>                
                             <center> <h2  class="slideInDown animated" align="center" id="textid"><font color="brown"></h2>  
                             <div ><div><a href="#" class="btn btn-dark" ><input type="file" class="abc my-1" name="file" id="file"><button type="submit" id="submit" name="submit" class="btn btn-warning button-loading" data-loading-text="Loading...">Import</button></a>
</div>                          </div>

</form>                        

</div>
                <div class="row row-cols-2">
                <div class="col-md-4" style="padding:10px;;border-radius: 5px;" id="divvideo">
                   </div>
              <div class="col-md-8  abcd">
                                
              </div>
</div>
</div>               
 
            </div>
            <div>
           
            <div class="container my-2">
            <input type="submit" id = "reload" class="btn btn-dark my-1" onclick="deleteUser()" style=" float:right;margin-left:60px" value="Resume"  onclick="myFunction()"> </div>

            <form class="form-horizontal" action="export.php" method="post" name="export" enctype="multipart/form-data">
   <div>      
<button type="submit" id="export" name="export" style="margin-left:95px" class="btn btn-dark btn-cap my-1" data-loading-text="Loading...">Export File</button>
</form>  <div>
</div><div class="container text-center">
<div  id="displayDataTable" class="" >
</div>
</div>
    </div>
    </div>
    
</body>
</html>
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
      url:"display.php",
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
          url:"export2.php",
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


 



      
    
 function myFunction()
 {
  window.location.href='index.php';
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
  </script>

