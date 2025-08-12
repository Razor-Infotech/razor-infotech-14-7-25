<?php
require 'eqc/config.php';
$query = "SELECT * FROM post";
$result = $conn->query($query);
$aboutcard = [
    ["icon" => "fa-solid fa-chart-simple", "title" => "Vision"],
    ["icon" => "fa-solid fa-clipboard-list", "title" => "Mission"],
    ["icon" => "fa-solid fa-globe", "title" => "Purpose"]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ------------------------- meta tags ----------------------------- -->
    
    <title> Job Listings | Razor Infotech</title>
    <meta name="description" content="Job Listing" />
    <meta name="keywords" content="call center providers in India, BPO outsourcing companies" />
    <meta name="robots" content="default,follow" />
    <meta name="distribution" content="Global" />
    <meta name="language" content="EN-US" />
    <meta name="doc-type" content="Public" />
    <meta name="classification" content="BPO Service Provider Company" />
    <meta name="author" content="dev_raj" />
    <meta name="Abstract" content="BPO Service Provider Company" />
    <meta name="copyright" content="Razor Infotech" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="BPO Service Provider Company" />
    <meta property="og:title" content="Job Listings | Razor Infotech" />
    <meta property="og:description" content="Job Listing" />
    <meta property="og:site_name" content="BPO Service Provider Company - Razor Infotech" />
    <meta name="twitter:card" content="BPO Service Provider Company in India" />
    <meta name="twitter:site" content="Razor Infotech - BPO Service Provider Company in India" />

    <!-- ========== Favicon Icon ========== -->
    <link rel="icon" href="assets/img/razor-img/logo/razor-fevicon.webp">
    <link rel="canonical" href="https://razorinfotech.com/jobs-view">


    <link rel="stylesheet" href="assets/css/jobs-view.css">
    <link rel="stylesheet" href="assets/css/icons.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/page.css">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <section class="main-jobs-container">
        <div class="head-container">
            <div class="head-container-image">
                <img src="assets/img/jobs/jobs-view/jobs-head-image.webp" alt="jobs-image" loading="lazy">
            </div>
            <div class="head-container-text">
                <div class="inner-head">
                    <h1> Apply at Razor Infotech for a better opportunity</h1>
                    <p>Find your next dream job at Razor Infotech! We believe in "Started to serve, building more of us." We aim to create opportunities and allow individuals by offering diverse career paths in BPO, RPO, IT solutions, and digital marketing. Join our team today, and take the next step toward a successful career!</p>
                    <a href="/about">Know More About Us</a>
                    <div class="small-cards-container">
                        <?php foreach ($aboutcard as $card): ?>
                            <a href="https://razorinfotech.com/about#vission" class="small-card">
                                <i class="<?= $card['icon'] ?>"></i>
                                <h3><?= $card['title'] ?></h3>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="middle-section-1">
        <div class="filter-section">
            <div class="filter-item">
                <i class="fa-solid fa-magnifying-glass search"></i>
                <input type="text" id="designation" placeholder="Designation">
            </div>
            <div class="filter-item">
                <i class="fa-solid fa-calendar-days search"></i>
                <input type="date" id="date-posted" />
            </div>
            <button onclick="applyFilter()">Apply Filter</button>
        </div>
    </section>
    <section class="job-listings">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div id="job_<?= $row['id'] ?>" class="result"
                     data-designation="<?= $row['title'] ?>"
                     data-date-posted="<?= $row['date'] ?>"
                     data-full-description="<?= strip_tags($row['description']) ?>"
                     data-responsibilities="<?= strip_tags($row['responsiblities']) ?>">
                    <h2><?= $row['title'] ?></h2>
                    <p class="description">
                        <i class="fa-solid fa-audio-description" style="margin-right: 1rem;"></i>
                        <?= substr(strip_tags($row['description']), 0, 100) . (strlen(strip_tags($row['description'])) > 100 ? "..." : "") ?>
                    </p>
                    <p>
                        <i class="fa-solid fa-calendar-days" style="margin-right: 1rem;"></i>
                        <?= $row['date'] ?>
                    </p>
                    <a href="job-desc.php?title=<?= $row['title'] ?>" class="view-details-button">Apply Now</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No job postings found.</p>
        <?php endif; ?>
    </section>

    <div id="jobModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle"></h2>
            <p><strong>Job Description:</strong></p>
            <div id="modalDescription" class="modal-description"></div>
            <p><strong>Key Responsibilities:</strong></p>
            <div id="modalResponsibilities" class="modal-responsibilities"></div>
            <button id="applyButton">Apply</button>
        </div>
    </div>
    <?php include 'include/footer.php'; ?>

    <script>
        function applyFilter() {
            const designation = document.getElementById("designation").value.trim();
            const datePosted = document.getElementById("date-posted").value;
            const results = document.querySelectorAll(".result");
            results.forEach(result => {
                let show = true;
                if (designation !== "" && designation !== "all") {
                    const itemDesignation = result.getAttribute("data-designation");
                    if (itemDesignation !== designation) {
                        show = false;
                    }
                }
                if (datePosted !== "") {
                    const itemDatePosted = result.getAttribute("data-date-posted");
                    if (itemDatePosted !== datePosted) {
                        show = false;
                    }
                }
                result.style.display = show ? "block" : "none";
            });
        }
        function showModal(jobId) {
            const modal = document.getElementById("jobModal");
            const job = document.getElementById(`job_${jobId}`);
            if (!job) return;
            const title = job.querySelector("h2").innerText;
            const fullDescription = job.getAttribute("data-full-description");
            const responsibilities = job.getAttribute("data-responsibilities");
            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalDescription").innerText = fullDescription;
            document.getElementById("modalResponsibilities").innerText = responsibilities;
            const button = document.getElementById("applyButton");
            button.onclick = function () {
                window.location.href = `https://razorinfotech.com/career#career-form`;
            };
            modal.style.display = "block";
        }
        function closeModal() {
            document.getElementById("jobModal").style.display = "none";
        }
        window.onclick = function (event) {
            const modal = document.getElementById("jobModal");
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
     <?php include 'include/footer-style.php' ?>
</body>

</html>
<?php
$conn->close();
?>
