<?php
$servername = "localhost";
// $username   = "u965360670_Razorjob"; 
// $password   = "Razor123@_"; 
// $dbname     = "u965360670_jobs";
$username   = "Razorjob"; 
$password   = "razor@2512"; 
$dbname     = "jobs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>

.