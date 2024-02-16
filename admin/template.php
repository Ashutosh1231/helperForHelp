<?php
   
    include_once('../includes/classes.php');
    $db = new DB();
    //$user = new user($db->conn);
    //$user->chkSession();
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Helper 4 Hire Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            include_once('includes/header_links.php');
        ?>
    </head>
    <body>
        <?php include_once('includes/navigation.php'); ?>
        <div class="block md:flex w-full">
            <?php include_once('includes/sidebar.php'); ?>
            <div class="p-3 w-full">
                <div class="w-full max-w-screen px-4 mx-auto lg:px-12">
                    <?php include_once('includes/notification.php'); ?>
                </div>
            </div>
        </div>

        <?php
            include_once('includes/footer_links.php');
        ?>
   </body>
</html>