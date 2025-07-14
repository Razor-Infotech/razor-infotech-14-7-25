<?php
require 'eqc/config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'], $_POST['description'], $_POST['responsiblities'], $_POST['date'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $responsiblities = mysqli_real_escape_string($conn, $_POST['responsiblities']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);


    $query = "INSERT INTO post (title, description, responsiblities, date, end_date) 
    VALUES ('$title', '$desc', '$responsiblities', '$date', '$end_date')";


    if ($conn->query($query) === TRUE) {
        header("Location: jobs-view"); 
        exit();
    } else {
        echo "Error inserting data: " . $conn->error;
    }
} else {
    echo "Error: Missing form data!";
}

$conn->close();
?>
