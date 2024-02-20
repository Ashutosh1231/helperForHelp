<!-- Main modal -->
<div id="apply-customer-subscription-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Apply Customer Subscription
                </h3>
                <a href="#" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="apply-customer-subscription-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </a>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form name="applycs" id="applycs" class="space-y-4" action="customer_save.php" method="POST">
                    <input type='hidden' name='acs_customer_id' id='acs_customer_id' value="<?=$id;?>" />
                    <input type="hidden" name="action" id="acs_action" value="applycustomersubscription" />
                    <div class='mb-2' id="selcity">
                        <label for="acs_city_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select City</label>
                        <select id="acs_city_id" name="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option selected>Choose a City</option>
                            <?php
                                if($cityresult['status'] == 'success'){
                                    foreach($cityresult['data'] as $city){
                                        ?>
                                        <option value="<?=$city['id'];?>"><?=$city['name'];?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="acs_subscription_plan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Subscription Plan</label>
                        <select id="acs_subscription_plan" name="subscription_plan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option value="" selected>Select Subscription Plan</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="acs_pirce" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subscription Price</label>
                        <input type="number" disabled id="acs_price" name="acs_price" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="100.00" min="0" step="0.01" required>
                    </div>
                    <div class="mb-2">
                        <label for="acs_discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                        <input type="number" id="acs_discount" name="discount" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="100.00" min="0" step="0.01" value="0" required>
                    </div>
                    <div class="mb-2">
                        <label for="acs_total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                        <input type="number" disabled id="acs_total" name="total" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="100.00" min="0" step="0.01" required>
                    </div>
                    <div class="mb-2">
                        <label for="acs_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="acs_status" name="acs_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option selected="">Select Status</option>
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