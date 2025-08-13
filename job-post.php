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
    $employment_type = mysqli_real_escape_string($conn, $_POST['employment_type'] ?? 'FULL_TIME');
    $street_address = mysqli_real_escape_string($conn, $_POST['street_address'] ?? '');
    $city = mysqli_real_escape_string($conn, $_POST['city'] ?? '');
    $state = mysqli_real_escape_string($conn, $_POST['state'] ?? '');
    $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code'] ?? '');
    $country = mysqli_real_escape_string($conn, $_POST['country'] ?? 'IN');
    $currency = mysqli_real_escape_string($conn, $_POST['currency'] ?? 'INR');
    $salary_value = mysqli_real_escape_string($conn, $_POST['salary_value'] ?? '0');
    $unit_text = mysqli_real_escape_string($conn, $_POST['unit_text'] ?? 'MONTH');

    $query = "INSERT INTO post (title, description, responsiblities, date, end_date, employment_type, street_address, city, state, postal_code, country, salary_value, currency, unit_text) 
    VALUES ('$title', '$desc', '$responsiblities', '$date', '$end_date', '$employment_type', '$street_address', '$city', '$state', '$postal_code', '$country', '$salary_value', '$currency', '$unit_text')";

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



