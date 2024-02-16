<div id="logo-sidebar" class="fixed md:relative top-0 left-0 z-40 w-64 h-screen md:pt-5 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <!---->
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="dashboard.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"  class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="master-submenu" data-collapse-toggle="master-submenu">
                    <svg class="flex-shrink-0 w-5 h-5 fill-gray-500 dark:fill-gray-400 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 410 410" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M360.684,250.083H49.318C22.088,250.083,0,272.169,0,299.403c0,27.23,22.088,49.306,49.318,49.306h311.365 c27.243,0,49.316-22.075,49.316-49.306C410,272.169,387.927,250.083,360.684,250.083z M290.461,310.503c-8.283,0-15-6.717-15-15 c0-8.283,6.717-15,15-15s15,6.717,15,15C305.461,303.787,298.744,310.503,290.461,310.503z M341,310.503c-8.283,0-15-6.717-15-15 c0-8.283,6.717-15,15-15s15,6.717,15,15C356,303.787,349.283,310.503,341,310.503z"></path> <path d="M360.684,233.861c16.054,0,30.77,5.812,42.177,15.43L317.343,64.195c-0.818-1.77-2.589-2.903-4.539-2.903l-39.147,0 l-125.081,0.001l-51.38-0.001h0c-1.949,0-3.721,1.133-4.539,2.903L7.139,249.292c11.408-9.618,26.124-15.431,42.179-15.431H360.684 z M160.94,115.263c1.555-0.794,3.221-1.197,4.953-1.197c4.119,0,7.841,2.276,9.715,5.941c2.015,3.938,1.46,8.664-1.414,12.038 l17.546,14.976l9.101-22.042c-4.095-1.694-6.741-5.65-6.741-10.078c0-6.009,4.89-10.898,10.901-10.898 c6.01,0,10.899,4.889,10.899,10.898c0,4.428-2.646,8.384-6.74,10.078l9.102,22.042l17.544-14.976 c-2.873-3.374-3.428-8.1-1.412-12.039c1.872-3.663,5.595-5.939,9.714-5.939c1.732,0,3.398,0.402,4.95,1.196 c5.351,2.739,7.479,9.318,4.746,14.667c-2.007,3.923-6.171,6.254-10.584,5.904l-0.003,0l-3.523,43.265 c-0.105,1.297-1.189,2.297-2.492,2.297h-64.404c-1.302,0-2.386-0.999-2.492-2.297l-3.521-43.264 c-4.484,0.355-8.582-1.98-10.588-5.902C153.462,124.58,155.59,118.001,160.94,115.263z"></path> </g> </g></svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Master</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="master-submenu" class="hidden py-2 space-y-2">
                    
                    <li>
                        <a href="city_manager.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">City Manager</a>
                    </li>
                    <li>
                        <a href="service_manager.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Service Manager</a>
                    </li>
                    <li>
                        <a href="customer_subscriptions_manager.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Customer Subscriptions Manager</a>
                    </li>
                    <li>
                        <a href="worker_subscriptions_manager.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Worker Subscriptions Manager</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="customer_manager.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Customer Manager</span>
                </a>
            </li>
            <li>
                <a href="worker_manager.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Worker Manager</span>
                    
                </a>
            </li>
            <li>
                <a href="allocation_manager.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Allocation Manager</span>
                </a>
            </li>
            <li>
                <a href="admin_users.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 fill-gray-500 group-hover:fill-gray-900 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M24,7l-1.7-1.7c-0.5-0.5-1.2-0.5-1.7,0L10,15.8l-4.3-4.2c-0.5-0.5-1.2-0.5-1.7,0l-1.7,1.7 c-0.5,0.5-0.5,1.2,0,1.7l5.9,5.9c0.5,0.5,1.1,0.7,1.7,0.7c0.6,0,1.2-0.2,1.7-0.7L24,8.7C24.4,8.3,24.4,7.5,24,7z"></path> </g> </g> <g> <path d="M48.4,18.4H27.5c-0.9,0-1.6-0.7-1.6-1.6v-3.2c0-0.9,0.7-1.6,1.6-1.6h20.9c0.9,0,1.6,0.7,1.6,1.6v3.2 C50,17.7,49.3,18.4,48.4,18.4z"></path> </g> <g> <path d="M48.4,32.7H22.7c-0.9,0-1.6-0.7-1.6-1.6v-3.2c0-0.9,0.7-1.6,1.6-1.6h25.7c0.9,0,1.6,0.7,1.6,1.6v3.2 C50,32,49.3,32.7,48.4,32.7z"></path> </g> <g> <path d="M13,32.7H9.8c-0.9,0-1.6-0.7-1.6-1.6v-3.2c0-0.9,0.7-1.6,1.6-1.6H13c0.9,0,1.6,0.7,1.6,1.6v3.2 C14.7,32,13.9,32.7,13,32.7z"></path> </g> <g> <path d="M13,47H9.8c-0.9,0-1.6-0.7-1.6-1.6v-3.2c0-0.9,0.7-1.6,1.6-1.6H13c0.9,0,1.6,0.7,1.6,1.6v3.2 C14.7,46.3,13.9,47,13,47z"></path> </g> <g> <path d="M48.4,47H22.7c-0.9,0-1.6-0.7-1.6-1.6v-3.2c0-0.9,0.7-1.6,1.6-1.6h25.7c0.9,0,1.6,0.7,1.6,1.6v3.2 C50,46.3,49.3,47,48.4,47z"></path> </g> </g></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Admin User Manager</span>
                </a>
            </li>
            
           
        </ul>
    </div>
</div>