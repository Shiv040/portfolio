<?php
$servername = "217.21.91.154";
$username = "u943886398_netxgroup";
$password = "Polo@1476";
$dbname = "u943886398_myDb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!-- WlcomeSIVE -->