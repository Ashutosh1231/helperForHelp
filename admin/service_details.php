<?php
    include_once('../includes/classes.php');
    $db = new DB();
    //$user = new user($db->conn);
    //$user->chkSession();
    $id=$_GET['id']; 
    $service = new Service($db->conn);
    $result = $service->fetchById($id);
    if($result['status'] == 'success'){
        $service_name = $result['data']['name'];
    }
    else{
        header('location:service_manager.php');
        exit;
    }
    $city = new city($db->conn);
    $cityresult = $city->fetchAll();
    $servicecity = new serviceCity($db->conn);
    $servicecityresult = $servicecity->fetchByServiceId($id);
    $servicecitydata = array();
    if($servicecityresult['status'] == 'success'){
        foreach($servicecityresult['data'] as $cityn){
            $servicecitydata[] = $cityn['city_id'];
        }
    }
    $servicevariable = new sgo($db->conn);
    $vairableoptions = new sgoOptions($db->conn);
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
                <div class="w-full max-w-screen mx-auto ">
                    <?php include_once('includes/notification.php'); ?>
                    <div class="w-full max-w-screen mx-auto ">
                        <div class="w-full">
                            <h1 class="text-2xl text-center mt-6"><?=$service_name?> Details</h1>
                        </div>
                        <div class='flex'>
                            <!-- Add Button -->
                            <div class='flex py-10'>
                                <button data-modal-target="add-service-city-modal" class="addservicecity text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-3 sm-py-3 sm:text-sm md:px-4 md:py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" title="Add new city to <?=$service_name;?> service area">Add New City</button>
                                
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class='flex justify-between border-solid border-2  border-blue-700 rounded p-3 mb-2'>
                            <div class='flex w-full'>
                                <div class='flex w-18 px-2'>SC ID</div>
                                <div class='flex-1 px-2'>City Name</div>
                                <div class='flex w-28 text-center px-2'><p class="w-full text-center">Base Price</p></div>
                            </div>   

                            <div class='flex'>
                                
                                <div class='flex w-20 text-center mx-auto'>
                                    <p class="w-full text-center">Edit</p>
                                </div>
                                <div class=" flex w-20 text-center mx-auto">
                                    <p class="w-full text-center">Status</p>
                                </div>
                            </div>
                        </div>
                        <?php
                            if($servicecityresult['status']=="success"){
                                if(isset($servicecityresult['data'])){
                                    foreach($servicecityresult['data'] as $data){
                                        $citynameresult = $city->fetchById($data['city_id']);
                                        $cityname = $citynameresult['data'][0]['name'];
                                        $servicevariableresult = $servicevariable->fetchByServiceCity($data['id']);
                                        ?>
                                        <div class='border-solid border-2  border-slate-200 rounded p-3 mb-2  hover:border-dotted'>
                                            <div class="flex justify-between ">
                                                <div class='flex w-full'>
                                                    <div class='flex w-14 px-2'><?=$data['id'];?></div>
                                                    <div class='flex-1 px-2'><?=$cityname;?></div>
                                                    <div class='flex w-28 px-2'><p class="w-full text-center"><?=$data['base_price'];?></div>
                                                </div>   

                                                <div class='flex'>
                                                    
                                                    <div class='flex w-20 cursor-pointer'>
                                                            <a href="#" class="text-center mx-auto editservicecity" serviceid="<?=$id;?>" servicecityid="<?=$data['id'];?>" servicecityid="<?=$data['city_id'];?>" servicecityprice="<?=$data['base_price'];?>" servicecitystatus="<?=$data['status'];?>"   title="Click here to edit the service">
                                                            <svg class="w-5 h-5 mx-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M21 21H12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class=" flex w-20">
                                                        <?php
                                                            if($data['status']=='0'){
                                                                ?>
                                                                <a href="#" class="mx-auto text-center servicecitychangestatus" serviceid="<?=$id;?>" servicecityid="<?=$data['id'];?>" cstatus="0"  title="Click here to edit the service" class="editservice">
                                                                        <svg viewBox="0 0 24 24" class="w-5 h-5 mx-auto" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.83 9.17999C14.2706 8.61995 13.5576 8.23846 12.7813 8.08386C12.0049 7.92926 11.2002 8.00851 10.4689 8.31152C9.73758 8.61453 9.11264 9.12769 8.67316 9.78607C8.23367 10.4444 7.99938 11.2184 8 12.01C7.99916 13.0663 8.41619 14.08 9.16004 14.83" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.01C13.0609 16.01 14.0783 15.5886 14.8284 14.8384C15.5786 14.0883 16 13.0709 16 12.01" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.61 6.39004L6.38 17.62C4.6208 15.9966 3.14099 14.0944 2 11.99C6.71 3.76002 12.44 1.89004 17.61 6.39004Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9994 3L17.6094 6.39" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.38 17.62L3 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5695 8.42999C20.4801 9.55186 21.2931 10.7496 21.9995 12.01C17.9995 19.01 13.2695 21.4 8.76953 19.23" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                                </a>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                <a href="#" class="mx-auto text-center servicecitychangestatus" serviceid="<?=$id;?>" servicecityid="<?=$data['id'];?>" cstatus="1"  title="Click here to edit the service">
                                                                    <svg viewBox="0 0 24 24" class="mx-auto w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 16.01C14.2091 16.01 16 14.2191 16 12.01C16 9.80087 14.2091 8.01001 12 8.01001C9.79086 8.01001 8 9.80087 8 12.01C8 14.2191 9.79086 16.01 12 16.01Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2 11.98C8.09 1.31996 15.91 1.32996 22 11.98" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 12.01C15.91 22.67 8.09 22.66 2 12.01" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                                </a>
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full m-4">
                                                <div class="w-full flex justify-between my-3">
                                                    <button data-modal-target="add-service-variable-modal"  service_city_id="<?=$data['id'];?>" action="add_variable" class="addvariable text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-3 sm-py-3 sm:text-sm md:px-4 md:py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" title="Add new city to <?=$service_name;?> service area">Add Service Variable</button>
                                                </div>
                                                <?php
                                                    if($servicevariableresult['status'] == 'success'){
                                                        ?>
                                                        <div id="accordion-variable-<?=$data['id'];?>" data-accordion="collapse" data-active-classes="bg-blue-200 dark:bg-gray-800 text-blue-600 dark:text-white" data-inactive-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                                                            <h2 id="service-variable-heading-<?=$data['id'];?>">
                                                                <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#service-variable-body-<?=$data['id'];?>" aria-expanded="true" aria-controls="service-variable-body-<?=$data['id'];?>">
                                                                    <span>Manager Variables</span>
                                                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                                                    </svg>
                                                                </button>
                                                            </h2>
                                                            <div id="service-variable-body-<?=$data['id'];?>" class="hidden" aria-labelledby="service-variable-heading-<?=$data['id'];?>">
                                                                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                                                    <div class='flex justify-between border-solid border-2  border-yellow-400 rounded p-3 mb-2'>
                                                                    <div class='flex'>
                                                                        <div class='flex w-20 px-2'>Variable ID</div>
                                                                        <div class='flex-1 px-2'>Variable Name</div>
                                                                    </div>   

                                                                    <div class='flex'>
                                                                    <div class='flex w-20 text-center mx-auto'>
                                                                            <p class="w-full text-center">Options</p>
                                                                        </div>
                                                                        <div class='flex w-20 text-center mx-auto'>
                                                                            <p class="w-full text-center">Edit</p>
                                                                        </div>
                                                                        <div class=" flex w-20 text-center mx-auto">
                                                                            <p class="w-full text-center">Status</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <?php
                                                                        foreach($servicevariableresult['data'] as $vdata){
                                                                            ?>
                                                                            <div class="border-solid border-2  border-slate-200 rounded hover:border-dotted mb-2">
                                                                                <div class='flex justify-between  p-3 mb-2'>
                                                                                    <div class='flex'>
                                                                                        <div class='flex w-14 px-2'><?=$vdata['id'];?></div>
                                                                                        <div class='flex px-2'><?=$vdata['name'];?></div>
                                                                                    </div>   

                                                                                    <div class='flex'>
                                                                                        <div class='flex w-20 cursor-pointer'>
                                                                                            <a data-modal-target="add-service-variable-option-modal" href="#" class="text-center mx-auto addoption" serviceid="<?=$data['id'];?>" variableid="<?=$vdata['id'];?>"  title="Click here to edit the service variable options">
                                                                                                <svg class="w-5 h-5 mx-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 14V7C20 5.34315 18.6569 4 17 4H12M20 14L13.5 20M20 14H15.5C14.3954 14 13.5 14.8954 13.5 16V20M13.5 20H7C5.34315 20 4 18.6569 4 17V12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 4V7M7 10V7M7 7H4M7 7H10" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class='flex w-20 cursor-pointer'>
                                                                                            <a href="#" class="text-center mx-auto editvariable" servicecityid="<?=$data['id'];?>" serviceid="<?=$id;?>" variableid="<?=$vdata['id'];?>" variablename="<?=$vdata['name'];?>" variablestatus="<?=$vdata['status'];?>"  title="Click here to edit the service variable">
                                                                                                <svg class="w-5 h-5 mx-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                        <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                        <path d="M21 21H12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                    </svg>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class=" flex w-20">
                                                                                            <?php
                                                                                                if($vdata['status']=='0'){
                                                                                                    ?>
                                                                                                    <a href="#" class="mx-auto text-center variablechangestatus" serviceid="<?=$data['id'];?>" variableid="<?=$vdata['id'];?>" cstatus="0"  title="Click here to edit the service" class="editservice">
                                                                                                            <svg viewBox="0 0 24 24" class="w-5 h-5 mx-auto" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.83 9.17999C14.2706 8.61995 13.5576 8.23846 12.7813 8.08386C12.0049 7.92926 11.2002 8.00851 10.4689 8.31152C9.73758 8.61453 9.11264 9.12769 8.67316 9.78607C8.23367 10.4444 7.99938 11.2184 8 12.01C7.99916 13.0663 8.41619 14.08 9.16004 14.83" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.01C13.0609 16.01 14.0783 15.5886 14.8284 14.8384C15.5786 14.0883 16 13.0709 16 12.01" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.61 6.39004L6.38 17.62C4.6208 15.9966 3.14099 14.0944 2 11.99C6.71 3.76002 12.44 1.89004 17.61 6.39004Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9994 3L17.6094 6.39" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.38 17.62L3 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5695 8.42999C20.4801 9.55186 21.2931 10.7496 21.9995 12.01C17.9995 19.01 13.2695 21.4 8.76953 19.23" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                                                                    </a>
                                                                                                    <?php
                                                                                                }
                                                                                                else{
                                                                                                    ?>
                                                                                                    <a href="#" class="mx-auto text-center variablechangestatus" serviceid="<?=$data['id'];?>" variableid="<?=$vdata['id'];?>" cstatus="1"  title="Click here to edit the service">
                                                                                                        <svg viewBox="0 0 24 24" class="mx-auto w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 16.01C14.2091 16.01 16 14.2191 16 12.01C16 9.80087 14.2091 8.01001 12 8.01001C9.79086 8.01001 8 9.80087 8 12.01C8 14.2191 9.79086 16.01 12 16.01Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2 11.98C8.09 1.31996 15.91 1.32996 22 11.98" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 12.01C15.91 22.67 8.09 22.66 2 12.01" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                                                                    </a>
                                                                                                    <?php
                                                                                                }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                                    $optionsdata = $vairableoptions->fetchBySgoId($vdata['id']);
                                                                                    if($optionsdata['status'] == 'success'){
                                                                                        ?>
                                                                                        <div class="m-4">
                                                                                            <div class="mb-2">
                                                                                                <p class="text-lg font-semibold">Options</p>
                                                                                            </div>
                                                                                            <div class='flex justify-between border-solid border-2  border-orange-700 rounded p-3 mb-2'>
                                                                                                <div class='flex w-full'>
                                                                                                    <div class='flex w-18 px-2'>ID</div>
                                                                                                    <div class='flex-1 px-2'>Option Name</div>
                                                                                                    <div class='flex w-28 text-center px-2'><p class="w-full text-center">Price</p></div>
                                                                                                </div>   
                                                                                                <div class='flex'>
                                                                                                    <div class='flex w-20 text-center mx-auto'>
                                                                                                        <p class="w-full text-center">Edit</p>
                                                                                                    </div>
                                                                                                    <div class=" flex w-20 text-center mx-auto">
                                                                                                        <p class="w-full text-center">Status</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="p-3 mb-2">
                                                                                                <?php
                                                                                                    foreach($optionsdata['data'] as $option){
                                                                                                        ?>
                                                                                                        <div class="flex justify-between ">
                                                                                                            <div class='flex w-full'>
                                                                                                                <div class='flex w-14 px-2'><?=$option['id'];?></div>
                                                                                                                <div class='flex-1 px-2'><?=$option['name'];?></div>
                                                                                                                <div class='flex w-28 px-2'><p class="w-full text-center"><?=$option['price'];?></div>
                                                                                                            </div>   

                                                                                                            <div class='flex'>
                                                                                                                
                                                                                                                <div class='flex w-20 cursor-pointer'>
                                                                                                                    <a href="#" class="text-center mx-auto editoption" optionvariableid="<?=$vdata['id'];?>" optionid="<?=$option['id'];?>" optionname="<?=$option['name'];?>" optionprice="<?=$option['price'];?>" optionstatus="<?=$option['status'];?>" title="Click here to edit the variable option">
                                                                                                                        <svg class="w-5 h-5 mx-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                                            <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                                            <path d="M21 21H12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                                        </svg>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                                <div class=" flex w-20">
                                                                                                                    <?php
                                                                                                                        if($option['status']=='0'){
                                                                                                                            ?>
                                                                                                                            <a href="#" class="mx-auto text-center optionchangestatus" serviceid="<?=$data['id'];?>" optionid="<?=$option['id'];?>" cstatus="0"  title="Click here to edit the service" class="editservice">
                                                                                                                                    <svg viewBox="0 0 24 24" class="w-5 h-5 mx-auto" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.83 9.17999C14.2706 8.61995 13.5576 8.23846 12.7813 8.08386C12.0049 7.92926 11.2002 8.00851 10.4689 8.31152C9.73758 8.61453 9.11264 9.12769 8.67316 9.78607C8.23367 10.4444 7.99938 11.2184 8 12.01C7.99916 13.0663 8.41619 14.08 9.16004 14.83" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.01C13.0609 16.01 14.0783 15.5886 14.8284 14.8384C15.5786 14.0883 16 13.0709 16 12.01" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.61 6.39004L6.38 17.62C4.6208 15.9966 3.14099 14.0944 2 11.99C6.71 3.76002 12.44 1.89004 17.61 6.39004Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9994 3L17.6094 6.39" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.38 17.62L3 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5695 8.42999C20.4801 9.55186 21.2931 10.7496 21.9995 12.01C17.9995 19.01 13.2695 21.4 8.76953 19.23" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                                                                                            </a>
                                                                                                                            <?php
                                                                                                                        }
                                                                                                                        else{
                                                                                                                            ?>
                                                                                                                            <a href="#" class="mx-auto text-center optionchangestatus" serviceid="<?=$data['id'];?>" optionid="<?=$option['id'];?>" cstatus="1"  title="Click here to edit the service">
                                                                                                                                <svg viewBox="0 0 24 24" class="mx-auto w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 16.01C14.2091 16.01 16 14.2191 16 12.01C16 9.80087 14.2091 8.01001 12 8.01001C9.79086 8.01001 8 9.80087 8 12.01C8 14.2191 9.79086 16.01 12 16.01Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2 11.98C8.09 1.31996 15.91 1.32996 22 11.98" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 12.01C15.91 22.67 8.09 22.66 2 12.01" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                                                                                            </a>
                                                                                                                            <?php
                                                                                                                        }
                                                                                                                    ?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <?php    
                                                                                                    }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php    
                                                                                    }
                                                                                ?>
                                                                                
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php
            include_once('includes/add_service_city_modal.php');
            include_once('includes/add_service_variable_modal.php');
            include_once('includes/add_service_variable_option_modal.php');
            include_once('includes/footer_links.php');
        ?>
        <script>
            $(document).ready(function(){
                $('.addservicecity').click(function(e){
                    e.preventDefault();
                    $("#selcity").show();
                    $("#servicecity_action").val('addcity');
                    $("#service_city_id").val('');
                    const scmodal = FlowbiteInstances.getInstance('Modal', 'add-service-city-modal');
                    scmodal.show();
                });
                $('.editservicecity').click(function(e){
                    e.preventDefault();
                    $("#selcity").hide();
                    $("#service_city_id").val($(this).attr('servicecityid'));
                    $("#service_city_price").val($(this).attr('servicecityprice'));
                    $("#service_city_status").val($(this).attr('servicecitystatus'));
                    $("#servicecity_action").val('editcity');
                    const scmodal = FlowbiteInstances.getInstance('Modal', 'add-service-city-modal');
                    scmodal.show();
                });
                $('.servicecitychangestatus').click(function(e){
                    e.preventDefault();
                    var servicecityid = $(this).attr('servicecityid');
                    var status = $(this).attr('cstatus');
                    $.post('service_save.php',{service_city_id:servicecityid,status:status,action:'servicecitychangestatus'},function(data){
                        if(data){
                            location.reload();
                        }
                        else{
                            alert("Something went wrong, please try again");
                        }
                    });
                });
                $('.addvariable').click(function(e){
                    e.preventDefault();
                    $("#service_city_id").val($(this).attr('service_city_id'));
                    $("#variable_id").val('');
                    $("#variable_action").val('addvariable');

                    const modal = FlowbiteInstances.getInstance('Modal', 'add-service-variable-modal');
                    modal.show();
                });
                $('.editvariable').click(function(e){
                    e.preventDefault();
                    $("#service_city_id").val($(this).attr('servicecityid'));
                    $("#variable_id").val($(this).attr('variableid'));
                    $("#variable_name").val($(this).attr('variablename'));
                    $("#variable_status").val($(this).attr('variablestatus'));
                    $("#variable_action").val('editvariable');
                    
                    const modal = FlowbiteInstances.getInstance('Modal', 'add-service-variable-modal');
                    modal.show();
                });
                $('.variablechangestatus').click(function(e){
                    e.preventDefault();
                    
                    var variableid = $(this).attr('variableid');
                    var status = $(this).attr('cstatus');
                    $.post('service_save.php',{variable_id:variableid,status:status,action:'variablechangestatus'},function(data){
                        if(data){
                            location.reload();
                        }
                        else{
                            alert("Something went wrong, please try again");
                        }
                    });
                });
                $('.addoption').click(function(e){
                    e.preventDefault();
                    $("#option_variable_id").val($(this).attr('variableid'));
                    $("#option_id").val('');
                    $("#option_action").val('addoption');
                    const svomodal = FlowbiteInstances.getInstance('Modal', 'add-service-variable-option-modal');
                    svomodal.show();
                    //$('#add-service-variable-option-modal').show();
                });
                $('.editoption').click(function(e){
                    e.preventDefault();
                    $("#option_variable_id").val($(this).attr('optionvariableid'));
                    $("#option_id").val($(this).attr('optionid'));
                    $("#option_name").val($(this).attr('optionname'));
                    $("#option_price").val($(this).attr('optionprice'));
                    $("#option_status").val($(this).attr('optionstatus'));
                    $("#option_action").val('editoption');
                    const svomodale = FlowbiteInstances.getInstance('Modal', 'add-service-variable-option-modal');
                    svomodale.show();
                })
                $('.optionchangestatus').click(function(e){
                    e.preventDefault();
                    var optionid = $(this).attr('optionid');
                    var status = $(this).attr('cstatus');
                    $.post('service_save.php',{option_id:optionid,status:status,action:'optionchangestatus'},function(data){
                        if(data){
                            location.reload();
                        }
                        else{
                            alert("Something went wrong, please try again");
                        }
                    });
                });
            });
        </script>
   </body>
</html>