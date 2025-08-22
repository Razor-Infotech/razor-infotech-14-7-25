<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); 
header("Expires: 0"); 
$jobId = $_GET['id'] ?? '';
if (!$jobId) {
    echo "No job ID provided.";
    exit;
}

// 2) Node API endpoint
$apiUrl = "https://jobs.razorinfotech.com/jobs/$jobId";

$response = @file_get_contents($apiUrl);
if ($response === false) {
    echo "Error calling the Node API.";
    exit;
}

$data = json_decode($response, true);
if (!isset($data['success']) || !$data['success'] || !isset($data['job'])) {
    echo "Job not found or invalid response.";
    exit;
}

$job = $data['job'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="dev_raj">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="We provide jobs in Web Developer, BPO, etc.">
  <title><?= htmlspecialchars($job['jobTitle'] ?? 'Job Detail') ?> | Razor Infotech</title>
  <link rel=" icon" href="assets/img/razor-img/logo/razor-fevicon.webp">
    <link rel="stylesheet" href="assets/css/icons.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/job-description.css">
    <link rel="stylesheet" href="assets/css/page.css">
</head>

<body class="body-wrapper">
<?php include 'include/header.php' ?>

  <div class="page-container">
    <div class="job-grid">
      
      <div class="card">
        <div class="top-row">
          <h2 class="purple-heading text-2xl text-3xl-responsive">
            <?= htmlspecialchars($job['jobTitle'] ?? 'No Title') ?>
          </h2>
          <a href="https://razorinfotech.com/career#career-form"
             class="apply-btn">
             <i class="fa fa-paper-plane"></i> Apply Now
          </a>
        </div>

        <div class="mt-6 text-gray-700 text-sm text-base-responsive">
          <p>
            <i class="fa fa-map-marker icon-purple"></i>
            <b>Location:</b>
            <?= htmlspecialchars($job['addressLocality'] ?? '') ?>,
            <?= htmlspecialchars($job['streetAddress'] ?? '') ?>,
            <?= htmlspecialchars($job['postalCode'] ?? '') ?>
          </p>
          <p>
            <i class="fa fa-building icon-purple"></i>
            <b>Company:</b>
            <?= htmlspecialchars($job['companyName'] ?? '') ?>
          </p>
          <p>
            <i class="fa fa-calendar icon-purple"></i>
            <b>Date Posted:</b>
            <?php 
              if (!empty($job['datePosted'])) {
                echo htmlspecialchars(date('m/d/Y', strtotime($job['datePosted'])));
              } else {
                echo 'N/A';
              }
            ?>
          </p>
          <p>
            <i class="fa fa-clock icon-purple"></i>
            <b>Employment Type:</b>
            <?= htmlspecialchars($job['employmentType'] ?? '') ?>
          </p>

        </div>

        <!-- Description -->
        <div class="mt-6">
          <h3 class="description text-lg font-semibold">Description:</h3>
          <p class="text-gray-600 mt-2 text-sm text-base-responsive">
            <?= $job['jobDescription'] ?? '' ?>
          </p>
        </div>

        <!-- Key Responsibilities -->
        <div class="mt-6">
          <h3 class="responsibilites text-lg font-semibold text-white">Key Responsibilities:</h3>
          <ul class="mt-2 text-sm text-base-responsive">
            <?php if (!empty($job['responsibilities']) && is_array($job['responsibilities'])): ?>
              <?php foreach ($job['responsibilities'] as $resp): ?>
                <li class="bg-gray-100 rounded-item">
                  <i class="fa fa-check-circle icon-purple"></i>
                  <?= htmlspecialchars($resp) ?>
                </li>
              <?php endforeach; ?>
            <?php else: ?>
              <li class="bg-gray-100 rounded-item">No responsibilities listed.</li>
            <?php endif; ?>
          </ul>
        </div>

        <div class="mt-6">
          <h3 class="requirements text-lg font-semibold">Requirements:</h3>
          <ul class="mt-2 text-sm text-base-responsive">
            <?php if (!empty($job['qualifications']) && is_array($job['qualifications'])): ?>
              <?php foreach ($job['qualifications'] as $qual): ?>
                <li class="bg-gray-100 rounded-item">
                  <i class="fa fa-check-circle icon-purple"></i>
                  <?= htmlspecialchars($qual) ?>
                </li>
              <?php endforeach; ?>
            <?php else: ?>
              <li class="bg-gray-100 rounded-item">No qualifications listed.</li>
            <?php endif; ?>
          </ul>
        </div>
      </div>

      <div class="card">
        <h1 class="purple-heading text-xl">
          ABOUT US
        </h1>
        <p class="text-gray-600 mt-4 text-sm text-base-responsive">
          Razor Infotech was born from a desire to deliver high standards
          and consistency in both web and App Design and Development.
          We offer a unique, creative, and technical vision.
        </p>
        <p class="text-gray-600 mt-4 text-sm text-base-responsive">
          Razor Infotech is a fast-growing design and development company in
          Gurugram, providing Web Design, Web Development, and Digital Marketing solutions.
        </p>
      </div>
    </div>
  </div>

  <?php include 'include/footer.php'; ?>

      
 <?php include 'include/footer-style.php' ?>
</body>
</html>
