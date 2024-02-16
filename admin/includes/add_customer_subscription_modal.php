<!-- Main modal -->
<div id="add-customer-subscription-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Add/Edit Customer Subscription 
                </h3>
                <a href="#" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"  data-modal-hide="add-customer-subscription-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </a>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form name="add-customer-subscription-model" id="add-customer-subscription-model" class="space-y-4" action="customer_subscription_plan_save.php" method="POST">
                        <input type='hidden' id='id' name="id" />
                        <input type="hidden" id="action" name="action" />
                        <div class='mb-2'>
                            <label class='block text-gray-700 text-sm font-bold mb-1' for='name'>Name</label>
                            <input  class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' placeholder='Enter Name' type='text' id='name' name="name" />
                        </div>

                        <div class='w-full mb-2'>
                            <label class='block text-gray-700 text-sm font-bold mb-1'>City Name</label>
                            <select id="city" name="city[]" multiple="multiple" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5" style="width:100%">
                                <?php 
                                    if($cityresult['status']=='success'){
                                        foreach($cityresult['data'] as $city){
                                            ?>
                                            <option value="<?=$city['id']?>"><?=$city['name']?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class='mb-2'>
                            <label class='block text-gray-700 text-sm font-bold mb-1' for='duration'>Duration <span class="text-xs">(in months)</span</label>
                            <input id='duration' name="duration" class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' placeholder='Enter Duration'  type='number' />
                        </div>

                        <div class='mb-2'>
                            <label class='block text-gray-700 text-sm font-bold mb-1' for='rep'>Replacements</label>
                            <input id='rep' name="replacements" class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' placeholder='Enter No. of Free Replacements' type='number' />
                        </div>

                        <div class='mb-2'>
                            <label class='block text-gray-700 text-sm font-bold mb-1' for='price'>Price</label>
                            <input id='price' name="price" class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' placeholder='Enter Base Price' type='number' />
                        </div>

                        <div class="mb-2">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
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