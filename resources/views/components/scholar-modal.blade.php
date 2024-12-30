<!-- Add scholar -->
<div id="addScholarModal" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop with blur -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 backdrop-blur-sm transition-opacity"></div>
    <div class="fixed inset-0 z-50 overflow-y-auto ">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all w-full max-w-7xl">

                <div class="flex justify-between items-center border-b pb-3">
                    <h3 class="text-lg font-semibold text-gray-700">Add Scholar</h3>
                    <button class="text-gray-500 hover:text-gray-700" id="close-edit-modal">&times;</button>
                </div>

                <form id="addScholarForm" action="{{ route('scholar.index') }}" method="POST" class="space-y-6 ">
                    @csrf
                    <!-- Personal Details Section -->

                    <div class="accordion-container space-y-4">
                        <div class="border rounded-lg mt-5 border-blue-300">
                            <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                                <h3 class="text-lg font-medium text-gray-900">Personal Details</h3>
                                <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="accordion-content p-4 hidden">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Name</label>
                                        <input type="text" name="name" required
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Email</label>
                                        <input type="email" name="email" required
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Phone</label>
                                        <input type="tel" name="phone" required
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                </div>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Date of Birth</label>
                                        <input type="date" name="dob" required
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Personal Email</label>
                                        <input type="email" name="per_email"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Emergency Contact No</label>
                                        <input type="tel" name="emergency_contact_no"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Sex</label>
                                        <select name="sex" required
                                                class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="">Select One</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Caste</label>
                                        <input type="text" name="caste"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Category</label>
                                        <input type="text" name="category"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4">

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Permanent Address</label>
                                        <textarea name="perm_address" rows="2"
                                                class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Residential Address</label>
                                        <textarea name="res_address" rows="2"
                                                class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Photo</label>
                                        <input type="file" name="photo" accept="image/*"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project Details Section -->
                        <div class="border rounded-lg mt-5 border-blue-300">
                            <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                                <h3 class="text-lg font-medium text-gray-900"> Project Details</h3>
                                <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="accordion-content p-4 hidden">

                                <div class="grid grid-cols-3 gap-4">
                                    {{-- <div class="mt-4">
                                        <label for="project_name" class="block text-sm font-bold text-blue-700">Project Name</label>
                                        <input type="text" id="project_name" name="project_name" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div> --}}

                                    <div class="mt-4">
                                        <label for="project_id" class="block text-sm font-bold text-blue-700">Project Name</label>
                                        <input type="text" id="project_id" name="project_id" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Project Completion Date</label>
                                        <input type="date" name="completion_date"
                                        class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Type</label>
                                        <select name="type" required
                                                class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="">Select One</option>
                                            <option value="p">P</option>
                                            <option value="o">O</option>
                                            <option value="s">S</option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Designation</label>
                                        <input type="text" name="designation" required
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Scholar File No</label>
                                        <input type="text" name="student_file_no"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">PI</label>
                                        <select name="pi_id" id="piDropdown" required
                                                class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="">Loading...</option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Co PI</label>
                                        <select name="co_pi_id" id="coPiDropdown"
                                                class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="">Loading...</option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Funding Agency</label>
                                        <input type="text" name="funding_agency"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Fellowship</label>
                                        <input type="text" name="fellowship"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">SRF W.E.F.</label>
                                        <input type="date" name="SRF_wef"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Academic & Other Details Section -->
                        <div class="border rounded-lg mt-5 border-blue-300">
                            <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                                <h3 class="text-lg font-medium text-gray-900">Academic & Other Details</h3>
                                <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="accordion-content p-4 hidden">

                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Registration Date</label>
                                        <input type="date" name="registration_date"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Joining Date</label>
                                        <input type="date" name="joining_date"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Tenure Upto</label>
                                        <input type="date" name="tenure_upto"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Registration No</label>
                                        <input type="text" name="registration_no"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">ILS ID No</label>
                                        <input type="text" name="ILS_ID_no"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Fingerprint No</label>
                                        <input type="text" name="fingerprint_no"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Extension Date</label>
                                        <input type="date" name="extension_date"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Submission Date</label>
                                        <input type="date" name="submission_date"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Award Date</label>
                                        <input type="date" name="award_date"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>


                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Hostel Joined On</label>
                                        <input type="date" name="hostel_joined_on"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Hostel Vaccated On</label>
                                        <input type="date" name="hostel_vaccated_on"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Caution Money</label>
                                        <input type="text" name="caution_money"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">No. of Publications</label>
                                        <input type="number" name="no_of_publication"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">No. of Conferences Attended</label>
                                        <input type="number" name="no_of_conf_attended"
                                        class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Thesis Availability</label>
                                        <input type="text" name="thesis_availability"
                                            class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Topic</label>
                                        <textarea name="topic" rows="2"
                                                class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Correspondence</label>
                                        <textarea name="correspondence" rows="2"
                                        class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-blue-700">Document</label>
                                        <input type="file" name="document" accept=".pdf,.doc,.docx"
                                                class="mt-1 block w-full rounded-md  border-blue-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end gap-3">
                            <button type="button" class="close-modal rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch users for PI and Co-PI dropdowns
        fetch('{{ route("get.role.two.users") }}')
            .then(response => response.json())
            .then(users => {
                const piDropdown = document.getElementById('piDropdown');
                const coPiDropdown = document.getElementById('coPiDropdown');

                // Clear existing options
                piDropdown.innerHTML = '<option value="">Select PI</option>';
                coPiDropdown.innerHTML = '<option value="">Select Co-PI</option>';

                // Populate dropdowns with fetched users
                users.forEach(user => {
                    const option = `<option value="${user.id}">${user.name}</option>`;
                    piDropdown.innerHTML += option;
                    coPiDropdown.innerHTML += option;
                });
            })
            .catch(error => console.error('Error fetching users:', error));
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionHeaders = document.querySelectorAll('.accordion-header');

        accordionHeaders.forEach(header => {
            header.addEventListener('click', function() {
                // Toggle current accordion
                const content = this.nextElementSibling;
                const icon = this.querySelector('.accordion-icon');

                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');

                // Optional: Close other accordions
                accordionHeaders.forEach(otherHeader => {
                    if (otherHeader !== header) {
                        const otherContent = otherHeader.nextElementSibling;
                        const otherIcon = otherHeader.querySelector('.accordion-icon');
                        otherContent.classList.add('hidden');
                        otherIcon.classList.remove('rotate-180');
                    }
                });
            });
        });
    });
</script>


