<div id="edit-scholar-modal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 backdrop-blur-sm transition-opacity"></div>
    <div class="fixed inset-0 z-50 overflow-y-auto ">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all w-full max-w-7xl">
                <!-- Modal Header -->
                <div class="flex justify-between items-center border-b pb-3">
                    <h3 class="text-lg font-semibold text-gray-700">Edit Pre-PHD</h3>
                    <button class="text-gray-500 hover:text-gray-700" id="close-edit-modal">&times;</button>
                </div>

                <!-- Modal Content -->
                <form id="edit-scholar-form" method="POST">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">

                    <!-- Personal Details Section -->
                    <div class="accordion-container space-y-4">
                        <!-- Personal Details Content -->
                        <div class="grid grid-cols-3 gap-4">
                            <div class="mt-4">
                                <label for="edit_name" class="block text-sm font-bold text-blue-700">Name</label>
                                <input type="text" id="edit_name" name="name" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            </div>
                            <div class="mt-4">
                                <label for="edit_pi" class="block text-sm font-bold text-blue-700">PI</label>
                                <select id="edit_pi" name="pi_id" class="mt-1 block w-full px-3 py-2 border border-blue-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </select>
                            </div>
                            <div class="mt-4">
                                <label for="edit_year" class="block text-sm font-bold text-blue-700">Year</label>
                                <input type="text" id="edit_year" name="year" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="mt-4">
                                <label for="edit_attendance" class="block text-sm font-bold text-blue-700">Attendance</label>
                                <input type="text" id="edit_attendance" name="attendance" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div class="mt-4">
                                <label for="edit_401" class="block text-sm font-bold text-blue-700">401</label>
                                <input type="text" id="edit_401" name="401" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div class="mt-4">
                                <label for="edit_402" class="block text-sm font-bold text-blue-700">402</label>
                                <input type="text" id="edit_402" name="402" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="mt-4">
                                <label for="edit_403" class="block text-sm font-bold text-blue-700">403</label>
                                <input type="text" id="edit_403" name="403" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div class="mt-4">
                                <label for="edit_404" class="block text-sm font-bold text-blue-700">404</label>
                                <input type="text" id="edit_404" name="404" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div class="mt-4">
                                <label for="edit_cgpa" class="block text-sm font-bold text-blue-700">Cgpa</label>
                                <input type="text" id="edit_cgpa" name="cgpa" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end gap-3">
                            <button type="button" class="close-modal rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="cancel-edit-modal">
                                Cancel
                            </button>
                            <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                Save Scholar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
