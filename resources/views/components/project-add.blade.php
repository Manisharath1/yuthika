<div id="add-project-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2 class="text-xl font-semibold mb-4">Add New Project</h2>

        <form id="add-project-form">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Project Name*</label>
                    <input type="text" name="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">PI 1*</label>
                    <select name="pi_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Select PI</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">PI 2</label>
                    <select name="pi2_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Select Co-PI</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">File No.*</label>
                    <input type="text" name="project_file_no" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Sanction No.*</label>
                    <input type="text" name="sanction_no_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Funding Agency*</label>
                    <input type="text" name="funding_agency" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Start Date*</label>
                    <input type="date" name="start_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">End Date*</label>
                    <input type="date" name="end_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Sanctioned Outlay*</label>
                    <input type="number" name="sanctioned_outlay" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Project Cost*</label>
                    <input type="number" name="project_cost" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>

            <div class="mt-4 flex justify-end gap-2">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                    Save Project
                </button>
                <button type="button" class="close-btn bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
