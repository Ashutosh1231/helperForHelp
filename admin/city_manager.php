<?php
   
    include_once('../includes/classes.php');
    $db = new DB();
    //$user = new user($db->conn);
    //$user->chkSession();

    $city = new city($db->conn);
    $result = $city->fetchAll();
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Helper4Hire Admin Panel</title>
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
                        <h1 class="text-2xl text-center mt-6">City Manager</h1>
                    </div>

                    <!-- Addd and Search Area -->
                    <div class='flex  justify-between '>
          
                       <!-- Add Button -->
                        <div class='flex py-10 '>
                            <button data-modal-target="add-city-modal" data-modal-toggle="add-city-modal" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-3 sm-py-3 sm:text-sm md:px-4 md:py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add New</button>
                             
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
                            <div class='flex'>
                                <div class='flex w-14 px-2'>ID</div>
                                <div class='flex px-2'>City Name</div>
                            </div>   

                            <div class='flex'>
                                <div class='flex w-20 text-center'>
                                    Edit
                                </div>
                                <div class=" flex w-20 text-center">
                                    Status
                                </div>
                            </div>
                        </div>
                        <?php
                            if($result['status']=="success"){
                                if(isset($result['data'])){
                                    foreach($result['data'] as $data){
                                        ?>
                                        <div class='flex justify-between border-solid border-2  border-slate-200 rounded p-3 mb-2  hover:border-dotted'>
                                            <div class='flex'>
                                                <div class='flex w-14 px-2'><?=$data['id'];?></div>
                                                <div class='flex px-2'><?=$data['name'];?></div>
                                            </div>   

                                            <div class='flex'>
                                                <div class='flex w-20 cursor-pointer'>
                                                        <a href="#" class="text-center editcity" cityid="<?=$data['id'];?>"  title="Click here to edit the city">
                                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M21 21H12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class=" flex w-20">
                                                    <?php
                                                        if($data['status']=='0'){
                                                            ?>
                                                            <a href="#" class="mx-auto text-center changestatus" cityid="<?=$data['id'];?>" cstatus="0"  title="Click here to edit the city" class="editcity">
                                                                    <svg viewBox="0 0 24 24" class="w-5 h-5 mx-auto" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.83 9.17999C14.2706 8.61995 13.5576 8.23846 12.7813 8.08386C12.0049 7.92926 11.2002 8.00851 10.4689 8.31152C9.73758 8.61453 9.11264 9.12769 8.67316 9.78607C8.23367 10.4444 7.99938 11.2184 8 12.01C7.99916 13.0663 8.41619 14.08 9.16004 14.83" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.01C13.0609 16.01 14.0783 15.5886 14.8284 14.8384C15.5786 14.0883 16 13.0709 16 12.01" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.61 6.39004L6.38 17.62C4.6208 15.9966 3.14099 14.0944 2 11.99C6.71 3.76002 12.44 1.89004 17.61 6.39004Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9994 3L17.6094 6.39" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.38 17.62L3 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5695 8.42999C20.4801 9.55186 21.2931 10.7496 21.9995 12.01C17.9995 19.01 13.2695 21.4 8.76953 19.23" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                            </a>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <a href="#" class="mx-auto text-center changestatus" cityid="<?=$data['id'];?>" cstatus="1"  title="Click here to edit the city">
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
                                }
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php
            include_once('includes/add_city_modal.php');
            include_once('includes/footer_links.php');
        ?>
        <script>
            $(document).ready(function(){
                $('.editcity').click(function(e){
                    e.preventDefault();
                    var cityid = $(this).attr('cityid');
                    var action = 'fetchById';
                    $.post("city_save.php",{city_id:cityid,action:action},function(data){
                        if(data){
                            data = JSON.parse(data);
                            $("#city_id").val(data[0].id);
                            $("#name").val(data[0].name);
                            $("#status").val(data[0].status);
                            $("#action").val('edit');
                            const modal = FlowbiteInstances.getInstance('Modal', 'add-city-modal');
                            modal.show();
                        }
                    });
                }); 
                $('.changestatus').click(function(e){
                    e.preventDefault();
                    //alert('yes');
                    var cityid = $(this).attr('cityid');
                    var cstatus = $(this).attr('cstatus');
                    var action = 'changeStatus';
                    $.post("city_save.php",{city_id:cityid,status:cstatus,action:action},function(data){
                        if(data){
                            location.reload();
                        }
                    });
                });
            });
        </script>
   </body>
</html>