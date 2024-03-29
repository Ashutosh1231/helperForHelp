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
                                        <?=html_entity_decode($serviceresult['data']['long_desc']);?>
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
                                        <?=html_entity_decode($serviceresult['data']['features']);?>
                                    </ul>
                                </div>
                                <div class="form-city">
                                <form action="getcustomerinfo.php" method="POST" name="precustomerinfo" id="precustomerinfo">
                                    <div>
                                        <select name="servicecity" id="servicecity" required>
                                            <?php
                                                if($servicecityresult['status'] == 'success'){
                                                    $city = new city($db->conn);
                                                    foreach($servicecityresult['data'] as $servicecity){
                                                        $cityresult = $city->fetchByIdandStatus($servicecity['city_id'],1);
                                                        if($cityresult['status'] == 'success'){
                                                            $cityname = $cityresult['data'][0]['name'];
                                                            ?>
                                                        
                                                            <option value="<?=$servicecity['id'];?>"><?=$cityname;?></option>';
                                                            <?php
                                                        }
                                                    }
                                                }  
                                            ?>
                                        </select>
                                        <div>
                                            <button type="submit">Order Now</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
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
