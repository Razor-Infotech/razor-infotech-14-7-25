<?php
session_start();
require 'eqc/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $stmt = $conn->prepare("SELECT id, password FROM adminjob WHERE username = ?");
    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        die("Query Execution Failed: " . $stmt->error);
    }
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;
            header("Location: post.php");
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "Username not found!";
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
    <title>Admin Login</title>
    <link rel=" icon" href="assets/img/razor-img/logo/razor-fevicon.webp">
    <link rel="stylesheet" href="assets/css/admin-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="main-container">
        <div class="login-container">
            <div class="image-container">
                <img src="assets/img/jobs/admin-jobs/login-image.webp" alt="login-image" loading="lazy">
            </div>
            <div class="form-container">
                <h1 style="display: none;">admin</h1>
                <h2>Admin Login</h2>
                <form method="POST">
                    <input type="text" name="username" required placeholder="Username" class="username"><br><br>
                    <div style="position: relative;">
                        <div class="password">
                            <input type="password" name="password" required placeholder="Password" id="password">
                            <span id="togglePassword"><i class="fa-solid fa-eye"></i></span>
                        </div>
                    </div>
                    <br><br>
                    <div class="buttons">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            if (type === "text") {
                togglePassword.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
            } else {
                togglePassword.innerHTML = '<i class="fa-solid fa-eye"></i>';
            }
        });
    </script>
</body>
</html>
