<?php
require 'configrfid.php';?>

<table border=1>
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Gender</td>
        <td>Email</td>
        <td>Phone number</td>
</tr>
<?php
$i=1;
$rows=mysqli_query($conn,"SELECT * FROM tbl_data");
foreach($rows as $row):
?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['gender'] ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
</tr>
<?php endforeach; ?>

</table>

