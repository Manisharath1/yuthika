<!-- Edit Staff Modal -->
<div id="edit-staff-modal" class="fixed z-50 inset-0 hidden overflow-y-auto bg-gray-900 bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-lg font-semibold text-gray-700">Edit Staff</h3>
                <button class="text-gray-500 hover:text-gray-700" id="close-edit-modal">&times;</button>
            </div>
            <!-- Modal Content -->
            <form id="edit-staff-form" method="POST">
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">

                <div class="mt-4">
                    <label for="edit_fac_name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="edit_fac_name" name="fac_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <div class="mt-4">
                    <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="edit_email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <div class="mt-4">
                    <label for="edit_designation" class="block text-sm font-medium text-gray-700">Designation</label>
                    <input type="text" id="edit_designation" name="designation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="mt-4">
                    <label for="edit_empid" class="block text-sm font-medium text-gray-700">Emp. ID</label>
                    <input type="text" id="edit_empid" name="empid" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="mt-4">
                    <label for="edit_EPF_PPRN_No" class="block text-sm font-medium text-gray-700">EPF/PPRN No.</label>
                    <input type="text" id="edit_EPF_PPRN_No" name="EPF_PPRN_No" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="mt-4">
                    <label for="edit_ltc_availed" class="block text-sm font-medium text-gray-700">LTC Availed</label>
                    <input type="text" id="edit_ltc_availed" name="ltc_availed" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="mt-4">
                    <label for="edit_pay_level" class="block text-sm font-medium text-gray-700">Pay Level</label>
                    <input type="text" id="edit_pay_level" name="pay_level" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="mt-4">
                    <label for="edit_basic_pay" class="block text-sm font-medium text-gray-700">Basic Pay</label>
                    <input type="text" id="edit_basic_pay" name="basic_pay" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="mt-4">
                    <label for="edit_position_held" class="block text-sm font-medium text-gray-700">Position Held</label>
                    <input type="text" id="edit_position_held" name="position_held" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <!-- Add more input fields as necessary -->
                <!-- Modal Footer -->
                <div class="mt-6 flex justify-end space-x-4">
                    <button type="button" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md" id="cancel-edit-modal">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
