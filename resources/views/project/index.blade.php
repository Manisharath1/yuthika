<x-app-layout>
    <x-navbar />
    <x-project-modal />
    <x-project-add :users="$users" />
    {{-- <x-project-add :users="$users" /> --}}
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <link href="{{ asset('css/projectAdd.css') }}" rel="stylesheet">
            <link href="{{ asset('css/projectModal.css') }}" rel="stylesheet">

        </head>
        <body class="min-h-screen">
            <div class="flex flex-col md:flex-row min-h-screen">
                <x-sidebar class="w-full md:w-1/4 lg:w-1/5 bg-white shadow-md flex-shrink-0" />

                <div class="flex-1 bg-white p-4 md:p-6">
                    <div class="container mx-auto">
                        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
                            <h1 class="text-2xl font-semibold text-gray-700">Manage Projects</h1>
                            <button class="add-project-btn w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                                Add Project
                            </button>
                        </div>

                        <div class="bg-blue-50 rounded-lg shadow-md p-6">
                            <ul class="project-list">
                                @foreach($projects as $project)
                                    <li class="project-item">
                                        <span class="project-name font-medium">{{ $project->name }}</span>
                                        <div class="flex gap-2">
                                            <button class="details-btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md"
                                                    data-project='{{ json_encode($project) }}'
                                                    onclick="showProjectDetails({{ $project->pid }})">
                                                Details
                                            </button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @push('scripts')
            <script src="{{ asset('js/project-modal.js') }}"></script>
            <script src="{{ asset('js/project-add.js') }}"></script>
            @endpush
        </body>
    </html>
</x-app-layout>
