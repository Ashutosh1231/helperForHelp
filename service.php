<?php
    include_once('includes/classes.php');
    $db = new DB();
    $service = new service($db->conn);
    $result = $service->fetchByStatus(1);

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
                
                <?php
                    if($result['status'] == 'success'){
                        foreach($result['data'] as $service){
                            ?>
                            <div class="col-md-6 col-lg-4 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="single-service layout-2">
                                    <div class="thumb">
                                        <a href=""><img src="assets/images/services/service-1.jpg" alt=""></a>
                                        <div class="tag">
                                            <a href="service-details.php?service_id=<?=$service['id'];?>"><?=$service['name']?></a>
                                        </div>
                                    </div>
                                    <div class="single-inner">
                                        <h4><a href="service-details.php?service_id=<?=$service['id'];?>"><?=$service['name']?></a></h4>
                                        <p><?=html_entity_decode($service['short_desc']);?></p>
                                        <div class="started">
                                            <a href="service-details.php?service_id=<?=$service['id'];?>">View Details<span><i class="bi bi-arrow-right"></i></span></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
                    
                
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
