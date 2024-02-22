<?php
    include_once('includes/classes.php');
    $db = new DB();
    if(isset($_POST['location']) && isset($_POST['service']) and $_POST['service'] != NULL and $_POST['service'] != ''){
        $location = $_POST['location'];
        $servicecityid = $_POST['service'];
    }
    if(isset($_POST['servicecity']) and $_POST['servicecity'] != '' and $_POST['servicecity'] != NULL){
        $servicecityid = $_POST['servicecity'];
    }
    if(!isset($servicecityid) or $servicecityid == NULL or $servicecityid == ''){
        header('location:index.php?msg="service city not selected"');
    }
    $utiltiy = new Utility();

    $servicenamesql = $db->conn->prepare("SELECT name FROM `service` WHERE `id`= (SELECT `service_id` FROM `service_city` WHERE `id` = :servicecityid) ");
    $servicenameresult = $utiltiy->fetch($db->conn, $servicenamesql, [':servicecityid' => $servicecityid]);
    if($servicenameresult['status'] == 'success'){
        $servicename = $servicenameresult['data'][0]['name'];
    }

    $citynamesql = $db->conn->prepare("SELECT name FROM `city` WHERE `id` = (SELECT `city_id` from `service_city` where `id` = :servicecityid) ");
    $citynameresult = $utiltiy->fetch($db->conn, $citynamesql, [':servicecityid' => $servicecityid]);
    if($citynameresult['status'] == 'success'){
        $cityname = $citynameresult['data'][0]['name'];
    } 
    
    $sgo = new sgo($db->conn);
    $sgoresult = $sgo->fetchByServiceCityAndStatus($servicecityid,1);
?>
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
        
        <div>
            <h1><?=$servicename;?> services in <?=$cityname;?></h1>
            <?php
                if($sgoresult['status'] == 'success'){
                    $variablecount = count($sgoresult['data']);
                    $variablecounter = 0;
                    ?>
                    <form id="servicecityvariableoptions" name="servicecityvariableoptions" method="POST" action="address.php">
                        <input type="hidden" name="variablecount" id="variablecount" value="<?=$variablecount;?>"/>
                        <?php
                        $sgooptions = new sgoOptions($db->conn);
                        foreach($sgoresult['data'] as $data){
                            $variablecounter++;    
                            $sgooptionsresult = $sgooptions->fetchBySgoIdAndStatus($data['id'],1);
                            if($sgooptionsresult['status'] == 'success'){
                                ?>
                                <div>
                                    <p><?=$data['name'];?></p>
                                    <?php
                                        foreach($sgooptionsresult['data'] as $optionsdata){
                                            ?>
                                            <input type="radio" id="servicevariable<?=$optionsdata['id'];?>" name="servicevariable<?=$variablecounter;?>" value="<?=$optionsdata['id'];?>"/>
                                            <label for="servicevariable<?=$optionsdata['id'];?>"><?=$optionsdata['name'];?></label>        
                                            <?php                                        
                                        }
                                    ?>
                                    
                                </div>
                                <?php    
                            }
                            
                        }
                        ?>
                    </form>
                    <?php
                    
                }
            ?>
        </div>

        <!-- Start footer section --> 
        <?php
            include_once('assets/scripts/footer.php');
            include_once('assets/scripts/footer_links.php');
        ?>
        <!-- End footer section -->
        <script>
            
        </script>
    </body>

</html>