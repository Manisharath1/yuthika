<!-- Add this modal HTML just before the closing </x-app-layout> tag -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Scholar Details</h3>
            <form id="editScholarForm" class="mt-4">
                @csrf
                @method('PUT')
                <input type="hidden" id="scholar_id" name="scholar_id">

                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="edit_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">PI</label>
                        <input type="text" name="pi_id" id="edit_pi_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                </div>

                <!-- DFR, EXP, SEUC Fields -->
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

                <div class="mt-4 flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openEditModal(scholarId) {
    // Show the modal
    document.getElementById('editModal').classList.remove('hidden');

    // Fetch scholar data
    fetch(`/scholars/${scholarId}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('scholar_id').value = data.id;
            document.getElementById('edit_name').value = data.name;
            document.getElementById('edit_pi_id').value = data.pi_id;

            // Fill in all the DFR, EXP, and SEUC fields
            for (let i = 1; i <= 5; i++) {
                document.getElementById(`edit_Fdfr${i}`).value = data[`Fdfr${i}`];
                document.getElementById(`edit_Fexp${i}`).value = data[`Fexp${i}`];
                document.getElementById(`edit_Fseuc${i}`).value = data[`Fseuc${i}`];
                document.getElementById(`edit_Cdfr${i}`).value = data[`Cdfr${i}`];
                document.getElementById(`edit_Cexp${i}`).value = data[`Cexp${i}`];
                document.getElementById(`edit_Cseuc${i}`).value = data[`Cseuc${i}`];
                document.getElementById(`edit_Odfr${i}`).value = data[`Odfr${i}`];
                document.getElementById(`edit_Oexp${i}`).value = data[`Oexp${i}`];
                document.getElementById(`edit_Oseuc${i}`).value = data[`Oseuc${i}`];
            }
        });
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

document.getElementById('editScholarForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const scholarId = document.getElementById('scholar_id').value;
    const formData = new FormData(this);

    fetch(`/scholars/${scholarId}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeEditModal();
            // Reload the page or update the table row
            window.location.reload();
        } else {
            alert('Error updating scholar');
        }
    });
});
</script>
