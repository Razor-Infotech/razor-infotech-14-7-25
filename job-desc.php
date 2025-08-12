<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Details</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/job-description.css">
  <link rel="stylesheet" href="assets/css/icons.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="icon" href="assets/img/razor-img/logo/razor-fevicon.webp" type="image/webp">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/page.css">
</head>
<body>
<?php include 'include/header.php'; ?>
  <div class="con">
    <div class="content-row">
      <!-- Job Results Side -->
      <div class="job-results">
        <?php
        require 'eqc/config.php';

        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $title = $conn->real_escape_string($_GET['title']);
            $query = "SELECT * FROM post WHERE title = '$title'";
        } else {
            die("Title parameter is missing.");
        }

        $result = $conn->query($query);
        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="job-card">';
                echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
                
                echo '<div class="section-title">Job Description</div>';
               echo '<p>' . nl2br($row['description']) . '</p>';

                
                echo '<div class="section-title">Responsibilities</div>';
                echo '<p>' . nl2br(htmlspecialchars($row['responsiblities'])) . '</p>';
                
                echo '<div class="job-dates">';
                echo '<span><i class="far fa-calendar-alt"></i> Posted: ' . htmlspecialchars($row['date']) . '</span>';
                echo '<span><i class="far fa-calendar-check"></i> Apply by: ' . htmlspecialchars($row['end_date']) . '</span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="job-card"><p>No results found.</p></div>';
        }
        ?>
      </div>
      <div class="career-form">
        <div class="form-title">Apply for this Position</div>
        <form id="career-form" action="./career-form-submit" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="single-personal-info">
              <label for="name">Full Name</label>
              <input type="text" id="name" name="name" placeholder="Your Full Name" required>
            </div>
            <div class="single-personal-info">
              <label for="email">Email Address</label>
              <input type="email" name="email" id="email" placeholder="Your e-mail" required>
            </div>
          </div>
          
          <div class="row">
            <div class="single-personal-info">
              <label for="phone">Phone Number</label>
              <input type="tel" id="phone" name="phone" placeholder="Phone No." pattern="[0-9]{10}" maxlength="10" required title="Phone number should be 10 digits">
            </div>
            <div class="single-personal-info">
              <label for="dsg">Current Designation</label>
              <input type="text" id="dsg" name="dsg" placeholder="Current Designation" required>
            </div>
          </div>
          
          <div class="row">
            <div class="single-personal-info">
              <label for="ctc">Current CTC</label>
              <input type="text" id="ctc" name="ctc" placeholder="Current CTC" required>
            </div>
            <div class="single-personal-info">
              <label for="applyforthepost">Position Applied For</label>
              <input type="text" id="applyforthepost" name="applyforthepost" placeholder="Apply for the post" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="keyskill">Key Skills</label>
            <textarea id="keyskill" name="keyskill" placeholder="List your key skills and strengths"></textarea>
          </div>
          
          <div class="row">
            <div class="single-personal-info">
              <label for="totalworkexperience">Total Experience</label>
              <select class="form-control" id="totalworkexperience" name="totalworkexperience">
                <option>Fresher</option>
                <option>Less Than 1 Year</option>
                <option>Less Than 2 Year</option>
                <option>Less Than 3 Year</option>
                <option>Less Than 4 Year</option>
                <option>Less Than 5 Year</option>
                <option>More Than 5 Year</option>
              </select>
            </div>
            
            <div class="single-personal-info">
              <div class="file-upload">
                <label for="resume">
                  <i class="fas fa-cloud-upload-alt"></i>
                  <span>Upload your resume (PDF, DOC, DOCX)</span>
                </label>
                <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
              </div>
            </div>
          </div>
          
          <button type="submit">Apply Now <i class="fas fa-arrow-right"></i></button>
        </form>
      </div>
    </div>
  </div>
  <?php include 'include/footer.php'; ?>

  <script>
    // Display the name of the uploaded file
    document.getElementById('resume').addEventListener('change', function(e) {
      const fileName = e.target.files[0].name;
      const label = this.previousElementSibling;
      label.innerHTML = `<i class="fas fa-file-alt"></i><span>${fileName}</span>`;
    });
  </script>



     <?php include 'include/footer-style.php' ?>


</body>
</html>