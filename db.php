<?php
$servername = "localhost";
$username = "root"; // Your database username
$password = "";     // Your database password
$dbname = "courier";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>