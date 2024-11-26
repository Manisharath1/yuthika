<div id="staff-edit-modal" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity hidden">
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <form method="POST" action="" id="edit-staff-form" class="p-6">
                    @csrf
                    @method('PUT')

                    <h2 class="text-lg font-medium text-gray-900 mb-4">
                        Edit Staff Information
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label for="edit_fac_name" class="block text-sm font-medium text-gray-700">Staff Name</label>
                            <input type="text" id="edit_fac_name" name="fac_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div>
                            <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="edit_email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div>
                            <label for="edit_designation" class="block text-sm font-medium text-gray-700">Designation</label>
                            <input type="text" id="edit_designation" name="designation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="edit_empid" class="block text-sm font-medium text-gray-700">Employee ID</label>
                            <input type="text" id="edit_empid" name="empid" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="edit_EPF_PPRN_No" class="block text-sm font-medium text-gray-700">EPF/PPRN No.</label>
                            <input type="text" id="edit_EPF_PPRN_No" name="EPF_PPRN_No" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="edit_ltc_availed" class="block text-sm font-medium text-gray-700">LTC Availed</label>
                            <input type="text" id="edit_ltc_availed" name="ltc_availed" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="edit_pay_level" class="block text-sm font-medium text-gray-700">Pay Level</label>
                            <input type="text" id="edit_pay_level" name="pay_level" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="edit_basic_pay" class="block text-sm font-medium text-gray-700">Basic Pay</label>
                            <input type="text" id="edit_basic_pay" name="basic_pay" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="edit_position_held" class="block text-sm font-medium text-gray-700">Position Held</label>
                            <input type="text" id="edit_position_held" name="position_held" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Cancel
                        </button>
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Update Staff
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
