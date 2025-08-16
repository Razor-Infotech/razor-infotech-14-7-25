<?php
require 'eqc/config.php';
$query = "SELECT * FROM post ORDER BY date DESC";
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
    
    <title>Job Listings | Razor Infotech</title>
    <meta name="description" content="Job Listing - Find your dream career at Razor Infotech" />
    <meta name="keywords" content="call center providers in India, BPO outsourcing companies, jobs, careers" />
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
    <meta property="og:description" content="Job Listing - Find your dream career at Razor Infotech" />
    <meta property="og:site_name" content="BPO Service Provider Company - Razor Infotech" />
    <meta name="twitter:card" content="BPO Service Provider Company in India" />
    <meta name="twitter:site" content="Razor Infotech - BPO Service Provider Company in India" />

    <!-- ========== Favicon Icon ========== -->
    <link rel="icon" href="assets/img/razor-img/logo/razor-fevicon.webp">
    <link rel="canonical" href="https://razorinfotech.com/jobs-view">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/jobs-view.css">
    <link rel="stylesheet" href="assets/css/icons.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/page.css">
    
    <!-- Enhanced Styling -->
    <style>
        .job-listings {
            width: 100%;
            margin: 0 auto;
            padding: 40px 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 60vh;
            margin-bottom: 2rem;
        }

        .result {
            background: #ffffff;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 5px solid #007bff;
            position: relative;
            overflow: hidden;
        }

        .result::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #007bff, #28a745, #ffc107);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .result:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-left-color: #28a745;
        }

        .result:hover::before {
            opacity: 1;
        }

        .result h2 {
            color: #2c3e50;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .result h2::before {
            content: '💼';
            font-size: 1.5rem;
        }

        .result .description {
            color: #555;
            height: 100%;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 15px;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 3px solid #007bff;
        }

        .result p {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            color: #666;
            font-weight: 500;
        }

        .result p i {
            color: #007bff;
            font-size: 1.1rem;
            margin-right: 10px;
            width: 20px;
        }

        .view-details-button {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .view-details-button:hover {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
            color: white;
            text-decoration: none;
        }

        .view-details-button::after {
            content: '→';
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .view-details-button:hover::after {
            transform: translateX(5px);
        }

        .filter-section {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-item {
            position: relative;
            flex: 1;
            min-width: 200px;
        }

        .filter-item input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .filter-item input:focus {
            outline: none;
            border-color: #007bff;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        .filter-item i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #007bff;
            font-size: 1.1rem;
        }

        .filter-section button {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 15px 35px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 150px;
        }

        .filter-section button:hover {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
        }

        .no-jobs {
            text-align: center;
            padding: 60px 20px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .no-jobs i {
            font-size: 4rem;
            color: #007bff;
            margin-bottom: 20px;
        }

        .no-jobs h3 {
            color: #2c3e50;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .no-jobs p {
            color: #666;
            font-size: 1.1rem;
        }

        /* Modal Improvements */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 40px;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .close {
            color: #999;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #007bff;
        }

        #applyButton {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        #applyButton:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .filter-section {
                flex-direction: column;
                padding: 20px;
            }
            
            .filter-item {
                width: 100%;
            }
            
            .result {
                padding: 20px;
            }
            
            .result h2 {
                font-size: 1.5rem;
            }
        }
    </style>
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
                    <h1>Apply at Razor Infotech for a better opportunity</h1>
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
                <input type="text" id="designation" placeholder="Search by designation...">
            </div>
            <div class="filter-item">
                <input type="date" id="date-posted" placeholder="Filter by date" />
            </div>
            <button onclick="applyFilter()">
                <i class="fa-solid fa-filter" style="margin-right: 8px;"></i>
                Apply Filter
            </button>
            <button onclick="clearFilter()" style="background: linear-gradient(135deg, #6c757d, #495057);">
                <i class="fa-solid fa-times" style="margin-right: 8px;"></i>
                Clear
            </button>
        </div>
    </section>
    
    <section class="job-listings">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div id="job_<?= $row['id'] ?>" class="result"
                     data-designation="<?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') ?>"
                     data-date-posted="<?= htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') ?>"
                     data-full-description="<?= htmlspecialchars(strip_tags($row['description']), ENT_QUOTES, 'UTF-8') ?>"
                     data-responsibilities="<?= htmlspecialchars(strip_tags($row['responsiblities']), ENT_QUOTES, 'UTF-8') ?>">
                    
                    <h2><?= htmlspecialchars($row['title']) ?></h2>
                    
                    <div class="description">
                        <i class="fa-solid fa-audio-description"></i>
                        <?php 
                        $description = strip_tags($row['description']);
                        echo htmlspecialchars(substr($description, 0, 150) . (strlen($description) > 150 ? "..." : ""));
                        echo '<h1>Salary ' . htmlspecialchars($row['salary_value']) . '</h1>';
                        ?>
                    </div>
                    
                    <p>
                        <i class="fa-solid fa-calendar-days"></i>
                        Posted on: <?= htmlspecialchars(date('F j, Y', strtotime($row['date']))) ?>
                    </p>
                    
                    <div style="display: flex; gap: 15px; align-items: center; margin-top: 20px;">
                        <a href="job-desc.php?title=<?= urlencode($row['title']) ?>" class="view-details-button">
                            Apply Now
                        </a>
                        
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="no-jobs">
                <i class="fa-solid fa-briefcase"></i>
                <h3>No Job Openings Available</h3>
                <p>We're currently not hiring, but check back soon for new opportunities!</p>
            </div>
        <?php endif; ?>
    </section>

    <div id="jobModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle" style="color: #2c3e50; margin-bottom: 20px;"></h2>
            
            <div style="margin-bottom: 25px;">
                <h4 style="color: #007bff; margin-bottom: 10px;">
                    <i class="fa-solid fa-file-text" style="margin-right: 8px;"></i>
                    Job Description:
                </h4>
                <div id="modalDescription" class="modal-description" 
                     style="background: #f8f9fa; padding: 15px; border-radius: 8px; line-height: 1.6;"></div>
            </div>
            
            <div style="margin-bottom: 25px;">
                <h4 style="color: #28a745; margin-bottom: 10px;">
                    <i class="fa-solid fa-tasks" style="margin-right: 8px;"></i>
                    Key Responsibilities:
                </h4>
                <div id="modalResponsibilities" class="modal-responsibilities" 
                     style="background: #f8f9fa; padding: 15px; border-radius: 8px; line-height: 1.6;"></div>
            </div>
            
            <a href='/job-desc?title=<?= urlencode($row['title']) ?>' id="applyButton">
                <i class="fa-solid fa-paper-plane" style="margin-right: 8px;"></i>
                Apply Now
            </a>
        </div>
    </div>
    
    <?php include 'include/footer.php'; ?>

    <script>
        function applyFilter() {
            const designation = document.getElementById("designation").value.trim().toLowerCase();
            const datePosted = document.getElementById("date-posted").value;
            const results = document.querySelectorAll(".result");
            let visibleCount = 0;
            
            results.forEach(result => {
                let show = true;
                
                if (designation !== "") {
                    const itemDesignation = result.getAttribute("data-designation").toLowerCase();
                    if (!itemDesignation.includes(designation)) {
                        show = false;
                    }
                }
                
                if (datePosted !== "") {
                    const itemDatePosted = result.getAttribute("data-date-posted");
                    if (itemDatePosted !== datePosted) {
                        show = false;
                    }
                }
                
                if (show) {
                    result.style.display = "block";
                    result.style.animation = "fadeIn 0.5s ease";
                    visibleCount++;
                } else {
                    result.style.display = "none";
                }
            });
            showNoResultsMessage(visibleCount === 0);
        }

        function clearFilter() {
            document.getElementById("designation").value = "";
            document.getElementById("date-posted").value = "";
            const results = document.querySelectorAll(".result");
            results.forEach(result => {
                result.style.display = "block";
            });
            hideNoResultsMessage();
        }

        function showNoResultsMessage(show) {
            let message = document.getElementById("no-results-message");
            if (show && !message) {
                message = document.createElement("div");
                message.id = "no-results-message";
                message.className = "no-jobs";
                message.innerHTML = `
                    <i class="fa-solid fa-search"></i>
                    <h3>No Jobs Found</h3>
                    <p>Try adjusting your search criteria or check back later for new opportunities!</p>
                `;
                document.querySelector(".job-listings").appendChild(message);
            } else if (!show && message) {
                message.remove();
            }
        }

        function hideNoResultsMessage() {
            const message = document.getElementById("no-results-message");
            if (message) {
                message.remove();
            }
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
                window.location.href = `https://razorinfotech.com/job-desc?${title}`;
            };
            
            modal.style.display = "block";
            document.body.style.overflow = "hidden";
        }

        function closeModal() {
            document.getElementById("jobModal").style.display = "none";
            document.body.style.overflow = "auto"; 
        }

        window.onclick = function (event) {
            const modal = document.getElementById("jobModal");
            if (event.target == modal) {
                closeModal();
            }
        }

        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
        `;
        document.head.appendChild(style);
    </script>
    
    <?php include 'include/footer-style.php' ?>
</body>
</html>

<?php
$conn->close();
?>
