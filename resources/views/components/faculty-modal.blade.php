<!-- resources/views/components/scholar-modal.blade.php -->
<div id="addFacultyModal" class="fixed inset-0 z-50 hidden">
    <!-- Background overlay -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <!-- Modal panel -->
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all w-full max-w-2xl">
                <div class="absolute right-0 top-0 pr-4 pt-4">
                    <button type="button" class="close-modal rounded-md bg-white text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="text-xl font-semibold mb-6 text-gray-700">Add Faculty</div>

                <form id="addFacultyForm" action="{{ route('faculty.index') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Faculty Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Faculty Name</label>
                            <input type="text" name="fac_name" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Designation -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Designation</label>
                            <input type="text" name="designation" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Employee ID -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Emp ID</label>
                            <input type="text" name="empid"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- EPF/PPRN Number -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">EPF/PPRN No</label>
                            <input type="text" name="EPF_PPRN_No"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- LTC Availed -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">LTC Availed</label>
                            <input type="text" name="ltc_availed"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Pay Level -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pay Level</label>
                            <input type="text" name="pay_level"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Basic Pay -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Basic Pay</label>
                            <input type="text" name="basic_pay"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Position Held -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Positions Held</label>
                            <input type="text" name="position_held"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Photo -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Photo</label>
                            <input type="file" name="photo" accept="image/*"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Service Document -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Service Document</label>
                            <input type="file" name="document" accept=".pdf,.doc,.docx"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <!-- Cancel Button -->
                        <button type="button" class="close-modal rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Cancel
                        </button>
                        <!-- Submit Button -->
                        <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                            Save Faculty
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
