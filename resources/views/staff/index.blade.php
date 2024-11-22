<x-app-layout>
    <x-navbar />
    <x-staff-modal />
    <div class="flex min-h-screen">
        <x-sidebar />
        <!-- Main Content -->
        <div class="flex-1 p-8 bg-gray-50">
            <div class="container">
                <div class="mb-6 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-700">Manage Staff</h1>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center">
                            <select id="column-visibility" class="form-select rounded-md border-gray-300 shadow-sm">
                                <option value="">Column Visibility</option>
                                <option value="Faculty/Staff Name">Faculty/Staff Name</option>
                                <option value="email">Email</option>
                                <option value="designation">Designation</option>
                                <option value="Emp. ID">Emp. ID</option>
                                <option value="EPF/PPRN No.">EPF/PPRN No.</option>
                                <option value="LTC Availed">LTC Availed</option>
                                <option value="Pay Level">Pay Level</option>
                                <option value="Basic Pay">Basic Pay</option>
                                <option value="Position Held">Position Held</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <input type="text" id="search-input" placeholder="Search..."
                                class="form-input rounded-md border-gray-300 shadow-sm">
                        </div>
                        <button class="add-staff-btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                            Add Staff
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Faculty/Staff Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Designation</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Emp. ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">EPF/PPRN No.</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">LTC Availed</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pay Level</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Basic Pay</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position Held</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($staffs as $staff)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-blue-600 hover:text-blue-900">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staff->fac_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staff->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staff->designation }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staff->empid }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staff->EPF_PPRN_No }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staff->ltc_availed }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staff->pay_level }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staff->basic_pay }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staff->position_held }}</td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <img src="{{ $staff->photo }}" alt="Photo" class="h-10 w-10 rounded-full">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><a href="{{ $staff->service_book }}" target="_blank">Service Book</a></td> --}}
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
        @endpush
        <script src="{{ asset('js/staff-modal.js') }}"></script>
</x-app-layout>
