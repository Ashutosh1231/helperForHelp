<?php
    include_once("includes/classes.php");
    $db = new DB();
    if(isset($_GET['id']) and $_GET['id'] > 0){
        $id = $_GET['id'];
        $service = new service($db->conn);
        $servicecity = new ServiceCity($db->conn);
        $serviceresult = $service->fetchById($id);
        if($serviceresult['status'] == 'success'){
            $servicecityresult = $servicecity->fetchByServiceIdandStatus($id,1);        
        }
        else{
            header('location:index.php');
        }
    }
    else{
        header('location:index.php');
    }
    

?>
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
    
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrapper">
                        <h2>Service Details</h2>
                        <span><a href="index.php">Home</a><i class="bi bi-chevron-right"></i>Service Details</span>
                        <div class="arrow-down">
                            <a href="#down"><i class="bi bi-chevron-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->

    <!-- Start services-details-area section -->
    <section id="down" class="services-details-area sec-m-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details">
                        <div class="service-details-thumbnail">
                            <img src="assets/images/services/service-details.jpg" alt="">
                        </div>
                        <H2><?=$serviceresult['data']['name'];?></H2>
                        <div class="service-tabs wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="service-overview  wow animate fadeInRight" data-wow-delay="400ms" data-wow-duration="1500ms">
                                        <h4>Plumbing Training</h4>
                                        <p>Obtain pain of because is pain, but because you nally circumstances more than some work um soluta nobis est eligendi optio cumque nihil impedit quo minus id quodOne advanced diverted domestic repeated bringing you old. Possible procured her trifling</p>
                                        <div class="package">
                                            <h4>Our Package</h4>
                                            <ul class="package-list">
                                                <li><i class="bi bi-check-all"></i>Page Load (time, size, number of requests).</li>
                                                <li><i class="bi bi-check-all"></i>Adance Data analysis operation.</li>
                                            </ul>
                                        </div>
                                        <div class="include-exclude">
                                            <h4>What’s Included</h4>
                                            <ul>
                                                <li><i class="bi bi-circle-fill"></i>There are many variations of passages of Lorem Ipsum.</li>
                                                <li><i class="bi bi-circle-fill"></i>Water Heater Repair Services</li>
                                                <li><i class="bi bi-circle-fill"></i>Toilet Repair</li>
                                            </ul>
                                        </div>
                                        <div class="include-exclude">
                                            <h4>What’s Excluded</h4>
                                            <ul>
                                                <li><i class="bi bi-circle-fill"></i>Price of additional materials or parts (if needed)</li>
                                                <li><i class="bi bi-circle-fill"></i>Transportation cost for carrying new materials/parts (if applicable)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <div class="service-widget wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="service-pack">
                                <h4>Service Package </h4>
                                <div class="package">
                                    <h4>Features</h4>
                                    <ul class="package-list">
                                        <?=$serviceresult['data']['features'];?>
                                    </ul>
                                </div>
                                <form action="getcustomerinfo.php" method="POST" name="precustomerinfo" id="precustomerinfo">
                                    <div class="form-group">
                                        <select name="servicecity" id="servicecity" required>
                                            <?php
                                                if($servicecityresult['status'] == 'success'){
                                                    $city = new city($db->conn);
                                                    foreach($servicecityresult['data'] as $servicecity){
                                                        $cityresult = $city->fetchByIdandStatus($servicecity['city_id'],1);
                                                        $cityname = $cityresult['data'][0]['name'];
                                                        ?>
                                                        
                                                        <option value="<?=$servicecity['id'];?>"><?=$cityname;?></option>';
                                                        <?php
                                                    }
                                                }  
                                            ?>
                                        </select>
                                    </div>
                                <div class="book-btn">
                                    <button type="submit">Order Now</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End services-details-area section -->

    <!-- Start other-services section -->
    <section class="other-services-two sec-m-top">
        <div class="container">
            <div class="other-services">
                <h3>Other Services</h3>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="single-service layout-2">
                            <div class="thumb">
                                <a href="service-details.php"><img src="assets/images/services/service-1.jpg" alt=""></a>
                                <div class="tag">
                                    <a href="service.php">Saloon</a>
                                </div>
                            </div>
                            <div class="single-inner">
                                <h4><a href="service-details.php">Sed elit massa, maximus quisen fermentum auctor.</a></h4>
                                <div class="started">
                                    <a href="service-details.php">View Details<span><i class="bi bi-arrow-right"></i></span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End other-services section -->

    <!-- Start footer section --> 
    <?php
        include_once('assets/scripts/footer.php');
        include_once('assets/scripts/footer_links.php');
    ?>
    <!-- End footer section -->
</body>

</html>
