<?php
include 'eqc/config.php'; 

$sql = "DELETE FROM post WHERE end_date < NOW()";

if ($conn->query($sql) === TRUE) {
    echo "Expired jobs deleted successfully.";
} else {
    echo "Error deleting jobs: " . $conn->error;
}

$conn->close();
?>
