
<x-app-layout>
    <x-navbar /> 
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <!-- Include your head content -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

            <style>
                /* Styles for Responsiveness and Scroll */
                .dataTables_wrapper {
                    width: 100%;
                    overflow-x: auto; /* Ensure horizontal scrolling for small screens */
                }

                /* Limit table height dynamically */
                .table-container {
                max-height: 70vh; /* Restrict height to avoid overflow */
                overflow-y: auto;
                width: 100%; /* Allow full width */
                }

                /* Responsive styling for small screens */
                @media screen and (max-width: 768px) {
                    .dt-buttons .dt-button {
                        font-size: 12px !important;
                        padding: 6px 8px !important;
                        min-width: 140px !important;
                    }
                    .dt-button-collection {
                        grid-template-columns: repeat(2, 1fr) !important;
                    }
                }

                /* Responsive column layout adjustments */
            @media (max-width: 1024px) {
                .table-container {
                    max-height: 60vh;
                }
                .dt-buttons .dt-button {
                    font-size: 12px;
                    padding: 6px 8px;
                }
            }
            </style>
        </head>

        <body class="min-h-screen">
            <!-- Flex Container to Hold Sidebar and Main Content -->
            <div class="flex flex-col md:flex-row min-h-screen">
                <!-- Sidebar -->
                <x-sidebar class="w-full md:w-1/4 lg:w-1/5 bg-white shadow-md flex-shrink-0" />

                <div class=" flex-1 bg-gray-100 p-4 md:p-6" style="min-width: 50%">
                    <div class="container mx-auto">
                        <!-- Header Section -->
                        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
                            <h1 class="text-2xl font-semibold text-gray-700">Manage Scholars</h1>
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="dataTables_wrapper table-responsive">
                                <table id="scholars-table" class="display w-full">
                                    <thead>
                                        <tr>
                                            <!-- Fixed-width columns for better control -->
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Action</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">PI</th>
                                            <!-- Dynamic columns -->
                                            @for ($i = 1; $i <= 5; $i++)
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Fdfr{{ $i }}</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Fexp{{ $i }}</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Fseuc{{ $i }}</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Cdfr{{ $i }}</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Cexp{{ $i }}</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Cseuc{{ $i }}</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Odfr{{ $i }}</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Oexp{{ $i }}</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Oseuc{{ $i }}</th>
                                            @endfor
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($scholars as $scholar)
                                        <tr class="hover:bg-gray-50">
                                            <td class=" left-0 z-10 bg-white px-6 py-4 whitespace-nowrap">
                                                <button onclick="openEditModal({{ $scholar->student_id }})" class="text-blue-600 hover:text-blue-900">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                            </td>
                                            <td class=" left-[100px] z-10 bg-white px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar->pi ? $scholar->pi->name : 'N/A' }}</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar["Fdfr{$i}"] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar["Fexp{$i}"] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar["Fseuc{$i}"] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar["Cdfr{$i}"] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar["Cexp{$i}"] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar["Cseuc{$i}"] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar["Odfr{$i}"] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar["Oexp{$i}"] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $scholar["Oseuc{$i}"] }}</td>
                                            @endfor
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>

    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Scholar Details</h3>
                <form id="editScholarForm" class="mt-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="scholar_id" name="scholar_id">

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="edit_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">PI</label>
                            <input type="text" name="pi_id" id="edit_pi_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>

                    @for ($i = 1; $i <= 5; $i++)
                    <div class="mt-4">
                        <h4 class="text-md font-medium text-gray-700">Set {{ $i }}</h4>
                        <div class="grid grid-cols-3 gap-4 mt-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">FDFR{{ $i }}</label>
                                <input type="text" name="Fdfr{{ $i }}" id="edit_Fdfr{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">FEXP{{ $i }}</label>
                                <input type="text" name="Fexp{{ $i }}" id="edit_Fexp{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">FSEUC{{ $i }}</label>
                                <input type="text" name="Fseuc{{ $i }}" id="edit_Fseuc{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4 mt-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">CDFR{{ $i }}</label>
                                <input type="text" name="Cdfr{{ $i }}" id="edit_Cdfr{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">CEXP{{ $i }}</label>
                                <input type="text" name="Cexp{{ $i }}" id="edit_Cexp{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">CSEUC{{ $i }}</label>
                                <input type="text" name="Cseuc{{ $i }}" id="edit_Cseuc{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4 mt-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">ODFR{{ $i }}</label>
                                <input type="text" name="Odfr{{ $i }}" id="edit_Odfr{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">OEXP{{ $i }}</label>
                                <input type="text" name="Oexp{{ $i }}" id="edit_Oexp{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">OSEUC{{ $i }}</label>
                                <input type="text" name="Oseuc{{ $i }}" id="edit_Oseuc{{ $i }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                        </div>
                    </div>
                    @endfor
                    <div class="mt-6 flex justify-end gap-4">
                        <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Close</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Function to open the edit modal and populate form data
        function openEditModal(studentId) {
            // Show the modal
            document.getElementById('editModal').classList.remove('hidden');

            // Fetch student data
            fetch(`/students/${studentId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Error fetching data: ${response.status} ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(data => {
                    // Populate form fields with fetched data
                    document.getElementById('scholar_id').value = studentId;
                    document.getElementById('edit_name').value = data.name || '';
                    document.getElementById('edit_pi_id').value = data.pi_id || '';

                    // Populate other fields for each set
                    for (let i = 1; i <= 5; i++) {
                        document.getElementById(`edit_Fdfr${i}`).value = data[`Fdfr${i}`] || '';
                        document.getElementById(`edit_Fexp${i}`).value = data[`Fexp${i}`] || '';
                        document.getElementById(`edit_Fseuc${i}`).value = data[`Fseuc${i}`] || '';
                        document.getElementById(`edit_Cdfr${i}`).value = data[`Cdfr${i}`] || '';
                        document.getElementById(`edit_Cexp${i}`).value = data[`Cexp${i}`] || '';
                        document.getElementById(`edit_Cseuc${i}`).value = data[`Cseuc${i}`] || '';
                        document.getElementById(`edit_Odfr${i}`).value = data[`Odfr${i}`] || '';
                        document.getElementById(`edit_Oexp${i}`).value = data[`Oexp${i}`] || '';
                        document.getElementById(`edit_Oseuc${i}`).value = data[`Oseuc${i}`] || '';
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    alert('Error: Unable to fetch student data.');
                });
        }

        // Function to close the modal and reset the form
        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
            const form = document.getElementById('editScholarForm');
            form.reset(); // Reset form fields
        }

        // Event listener for form submission
        document.getElementById('editScholarForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form default submission

            const studentId = document.getElementById('scholar_id').value;
            const formData = new FormData(this);

            fetch(`/students/${studentId}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: formData
            })
            .then(response => {
                // Check for valid response
                if (!response.ok) {
                    return response.text().then(text => { throw new Error(`Error: ${text}`); });
                }

                // Parse JSON response
                const contentType = response.headers.get("content-type");
                if (!contentType || !contentType.includes("application/json")) {
                    return response.text().then(text => { throw new Error("Invalid JSON response: " + text); });
                }

                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message); // Show success message
                    closeModal(); // Close the modal
                    location.reload(); // Reload the page to update the table
                } else {
                    throw new Error(data.message);
                }
            })
            .catch(error => {
                console.error('Error updating data:', error);
                alert('Error: Unable to update data.');
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            const table = $('#scholars-table').DataTable({
                responsive: true,
                scrollX: true,
                scrollCollapse: true,
                pageLength: 25,
                order: [[1, 'asc']],
                columnDefs: [
                    {
                        targets: 0,
                        orderable: false,
                        className: 'control'
                    },
                    {
                        targets: '_all',
                        className: 'px-3 py-2'
                    }
                ],
                dom: '<"flex flex-wrap items-center justify-between mb-4"<"flex-1"B><"flex-1"f>>rtip',
                buttons: [
                    {
                        extend: 'colvis',
                        text: 'Columns',
                        className: 'colvis-btn bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-gray-600',
                        collectionLayout: 'fixed four-column',
                        fade: 0,
                        popoverTitle: 'Visible Columns',
                    },
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                        className: 'export-btn bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600'
                    }
                ],
                language: {
                    search: "Search:",
                    searchPlaceholder: "Search all columns..."
                },
                initComplete: function () {
                    $('.dataTables_filter input').addClass('w-full sm:w-64 p-2 border rounded-md');
                    $('.dt-buttons').addClass('flex flex-wrap gap-2');

                }
            });
        });
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    @endpush

</x-app-layout>
