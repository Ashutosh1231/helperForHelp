<!-- Main modal -->
<div id="add-service-variable-option-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add/Edit Variable Option
                </h3>
                <a href="#" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-service-variable-option-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </a>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form name="addvariableoption" id="addvariableoption" class="space-y-4" action="service_save.php" method="POST">
                    <input type="hidden" name="service_id" id="service_id" value="<?=$id?>" />
                    <input type='hidden' name='variable_id' id='option_variable_id' />
                    <input type='hidden' name='option_id' id='option_id' />
                    <input type="hidden" name="action" id="option_action" value="addoption" />
    
                    <div class='mb-2'>

                        <label for="option_name"  class='block text-gray-700 text-sm font-bold mb-1' for='cityName'>Option Name</label>
                        <input id="option_name" name="option_name" class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' placeholder='Enter Variable Name' type='text' required></input>
                    </div>

                    <div class='mb-2'>
                        <label for="option_price"  class='block text-gray-700 text-sm font-bold mb-1' >Option Price <span class="text-xs font-thin">The price will be added in Base Price of Servcie</span></label>
                        <input id="option_price" name="option_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Variable Options Price" type="number" step="0.01" required></input>
                    </div>

                    <div class="mb-2">
                        <label for="option_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="option_status" name="option_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option selected="">Select category</option>
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                        
                    <div class='my-4 '>
                        <button class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"  >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 