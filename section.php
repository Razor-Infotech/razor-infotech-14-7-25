<?php
// Example: A responsive section with Bootstrap
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Responsive Tour Section</title>
  <!-- Include your Bootstrap 5 CSS (or link from CDN) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- (Optional) Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    /* Custom styling for the right big image */
    .tour-image {
      background: url("https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHRlY2h8ZW58MHx8MHx8fDA%3D") no-repeat center center;
      background-size: cover;
      /* ensures a minimum vertical height */
      min-height: 500px;
      position: relative;
      color: #fff;
    }
    /* Over a dim overlay, optional */
    .tour-image::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.4);
      z-index: 1;
    }
    .tour-image-content {
      position: relative;
      z-index: 2;
      padding: 2rem;
    }

    .tour-card {
      border: none;
      border-radius: 0.5rem;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .tour-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .tour-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }
    /* The circle rating, example for the 4 circles */
    .rating-circles {
      display: inline-block;
    }
    .rating-circles span {
      display: inline-block;
      width: 10px; height: 10px;
      border-radius: 50%;
      background: #ccc;
      margin-right: 4px;
    }
    .rating-circles span.active {
      background: #fbc531; /* gold color for active rating */
    }
  </style>
</head>

<body>
  <div class="container-fluid px-0">
    <div class="row g-0">
      <!-- LEFT SIDE (Text & Cards) -->
      <div class="col-12 col-lg-6 p-5 d-flex flex-column align-items-start justify-content-center">
        <h1 class="display-5 fw-bold mb-3">Best Package Tour For You</h1>
        <p class="lead mb-3">
          Est pellentesque commodo, ipsum, imperdiet aliquam sed. Vitae ut proin est leo consequat. 
          Vulputate aliquam, arcu egestas quam magnis ornare massa.
        </p>
        <div class="mb-2">
          <!-- Example for 4 rating circles + label -->
          <span class="rating-circles">
            <span class="active"></span>
            <span class="active"></span>
            <span class="active"></span>
            <span class="active"></span>
            <!-- if you want 5 circles, add one more <span> -->
          </span>
          <small class="ms-2 text-muted">40+ Happy Visitors</small>
        </div>
        <button class="btn btn-primary mb-4">Booking Now</button>

        <!-- Cards Slider (Example using row or carousel) -->
        <!-- Simple row of 3 cards, horizontally scrollable on small devices -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <!-- Card 1 -->
          <div class="col">
            <div class="card tour-card">
              <img src="path-to-img1.jpg" alt="Tour image 1">
              <div class="card-body">
                <h6 class="card-title mb-1">Sky cood sea resort</h6>
                <p class="small text-muted mb-0">Woali Musa, Jordan</p>
              </div>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="col">
            <div class="card tour-card">
              <img src="path-to-img2.jpg" alt="Tour image 2">
              <div class="card-body">
                <h6 class="card-title mb-1">World Class VR</h6>
                <p class="small text-muted mb-0">Most advanced experiences</p>
              </div>
            </div>
          </div>
          <!-- Card 3 -->
          <div class="col">
            <div class="card tour-card">
              <img src="path-to-img3.jpg" alt="Tour image 3">
              <div class="card-body">
                <h6 class="card-title mb-1">Old cathedral in Venice</h6>
                <p class="small text-muted mb-0">Historic architecture</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT SIDE (Big Image / Slider) -->
      <div class="col-12 col-lg-6 tour-image">
        <div class="tour-image-content h-100 d-flex flex-column justify-content-center">
          <!-- Simple location & arrow nav example -->
          <div class="text-end">
            <h3 class="fs-4 fw-bold">Piúva, SP, Brazil</h3>
            <p class="mb-3">See Detail</p>
            <!-- You could add "Next / Prev" arrows here if you have a slider -->
            <button class="btn btn-outline-light me-2"><i class="fas fa-chevron-left"></i></button>
            <button class="btn btn-outline-light"><i class="fas fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
