<x-app-layout>
    <x-navbar />
    <x-scholar-rcb-modal />
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
                            <h1 class="text-2xl font-semibold text-gray-700">Manage RCB</h1>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="dataTables_wrapper table-responsive">
                                <table id="scholars-table" class="display w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Action</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">PI</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">DOJ</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Registration No.</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Registration Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Academic Year</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Title of Thesis</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Co-Guide</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">External Expert</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Internal Expert</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Additional Member</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">F1A</th>
                                            @for ($i = 1; $i <= 22; $i++)
                                                <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">F{{ $i }}</th>
                                            @endfor
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
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->pi ? $scholar->pi->name : 'N/A' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->joining_date }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->registration_no }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->date_of_registration }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->academic_year }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->topic }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->co_guide }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->external_expert }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->internal_expert }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->additional_member }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $scholar->f1a_reg_form }}</td>
                                                @php
                                                    $formFields = [
                                                        'F1' => 'student_info',
                                                        'F2' => 'cert_of_reg',
                                                        'F3' => 'course_work',
                                                        'F4' => 'grade_statement',
                                                        'F5' => 'std_adv_committee',
                                                        'F6' => 'academic_transcript',
                                                        'F7' => 'research_proposal',
                                                        'F8' => 'progress_report',
                                                        'F9' => 'phd_synopsis',
                                                        'F10' => 'reco_of_SAC',
                                                        'F11' => 'examiners_panel',
                                                        'F12' => 'thesis_title_page',
                                                        'F13' => 'student_declaration',
                                                        'F14' => 'originality_cert',
                                                        'F15' => 'plagiarism_cert',
                                                        'F16' => 'thesis_submission',
                                                        'F17' => 'inv_letter_ext_examiner',
                                                        'F18' => 'lett_to_EE_conf_rept_format',
                                                        'F19' => 'eval_remun_form',
                                                        'F20' => 'let_to_head_with_eval_repts',
                                                        'F21' => 'vivavoce_joint_rept',
                                                        'F22' => 'appl_for_degree'
                                                    ];
                                                @endphp
                                                @foreach($formFields as $form => $field)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $scholar->$field }}
                                                        {{-- {{ $scholar->$field ?? 'N/A' }} --}}
                                                    </td>
                                                @endforeach
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
    <script src="{{ asset('js/scholar-rcb-modal.js') }}"></script>
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

