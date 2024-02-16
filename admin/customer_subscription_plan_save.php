<?php
    include_once('../includes/classes.php');
    $db = new DB();
    //$user = new user($db->conn);
    //$user->chkSession();
    $subscriptionplan = new subscriptionPlan($db->conn);
    $action = $_POST['action'];
    //print_r($_POST);
    switch($action){
        case 'add':
            $name = $_POST['name'];
            if(is_array($_POST['city'])){
                $city = implode(',', $_POST['city']);
            }
            $duration = $_POST['duration'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $replacements = $_POST['replacements'];
            $data = $subscriptionplan->create($name, $city, $duration, $replacements, $price, $status);
            if($data['status'] == 'success'){
                header('location:customer_subscriptions_manager.php?msg=msg23');
                exit;
            }
            else{
                header('location:customer_subscriptions_manager.php?msg=msg24');
                exit;
            }
        break;
        case 'edit':
            $id = $_POST['id'];
            $name = $_POST['name'];
            if(is_array($_POST['city'])){
                $city = implode(',', $_POST['city']);
            }
            $duration = $_POST['duration'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $replacements = $_POST['replacements'];
            $data = $subscriptionplan->update($id, $name, $city, $duration, $replacements, $price, $status);
            if($data['status'] == 'success'){
                header('location:customer_subscriptions_manager.php?msg=25');
            }
            else{
                header('location:customer_subscriptions_manager.php?msg=26');
            }
        break; 
        case 'fetchById':
            $id = $_POST['id'];
            $result = $subscriptionplan->fetchById($id);
            echo json_encode($result);
        break;  
        case 'changestatus':
            $id = $_POST['id'];
            $status = ($_POST['status'] == '1') ? '0' : '1';
            $result = $subscriptionplan->changeStatus($id, $status);
            echo $result['status'];
        break;
    }
?>