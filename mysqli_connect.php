<?php

$servername = "localhost"; // Typically "localhost"
$username = "frank";        // Your MySQL username
$password = "LPUFrank@28";            // Your MySQL password
$dbname = "members_borromeo";   // The name of the database you created

// Create a connection
$dbcon = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($dbcon->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
