<?php
    include_once('../includes/classes.php');
    $db = new DB();
    //$user = new user($db->conn);
    //$user->chkSession();
    $customer = new customer($db->conn);
    $action = $_POST['action'];
    switch($action){
        case 'addcustomer':
            print_r($_POST);
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $gender = ($_POST['gender'] == 'Male') ? 'M' : 'F';
            $currentaddress = $_POST['currentaddress'];
            $currentcity = $_POST['currentcity'];
            $currentpin = $_POST['currentpin'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $alternate_mobile = $_POST['alternate_mobile'];
            $whatsapp1 = (isset($_POST['whatsapp1'])) ? 1 : 0;
            $whatsapp2 = (isset($_POST['whatsapp2'])) ? 1 : 0;
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $status = $_POST['status'];
            echo $whatsapp1;
            if($repassword != $password){
                header('location:customer_manager.php?msg=msg29');
                exit;
            }
            $result = $customer->create($fname, $mname, $lname, $gender, $dob, $currentaddress, $currentcity, $currentpin, $email, $mobile, $whatsapp1, $alternate_mobile, $whatsapp2, $password, $status);
            if($result['status'] == 'success'){
                header('location:customer_manager.php?msg=msg27');
            }
            else{
             
                header('location:customer_manager.php?msg=msg28');
            }
        break;
        case 'fetchById':
            $data = $customer->fetchById($_POST['id']);
            echo json_encode($data);
        break;
        case 'editcustomer':
            $id = $_POST['customer_id'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $gender = ($_POST['gender'] == 'Male') ? 'M' : 'F';
            $currentaddress = $_POST['currentaddress'];
            $currentcity = $_POST['currentcity'];
            $currentpin = $_POST['currentpin'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $alternate_mobile = $_POST['alternate_mobile'];
            $whatsapp1 = (isset($_POST['whatsapp1'])) ? 1 : 0;
            $whatsapp2 = (isset($_POST['whatsapp2'])) ? 1 : 0;
            $status = $_POST['status'];
            $result = $customer->update($id, $fname, $mname, $lname, $gender, $dob, $currentaddress, $currentcity, $currentpin, $email, $mobile, $whatsapp1, $alternate_mobile, $whatsapp2, $status);
            print_r($result);
            if($result['status'] == 'success'){
                header('location:customer_manager.php?msg=msg27');
                exit;
            }    
            else{
                header('location:customer_manager.php?msg=msg28');
                exit;
            }
        break;
        case 'changestatus':
            $id = $_POST['id'];
            $status = ($_POST['status'] == '1') ? '0' : '1';
            $result = $customer->changeStatus($id, $status);
            echo $result['status'];
        break;
        case 'fetchsubcriptionbycity':
            $cityid = $_POST['cityid'];
            $status = $_POST['status'];
            $subscriptionplan = new subscriptionPlan($db->conn);
            $data = $subscriptionplan->fetchByCityandStatus($cityid, $status);
            echo json_encode($data);
        break;
        case 'fetchsubcriptionplan':
            $id = $_POST['planid'];
            $subscriptionplan = new subscriptionPlan($db->conn);
            $data = $subscriptionplan->fetchById($id);
            echo json_encode($data);
        break;
        case 'applycustomersubscription':
            $customer_id = $_POST['acs_customer_id'];
            $city_id = $_POST['city_id'];
            $subscription_id = $_POST['subscription_plan'];
            $discount = $_POST['discount'];
            $status = $_POST['acs_status'];
            $subscriptionplan = new subscriptionPlan($db->conn);
            $data = $subscriptionplan->fetchById($subscription_id);
            if($data['status'] == 'success'){
                $price = $data['data']['price'];
                $total = $price - $discount;
                $duration = $data['data']['duration'];
                $replacements = $data['data']['replacements'];
                $today = date('Y-m-d');
                $end_date = date('Y-m-d', strtotime($today. ' + '.$duration.' months'));
                $customersubscription = new customerSubscription($db->conn);
                $result = $customersubscription->create($customer_id, $subscription_id, $today, $end_date, $price, $discount, $total, $replacements, 0, $status);
                if($result['status'] == 'success'){
                    header('location:customer_details.php?id='.$customer_id.'&msg=msg30');
                    exit;
                }
                else{
                    header('location:customer_details.php?id='.$customer_id.'&msg=msg31');
                    exit;
                }
            }
        break;
        case 'customerchangestatus':
            $id = $_POST['id'];
            $status = ($_POST['status'] == '1') ? '0' : '1';
            $result = $customer->changeStatus($id, $status);
            echo $result['status'];
        break;
    }
?>