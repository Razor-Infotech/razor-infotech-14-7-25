<?php
$username = 'user01'; 

$apiUrl = "https://jobs.razorinfotech.com/admin/" . urlencode($username);

$response = @file_get_contents($apiUrl);

if ($response === false) {
    echo "Error calling the Node API or invalid endpoint.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin View in PHP</title>
  <link rel=" icon" href="assets/img/razor-img/logo/razor-fevicon.png">
    <link rel="stylesheet" href="assets/css/icons.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin-job-posting.css">
   
</head>
<body>
<?php include 'include/header.php'; ?>
  <?= $response ?>
 
  <?php include 'include/footer.php'; ?>
</body>
</html>
