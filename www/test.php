<!DOCTYPE html>
<html>
<head>
    <title>Test getUID.php</title>
</head>
<body>
    <form method="POST" action="getUID.php">
        <label for="UIDresult">Enter UID:</label>
        <input type="text" id="UIDresult" name="UIDresult">
        <button type="submit">Submit</button>
    </form>
</body>
</html>


<?php
session_start();
// echo $_POST["UIDresult"];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "server connected request method.";
    echo "The Post value is " . $_POST["UIDresult"];
    if (isset($_POST['UIDresult'])) {
        $UIDresult = $_POST["UIDresult"];
        echo "The Post value is set and value is " . $_POST["UIDresult"];
    } else {
        echo "UID not received.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "This script handles POST requests. Use POST to send data.";
} else {
    echo "server not connected request method.";
}
?>
