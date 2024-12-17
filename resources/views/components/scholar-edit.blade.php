<!-- Edit Scholar Modal -->
<div id="edit-scholar-modal" class="fixed z-50 inset-0 hidden overflow-y-auto bg-gray-900 bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-7xl p-6 max-h-screen overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-lg font-semibold text-gray-700">Edit Scholar</h3>
                <button class="text-gray-500 hover:text-gray-700" id="close-edit-modal">&times;</button>
            </div>
            <!-- Modal Content -->
            <form id="edit-scholar-form" method="POST">
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">

                <!-- Personal Details Section -->
                <div class="accordion-container space-y-4">
                    <div class="border rounded-lg">
                        <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                            <h4 class="text-xl font-bold text-gray-800">Personal Details</h4>
                            <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="accordion-content p-4 hidden">
                            <!-- Personal Details Content -->
                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_name" class="block text-lg font-bold text-blue-700">Name</label>
                                    <input type="text" id="edit_name" name="name" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                </div>
                                <div class="mt-4">
                                    <label for="edit_email" class="block text-lg font-bold text-blue-700">Email</label>
                                    <input type="email" id="edit_email" name="email" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                </div>
                                <div class="mt-4">
                                    <label for="edit_per_email" class="block text-lg font-bold text-blue-700">Personal Email</label>
                                    <input type="email" id="edit_per_email" name="per_email" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_phone" class="block text-lg font-bold text-blue-700">Phone</label>
                                    <input type="text" id="edit_phone" name="phone" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_emergency_contact_no" class="block text-lg font-bold text-blue-700">Emergency Contact No.</label>
                                    <input type="text" id="edit_emergency_contact_no" name="emergency_contact_no" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_dob" class="block text-lg font-bold text-blue-700">Date of Birth</label>
                                    <input type="date" id="edit_dob" name="dob" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_sex" class="block text-lg font-bold text-blue-700">Sex</label>
                                    <input type="text" id="edit_sex" name="sex" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_caste" class="block text-lg font-bold text-blue-700">Caste</label>
                                    <input type="text" id="edit_caste" name="caste" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_category" class="block text-lg font-bold text-blue-700">Category</label>
                                    <input type="text" id="edit_category" name="category" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="mt-4">
                                    <label for="edit_perm_address" class="block text-lg font-bold text-blue-700">Permanent Address</label>
                                    <textarea id="edit_perm_address" name="perm_address" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                </div>
                                <div class="mt-4">
                                    <label for="edit_res_address" class="block text-lg font-bold text-blue-700">Residential Address</label>
                                    <textarea id="edit_res_address" name="res_address" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mt-4">
                                    <label for="edit_photo" class="block text-lg font-bold text-blue-700">Photo</label>
                                    <input type="file" id="edit_photo" name="photo" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_document" class="block text-lg font-bold text-blue-700">Download Document</label>
                                    <input type="file" id="edit_document" name="document" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project Details Section -->
                    <div class="border rounded-lg">
                        <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                            <h4 class="text-xl font-bold text-gray-800">Project Details</h4>
                            <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="accordion-content p-4 hidden">
                            <!-- Project Details Content -->
                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_funding_agency" class="block text-lg font-bold text-blue-700">Funding Agency / Project</label>
                                    <input type="text" id="edit_funding_agency" name="funding_agency" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_project_name" class="block text-lg font-bold text-blue-700">Project Name</label>
                                    <input type="text" id="edit_project_name" name="project_name" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_project_id" class="block text-lg font-bold text-blue-700">Project ID</label>
                                    <input type="text" id="edit_project_id" name="project_id" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_pi" class="block text-lg font-bold text-blue-700">PI</label>
                                    <select id="edit_pi" name="pi_id" class="mt-1 block w-full px-3 py-2 border border-blue-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <label for="edit_coPi" class="block text-lg font-bold text-blue-700">Co-PI</label>
                                    <select id="edit_coPi" name="co_pi_id" class="mt-1 block w-full px-3 py-2 border border-blue-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <label for="edit_completion_date" class="block text-lg font-bold text-blue-700">Project Completion Date</label>
                                    <input type="date" id="edit_completion_date" name="completion_date" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_student_file_no" class="block text-lg font-bold text-blue-700">Student File No</label>
                                    <input type="text" id="edit_student_file_no" name="student_file_no" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_extension_date" class="block text-lg font-bold text-blue-700">Extension Date</label>
                                    <input type="date" id="edit_extension_date" name="extension_date" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_srf_wef" class="block text-lg font-bold text-blue-700">SRF W.E.F</label>
                                    <input type="date" id="edit_srf_wef" name="SRF_wef" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Academic & Other Details Accordion -->
                    <div class="border rounded-lg">
                        <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                            <h4 class="text-xl font-bold text-gray-800">Academic & Other Details</h4>
                            <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="accordion-content p-4 hidden">
                            <!-- Academic & Other Details Content -->

                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_type" class="block text-lg font-bold text-blue-700">Type</label>
                                    <input type="text" id="edit_type" name="type" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <div class="mt-4">
                                    <label for="edit_designation" class="block text-lg font-bold text-blue-700">Designation</label>
                                    <input type="text" id="edit_designation" name="designation" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_fingerprint_no" class="block text-lg font-bold text-blue-700">Fingerprint No.</label>
                                    <input type="text" id="edit_fingerprint_no" name="fingerprint_no" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_ils_id_no" class="block text-lg font-bold text-blue-700">ILS ID No</label>
                                    <input type="text" id="edit_ils_id_no" name="ILS_ID_no" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_joining_date" class="block text-lg font-bold text-blue-700">Joining Date</label>
                                    <input type="date" id="edit_joining_date" name="joining_date" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_tenure_upto" class="block text-lg font-bold text-blue-700">Tenure Upto</label>
                                    <input type="date" id="edit_tenure_upto" name="tenure_upto" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_fellowship" class="block text-lg font-bold text-blue-700">Fellowship</label>
                                    <input type="text" id="edit_fellowship" name="fellowship" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_registration_no" class="block text-lg font-bold text-blue-700">Registration No</label>
                                    <input type="text" id="edit_registration_no" name="registration_no" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_registration_date" class="block text-lg font-bold text-blue-700">Registration Date</label>
                                    <input type="date" id="edit_registration_date" name="registration_date" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>



                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_submission_date" class="block text-lg font-bold text-blue-700">Submission Date</label>
                                    <input type="date" id="edit_submission_date" name="submission_date" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_award_date" class="block text-lg font-bold text-blue-700">Award Date</label>
                                    <input type="date" id="edit_award_date" name="award_date" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_topic" class="block text-lg font-bold text-blue-700">Topic</label>
                                    <input type="text" id="edit_topic" name="topic" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_no_of_publication" class="block text-lg font-bold text-blue-700">No. of Publications</label>
                                    <input type="number" id="edit_no_of_publication" name="no_of_publication" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_no_of_conf_attended" class="block text-lg font-bold text-blue-700">No. of Conferences Attended</label>
                                    <input type="number" id="edit_no_of_conf_attended" name="no_of_conf_attended" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_thesis_availability" class="block text-lg font-bold text-blue-700">Thesis Availability</label>
                                    <input type="text" id="edit_thesis_availability" name="thesis_availability" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4">
                                    <label for="edit_caution_money" class="block text-lg font-bold text-blue-700">Caution Money</label>
                                    <input type="text" id="edit_caution_money" name="caution_money" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_hostel_joined_on" class="block text-lg font-bold text-blue-700">Hostel Joined On</label>
                                    <input type="date" id="edit_hostel_joined_on" name="hostel_joined_on" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mt-4">
                                    <label for="edit_hostel_vaccated_on" class="block text-lg font-bold text-blue-700">Hostel Vacated On</label>
                                    <input type="date" id="edit_hostel_vaccated_on" name="hostel_vaccated_on" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="mt-4">
                                    <label for="edit_correspondence" class="block text-lg font-bold text-blue-700">Correspondence</label>
                                    <textarea id="edit_correspondence" name="correspondence" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal Footer -->
                <div class="mt-6 flex justify-end space-x-4">
                    <button type="button" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md" id="cancel-edit-modal">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

