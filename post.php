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
    header('Location: admin-job-post.php');
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
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required><br><br>
                <label for="description">Description:</label>
                <textarea name="description" id="description" required></textarea><br><br>
                <label for="responsibilities">Responsibilities:</label>
                <textarea name="responsiblities" id="responsiblities" required></textarea><br><br>
                <label for="start_date">Date:</label>
                <input type="date" name="date" id="start_date" required><br><br>
                <label for="end_date">Expire-Date:</label>
                <input type="date" name="end_date" id="end_date" required><br><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>



    <script>
        setTimeout(function () {
            window.location.href = 'admin-job-post';
        }, 43200000);

        tinymce.init({
            selector: '#description',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | link image media table',
            setup: function (editor) {
                editor.on('init', function () {
                    document.getElementById('description').removeAttribute('required');
                });
            },
            plugins: [
                'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link',
                'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
            ],
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' }
            ],
            ai_request: (request, respondWith) =>
                respondWith.string(() => Promise.reject('See docs to implement AI Assistant'))
        });

        document.getElementById('jobForm').addEventListener('submit', function (e) {
            var content = tinymce.get('description').getContent({ format: 'text' }).trim();
            if (content.length === 0) {
                e.preventDefault();
                alert('Please enter a description.');
            } else {
                tinymce.triggerSave();
            }
        });
    </script>
</body>

</html>