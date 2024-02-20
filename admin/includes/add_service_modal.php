<!-- Main modal -->
<div id="add-service-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add/Edit Service
                </h3>
                <a href="#" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-service-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </a>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form name="addservice" id="addservice" class="space-y-4" action="service_save.php" method="POST">
                    <input type='hidden' name='service_id' id='service_id'></input>
                    <input type="hidden" name="action" id="action" value="add">
    
                    <div class='mb-2'>
                        <label class='block text-gray-700 text-sm font-bold mb-1' for='service_name'>Service Name</label>
                        <input class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' placeholder='Enter service Name' type='text' id='service_name' name="service_name" required />
                    
                    </div>

                    <div class='mb-2'>
                        <label class='block text-gray-700 text-sm font-bold mb-1' for='shortdesc'>Short Description </label>
                        <textarea class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' placeholder='Enter Short Description' type='text' id='shortdesc' name="shortdesc" required></textarea>
                    </div>

                    <div class='mb-2'>
                        <label class='block text-gray-700 text-sm font-bold mb-1' for='longdesc'>Long Description</label>
                        <textarea class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' placeholder='Enter Long Description' type='text' id='longdesc' name="longdesc" required></textarea>
                    </div>

                    <div class='mb-2'>
                        <label class='block text-gray-700 text-sm font-bold mb-1' for='features'>Features</label>
                        <textarea class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' placeholder='Enter Features' type='text' id='features' name="features" required></textarea>
                    </div>

                    <div class='mb-2'>
                        <label class='block text-gray-700 text-sm font-bold mb-1'>Status</label>
                        <select class="select select-bordered w-full max-w-xs" id="status" name="status" required>
                            <option disabled selected>Select Status</option>
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