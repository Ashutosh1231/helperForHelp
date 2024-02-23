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
                            <h2>Add Address</h2>
                            <span><a href="index.html">Home</a><i class="bi bi-chevron-right"></i>Add Address</span>
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
                <div class="login-form" id="address">
                    <h3>Add Address</h3>
                    
                    <form action="login.php" method="get">
                        <label for="addressf">Address*
                            <input type="text" name="address" id="addressf" placeholder="Your Address Here" required>
                        </label>
                        <label style="margin-bottom: 5px;">City*</label>
                            <select name="city" id="city" required>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Kolkata">Kolkata</option>
                            </select>
                        
                        <label for="pincode">Pincode*
                            <input type="number" name="pincode" id="pincode" placeholder="Your Pincode Here" required>
                        </label>
                        
                        <input type="submit" value="Confirm Enquiry">
                    </form>
                    
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
    <script>
        $(document).ready(function() {
            $('select').niceSelect();
        });    
    </script>
</html>
