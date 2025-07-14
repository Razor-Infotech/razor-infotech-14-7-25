<?php
header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="dev_raj">
    <!-- ======== Page title ============ -->
    <title>404 | Razor Infotech</title>
    <!-- ========== Favicon Icon ========== -->
    <link rel=" icon" href="assets/img/razor-img/logo/razor-fevicon.webp" >
    <link rel="canonical" href="https://razorinfotech.com/404">
    <!-- ===========  All Stylesheet ================= -->
    <?php include 'include/head-style.php' ?>
</head>


<body class="body-wrapper">
    <?php include 'include/header.php' ?>


 <section class="error pb-xs-80 mt-5 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error__content text-center wow fadeInUp" data-wow-delay=".3s">
                        <div class="media mb-xs-40 mb-sm-45 mb-md-50 mb-lg-60 mb-80">
                            <img src="./assets/img/404/404.webp" class="img-fluid" alt="404 img" width="895" height="520">
                        </div>

                        <div class="text">
                            <h1 class="title mb-xs-10 mb-20 color-d_black">Oops! Nothing Was Found</h1>
                         

                            <a href="./" class="theme-btn">Back To Homepage </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team-area end -->

    <?php include 'include/footer.php' ?>


<!--  ALl JS Plugins -->

   <?php include 'include/footer-style.php' ?>

</body>


</html>