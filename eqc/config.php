<?php
$servername = "localhost"; // or 127.0.0.1 if Hostinger specifically says so
$username   = "u965360670_Razorjob"; 
$password   = "Razor123@_"; 
$dbname     = "u965360670_jobs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>
