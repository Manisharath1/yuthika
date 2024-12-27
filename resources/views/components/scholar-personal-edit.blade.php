{{-- personal edit --}}
<div id="editModal" class="fixed z-50 inset-0 hidden overflow-y-auto bg-gray-900 bg-opacity-50 backdrop-blur-sm transition-opacity">
    <div class="flex items-center justify-center min-h-screen mt-10 mb-10">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-7xl p-6 max-h-screen overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-lg font-semibold text-gray-700">Edit Scholar Details</h3>
                <button class="text-gray-500 hover:text-gray-700" onclick="closeModal()">&times;</button>
            </div>

            <!-- Modal Content -->
            <form id="editScholarForm" class="mt-4">
                @csrf
                <input type="hidden" id="scholar_id" name="scholar_id">
                <input type="hidden" name="_method" value="PUT">

                <div class="accordion-container space-y-4">
                    <!-- Scholar Details Section -->
                    <div class="border rounded-lg border-blue-300">
                        <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                            <h4 class="text-xl font-bold text-gray-800">Scholar Details</h4>
                            <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="accordion-content p-4 hidden">
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">Name</label>
                                    <input type="text" name="name" id="edit_name" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="edit_pi_id" class="block text-sm font-bold text-blue-700">PI</label>
                                    <select name="pi_id" id="edit_pi_id" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sets Section -->
                    @for ($i = 1; $i <= 5; $i++)
                    <div class="border rounded-lg border-blue-300">
                        <button type="button" class="accordion-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-t-lg">
                            <h4 class="text-xl font-bold text-gray-800">Set {{ $i }}</h4>
                            <svg class="accordion-icon w-6 h-6 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="accordion-content p-4 hidden">
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">FDFR{{ $i }}</label>
                                    <input type="text" name="Fdfr{{ $i }}" id="edit_Fdfr{{ $i }}" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">FEXP{{ $i }}</label>
                                    <input type="text" name="Fexp{{ $i }}" id="edit_Fexp{{ $i }}" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">FSEUC{{ $i }}</label>
                                    <input type="text" name="Fseuc{{ $i }}" id="edit_Fseuc{{ $i }}" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">CDFR{{ $i }}</label>
                                    <input type="text" name="Cdfr{{ $i }}" id="edit_Cdfr{{ $i }}" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">CEXP{{ $i }}</label>
                                    <input type="text" name="Cexp{{ $i }}" id="edit_Cexp{{ $i }}" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">CSEUC{{ $i }}</label>
                                    <input type="text" name="Cseuc{{ $i }}" id="edit_Cseuc{{ $i }}" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">ODFR{{ $i }}</label>
                                    <input type="text" name="Odfr{{ $i }}" id="edit_Odfr{{ $i }}" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">OEXP{{ $i }}</label>
                                    <input type="text" name="Oexp{{ $i }}" id="edit_Oexp{{ $i }}" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-blue-700">OSEUC{{ $i }}</label>
                                    <input type="text" name="Oseuc{{ $i }}" id="edit_Oseuc{{ $i }}" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                <!-- Modal Footer -->
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="closeModal()" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        Save Scholar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.accordion-icon');

            // Toggle content visibility
            content.classList.toggle('hidden');

            // Rotate icon
            icon.classList.toggle('rotate-180');
        });
    });
});
</script>

<script>

function validateForm(formData) {
    const errors = [];
    const allFields = [];

        // Validate required fields
        if (!formData.get('name')) {
            errors.push('Scholar name is required');
        }

        if (!formData.get('pi_id')) {
            errors.push('Principal Investigator ID is required');
        }

        // Add all sets of fields (1-5)
        for (let set = 1; set <= 5; set++) {
            const setFields = [
                `Fdfr${set}`, `Fexp${set}`, `Fseuc${set}`,
                `Cdfr${set}`, `Cexp${set}`, `Cseuc${set}`,
                `Odfr${set}`, `Oexp${set}`, `Oseuc${set}`
            ];
            allFields.push(...setFields);
        }

        // Validate each field if it has a value
        allFields.forEach(field => {
            const value = formData.get(`edit_${field}`);
            if (value !== '' && value !== null) {
                if (isNaN(value) || value < 0 || value > 100) {
                    errors.push(`${field} must be a number between 0 and 100`);
                }
            }
        });

        return errors;
    }

    // Function to open the edit modal and populate form data
    function openEditModal(studentId) {
        // Show the modal
        document.getElementById('editModal').classList.remove('hidden');

        const piSelect = document.getElementById('edit_pi_id');
        function fetchPIUsers(studentId) {
            fetch('/get-role-two-users')
                .then(response => response.json())
                .then(data => {
                    piSelect.innerHTML = '<option value="">Select PI</option>';
                    // copiSelect.innerHTML = '<option value="">Select Co-PI</option>';

                    data.forEach(user => {
                        // Use user.id as value, name as display
                        const piOption = document.createElement('option');
                        piOption.value = user.id;  // Use ID instead of name
                        piOption.textContent = user.name;
                        piSelect.appendChild(piOption);

                        // const copiOption = document.createElement('option');
                        // copiOption.value = user.id;  // Use ID instead of name
                        // copiOption.textContent = user.name;
                        // copiSelect.appendChild(copiOption);
                    });
                })
            }
        // Call the function when the page loads
        fetchPIUsers();


        // Update the URL to match your Laravel route
        fetch(`/students/${studentId}`, {
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error ${response.status}: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            if (!data) {
                throw new Error('No data received from server');
            }

            // Populate form fields with fetched data
            document.getElementById('scholar_id').value = studentId;
            document.getElementById('edit_name').value = data.name || '';
            document.getElementById('edit_pi_id').value = data.pi_id || '';

            // Populate other fields for each set
            for (let i = 1; i <= 5; i++) {
                const fields = [
                    'Fdfr', 'Fexp', 'Fseuc',
                    'Cdfr', 'Cexp', 'Cseuc',
                    'Odfr', 'Oexp', 'Oseuc'
                ];

                fields.forEach(field => {
                    const fieldId = `edit_${field}${i}`;
                    const fieldValue = data[`${field}${i}`];
                    const element = document.getElementById(fieldId);
                    if (element) {
                        element.value = fieldValue !== null ? fieldValue : '';
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            alert(`Error: Unable to fetch student data. ${error.message}`);
            closeModal(); // Close the modal on error
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
        event.preventDefault();

        const studentId = document.getElementById('scholar_id').value;
        const formData = new FormData(this);
        const errors = validateForm(formData);

        // Check for validation errors first
        if (errors.length > 0) {
            alert('Please correct the following errors:\n' + errors.join('\n'));
            return;
        }

        // Convert FormData to JSON
        const jsonData = {};
        formData.forEach((value, key) => {
            // Remove 'edit_' prefix when adding to jsonData
            const cleanKey = key.startsWith('edit_') ? key.substring(5) : key;
            jsonData[cleanKey] = value;
        });

        fetch(`/students/${studentId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => Promise.reject(err));
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert('Scholar updated successfully!');
                closeModal();
                window.location.reload();
            } else {
                throw new Error(data.message || 'Update failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            let errorMessage = 'Failed to update scholar. ';
            if (error.errors) {
                errorMessage += '\n' + Object.values(error.errors).flat().join('\n');
            } else if (error.message) {
                errorMessage += error.message;
            }
            alert(errorMessage);
        });
    });
</script>
