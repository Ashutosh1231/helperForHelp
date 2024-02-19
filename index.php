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
    


    
    

    <!-- Start hero-area section -->
    <section class="hero-area">
        <div class="container-fluid">
            <div class="hero-wrapper">
                <div class="hero-content wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <span>Welcome Our Service Sale</span>
                    <h1>Nonstop Services Life Better.</h1>
                    <p>Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metus. answerala and
                        Suspendisse potenti. Nullam ac lorem ex. Ut feugiat maximus ante, vel gravida exel
                        volutpat at.</p>
                    <div class="find-service">
                        <div class="location-search">
                            <div class="location-btn">
                                <i><img src="assets/images/icons/location.svg" alt=""></i>
                                <select class="loc-select">
                                    <option selected="">Dhaka</option>
                                    <option value="barisal">Barisal</option>
                                    <option value="khulna">Khulna</option>
                                    <option value="Dhaka">Rangpur</option>
                                    <option value="barisal">Sylhet</option>
                                    <option value="khulna">Rajshahi</option>
                                </select>
                            </div>
                            <div class="location-form">
                                <form action="#" method="post">
                                    <input type="text" name="location" placeholder="Find Your Services Here">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="suggest">
                            <span>Suggest For You:</span>
                            <ul class="suggest-list">
                                <li><a href="service.html">Beauty & Salon</a></li>
                                <li><a href="service.html">Shifting</a></li>
                                <li><a href="service.html">AC Repair</a></li>
                                <li><a href="service.html">WallPainting</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hero-banner wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <img src="assets/images/home-1/hero-section-right-img.png" alt="" class="banner">
                </div>
            </div>
        </div>
        <div class="scroll-down">
            <a href="#category">Scroll Down<span><i class="bi bi-arrow-right"></i></span></a>
        </div>
    </section>
    <!-- End hero-area section -->

    <!-- Start popular-services section -->
    <section class="popular-services sec-m-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title layout-1 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="title-left">
                            <span>Services</span>
                            <h2>Our Popular Services</h2>
                        </div>
                        <div class="title-right">
                            <strong>Popular Services</strong>
                            <a href="service.html">View All Services<span><i class="bi bi-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="single-service">
                        <div class="thumb">
                            <a href="service-details.html"><img src="assets/images/services/service-1.jpg" alt=""></a>
                            <div class="tag">
                                <a href="service.html">Saloon</a>
                            </div>
                        </div>
                        <div class="single-inner">
                            <div class="author-info">
                                <div class="author-thumb">
                                    <img src="assets/images/services/service-author-1.png" alt="">
                                </div>
                            </div>
                            <h4><a href="service-details.html">Sed elit massa, maximus quisen fermentum auctor.</a></h4>
                            <div class="started">
                                
                                <a href="service-details.html">View Details<span><i class="bi bi-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End popular-services section -->

    <!-- Start home-services section -->
    <section class="home-services sec-m">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title layout-1 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="title-left">
                            <span>Services</span>
                            <h2>For Your Home</h2>
                        </div>
                        <div class="title-right">
                            <strong>For Your Home</strong>
                            <a href="service.html">View All Services<span><i class="bi bi-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="single-service">
                        <div class="thumb">
                            <a href="service-details.html"><img src="assets/images/services/service-4.jpg" alt=""></a>
                            <div class="tag">
                                <a href="service.html">Spa & Beuty</a>
                            </div>
                        </div>
                        <div class="single-inner">
                            <div class="author-info">
                                <div class="author-thumb">
                                    <img src="assets/images/services/service-author-4.png" alt="">
                                </div>
                            </div>
                            <h4><a href="service-details.html">Aliquam commodo suscipit vola neque. Aliquam erat utpat.</a></h4>
                            <div class="started">
                                <a href="service-details.html">View Details<span><i class="bi bi-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End home-services section -->

    <!-- Start why-choose section -->
    <section class="why-choose sec-m">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="why-choose-left">
                        <div class="sec-title layout-1">
                            <div class="title-left">
                                <span>Trust Agency</span>
                                <h2>Best Offered Services</h2>
                                <p>Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metus. tolad answerala tomadunali Aliquam viverra sagittis felis.</p>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Ensuring Masks
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metus. tolad Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metus. tolad answerala tomadunali Aliquam viverra sagittis felis.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        24/7 Supports
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metus. tolad Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metus. tolad answerala tomadunali Aliquam viverra sagittis felis.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Sanitising Hands
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metus. tolad Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metus. tolad answerala tomadunali Aliquam viverra sagittis felis.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="why-choose-right">
                        <h2 class=" wow animate fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">Why Choose Us</h2>
                        <div class="our-archive">
                            <div class="single-archive wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                                <span class="counter">5,000</span><span>+</span>
                                <h5>Service Providers</h5>
                            </div>
                            <div class="single-archive wow animate fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                                <span class="counter">15,000</span><span>+</span>
                                <h5>Order Served</h5>
                            </div>
                            <div class="single-archive wow animate fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <span class="counter">2,000</span><span>+</span>
                                <h5>5 Star Received</h5>
                            </div>
                            <div class="single-archive wow animate fadeInUp" data-wow-delay="700ms" data-wow-duration="1500ms">
                                <span class="counter">1,800</span><span>+</span>
                                <h5>Friendly Shop</h5>
                            </div>
                        </div>
                        <img src="assets/images/why-choose-dot-shape.png" alt="" class="shape-dot">
                        <img src="assets/images/why-choose-shape.png" alt="" class="shape-triangle">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End why-choose section -->

    <!-- Start testimonial section -->
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-12 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="sec-title layout-1">
                        <div class="title-left">
                            <span>Testimonial</span>
                            <h2>our Client Say About Us</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper testimonial-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="testimonial-slide">
                            <div class="quote">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="reviewer">
                                <div class="thumb">
                                    <img src="assets/images/testimonial/testimonial-1.jpg" alt="">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="reviewer-info">
                                    <h4>Johan Martin</h4>
                                    <span>CEO Founder</span>
                                </div>
                            </div>
                            <p>Suspendisse potenti. Suspendisse potenti. Phasellus sedan arcu. Donec commodo lobortis purus quis dictum. Sedijabui aliquamtinl ante tortor, vel dapibus mi tempor sit amet. andi pretium. Nunc tempor condimentum velit. </p>
                        </div>
                    </div>
                    <div class="swiper-slide wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="testimonial-slide">
                            <div class="quote">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="reviewer">
                                <div class="thumb">
                                    <img src="assets/images/testimonial/testimonial-2.jpg" alt="">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="reviewer-info">
                                    <h4>Angel Kolenia</h4>
                                    <span>CO Founder</span>
                                </div>
                            </div>
                            <p>Suspendisse potenti. Suspendisse potenti. Phasellus sedan arcu. Donec commodo lobortis purus quis dictum. Sedijabui aliquamtinl ante tortor, vel dapibus mi tempor sit amet. andi pretium. Nunc tempor condimentum velit. </p>
                        </div>
                    </div>
                </div>
                <div class="slider-navigations wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="swiper-button-prev-c"><i class="bi bi-arrow-left"></i></div>
                    <div class="swiper-button-next-c"><i class="bi bi-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End testimonial section -->

    <!-- Start how-it-works section -->
    <section class="how-it-works sec-m-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title layout-1">
                        <div class="title-left">
                            <span>Get A Services</span>
                            <h2>How It Works</h2>
                        </div>
                        <div class="title-right">
                            <strong>How It Works</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="how-work-left">
                        <h4>3 Step To Take Our Services</h4>
                        <div class="step">
                            <h4><span>01</span>Select the Service</h4>
                            <p>Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metusil Vonean hrmentum sapien ac aliquet gravida.</p>
                        </div>
                        <div class="step">
                            <h4><span>02</span>Pick your schedule</h4>
                            <p>Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metusil Vonean hrmentum sapien ac aliquet gravida.</p>
                        </div>
                        <div class="step">
                            <h4><span>03</span>Place Your Order & Relax</h4>
                            <p>Aenean fermentum sapien ac aliquet gravida. Fusce a ipsum metusil Vonean hrmentum sapien ac aliquet gravida.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="how-work-right">
                        <div class="video-demo">
                            <div class="video-thumb">
                                <img src="assets/images/work-video-thumb.jpg" alt="">
                                <div class="play">
                                    <a class="popup-video" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="bi bi-play-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End how-it-works section -->

    <!-- Start footer section -->
    
    <?php
        include_once('assets/scripts/footer.php');
        include_once('assets/scripts/footer_links.php');
    ?>

    <!-- End footer section -->

    

    

</body>

</html>