<!-- resources/views/components/project-modal.blade.php -->
<div id="project-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2 class="text-xl font-semibold mb-4" id="modal-title">Project Details</h2>

        <!-- View Mode -->
            <div id="project-details" class="view-mode">
                <!-- Details will be populated here -->
            </div>

        <!-- Edit Mode -->
        <form id="edit-form" class="edit-mode hidden">
            @csrf
            @method('PUT')
            <input type="hidden" name="pid" id="project_id" >
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Project Name</label>
                    <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">PI 1</label>
                    <input type="text" name="pi_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">PI 2</label>
                    <input type="text" name="pi2_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">File No.</label>
                    <input type="text" name="project_file_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Sanction No.</label>
                    <input type="text" name="sanction_no_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Funding Agency</label>
                    <input type="text" name="funding_agency" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" name="end_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Extension</label>
                    <input type="text" name="extension_if_any" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Sanctioned Outlay</label>
                    <input type="number" name="sanctioned_outlay" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Project Cost</label>
                    <input type="number" name="project_cost" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Balance</label>
                    <input type="number" name="balance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700">Active</label>
                    <select name="active" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" id="project_id">
        </form>

        <div class="mt-4 flex justify-end">
            <button class="edit-project-btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mr-2">
                Edit
            </button>
            <button class="save-project-btn hidden bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md mr-2">
                Save Changes
            </button>
            <button class="cancel-edit-btn hidden bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">
                Cancel
            </button>
            <button class="close-btn bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
                Close
            </button>
        </div>
    </div>
</div>

