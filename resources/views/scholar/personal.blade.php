
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
    <x-scholar-personal-edit />



    @push('scripts')
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
