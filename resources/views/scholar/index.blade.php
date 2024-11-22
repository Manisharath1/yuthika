    <!-- resources/views/scholars/index.blade.php -->
    <x-app-layout>
        <x-navbar />
        <x-scholar-modal />
        <div class="flex min-h-screen">
            <x-sidebar />

            <!-- Main Content -->
            <div class="flex-1 p-8 bg-gray-50">
                <div class="container">
                    <div class="mb-6 flex justify-between items-center">
                        <h1 class="text-2xl font-semibold text-gray-700">Manage Scholars</h1>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center">
                                <select id="column-visibility" class="form-select rounded-md border-gray-300 shadow-sm">
                                    <option value="">Column Visibility</option>
                                    <option value="name">Name</option>
                                    <option value="type">Type</option>
                                    <option value="category">Category</option>
                                    <option value="designation">Designation</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                    <option value="sex">Sex</option>
                                    <option value="Date of Birth">Date of Birth</option>
                                    <option value="caste">Caste</option>
                                    <option value="permanent address">Permanent Address</option>
                                    <option value="Home Address">Home Address</option>
                                    <option value="Hostel Joined on">Hostel Joined on</option>
                                    <option value="Hostel Vaccated on">Hostel Vaccated on</option>
                                    <option value="Caution Money">Caution Money</option>
                                    <option value="Funding Agency">Funding Agency</option>
                                    <option value="ILS ID No">ILS ID No</option>
                                    <option value="Emergency Contact No">Emergency Contact No</option>
                                    <option value="Scholar File No">Scholar File No</option>
                                    <option value="Joining Date<">Joining Date</option>
                                    <option value="enure Upto">Tenure Upto</option>
                                    <option value="SRF W.E.F.">SRF W.E.F.</option>
                                    <option value="Document Link">Document Link</option>
                                    <option value="No. of Publications">No. of Publications</option>
                                    <option value="no_of_conf_attended">No. Conf Attended</option>
                                    <option value="No. Conf Attended">Personal Email</option>
                                    <option value="fellowship">Fellowship</option>
                                    <option value="PI">PI</option>
                                    <option value="CO PI">CO PI</option>
                                    <option value="Registration No">Registration No</option>
                                    <option value="Registration Date">Registration Date</option>
                                    <option value="topic">Topic</option>
                                    <option value="extension date">Extension Date</option>
                                    <option value="submission date">Submission Date</option>
                                    <option value="award date">Award Date</option>
                                    <option value="thesis availability">Thesis Availability</option>
                                    <option value="Date of Completion">Date of Completion</option>
                                    <option value="photo">Photo</option>
                                    <option value="correspondence">Correspondence</option>
                                    <option value="document">Document</option>
                                </select>
                            </div>
                            <div class="flex items-center">
                                <input type="text" id="search-input" placeholder="Search..."
                                    class="form-input rounded-md border-gray-300 shadow-sm">
                            </div>
                            <button class="add-scholar-btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                                Add Scholar
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Designation</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sex</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Birth</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Caste</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permanent Address</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Home Address</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hostel Joined on</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hostel Vaccated on</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Caution Money</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Funding Agency</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ILS ID No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Emergency Contact No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Scholar File No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joining Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tenure Upto</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SRF W.E.F.</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Document Link</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. of Publications</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Conf Attended</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Personal Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fellowship</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PI</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Co PI</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Topic</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Extension Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submission Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Award Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thesis Availability</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Completion</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correspondence</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Document</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($scholars as $scholar)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button class="text-blue-600 hover:text-blue-900">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->category }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->designation }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->sex }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->dob }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->caste }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->perm_address }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->res_address }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->hostel_joined_on }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->hostel_vaccated_on }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->caution_money }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->funding_agency }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->ILS_ID_no }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->emergency_contact_no }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->student_file_no }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->joining_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->tenure_upto }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->SRF_wef }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><a href="{{ $scholar->document_link }}" target="_blank">View Document</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->no_of_publication }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->no_of_conf_attended }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->per_email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->fellowship }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->pi_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->co_pi_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->registration_no }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->registration_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->topic }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->extension_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->submission_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->award_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->thesis_availability }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->completion_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <img src="{{ $scholar->photo }}" alt="Photo" class="h-10 w-10 rounded-full">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->correspondence }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><a href="{{ $scholar->document }}" target="_blank">Download Document</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get the select element
            const columnSelect = document.getElementById('column-visibility');

            // Get the table
            const table = document.querySelector('table');

            // Variable to store previously highlighted cells
            let previouslyHighlightedCells = [];

            // Function to highlight a column
            function highlightColumn(columnName) {
                // First, remove previous highlighting
                previouslyHighlightedCells.forEach(cell => {
                    cell.style.backgroundColor = '';
                });
                previouslyHighlightedCells = [];

                if (!columnName) return;

                // Find the column index
                const headers = Array.from(table.querySelectorAll('thead th'));
                const columnIndex = headers.findIndex(header =>
                    header.textContent.trim().toLowerCase() === columnName.toLowerCase()
                );

                if (columnIndex === -1) return;

                // Highlight the header
                const header = headers[columnIndex];
                header.style.backgroundColor = '#EFF6FF'; // Tailwind's bg-blue-50
                previouslyHighlightedCells.push(header);

                // Highlight all cells in that column
                const rows = table.querySelectorAll('tbody tr');
                rows.forEach(row => {
                    const cell = row.cells[columnIndex];
                    if (cell) {
                        cell.style.backgroundColor = '#EFF6FF'; // Tailwind's bg-blue-50
                        previouslyHighlightedCells.push(cell);
                    }
                });
            }

            // Add event listener to select
            columnSelect.addEventListener('change', function(e) {
                const selectedValue = this.value;
                highlightColumn(selectedValue);
            });

            // Optional: Add hover effect for better UX
            table.querySelectorAll('th, td').forEach(cell => {
                cell.addEventListener('mouseenter', function() {
                    if (!previouslyHighlightedCells.includes(this)) {
                        this.style.backgroundColor = '#F9FAFB'; // Tailwind's bg-gray-50
                        }
                    });
                    cell.addEventListener('mouseleave', function() {
                        if (!previouslyHighlightedCells.includes(this)) {
                            this.style.backgroundColor = '';
                        }
                    });
                });
            });

            //Search function
            document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const tableRows = document.querySelectorAll('table tbody tr');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();

                tableRows.forEach(row => {
                    let text = '';
                    // Get text content from all cells except the first one (action column)
                    row.querySelectorAll('td:not(:first-child)').forEach(cell => {
                        text += cell.textContent.toLowerCase() + ' ';
                    });

                    // Show/hide row based on search term
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Add clear search functionality
            searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Escape') {
                    searchInput.value = '';
                    tableRows.forEach(row => {
                        row.style.display = '';
                    });
                }
            });
        });
        </script>
        <script src="{{ asset('js/scholar-modal.js') }}"></script>
        @endpush
    </x-app-layout>

