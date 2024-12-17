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
