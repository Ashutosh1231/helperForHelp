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
                            <h2>404</h2>
                            <span><a href="index.html">Home</a><i class="bi bi-chevron-right"></i>404</span>
                            <div class="arrow-down">
                                <a href="#down"><i class="bi bi-chevron-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumbs section -->

        <!-- Start error-area section -->
        <section class="error-area sec-m">
            <div class="container">
                <div class="error-content">
                    <h2>Sorry we can’t find that page</h2>
                    <p>The page you are looking for was moved, removed, renamed or never existed</p>
                    <div class="cmn-btn">
                        <a href="index.php">Back Home</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End error-area section -->

        <!-- Start footer section --> 
        <?php
            include_once('assets/scripts/footer.php');
            include_once('assets/scripts/footer_links.php');
        ?>
        <!-- End footer section -->
    </body>

</html>
