<div id="editModal" class="fixed z-50 inset-0 hidden overflow-y-auto bg-gray-900 bg-opacity-50 backdrop-blur-sm transition-opacity">
    <div class="flex items-center justify-center min-h-screen mt-10 mb-10">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-7xl p-6 max-h-screen overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-lg font-semibold text-gray-700">Edit Scholar Details</h3>
                <button class="text-gray-500 hover:text-gray-700" onclick="closeModal()">&times;</button>
            </div>

            <!-- Modal Content -->
            <form id="editScholarForm" class="mt-4">
                @csrf
                <input type="hidden" id="scholar_id" name="scholar_id">
                <input type="hidden" name="_method" value="PUT">

                <div class="accordion-container space-y-4">
                    <!-- Basic Information Section -->
                    <div class="border rounded-lg border-blue-300">
                        <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                            <h4 class="text-xl font-bold text-gray-800">Basic Information</h4>
                            <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="accordion-content p-4 hidden">
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Name</label>
                                    <input type="text" name="name" id="edit_name" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">PI</label>
                                    <select name="pi_id" id="edit_pi_id" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Date of Joining</label>
                                    <input type="date" name="joining_date" id="edit_joining_date" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Registration Number</label>
                                    <input type="text" name="registration_no" id="edit_registration_no" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Registration Date</label>
                                    <input type="date" name="date_of_registration" id="edit_date_of_registration" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Academic Year</label>
                                    <input type="text" name="academic_year" id="edit_academic_year" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thesis Details Section -->
                    <div class="border rounded-lg border-blue-300">
                        <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                            <h4 class="text-xl font-bold text-gray-800">Thesis Details</h4>
                            <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="accordion-content p-4 hidden">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Title of Thesis</label>
                                    <input type="text" name="topic" id="edit_topic" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Co-Guide</label>
                                    <input type="text" name="co_guide" id="edit_co_guide" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">External Expert</label>
                                    <input type="text" name="external_expert" id="edit_external_expert" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Internal Expert</label>
                                    <input type="text" name="internal_expert" id="edit_internal_expert" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Additional Member</label>
                                    <input type="text" name="additional_member" id="edit_additional_member" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Details Section -->
                    <div class="border rounded-lg border-blue-300">
                        <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                            <h4 class="text-xl font-bold text-gray-800">Form Details</h4>
                            <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="accordion-content p-4 hidden">
                            <div class="grid grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">F1A </label>
                                    <input type="text" name="f1a_reg_form" id="edit_f1a_reg_form" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                @foreach(['student_info', 'cert_of_reg', 'course_work', 'grade_statement', 'std_adv_committee',
                                        'academic_transcript', 'research_proposal', 'progress_report', 'phd_synopsis', 'reco_of_SAC',
                                        'examiners_panel', 'thesis_title_page', 'student_declaration', 'originality_cert',
                                        'plagiarism_cert', 'thesis_submission', 'inv_letter_ext_examiner', 'lett_to_EE_conf_rept_format',
                                        'eval_remun_form', 'let_to_head_with_eval_repts', 'vivavoce_joint_rept', 'appl_for_degree'] as $index => $field)
                                    <div>
                                        <label class="block text-sm font-bold text-blue-700">F{{ $index + 1 }}</label>
                                        <input type="text" name="{{ $field }}" id="edit_{{ $field }}"
                                               class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="closeModal()" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
