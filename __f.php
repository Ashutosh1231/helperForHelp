<?php
    include_once('includes/classes.php');
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        $db = new DB();
        switch($action){
            case 'fetchServicByLocation':
                $location = $_POST['location_id'];
                $servicecity = new ServiceCity($db->conn);
                $result = $servicecity->fetchByCityIdandStatus($location,1);
                if($result['status'] == 'success'){
                    $service = new service($db->conn);

                    for($i=0; $i < count($result['data']); $i++){
                        $serviceresult = $service->fetchById($result['data'][$i]['service_id']);    
                        echo '<option value="'.$result['data'][$i]['id'].'">'.$serviceresult['data']['name'].'</option>';
                    }
                }
            break;
            case 'getoptionprice':
                $optionid = $_POST['optionid'];
                $option = new sgoOptions($db->conn);
                $optionresult = $option->fetch($optionid);
                if($optionresult['status'] == 'success'){
                    echo $optionresult['data']['price'];
                }
                else{
                    echo 'failure';
                }
            break;
        }
    }
?>