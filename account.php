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
                        <h2>My Account</h2>
                        <span><a href="index.html">Home</a><i class="bi bi-chevron-right"></i>My Account</span>
                        <div class="arrow-down">
                            <a href="#down"><i class="bi bi-chevron-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->

    <!-- Start account-dashboard section -->
    <section class="account-dashboard sec-m">
        <div class="container">
            <div class="dashboard-informations">
                <div class="dashboard-content align-items-start">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="bi bi-person"></i>My Profile
                        </button>
                        <button class="nav-link" id="v-pills-order-tab" data-bs-toggle="pill" data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order" aria-selected="false">
                            <i class="bi bi-bag-check"></i>All Order
                        </button>
                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="bi bi-house-door"></i>Address
                        </button>
                        <button class="nav-link" id="v-pills-logout-tab" data-bs-toggle="pill" data-bs-target="#v-pills-logout" type="button" role="tab" aria-controls="v-pills-logout" aria-selected="false">
                            <i class="bi bi-box-arrow-in-right"></i>Logout
                        </button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="user-profile">
                                <div class="user-info">
                                    <div class="thumb">
                                        <img src="assets/images/user-1.jpg" alt="">
                                    </div>
                                    <div class="user-desc">
                                        <h3>Johan Martin SR-</h3>
                                        <span>Co Founder</span>
                                    </div>
                                </div>
                                <div class="user-form">
                                    <form action="account.html" method="get">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Frist Name *
                                                    <input type="text" name="fname" id="fname" placeholder="Your first name">
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Last Name *
                                                    <input type="text" name="lname" id="lname" placeholder="Your last name">
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Contact Number
                                                    <input type="text" name="number" id="number" placeholder="+8801">
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Email
                                                    <input type="email" name="email" id="email" placeholder="Your Email">
                                                </label>
                                            </div>
                                            <div class="col-12">
                                                <label>Address
                                                    <input type="text" name="address" id="address">
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>City</label>
                                                    <select>
                                                        <option selected>City</option>
                                                        <option value="dhaka">Dhaka</option>
                                                        <option value="chittagong">Chittagong</option>
                                                        <option value="comilla">Comilla</option>
                                                    </select>
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                <label>State</label>
                                                    <select>
                                                        <option selected>State</option>
                                                        <option value="dhaka">Dhaka</option>
                                                        <option value="chittagong">Chittagong</option>
                                                        <option value="comilla">Comilla</option>
                                                    </select>
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Zip Code
                                                    <input type="text" name="zipcode" id="zipcode" placeholder="00000">
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Country</label>
                                                    <select>
                                                        <option selected>...</option>
                                                        <option value="bangladesh">Bangladesh</option>
                                                        <option value="nepal">Nepal</option>
                                                        <option value="chaina">China</option>
                                                    </select>
                                                
                                            </div>
                                            <div class="col-12">
                                                <div class="form-inner">
                                                    <label>Password*
                                                        <i class="bi bi-eye-slash" id="togglePasswordTwo"></i>
                                                        <input type="password" name="email" id="passwordTwo" placeholder="******">
                                                    </label>
                                                </div>
                                                <div class="form-inner">
                                                    <label>Confrim Password*
                                                        <i class="bi bi-eye-slash" id="togglePasswordThree"></i>
                                                        <input type="password" name="email" id="passwordThree" placeholder="*****">
                                                    </label>
                                                </div>
                                                <button type="submit">Update Profile</button>
                                                <button class="cancel">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab">
                            <div class="all-order">
                                <div class="order-head">
                                    <h3>All Order</h3>
                                    <select>
                                        <option selected>Show: Last 05 Order</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="order-table" style="overflow-x:auto;">
                                    <table style="width:100%">
                                        <thead>
                                            <tr class="head">
                                                <th>Service Title</th>
                                                <th>Order ID</th>
                                                <th>Order Ammount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <!-- every single data-->
                                        <tr>
                                            <td data-label="Service Title">
                                                <img src="assets/images/table-data/table-data-1.jpg" alt="">
                                                <span>Hair Cut Service</span>
                                            </td>
                                            <td data-label="Order ID">#200124001</td>
                                            <td data-label="Order Ammount">1222.8365</td>
                                            <td data-label="Status">Complete</td>
                                            <td data-label="Action">
                                                <div class="action">
                                                    <div class="view"><i class="bi bi-eye"></i></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- every single data-->
                                        
                                    </table>
                                </div>
                                <div class="show-entries">
                                    <div class="entrie">
                                        <span>Showing 10 to 20 of 1 entries</span>
                                        <ul class="paginate">
                                            <li><a href="#">Previous</a></li>
                                            <li><a href="#">01</a></li>
                                            <li class="active"><a href="#">02</a></li>
                                            <li><a href="#">03</a></li>
                                            <li><a href="#">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <div class="user-address">
                                <div class="head">
                                    <h3>Save Your Address</h3>
                                    <p>Auction sites present consumers with a thrilling, competitivenl way to buy the goods and services they need most.</p>
                                </div>
                                <div class="user-location">
                                    <div class="user-loc">
                                        <div class="icon">
                                            <i class="bi bi-house-door"></i>
                                        </div>
                                        <p>At Home</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-settings-tab"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End account-dashboard section -->

        <!-- Start footer section --> 
        <?php
            include_once('assets/scripts/footer.php');
            include_once('assets/scripts/footer_links.php');
        ?>
        <!-- End footer section -->
    </body>

</html>
