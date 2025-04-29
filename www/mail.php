<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";    
	$dbname="rfid2";
    
    $conn = new mysqli($server,$username,$password,$dbname);
	if($conn)
    {
        echo "connected";
        echo"<br>";
    }
    if($conn->connect_error)
    {
        die("Connection failed" .$conn->connect_error);

    }
    if(isset($_POST['submitmail']))
    {
            $i=0;
            $sql="SELECT * from issue where Status='Issued'";
            $result=$conn->query($sql);
            $count=mysqli_num_rows($result);
            $rows = $result->fetch_all(MYSQLI_ASSOC);
     foreach ($rows as $row) 
     {
        // printf("%s (%s)\n", $row["returndate"], $row["issuedate"]);
            // echo$row["returndate"];
            echo"<br>";
            $date2=date_create(date('Y/m/d'));
            $date1=date_create($row["returndate"]);

            $diff=date_diff($date1,$date2);
            $day=$diff->format("%a");
            // echo"$day";
            echo"<br>";
            if($date1>$date2&&$day==2)
            {
           
            
                $to=$row['email'];
                $sub="Regarding book return";
                $from="FROM: gloryk.224466@gmail.com";
                $message="Time to return your book";
                // echo$row["email"]."  u didnt return book";
                echo"<br>";
                echo "time for bookreturn";
                if(mail($to,$sub,$message,$from))
                {
                    echo"MAIL SENT SUCCESSFULLY  to ".$to;

                }
                else{
                    echo"MAIL NOT SENT";
                }


            
        }

   }  
}
   	?>