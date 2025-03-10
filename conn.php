<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u943886398_myDb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
