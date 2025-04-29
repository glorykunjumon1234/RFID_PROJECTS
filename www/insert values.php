<?php
 $mysqli = new mysqli("localhost", "root", "", "rfid2");
  
if ($mysqli == false) {
    die("ERROR: Could not connect. ".$mysqli->connect_error);
}
  

$sql = "INSERT INTO `tbl_data` (`name`, `id`, `appno`, `gender`, `department`, `graduation`, `mobile`, `date`) VALUES
('AMAL P M', ' 5DA82A6C', '110', 'Male', 'Economics', 'BSc', '8590540923', '2022-10-11'),
('ATHUL S PRADEEP', ' 7D132D6C', '116', 'Male', 'Economics', 'BSc', '8943251856', '2022-09-15'),
('AISWARYA SHIJU', '1E74A444', '107', 'Female', 'Physics', 'MSc', '9778372611', '2022-09-15'),
('Glory', '2D0A2F6C', '100', 'Female', 'CME', 'BSc', '4748329299', '2022-08-31'),
('AMAN PAULSON', '2DB12A6C', '111', 'Male', 'Chemistry', 'MSc', '9188495514', '2022-09-15'),
('ANUJA K S', '3DDA236C', '115', 'Female', 'Computer Science', 'BSc', '8078437935', '2022-10-11'),
('ANANDAKRISHNAN S', '4D582E6C', '113', 'Male', 'Economics', 'MSc', '8589952163', '2022-08-27'),
('ABDUL RAHMAN C U', '5EA9A444', '101', 'Male', 'Computer Science', 'BSc', '6238894582', '2022-10-11'),
('ADITHYAN K U', '6D882B6C', '106', 'Male', 'CME', 'BSc', '9567169500', '2022-10-11'),
('AVIN SAI K S', '6DCF2B6C', '117', 'Male', 'CME', 'MSc', '9947810388', '2022-09-12'),
('ADITHYA CHANDRAN', '8EB8A444', '105', 'Male', 'Economics', 'BSc', '7012311636', '2022-10-06'),
('ANAGHA M A', '9D09336C', '112', 'Female', 'CME', 'MSc', '8590811355', '2022-09-12'),
('ANANDHAKRISHNA K', '9DBA246C', '114', 'Male', 'Physics', 'BSc', '6238275861', '2022-10-06'),
('ALGIN BAJI M', 'ADF8336C', '109', 'Male', 'Chemistry', 'BSc', '8590710154', '2022-08-27'),
('ADIL ANSON ANTONY', 'DD8C286C', '104', 'Male', 'Physics', 'BSc', '9562314189', '2022-08-27'),
('ABHINAND. S', 'DD8E286C', '102', 'Male', 'Chemistry', 'BSc', '8137054313', '2022-09-15'),
('AJAY VENUGOPAL', 'ED2D2B6C', '108', 'Male', 'Physics', 'BSc', '9497249342', '2022-09-12'),
('ALTHUAF P S', 'ED402E6C', '110', 'Male', 'Computer Science', 'BSc', '8907219675', '2022-10-06'),
('ADARSH BIJU', 'FEE9B144', '103', 'Male', 'CME', 'BSc', '8078537207', '2022-09-12'),
('GLORY', 'SY01-1122', '118', 'Female', 'IT', 'MSc', '8137044313', '2022-09-12'),
('IVANA', 'SY01-1133', '119', 'Female', 'CHEMISTRY', 'MSc', '8078533307', '2022-08-27'),
('JIBIN', 'SY01-1144', '120', 'MALE', 'CME', 'MSc', '9162314189', '2022-10-06'),
('JAYA', 'SY01-1155', '121', 'Female', 'Physics', 'MSc', '8899996666', '2022-10-11'),
('RESHMI', 'SY01-1166', '122', 'Female', 'MCA', 'MSc', '7777888999', '2022-09-15')
 ";
  
    if ($mysqli->query($sql) == true)
{
    echo "Records inserted successfully.";
}
else
{
    echo "ERROR: Could not able to execute $sql. "
           .$mysqli->error;
}
  
// Close connection
$mysqli->close();
?>
