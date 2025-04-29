<?php
include  'myid/connection.php';
if(isset($_POST['export']))


    {
        // $sql="INSERT tbl_data2 SELECT * FROM tbl_data";
        // $result=$pdo->query($sql);
       $sql="SELECT * FROM tbl_data22";
       $q = $pdo->query($sql);
        $count=$q->rowcount();
       
      
    
     $sql = " SELECT * FROM tbl_data22 ORDER BY id ASC LIMIT $count";
      $sql_query = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
      $filterOrders = array();
      while( $order = mysqli_fetch_assoc($sql_query) ) {
        $filterOrders[] = $order;
      }
      if(count($filterOrders)) {
          $fileName = "uc_college_library_".date('Ymd') . ".csv";
          header("Content-Description: File Transfer");
          header("Content-Disposition: attachment; filename=$fileName");
          header("Content-Type: application/csv;");
          $file = fopen('php://output', 'w');
          // $header = array("rfid", "Id", "Name","App No","Gender", "Department", "Graduation","Mobile", "Date");
          //fputcsv($file, $header);  
          //fputcsv($file); 
          foreach($filterOrders as $order) {
            
           $orderData = array();
           $orderData[] = $order["name"];
           $orderData[] = $order["rfid"];
          //  $orderData[] = $order["id"];
                     $orderData[] = $order["appno"];
           $orderData[] = $order["gender"];
           $orderData[] = $order["department"];
           $orderData[] = $order["graduation"];
           $orderData[] = $order["mobile"];
           $orderData[] = $order["date"];
           $orderData[] = $order["pic"];
           fputcsv($file, $orderData);
          }
          fclose($file);
          exit;

                        echo'<script> window.location="registration3.php"</script>';
         
         
      } else {
         $noResult = '<label class="text-danger">There are no record exist with this date range to export. Please choose different date range.</label>';  
      }
     
   
      
    
    
    }

   

    ?>
