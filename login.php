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
                            <h2>Log In</h2>
                            <span><a href="index.html">Home</a><i class="bi bi-chevron-right"></i>Log In</span>
                            <div class="arrow-down">
                                <a href="#down"><i class="bi bi-chevron-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumbs section -->

        <!-- Start login-area section -->
        <section id="down" class="login-area sec-p">
            <div class="container">
                <div class="login-form">
                    <h3>Log In</h3>
                    <span>New Member? <a href="signUp.php">SignUp here</a></span>
                    <form action="login.html" method="get">
                        <label for="email">Email*
                            <input type="email" name="email" id="email" placeholder="Your Email Here">
                        </label>
                        <label for="password">Password*
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                            <input type="password" name="email" id="password" placeholder="Type Your Password">
                        </label>
                        <div class="terms-forgot">  
                            <a href="#">Forgot Your Password</a>
                        </div>
                        <input type="submit" value="Create Account">
                    </form>
                    <p style="margin-top: 20px">By clicking the "Sign up" button, you create a Cobiro account, and you agree to Cobiro's <a href="termsOfUse.php">Terms & Conditions</a> & <a href="privacyPolicy.php">Privacy Policy.</a></p>
                </div>
            </div>
        </section>
        <!-- End login-area section -->

        <!-- Start footer section --> 
        <?php
            include_once('assets/scripts/footer.php');
            include_once('assets/scripts/footer_links.php');
        ?>
        <!-- End footer section -->
    </body>

</html>
