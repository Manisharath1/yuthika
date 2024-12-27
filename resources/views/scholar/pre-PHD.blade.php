<x-app-layout>
    <x-navbar />
    <x-scholar-pre-p-h-d-modal />
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
    <body class="bg-gray-100 min-h-screen">
        <!-- Flex Container to Hold Sidebar and Main Content -->
        <div class="flex flex-col md:flex-row min-h-screen">
            <!-- Sidebar -->
            <x-sidebar class="w-full md:w-1/4 lg:w-1/5 bg-white shadow-md" />

            <!-- Main Content -->
            <div class=" flex-1 bg-gray-100 p-4 md:p-6" style="min-width: 50%">
                <div class="container mx-auto">
                    <!-- Header Section -->
                    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
                        <h1 class="text-2xl font-semibold text-gray-700">Manage ILS Pre-PHD</h1>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="dataTables_wrapper table-responsive">
                            <table id="scholars-table" class="display w-full">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Action</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">PI</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Year</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Attendance</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">401</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">402</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">403</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">404</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">CGPA</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($scholars as $scholar)
                                    <tr>
                                        <td>
                                            <button class="text-blue-600 hover:text-blue-900 edit-scholar-btn" data-id="{{ $scholar->student_id }}" title="Edit Scholar">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->name}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->pi ? $scholar->pi->name : 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->year}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->attendance}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->mark401}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->mark402}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->mark403}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->mark404}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->cgpa}}</td>
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
@push('scripts')
<script>
    $(document).ready(function () {
        const table = $('#scholars-table').DataTable({
            responsive: true,
            // scrollX: true,
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
<script src="{{ asset('js/scholar-prephd-modal.js') }}"></script>
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
