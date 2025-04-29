<?php
     if(isset($_POST["submit"]))
     {

        $url='localhost';
        $username='root';
        $password='';
       $conn= new PDO("mysql:host=localhost;dbname=rfid2","root","");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $filename=$_FILES["file"]["tmp_name"];
        if(!empty($filename))
        {
            $file=fopen($filename,'r');

            $c = 0;
            while(($filesop = fgetcsv($file, 1000, ",")) !== false)
                      {
            $name = $filesop[0];
            //$id = $filesop[1];
            $appno=$filesop[1];
            $gender=$filesop[2];
            $department=$filesop[3];
            $graduation=$filesop[4];
            $mobile = $filesop[5];
            $date = $filesop[6];
            
            $date1=date_create("$date");
            $date2=date_format($date1,"y/m/d");
            // $sql = "insert into tbl_data(name,id,gender,department,mobile,date) values ('$name','$id','$gender','$department','$mobile','$date')";
            // $stmt = mysqli_prepare($conn,$sql);
            // mysqli_stmt_execute($stmt);
            $sql="INSERT INTO tbl_data22(name,appno,gender,department,graduation,mobile,date) VALUES (?, ?,?, ?, ?, ?, ?)";
            $result=$conn->prepare($sql);
            
            $result->execute(array($name,$appno,$gender,$department,$graduation,$mobile,$date2));
  
           $c = $c + 1;
             }
                   
                    if(!isset($result))
                    {
                        echo'<script>alert("Wrong File Selection Please upload CSV file");
                        window.location="timeout2.php"</script>';
                        $_SESSION['msg']="  ";
                    }
                    else
                    {
                        $_SESSION['msg']="SCAN CARD ONE BY ONE";
                        echo'<script>alert("File upload Successsfully");
                        window.location="registration3.php"</script>';

                    }
            }
        }
        else{
            echo'<script>alert("Please Select File");
                </script>';
        }





        
       
     ?>