<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
  <title></title>
</head>
<body>
  
</body>
</html>
<?php
include 'connection.php';
if(isset($_POST['displaySend']))
{
// inside table variable first we have table header 
    ?>
	
    <table id="studtable" class="table table-striped table-bordered" style="background-color:#669988">
    <thead class="table table-bordered" class="noExport">
    <tr bgcolor="#00BFFF" color="#FFFFFF">
    <th scope="col"  color="#FFFFFF">S NO</th>
      <th scope="col">RFID</th>
      <th scope="col">NAME</th>
      <th scope="col">APPICATION NO</th>
      <th scope="col">DEPARTMENT</th>
 <th scope="col">Phone Number</th>
      <th scope="col">DATE</th>
</tr>
    </thead><?php
    // taking all values from dtabase 

    $sql="SELECT * FROM tbl_data22 ORDER BY id ASC";   
    $result=mysqli_query($conn,$sql); 
    $num=1;  
    // echo$num;
    $result1=mysqli_query($conn,"SELECT * FROM tbl_data"); 
    $numrows=mysqli_num_rows($result1); 
    // echo$numrows;
     $numrows=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['rfid']; 
        $name=$row['name'];
        $department=$row['department'];
        $phone=$row['mobile'];
        $num=1;?>
        <!-- here concantinating table header with table data  -->
        <tr>
        <td scope="row"><?php echo $numrows;?></td>
          <td scope="row"><?php echo $id;?></td>
          <td scope="row"><?php echo $name;?></td>
          <td scope="row"><?php echo $row['appno'];?></td>

          <td scope="row"><?php echo $department; ?></td>
          <td scope="row"><?php echo $row['mobile'];?></td>
          <td scope="row"><?php echo $row['date'];?></td>

        
        <td>
          
        
        </td>
      </tr><?php
      
      $numrows++;
      
    }
   
    // outside loop we are taking all value and then closig table 
    // $table.='</table>';
    // echo $table;
  
}
?>
 </table>