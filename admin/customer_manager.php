<?php
   
    include_once('../includes/classes.php');
    $db = new DB();
    //$user = new user($db->conn);
    //$user->chkSession();
    $customer = new customer($db->conn);
    $result = $customer->fetchAll();
    $subscription = '';
    $subs_plan = new subscriptionPlan($db->conn);
    $subs_result = $subs_plan->fetchAll();
    $city = new city($db->conn);
    $cityresult = $city->fetchAll();
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
                <div class="w-full max-w-screen px-4 mx-auto lg:px-12">
                    <div class="w-full">
                        <h1 class="text-2xl text-center mt-6">Customer Manager</h1>
                    </div>

                    <!-- Addd and Search Area -->
                    <div class='flex  justify-between '>
          
                        <!-- Add Button -->
                        <div class='flex py-10 '>
                            <button data-modal-target="add-customer-modal" id="addcustomerbtn" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-3 sm-py-3 sm:text-sm md:px-4 md:py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add New</button>
                        </div>

                        
                        
                        <!-- Search Bar -->
                        <div class='flex  py-8 '>
                            <form>   
                                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                </div>
                                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required/>
                                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:mb-0.5 sm:p-1 md:p-0  sm:rounded-sm md:rounded-md lg:rounded-lg  lg:px-3 lg:py-1.5 md:px-2 md:py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                </div>
                            </form>
                        </div>    
                        
                    </div>
                    <div class="w-full">
                        <div class='flex justify-between border-solid border-2  border-blue-700 rounded p-3 mb-2'>
                            <div class='flex w-16'><p class="w-full text-center">ID</p></div>
                            <div class='flex-1 '><p>Customer Name</p></div>
                            <div class='flex w-24'><p class="w-full text-center">Subscription</p></div>
                            <div class='flex w-24'><p class="w-full text-center">City<br>Pincode</p></div>
                            <div class='flex w-16'><p class="w-full text-center">Edit</p></div>
                            <div class=" flex w-16"><p class="w-full text-center">Status</p></div>
                            <div class=" flex w-16"><p class="w-full text-center">Address</p></div>
                            <div class=" flex w-16 mx-auto"><p class="w-full text-center">Service</p></div>
                            <div class="w-16 mx-auto"><p class="w-full text-center">Payment</p></div>
                        </div>
                        <?php
                            if($result['status']=="success"){
                                if(isset($result['data'])){
                                    foreach($result['data'] as $data){
                                        $customersubscription = new customerSubscription($db->conn);
                                        $cussubsresult = $customersubscription->fetchByCustomerIdandEndDate($data['id']);
                                        
                                        ?>
                                        <div class='flex justify-between border-solid border-2  border-slate-200 rounded p-3 mb-2  hover:border-dotted'>
                                            
                                                <div class='flex w-16'><p class="w-full text-center"><?=$data['id'];?></div>
                                                <div class='flex-1'>
                                                    <p class="w-full">
                                                        <?=$data['fname'];?> <?=$data['mname'];?> <?=$data['lname'];?><br><?=$data['email'];?>
                                                    </p>
                                                    <div class="flex">
                                                        <div><?=$data['mobile1'];?></div>
                                                        <?php
                                                            if($data['whatsapp1'] == '1'){
                                                                ?>
                                                                <svg viewBox="0 0 32 32" class="w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path> <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path> <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path> <defs> <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"> <stop stop-color="#5BD066"></stop> <stop offset="1" stop-color="#27B43E"></stop> </linearGradient> </defs> </g></svg>
                                                                <?php
                                                            }
                                                        ?>
                                                    </div> 
                                                    <div class="flex">
                                                        <div><?=$data['mobile2'];?></div>
                                                        <?php
                                                            if($data['whatsapp2'] == '1'){
                                                                ?>
                                                                <svg viewBox="0 0 32 32" class="w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path> <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path> <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path> <defs> <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"> <stop stop-color="#5BD066"></stop> <stop offset="1" stop-color="#27B43E"></stop> </linearGradient> </defs> </g></svg>
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    
                                                </div>
                                                <div class='flex w-24'>
                                                    <p class="w-full text-center">
                                                        <?php
                                                            if($cussubsresult['status'] == 'success'){
                                                                foreach($cussubsresult['data'] as $cussubsdata){
                                                                    $subsnamekey = array_search($cussubsdata['subscription_id'],array_column($subs_result['data'],'id'));
                                                                    if($subsnamekey !== false){
                                                                        ?>
                                                                        <?=$subs_result['data'][$subsnamekey]['name'];?><br><?=$cussubsdata['end_date'];?>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            else{
                                                                ?>
                                                                <a href="#" data-modal-target="apply-customer-subscription-modal" class="addcustomersubscriptionbtn w-full mx-auto text-center"><svg fill="#000" class="w-6 h-6 mx-auto" viewBox="0 0 32 32" id="Outlined" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Fill"> <circle cx="8" cy="7" r="1"></circle> <circle cx="11" cy="7" r="1"></circle> <circle cx="14" cy="7" r="1"></circle> <polygon points="15 24 17 24 17 20 21 20 21 18 17 18 17 14 15 14 15 18 11 18 11 20 15 20 15 24"></polygon> <path d="M26,3H6A3,3,0,0,0,3,6V29H29V6A3,3,0,0,0,26,3Zm1,24H5V11H27ZM5,9V6A1,1,0,0,1,6,5H26a1,1,0,0,1,1,1V9Z"></path> </g> </g></svg></a>
                                                                <?php
                                                            }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class='flex w-24 mx-auto'>
                                                    <p class="w-full text-center">
                                                        <?=$data['city'];?><br><?=$data['pincode'];?></p>
                                                </div>  

                                            
                                                <div class='flex w-16 mx-auto cursor-pointer'>
                                                    <a href="#" class="editcustomerbtn w-full mx-auto text-center" customerid="<?=$data['id'];?>"  title="Click here to edit the customer">
                                                        <svg class="w-5 h-5 mx-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 21H12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                                    </a>
                                                </div>
                                                <div class=" flex w-16">
                                                    <?php
                                                        if($data['status']=='0'){
                                                            ?>
                                                            <a href="#" class="customerchangestatus w-full mx-auto text-center" customerid="<?=$data['id'];?>" cstatus="<?=$data['status'];?>" title="Click here to enable the customer">
                                                                <svg viewBox="0 0 24 24" class="w-5 h-5 mx-auto" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.83 9.17999C14.2706 8.61995 13.5576 8.23846 12.7813 8.08386C12.0049 7.92926 11.2002 8.00851 10.4689 8.31152C9.73758 8.61453 9.11264 9.12769 8.67316 9.78607C8.23367 10.4444 7.99938 11.2184 8 12.01C7.99916 13.0663 8.41619 14.08 9.16004 14.83" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.01C13.0609 16.01 14.0783 15.5886 14.8284 14.8384C15.5786 14.0883 16 13.0709 16 12.01" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.61 6.39004L6.38 17.62C4.6208 15.9966 3.14099 14.0944 2 11.99C6.71 3.76002 12.44 1.89004 17.61 6.39004Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9994 3L17.6094 6.39" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.38 17.62L3 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5695 8.42999C20.4801 9.55186 21.2931 10.7496 21.9995 12.01C17.9995 19.01 13.2695 21.4 8.76953 19.23" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                            </a>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <a href="#" class="customerchangestatus w-full mx-auto text-center" customerid="<?=$data['id'];?>" cstatus="<?=$data['status'];?>" title="Click here to disable the customer">
                                                                <svg viewBox="0 0 24 24" class="mx-auto w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 16.01C14.2091 16.01 16 14.2191 16 12.01C16 9.80087 14.2091 8.01001 12 8.01001C9.79086 8.01001 8 9.80087 8 12.01C8 14.2191 9.79086 16.01 12 16.01Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2 11.98C8.09 1.31996 15.91 1.32996 22 11.98" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 12.01C15.91 22.67 8.09 22.66 2 12.01" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                            </a>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                                
                                                <div class="w-16">
                                                    <a href="#" class="customeraddress text-center" customerid="<?=$data['id'];?>"  title="Click here to manager customers addresses">
                                                        <svg fill="#000000" class="w-5 h-5 mx-auto" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><path d="M1688.412 1807.059H332.059v-326.275h56.515c31.196 0 56.514-25.299 56.514-56.47 0-31.172-25.318-56.47-56.514-56.47h-56.515V1029.02h56.515c31.196 0 56.514-25.3 56.514-56.471 0-31.172-25.318-56.47-56.514-56.47h-56.515V577.254h56.515c31.196 0 56.514-25.299 56.514-56.47 0-31.172-25.318-56.471-56.514-56.471h-56.515V112.942h1356.353v1694.117ZM219.029 0v464.314h-56.514c-31.196 0-56.515 25.299-56.515 56.47 0 31.172 25.319 56.47 56.515 56.47h56.514v338.824h-56.514c-31.196 0-56.515 25.3-56.515 56.471 0 31.172 25.319 56.47 56.515 56.47h56.514v338.824h-56.514c-31.196 0-56.515 25.299-56.515 56.47 0 31.172 25.319 56.471 56.515 56.471h56.514V1920h1582.412V0H219.03ZM1029 499c112.782 0 226.444 91.718 226.444 204.5v102.25c0 44.99-22.423 87.424-47.167 121.269 40.798 9.611 66.225 21.165 105.285 38.037 75.563 32.72 124.438 106.646 124.438 188.446v140.799l-24.029 15.03c-69.632 43.457-207.772 111.862-386.607 111.862-17.485 0-35.174-.716-53.375-2.045-116.053-8.896-230.164-46.933-330.165-110.021L620 1294.096v-139.98c0-81.902 49.163-152.712 122.495-187.629 40.64-19.35 59.25-30.087 91.408-39.468-25.255-34.05-41.383-75.665-41.383-121.269V703.5C792.52 590.718 916.218 499 1029 499Zm-10.58 510.61c-80.062 1.432-159 18.1-235.278 51.126-37.014 15.95-60.839 52.76-60.839 93.763v82.925c79.96 45.603 169.122 73.21 259.51 80.164 156.034 11.759 281.904-39.98 353.99-80.369v-83.333c0-41.003-24.642-78.12-62.679-94.582-63.088-27.198-129.346-43.66-196.831-48.773-13.19-1.022-26.278-.511-39.469-.716-1.329.052-5.036.026-8.857-.025l-.918-.013-.916-.013c-3.192-.05-6.21-.11-7.714-.153Zm10.74-408.307c-56.442 0-141.022 45.91-141.022 102.25v102.25c0 55.113 82.842 99.592 137.545 101.535 2.148 0 4.295.102 6.442.102 54.908-1.636 128.086-46.32 128.086-101.637v-102.25c0-56.34-74.61-102.25-131.051-102.25Z" fill-rule="evenodd"/></svg>
                                                    </a>
                                                </div>

                                                <div class="flex w-16 px-2">
                                                    <a href="#" class="customerservices mx-auto text-center" customerid="<?=$data['id'];?>"  title="Click here to edit the city">
                                                        <svg fill="#000000" class="w-5 h-5 mx-auto" viewBox="0 0 512 512" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"><title/><path d="M219.59,292.5a8,8,0,0,1,0,11.31l-90.05,90.06a8,8,0,1,1-11.31-11.32l90.05-90.05A8,8,0,0,1,219.59,292.5Zm208.74,96A8,8,0,0,1,415,391.78l-27.15-27.15L373.1,379.39l27.16,27.17a8,8,0,0,1-3.32,13.3,51.5,51.5,0,0,1-15.08,2.21c-15.64,0-31.77-6.7-43.91-18.84-11.61-11.61-18.35-26.77-18.82-42.06l-52.38-52.39a8,8,0,0,1-1.77-1.33l-5.57-5.57a43.89,43.89,0,0,1-11.05,18.41l-97.47,97.47a43.34,43.34,0,0,1-29.17,12.84l-1.5,0a38.51,38.51,0,0,1-27.56-11.22c-15.59-15.59-14.85-41.71,1.66-58.22l97.47-97.47a44,44,0,0,1,18.4-11.05l-5.55-5.55a8,8,0,0,1-1.33-1.77l-52.55-52.56c-15.28-.46-30.43-7.2-42-18.81-16.11-16.13-22.64-39.27-16.64-59a8,8,0,0,1,13.31-3.32l27.16,27.15,14.76-14.77L120.15,96.91a8,8,0,0,1,3.32-13.31c19.71-6,42.87.51,59,16.63,11.62,11.61,18.36,26.77,18.83,42.07l70,70L379.11,104.42A7.71,7.71,0,0,1,381,103L418.3,83A8,8,0,0,1,429.13,93.8l-20.08,37.3a8,8,0,0,1-1.39,1.87L299.81,240.82l69.85,69.85c15.28.46,30.42,7.2,42,18.81C427.81,345.61,434.33,368.76,428.33,388.46ZM282.73,278.38l-49-49-11.89,11.88,49,49Zm-16.16-38.8,5.93,5.93,123-123,6.9-12.82-12.83,6.89ZM159.73,179.14l50.79,50.79,17.54-17.54a8,8,0,0,1,11.31,0l15.88,15.88,4.69-4.69-72.31-72.31a8,8,0,0,1-2.34-5.93c.41-12.08-4.74-24.4-14.14-33.79a47.85,47.85,0,0,0-27.61-13.88l20.74,20.75a8,8,0,0,1,0,11.31L138.2,155.81a8,8,0,0,1-11.31,0l-20.73-20.73A48,48,0,0,0,120,162.67c9.4,9.39,21.71,14.54,33.77,14.13h.28A8,8,0,0,1,159.73,179.14Zm85.41,108.47-20.68-20.67A27.17,27.17,0,0,0,203.11,275L105.63,372.5c-10.27,10.27-11,26.24-1.65,35.6a22.78,22.78,0,0,0,17.17,6.51,27.4,27.4,0,0,0,18.42-8.16L237.05,309a27.4,27.4,0,0,0,8.16-18.42A24,24,0,0,0,245.14,287.61Zm169.11,80.77a47.87,47.87,0,0,0-13.87-27.58c-9.4-9.4-21.71-14.54-33.76-14.13a8,8,0,0,1-5.93-2.34L288.5,252.14l-4.69,4.69,15.89,15.9a8,8,0,0,1,0,11.31l-17.53,17.53,50.61,50.63a8,8,0,0,1,2.34,5.92c-.4,12.08,4.75,24.4,14.14,33.8a47.89,47.89,0,0,0,27.61,13.87l-20.74-20.74a8,8,0,0,1,0-11.32l26.08-26.08a8,8,0,0,1,11.31,0Z"/></g></svg>
                                                    </a>
                                                </div>
                                                <div class="flex w-16">
                                                    <a href="#" class="customrepayments mx-auto text-center" customerid="<?=$data['id'];?>"  title="Click here to manager customer payments">
                                                        <svg fill="#000000" class="w-5 h-5 mx-auto" version="1.1"  id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g><g><path d="M316.526,106.415c-36.935,0-66.984,30.049-66.984,66.985c0,36.935,30.049,66.984,66.984,66.984
                                                                c36.935,0,66.985-30.049,66.985-66.984C383.511,136.464,353.462,106.415,316.526,106.415z M316.526,219.987
                                                                c-25.688,0-46.586-20.898-46.586-46.586c0-25.688,20.898-46.587,46.586-46.587c25.689,0,46.587,20.899,46.587,46.587
                                                                C363.113,199.088,342.214,219.987,316.526,219.987z"/></g></g><g><g><path d="M320.538,165.002v-13.104c5.834,0.449,7.539,3.321,10.501,3.321c3.949,0,5.565-4.936,5.565-7.36
                                                                c0-6.193-10.501-7.628-16.066-7.809v-2.244c0-1.257-1.705-2.423-3.411-2.423c-1.975,0-3.411,1.167-3.411,2.423v2.513
                                                                c-9.514,1.346-17.951,6.821-17.951,18.219c0,11.488,9.693,15.348,17.951,18.489v14.539c-6.642-1.167-9.693-6.462-13.463-6.462
                                                                c-3.411,0-6.102,4.488-6.102,7.539c0,5.744,8.796,11.308,19.566,11.667v2.244c0,1.257,1.436,2.423,3.411,2.423
                                                                c1.705,0,3.411-1.167,3.411-2.423v-2.603c10.501-1.705,17.681-8.436,17.681-19.566
                                                                C338.219,172.272,328.705,168.053,320.538,165.002z M314.615,162.848c-3.411-1.436-5.744-3.052-5.744-5.654
                                                                c0-2.154,1.705-4.218,5.744-5.026V162.848z M319.64,191.479v-12.027c3.231,1.526,5.475,3.411,5.475,6.372
                                                                C325.116,189.055,322.693,190.761,319.64,191.479z"/></g></g><g><g><path d="M501.801,59.038H131.252c-5.633,0-10.199,4.566-10.199,10.199v198.127H10.199C4.566,267.364,0,271.93,0,277.563v165.2
                                                                c0,5.633,4.566,10.199,10.199,10.199h278.885c5.632,0,10.199-4.566,10.199-10.199v-155h202.517
                                                                c5.632,0,10.199-4.566,10.199-10.199V69.237C512,63.604,507.433,59.038,501.801,59.038z M141.451,79.437h15.579l-7.789,7.79
                                                                l-7.79,7.79V79.437z M141.451,251.786l15.578,15.578h-15.578V251.786z M278.885,432.564H20.398v-16.017h258.487V432.564z
                                                                M278.885,396.148H20.398V381.02h258.487V396.148z M278.885,287.762v72.86H20.398v-72.86L278.885,287.762L278.885,287.762z
                                                                M491.602,267.364h-15.578l15.578-15.578V267.364z M491.602,222.936l-44.428,44.428H185.878l-44.428-44.428v-99.073l44.428-44.428
                                                                h261.295l44.428,44.428V222.936z M491.602,95.016l-15.579-15.579h15.579V95.016z"/></g></g><g><g><path d="M468.751,145.728h-3.668c-5.632,0-10.199,4.566-10.199,10.199c0,5.633,4.567,10.199,10.199,10.199h3.668
                                                                c5.632,0,10.199-4.566,10.199-10.199C478.951,150.294,474.383,145.728,468.751,145.728z"/></g></g><g><g><path d="M435.15,145.728h-28.224c-5.632,0-10.199,4.566-10.199,10.199c0,5.633,4.566,10.199,10.199,10.199h28.224
                                                                c5.632,0,10.199-4.566,10.199-10.199C445.349,150.294,440.782,145.728,435.15,145.728z"/></g></g><g><g><path d="M468.751,180.674h-61.826c-5.632,0-10.199,4.566-10.199,10.199c0,5.633,4.567,10.199,10.199,10.199h61.826
                                                                c5.632,0,10.199-4.566,10.199-10.199C478.951,185.24,474.383,180.674,468.751,180.674z"/></g></g><g><g><path d="M227.834,145.728h-61.827c-5.633,0-10.199,4.566-10.199,10.199c0,5.633,4.566,10.199,10.199,10.199h61.827
                                                                c5.633,0,10.199-4.566,10.199-10.199C238.033,150.294,233.467,145.728,227.834,145.728z"/></g></g><g><g><path d="M227.834,180.674h-61.827c-5.633,0-10.199,4.566-10.199,10.199c0,5.633,4.566,10.199,10.199,10.199h61.827
                                                                c5.633,0,10.199-4.566,10.199-10.199C238.033,185.24,233.467,180.674,227.834,180.674z"/></g></g><g><g><path d="M99.016,314.437H54.608c-5.633,0-10.199,4.566-10.199,10.199c0,5.633,4.566,10.199,10.199,10.199h44.408
                                                                c5.633,0,10.199-4.566,10.199-10.199C109.215,319.004,104.649,314.437,99.016,314.437z"/></g></g></svg>
                                                    
                                                    </a>
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
            include_once('includes/add_customer_modal.php');
            
            /* include_once('includes/add_payment_customer_manager.php');
            include_once('includes/add_service_customer_manager.php');
            include_once('includes/add_address_customer_manager.php'); */
            include_once('includes/footer_links.php');
        ?>
        <script>
            $(document).ready(function(){
                $("#addcustomerbtn").click(function(e){
                    e.preventDefault();
                    $("#customer_id").val('');
                    $("#customer_action").val('addcustomer');
                    $("#fname").val('');
                    $("#mname").val('');                 
                    $("#lname").val('');
                    $("#fname").val('');
                    $("#dob").val('');
                    $("#male").prop('checked',false);
                    $("#female").prop('checked',false);    
                    $("#currentaddress").val('');
                    $("#currentcity").val('');
                    $("#currentpin").val('');
                    $("#email").val('');
                    $("#mobile").val('');
                    $("#alternate_mobile").val('');
                    $("#whatsapp1").prop('checked',false);    
                    $("#whatsapp2").prop('checked',false);    
                    $("#pwdrow").show();
                    $("#password").attr("required",true);
                    $("#repassword").attr("required",true);
                    $("#status").val('');
                    const customermodal = FlowbiteInstances.getInstance('Modal','add-customer-modal');
                    customermodal.show();
                });
                $(".editcustomerbtn").click(function(e){
                    e.preventDefault();
                    var id = $(this).attr('customerid');
                    var action = 'fetchById';
                    $.post("customer_save.php",{id:id,action:action},function(data){
                        if(data){
                            data = JSON.parse(data);
                            if(data.status == 'success'){
                                $("#customer_id").val(data.data[0].id);
                                $("#customer_action").val('editcustomer');
                                $("#fname").val(data.data[0].fname);
                                $("#mname").val(data.data[0].mname);                 
                                $("#lname").val(data.data[0].lname);
                                $("#fname").val(data.data[0].fname);
                                $("#dob").val(data.data[0].birth_date);
                                if(data.data[0].gender == 'M'){
                                    $("#male").prop('checked',true);
                                }
                                else{
                                    $("#female").prop('checked',true);    
                                }
                                $("#currentaddress").val(data.data[0].address);
                                $("#currentcity").val(data.data[0].city);
                                $("#currentpin").val(data.data[0].pincode);
                                $("#email").val(data.data[0].email);
                                $("#mobile").val(data.data[0].mobile1);
                                $("#alternate_mobile").val(data.data[0].mobile2);
                                if(data.data[0].whatsapp1 == '1'){
                                    $("#whatsapp1").prop('checked',true);    
                                }
                                if(data.data[0].whatsapp2 == '1'){
                                    $("#whatsapp2").prop('checked',true);    
                                }
                                $("#password").removeAttr('required');
                                $("#repassword").removeAttr('required');
                                $("#pwdrow").hide();
                                $("#status").val(data.data[0].status);
                                const customermodal = FlowbiteInstances.getInstance('Modal','add-customer-modal');
                                customermodal.show();
                            }
                            else{
                                alert("Something went wrong. Please try again.");
                            }
                        }
                        else{
                            alert("Something went wrong. Please try again.");
                        }
                    });
                    
                });
                
                $(".customerchangestatus").click(function(e){
                    e.preventDefault();
                    var id = $(this).attr('customerid');
                    var status = $(this).attr('cstatus');
                    var action = 'changestatus';
                    $.post('customer_save.php',{id:id,status:status,action:action}, function(data){
                        if(data){

                            location.reload();
                        }
                        else{
                            alert("Something went wrong. Please try again.");
                        }
                    });
                });

                

            });
        </script>
   </body>
</html>