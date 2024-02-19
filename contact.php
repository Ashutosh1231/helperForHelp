<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SERVE - On Demand Services HTML Template</title>
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
                        <h2>Contact Us</h2>
                        <span><a href="index.html">Home</a><i class="bi bi-chevron-right"></i>Contact Us</span>
                        <div class="arrow-down">
                            <a href="#down"><i class="bi bi-chevron-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->

    <!-- Start contact-us-area section -->
    <section id="down" class="contact-us-area sec-m">
        <div class="container">
            <div class="contact-info">
                <div class="row gy-4 align-items-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="info">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="desc">
                                <h4>Location</h4>
                                <p>168/170, Ave 01, York Drive Rich Mirpur, Dhaka-1216</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="info">
                            <div class="icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="desc">
                                <h4>Phone</h4>
                                <a href="tel:01761111456">+880 176 1111 456</a>
                                <a href="tel:01761111555">+880 176 1111 555</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="info">
                            <div class="icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="desc">
                                <h4>Message Us</h4>
                                <a href="mailto:info@example.com">info@example.com</a>
                                <a href="mailto:info@support.com">info@support.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <span>We’re Ready To Help You</span>
                <h2>Send Us Message</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmodesmu.</p>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="name" placeholder="Your Name :">
                        </div>
                        <div class="col-lg-6">
                            <input type="email" name="email" placeholder="Your Email :">
                        </div>
                        <div class="col-12">
                            <input type="text" name="subject" placeholder="Subject">
                            <input type="number" name="subject" placeholder="Mobile No.">
                            <textarea name="message" cols="30" rows="10" placeholder="Write Message :"></textarea>
                            <input type="submit" value="Send Message">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End contact-us-area section -->

    <!-- Start Google Map section -->
    <div class="google-map">
        <div class="container-fluid p-0">
            <div class="gmap_canvas">
                <iframe id="gmap_canvas" src="https://maps.app.goo.gl/vFkGm3yTSm7JeK7o7"></iframe>
            </div>
        </div>
    </div>
    <!-- End GOogle Map section -->

    <!-- Start footer section --> 
    <?php
        include_once('assets/scripts/footer.php');
        include_once('assets/scripts/footer_links.php');
    ?>
    <!-- End footer section -->
</body>

</html>
