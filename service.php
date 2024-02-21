<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Helper For Hire</title>
    <?php
        include_once('assets/scripts/header_links.php');
    ?>
</head>

<body>
   
    <?php
         //<!--Start preloader area -->
        include_once('assets/scripts/loader.php');
        //<!--End preloader area  -->
        //<!-- Start header section -->
        include_once('assets/scripts/header.php');
        //<!-- End header section -->
    ?>
    
    <!-- Start breadcrumbs section -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrapper">
                        <h2>Our Services</h2>
                        <span><a href="index.php">Home</a><i class="bi bi-chevron-right"></i>Our Services</span>
                        <div class="arrow-down">
                            <a href="#down"><i class="bi bi-chevron-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->

    <!-- Start services-area section -->
    <section id="down" class="services-area sec-m-top">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="single-service layout-2">
                        <div class="thumb">
                            <a href=""><img src="assets/images/services/service-1.jpg" alt=""></a>
                            <div class="tag">
                                <a href="service.php">Saloon</a>
                            </div>
                            <div class="wish">
                                <a href="account.php"><i class="bi bi-suit-heart"></i></a>
                            </div>
                        </div>
                        <div class="single-inner">
                            <div class="author-info">
                                <div class="author-thumb">
                                    <img src="assets/images/services/service-author-1.png" alt="">
                                </div>
                            </div>
                            <h4><a href="service-details.php">Sed elit massa, maximus quisen fermentum auctor.</a></h4>
                            <div class="started">
                                <a href="service-details.php">View Details<span><i class="bi bi-arrow-right"></i></span></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End services-area section -->


    <!-- Start footer section --> 
    <?php
        include_once('assets/scripts/footer.php');
        include_once('assets/scripts/footer_links.php');
    ?>
    <!-- End footer section -->
</body>

</html>
