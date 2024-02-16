<?php
    include_once('../includes/classes.php');
    $db = new DB();
    //$user = new user($db->conn);
    //$user->chkSession();
    $service = new Service($db->conn);
    
    $action = $_POST['action'];
    switch($action){
        case 'add':
            $service_name = $_POST['service_name'];
            $shortdesc = htmlentities($_POST['shortdesc']);
            $longdesc = htmlentities($_POST['longdesc']);
            $features = htmlentities($_POST['features']);
            $status = $_POST['status'];
            $data = $service->create($service_name, $shortdesc, $longdesc, $features, $status);
            if($data['status'] == 'success'){
                header('location:service_manager.php?msg=msg5');
                exit;
            }
            else{
                header('location:service_manager.php?msg=msg6');
                exit;
            }
        break;
        case 'edit':
            $service_name = $_POST['service_name'];
            $shortdesc = htmlentities($_POST['shortdesc']);
            $longdesc = htmlentities($_POST['longdesc']);
            $features = htmlentities($_POST['features']);
            $status = $_POST['status'];
            $service_id = $_POST['service_id'];
            $data = $service->update($service_id, $service_name, $shortdesc, $longdesc, $features, $status);
            if($data['status'] == 'success'){
                header('location:service_manager.php?msg=msg7');
                exit;
            }
            else{
                header('location:service_manager.php?msg=msg8');
                exit;
            }
        break;
        case 'fetchById':
            $service_id = $_POST['service_id'];
            $data = $service->fetchById($service_id);
            if($data['status'] == 'success'){
                $i=0;
                $result[$i]['service_id'] = $data['data']['id'];
                $result[$i]['service_name'] = $data['data']['name'];
                $result[$i]['shortdesc'] = html_entity_decode($data['data']['short_desc']);
                $result[$i]['longdesc'] = html_entity_decode($data['data']['long_desc']);
                $result[$i]['features'] = html_entity_decode($data['data']['features']);
                $result[$i]['status'] = $data['data']['status'];
                echo json_encode($result);
            }

        break;
        case 'changeStatus':
            $service_id = $_POST['service_id'];
            $status = ($_POST['status'] == '1') ? '0' : '1';
            $data = $service->changeStatus($service_id, $status);
            if($data['status'] == 'success'){
                header('location:service_manager.php?msg=msg9');
                exit;
            }
            else{
                header('location:service_manager.php?msg=msg10');
                exit;
            }
        break;
        case 'addcity':
            $service_id = $_POST['service_id'];
            $city_id = $_POST['city_id'];
            $price = $_POST['service_city_price'];
            $status = $_POST['service_city_status'];
            $servicecity = new ServiceCity($db->conn);
            $data = $servicecity->create($service_id, $city_id, $price, $status);
            if($data['status'] == 'success'){
                header('location:service_details.php?id='.$service_id.'&msg=msg11');
                exit;
            }
            else{
                header('location:service_details.php?id='.$service_id.'&msg=msg12');
                exit;
            }
        break;
        case 'editcity':
            $service_id = $_POST['service_id'];
            $service_city_id = $_POST['service_city_id'];
            $service_city_baseprice = $_POST['service_city_price'];
            $service_city_status = $_POST['service_city_status'];
            $servicecity = new ServiceCity($db->conn);
            $data = $servicecity->update($service_city_id, $service_city_baseprice, $service_city_status);
            if($data['status'] == 'success'){
                header('location:service_details.php?id='.$service_id.'&msg=msg21');
                exit;
            }
            else{
                header('location:service_details.php?id='.$service_id.'&msg=msg22');
                exit;
            }
        break;
        case 'servicecitychangestatus':
            $service_city_id = $_POST['service_city_id'];
            $status = ($_POST['status'] == '1') ? '0' : '1';
            $servicecity = new ServiceCity($db->conn);
            $result = $servicecity->changeStatus($service_city_id, $status);
            echo $result['status'];
        break;
        case 'addvariable':
            $service_id = $_POST['service_id'];
            $service_city_id = $_POST['service_city_id'];
            $variable_name = $_POST['variable_name'];
            $variable_status = $_POST['variable_status'];
            $servicevariable = new sgo($db->conn);
            $data = $servicevariable->create($service_city_id, $variable_name, $variable_status);
            if($data['status'] == 'success'){
                header('location:service_details.php?id='.$service_id.'&msg=msg13');
                exit;    
            }
            else{
                header('location:service_details.php?id='.$service_id.'&msg=msg14');
                exit;
            }
        break;
        case 'editvariable':
            $service_id = $_POST['service_id'];
            $service_city_id = $_POST['service_city_id'];
            $variable_id = $_POST['variable_id'];
            $variable_name = $_POST['variable_name'];
            $variable_status = $_POST['variable_status'];
            $servicevariable = new sgo($db->conn);
            $data = $servicevariable->update($variable_id, $service_city_id, $variable_name, $variable_status);

            if($data['status'] == 'success'){
                header('location:service_details.php?id='.$service_id.'&msg=msg15');
                exit;
            }
            else{
                header('location:service_details.php?id='.$service_id.'&msg=msg16');
                exit;
            }
        break;
        case 'variablechangestatus':
            $variable_id = $_POST['variable_id'];
            $status = ($_POST['status'] == '1') ? '0' : '1';
            $servicevariable = new sgo($db->conn);
            $result = $servicevariable->changeStatus($variable_id, $status);
            echo $result['status'];
        break;
        case 'addoption':
            $service_id = $_POST['service_id'];
            $variable_id = $_POST['variable_id'];
            $option_name = $_POST['option_name'];
            $option_price = $_POST['option_price'];
            $option_status = $_POST['option_status'];
            $servicevariable = new sgoOptions($db->conn);
            $data = $servicevariable->create($variable_id, $option_name, $option_price, $option_status);
            if($data['status'] == 'success'){
                header('location:service_details.php?id='.$service_id.'&msg=msg17');
                exit;
            }
            else{
                header('location:service_details.php?id='.$service_id.'&msg=msg18');
                exit;
            }            
        break;
        case 'editoption':
            $service_id = $_POST['service_id'];
            $variable_id = $_POST['variable_id'];
            $option_id = $_POST['option_id'];
            $option_name = $_POST['option_name'];
            $option_price = $_POST['option_price'];
            $option_status = $_POST['option_status'];
            $servicevariable = new sgoOptions($db->conn);
            $data = $servicevariable->update($option_id, $variable_id, $option_name, $option_price, $option_status);
            if($data['status'] == 'success'){
                header('location:service_details.php?id='.$service_id.'&msg=msg19');
                exit;
            }
            else{
                header('location:service_details.php?id='.$service_id.'&msg=msg20');
                exit;
            }
        break;
        case 'optionchangestatus':
            $option_id = $_POST['option_id'];
            $status = ($_POST['status'] == '1') ? '0' : '1';
            $servicevariable = new sgoOptions($db->conn);
            $result = $servicevariable->changeStatus($option_id, $status);
            echo $result['status'];
        break;
    }
?>