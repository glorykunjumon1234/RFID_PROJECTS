

<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to log debug messages
function debug_log($message) {
    file_put_contents("debug_log.txt", $message . "\n", FILE_APPEND);
}

// Check the request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    debug_log("POST request received.");

    // Log the incoming POST data
    $postData = print_r($_POST, true);
    debug_log("POST data: " . $postData);

    // Respond to the Arduino
    echo "Server connected request method.";

    if (isset($_POST['UIDresult'])) {
        $UIDresult = $_POST['UIDresult'];

        // Log the received UID
        debug_log("Received UID: " . $UIDresult);

        echo "The Post value is " . $UIDresult;
        echo "The Post value is set and value is " . $UIDresult;

        // Write the UID to a file
        $Write = "<?php $" . "UIDresult='" . $UIDresult . "'; echo $" . "UIDresult; ?>";
        file_put_contents('UIDContainer.php', $Write);

    } else {
        echo "UID not received.";
        debug_log("UIDresult not set in POST data.");
    }
} else {
    echo "Server not connected request method.";
    debug_log("Non-POST request received: " . $_SERVER['REQUEST_METHOD']);
}

// Log request headers for debugging
$headers = getallheaders();
debug_log("Headers: " . print_r($headers, true));

