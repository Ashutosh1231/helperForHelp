<?php
    include_once('includes/classes.php');
    $mdb = new DB();
    $mservice = new service($mdb->conn);
    $mresult = $mservice->fetchByStatus(1);
?>
<div class="main-menu">
    <nav class="main-nav">
        <div class="mobile-menu-logo">
            <a href="index.php"><img src="assets/images/logo.svg" alt=""></a>
            <div class="remove">
                <i class="bi bi-plus-lg"></i>
            </div>
        </div>
        <ul>
            <li class="has-child active">
                <a href="index.php">Home</a>
            </li>
            <li><a href="about.php">About Us</a></li>
            <li class="has-child">
                <a href="service.php">Services</a>
                <?php
                    if($mresult['status'] == 'success'){
                        ?>
                        <i class="bi bi-chevron-down"></i>
                        <ul class="sub-menu">        
                        <?php
                            foreach($mresult['data'] as $key => $value){
                                ?>
                                <li><a href="service-details.php?id=<?php echo $value['id']; ?> "><?php echo $value['name']; ?></a></li>
                                <?php
                            }
                        ?>
                        </ul>
                        <?php
                    }
                ?>
            </li>
            
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div class="my-account">
            <a href="account.php">My Account</a>
        </div>
    </nav>
</div>