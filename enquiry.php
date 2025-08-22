<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data with fallback to empty strings
    $name = $_POST['fname'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validate input fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        header("Location: contact.php?error=Please fill in all fields.");
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact.php?error=Invalid email format.");
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'riya.mishra@travkom.com'; // SMTP username
        $mail->Password = '@Riyamis00'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Sender and recipient settings
        $mail->setFrom('riya.mishra@travkom.com', 'Razor Inquiry'); // Sender's email
        $mail->addAddress('riya.mishra@travkom.com'); // Recipient's email

        // Email content
        $mail->isHTML(false); // Use plain text format
        $mail->Subject = "New Inquiry: $subject";
        $mail->Body = "You have received a new inquiry:\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Subject: $subject\n" .
            "Message:\n$message";

        // Send the email
        if ($mail->send()) {
            error_log("Email sent successfully");
            header("Location: thankyou.php");
            exit;
        } else {
            error_log("Failed to send email");
            header("Location: contact.php?error=Unable to send your message. Please try again later.");
            exit;
        }
    } catch (Exception $e) {
        // Log detailed error and redirect to the contact page with an error
        error_log("Mail error: " . $mail->ErrorInfo);
        header("Location: contact.php?error=Unable to send your message. Please try again later.");
        exit;
    }
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}
?>
