<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $designation = $_POST["dsg"];
    $ctc = $_POST["ctc"];
    $keySkills = $_POST["keyskill"];
    $applyForThePost = $_POST["applyforthepost"];
    $totalWorkExperience = $_POST["totalworkexperience"];
    $resumeFile = $_FILES["resume"];
    $resumeFileName = $resumeFile["name"];
    $resumeTmpName = $resumeFile["tmp_name"];
    $allowedExtensions = ["pdf", "webp", "jpeg", "webp" , "doc" , "docx"];
    $fileExtension = strtolower(pathinfo($resumeFileName, PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "<script>alert('Please upload a PDF, webp, JPEG, or webp file.');</script>";
    } else {
        $to = "careers@razorinfotech.com";
        $subject = "New Enquiry || Razorinfotech - Career Section";
        $message = "Name: $name\n";
        $message .= "Email: $email\n";
        $message .= "Phone: $phone\n";
        $message .= "Current Designation: $designation\n";
        $message .= "Current CTC: $ctc\n";
        $message .= "Key Skills: $keySkills\n";
        $message .= "Apply for the Post: $applyForThePost\n";
        $message .= "Total Work Experience: $totalWorkExperience\n";

        // Prepare email headers
        $headers = "From: $to";

        // Prepare a boundary for the email
        $boundary = md5(uniqid());

        // Set additional headers for sending a multipart email with attachment
        $headers .= "\r\nMIME-Version: 1.0";
        $headers .= "\r\nContent-Type: multipart/mixed; boundary=\"$boundary\"";
        $emailBody = "--$boundary\r\n";
        $emailBody .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
        $emailBody .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $emailBody .= $message . "\r\n\r\n";
        $emailBody .= "--$boundary\r\n";
        $emailBody .= "Content-Type: application/octet-stream; name=\"$resumeFileName\"\r\n";
        $emailBody .= "Content-Transfer-Encoding: base64\r\n";
        $emailBody .= "Content-Disposition: attachment; filename=\"$resumeFileName\"\r\n\r\n";
        $emailBody .= chunk_split(base64_encode(file_get_contents($resumeTmpName))) . "\r\n";
        $emailBody .= "--$boundary--";

        // Send email with the attached file
        if (mail($to, $subject, $emailBody, $headers)) {
            header("Location: thankyou.php");
            exit;
        } else {
            echo "<script>alert('Oops! Something went wrong while sending the email.');</script>";
        }
    }
}
?>
