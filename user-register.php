<?php
session_start(); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'eqc/config.php'; 

$register_error = ""; // Error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check if username already exists
    $stmt = $conn->prepare("SELECT id FROM adminjob WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $register_error = "Username already exists!";
    } else {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        $stmt = $conn->prepare("INSERT INTO adminjob (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            echo "✅ Registration successful! You can now <a href='login.php'>Login</a>";
            exit();
        } else {
            $register_error = "Registration failed: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <?php
    if (!empty($register_error)) {
        echo "<p style='color:red;'>$register_error</p>";
    }
    ?>

    <form action="" method="POST">
        <input type="text" name="username" required placeholder="Username"><br><br>
        <input type="password" name="password" required placeholder="Password"><br><br>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="admin-job-post.php">Login</a></p>
</body>
</html>
