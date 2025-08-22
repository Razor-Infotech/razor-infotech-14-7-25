<?php
session_start(); // So we can store the admin user in session if needed

// If the form has been submitted (method = POST), handle the login logic.
$errorMessage = '';
$welcomeMessage = ''; // Will store a quick success note if desired

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // 1) Prepare data for Node API
    $postData = json_encode([
        'username' => $username,
        'password' => $password
    ]);

    // 2) Use cURL to call Node endpoint (http://localhost:3002/admin/login)
    $ch = curl_init('https://jobs.razorinfotech.com/admin/login');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    $response = curl_exec($ch);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false) {
        // cURL error
        $errorMessage = "Error calling the Node API: $curlError";
    } else {
        // 3) Decode Node's JSON response
        $result = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $errorMessage = "Invalid JSON response from Node: " . json_last_error_msg();
        } else {
            // 4) Check success
            if (!empty($result['success'])) {
                // Successful login
                $user = $result['username'] ?? 'unknown';

                // Example: store user in session
                $_SESSION['admin_user'] = $user;

                // Optional: show a quick success message (no redirect yet)
                $welcomeMessage = "Welcome, {$user}! Redirecting...";

                // Then do the redirect (adjust path as needed)
                header("Refresh: 2;  url=https://razorinfotech.com/admin-job-posting.php?$user");
                // This refresh means: wait 2 seconds, then redirect 
                // OR do immediate redirect: header("Location: /admin/$user"); exit;
            } else {
                // Login failed
                $errorMessage = $result['message'] ?? 'Login failed.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Login</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    body {
      background-color: #f4f4f9;
      margin: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }
    header, footer {
      background-color: #683a96;
      color: #fff;
      padding: 10px;
      text-align: center;
    }
    .main-content {
      display: flex;
      flex: 1;
      justify-content: center;
      align-items: center;
    }
    .login-container {
      width: 320px;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      text-align: center;
    }
    h2 {
      margin-bottom: 20px;
      color: #683a96;
    }
    label {
      font-weight: bold;
      margin-top: 10px;
      display: block;
      text-align: left;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      transition: border-color 0.3s ease;
    }
    input[type="text"]:hover,
    input[type="password"]:hover {
      border-color: #683a96;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #683a96;
      border: none;
      color: #fff;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }
    button:hover {
      background-color: #562c7c;
    }
    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 10px;
    }
    .welcome-message {
      color: green;
      font-size: 14px;
      margin-top: 10px;
    }
    .forgot-link {
      font-size: 14px;
      margin-top: 12px;
      display: inline-block;
    }
    .forgot-link a {
      color: #683a96;
      text-decoration: none;
    }
    .forgot-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <header>
    <h1>Razor Admin Portal</h1>
  </header>

  <div class="main-content">
    <div class="login-container">
      <h2>Admin Login</h2>

      <!-- The form posts back to this same file -->
      <form method="POST" action="">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />

        <button type="submit">Login</button>

        <!-- Display any error or success messages -->
        <?php if (!empty($errorMessage)): ?>
          <p class="error-message"><?= htmlspecialchars($errorMessage) ?></p>
        <?php endif; ?>

        <?php if (!empty($welcomeMessage)): ?>
          <p class="welcome-message"><?= htmlspecialchars($welcomeMessage) ?></p>
        <?php endif; ?>

        <div class="forgot-link">
          <a href="#">Forgot Password?</a>
        </div>
      </form>
    </div>
  </div>

  <footer>
    <p>&copy; <?= date('Y') ?> Razor Infotech</p>
  </footer>

</body>
</html>
