<?php
session_start();
$session_timeout = 43200000;
if (!isset($_SESSION['id'])) {
    header("Location: admin-job-post.php");
    exit();
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $session_timeout) {
    session_unset();
    session_destroy();
    header('Location: post-Edit-delete.php');
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Form</title>
    <link rel="icon" href="assets/img/razor-img/logo/razor-fevicon.webp" type="image/webp">
    <link rel="stylesheet" href="assets/css/post.css">
    <script src="tinymce/tinymce.min.js"></script>
</head>

<body>
    <div class="post-main-container">
        <div class="form-post-container">
            <h2>Submit Job Details</h2>
            <form action="job-post" method="POST" id="jobForm">
                <!-- Basic Job Information -->
                <label for="title">Job Title:</label>
                <input type="text" name="title" id="title" required><br><br>
                
                <label for="description">Description:</label>
                <textarea name="description" id="description" required></textarea><br><br>
                
                <label for="responsibilities">Responsibilities:</label>
                <textarea name="responsiblities" id="responsiblities" required></textarea><br><br>
                
                <!-- Employment Details -->
                <label for="employment_type">Employment Type:</label>
                <select name="employment_type" id="employment_type" required>
                    <option value="">Select Employment Type</option>
                    <option value="FULL_TIME">Full Time</option>
                    <option value="PART_TIME">Part Time</option>
                    <option value="CONTRACTOR">Contractor</option>
                    <option value="TEMPORARY">Temporary</option>
                    <option value="INTERN">Intern</option>
                    <option value="VOLUNTEER">Volunteer</option>
                </select><br><br>
                
                <!-- Location Information -->
                <h3>Job Location</h3>
                <label for="street_address">Street Address:</label>
                <input type="text" name="street_address" id="street_address" placeholder="e.g., Electronic City Phase 1"><br><br>
                
                <label for="city">City:</label>
                <input type="text" name="city" id="city" required placeholder="e.g., Bengaluru, Mumbai, Delhi"><br><br>
                
                <label for="state">State:</label>
                <select name="state" id="state" required>
                    <option value="">Select State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                </select><br><br>
                
                <label for="postal_code">Postal Code:</label>
                <input type="text" name="postal_code" id="postal_code" placeholder="e.g., 560100"><br><br>
                
                <label for="country">Country:</label>
                <select name="country" id="country" required>
                    <option value="IN" selected>India</option>
                    <option value="US">United States</option>
                    <option value="UK">United Kingdom</option>
                    <option value="CA">Canada</option>
                    <option value="AU">Australia</option>
                </select><br><br>
                
                <!-- Salary Information -->
                <h3>Salary Details</h3>
                <label for="salary_value">Salary Amount:</label>
                <input type="number" name="salary_value" id="salary_value" step="0.01" placeholder="e.g., 50000"><br><br>
                
                <label for="currency">Currency:</label>
                <select name="currency" id="currency" required>
                    <option value="INR" selected>INR (Indian Rupee)</option>
                    <option value="USD">USD (US Dollar)</option>
                    <option value="EUR">EUR (Euro)</option>
                    <option value="GBP">GBP (British Pound)</option>
                </select><br><br>
                
                <label for="unit_text">Salary Period:</label>
                <select name="unit_text" id="unit_text" required>
                    <option value="MONTH" selected>Per Month</option>
                    <option value="YEAR">Per Year</option>
                    <option value="WEEK">Per Week</option>
                    <option value="DAY">Per Day</option>
                    <option value="HOUR">Per Hour</option>
                </select><br><br>
                
                <!-- Date Information -->
                <label for="start_date">Posted Date:</label>
                <input type="date" name="date" id="start_date" required><br><br>
                
                <label for="end_date">Expire Date:</label>
                <input type="date" name="end_date" id="end_date" required><br><br>
                
                <button type="submit">Submit Job</button>
            </form>
        </div>
    </div>

    <script>
        setTimeout(function () {
            window.location.href = 'admin-job-post';
        }, 43200000);

        tinymce.init({
            selector: '#description, #responsiblities',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | link image media table | bullist numlist',
            setup: function (editor) {
                editor.on('init', function () {
                    editor.getElement().removeAttribute('required');
                });
            },
            plugins: [
                'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link',
                'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
            ],
            height: 300,
            menubar: false,
            branding: false
        });

        // FIXED: Save TinyMCE content FIRST, then validate
        document.getElementById('jobForm').addEventListener('submit', function (e) {
            // Force save TinyMCE content to form fields
            tinymce.triggerSave();
            
            // Small delay to ensure save is complete
            setTimeout(() => {
                // Validate using actual form field values
                var descContent = document.getElementById('description').value.trim();
                var respContent = document.getElementById('responsiblities').value.trim();
                
                if (descContent.length === 0) {
                    e.preventDefault();
                    alert('Please enter a job description.');
                    return;
                }
                
                if (respContent.length === 0) {
                    e.preventDefault();
                    alert('Please enter job responsibilities.');
                    return;
                }
                
                // If validation passes, submit the form
                if (descContent.length > 0 && respContent.length > 0) {
                    document.getElementById('jobForm').submit();
                }
            }, 100);
            
            // Prevent default submission initially
            e.preventDefault();
        });

        // Set today's date as minimum for both date fields
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('start_date').value = today;
            document.getElementById('start_date').min = today;
            document.getElementById('end_date').min = today;
        });
    </script>
</body>

</html>

