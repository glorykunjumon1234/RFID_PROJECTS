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
<style>
        /* Table container styling */
        .table-container {
            width: 500px;
            max-width: 100%;
            border: 1px solid #f2f2f2;
            overflow: auto;
            max-height: 300px; /* Adjust height as needed */
            position: relative;
        }

        /* Fixed header styling */
        .table-container table {
            width: 100%;
           
        }

        .table-container thead tr {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
            z-index: 2;
        }

        /* Ensure horizontal scrollbar appears */
        .table-container tbody {
            display: block;
            overflow: auto;
            max-height: 250px; /* Adjust to fit */
        }

        .table-container thead, 
        .table-container tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        /* Set column widths to avoid wrapping */
        .table-container th, 
        .table-container td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
            white-space: nowrap;
        }
    </style>
<body>
  

<?php
include 'connection.php';
if(isset($_POST['displaySend']))
{
// inside table variable first we have table header 
    ?>
	
    <table id="studtable" class=" table-container table table-striped table-bordered" >
    <thead class="table table-bordered" class="noExport">
    <tr bgcolor="#00BFFF" color="#FFFFFF">
    <th scope="col"  color="#FFFFFF">S NO</th>
    <th scope="col">pic</th>
      <th scope="col">RFID</th>
      <th scope="col">NAME</th>
      <th scope="col">APP NO</th>
      <!-- <th scope="col">DEPARTMENT</th>
 <th scope="col">Phone Number</th>
       -->
     
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
      if($row['pic']=="uploads/"||$row['pic']==null)
					{
						$row['pic']="uploads/user.jpg";
						
					}
        $id=$row['rfid']; 
        $name=$row['name'];
        $department=$row['department'];
        $phone=$row['mobile'];
        $num=1;?>
        <!-- here concantinating table header with table data  -->
        <tr>
        <td scope="row"><?php echo $numrows;?></td>
        <td><img src="<?php echo$row['pic'];?>"/></td>
          <td scope="row"><?php echo $id;?></td>
          <td scope="row"><?php echo $name;?></td>
          <td scope="row"><?php echo $row['appno'];?></td>

          <!-- <td scope="row"><?php echo $department; ?></td>
          <td scope="row"><?php echo $row['mobile'];?></td> -->
         
         

        
      </tr><?php
      
      $numrows++;
      
    }
   
    // outside loop we are taking all value and then closig table 
    // $table.='</table>';
    // echo $table;
  
}
?>
 </table>
 </body>
</html>