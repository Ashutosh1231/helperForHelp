<?php
    //print_r($_POST);
    include_once('../includes/classes.php');
    $db = new DB();
    //$user = new user($db->conn);
    //$user->chkSession();
    $city = new City($db->conn);
    $action = $_POST['action'];
    switch($action){
        case 'add':
            $data = $city->create($_POST['name'], $_POST['status']);
            if($data['status'] == 'success'){
                header('location:city_manager.php?msg=msg1');
                exit;
            }
            else{
                header('location:city_manager.php?msg=msg2');
                exit;
            }
        break;
        case 'edit':
            $data = $city->update($_POST['city_id'], $_POST['name'], $_POST['status']);
            if($data['status'] == 'success'){
                header('location:city_manager.php?msg=msg3');
                exit;
            }
            else{
                header('location:city_manager.php?msg=msg4');
                exit;
            }
        break;
        case 'fetchById':
            $data = $city->fetchById($_POST['city_id']);
            if($data['status'] == 'success'){
                echo json_encode($data['data']);
            }
        break;
        case 'changeStatus':
            $city_status = ($_POST['status'] == '1') ? 0 : 1;
            $data = $city->changeStatus($_POST['city_id'], $city_status);
            echo $data['status'];
        break;
    }
    
?>