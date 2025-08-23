<?php
$servername = "localhost";
$username   = "u965360670_Razorjob"; 
$password   = "Razor123@_"; 
$dbname     = "u965360670_jobs";
// $username   = "Razorjob"; 
// $password   = "razor@2512"; 
// $dbname     = "jobs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

.
