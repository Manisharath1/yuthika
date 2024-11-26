<x-app-layout>
    <x-navbar/>

    <div class="flex min-h-screen">
        <x-sidebar />

        <div class="flex-1 p-8 bg-gray-50">
            <div class="container">
                <div class="mb-6 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-700">Manage Scholars</h1>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center">
                            <select id="column-visibility" class="form-select rounded-md border-gray-300 shadow-sm">
                                <option value="">Column Visibility</option>
                                <option value="name">Name</option>
                                <option value="type">Type</option>
                                <option value="category">Category</option>
                                <option value="designation">Designation</option>
                                <option value="email">Email</option>
                                <option value="phone">Phone</option>
                                <option value="sex">Sex</option>
                                <option value="Date of Birth">Date of Birth</option>
                                <option value="caste">Caste</option>
                                <option value="permanent address">Permanent Address</option>
                                <option value="Home Address">Home Address</option>
                                <option value="Hostel Joined on">Hostel Joined on</option>
                                <option value="Hostel Vaccated on">Hostel Vaccated on</option>
                                <option value="Caution Money">Caution Money</option>
                                <option value="Funding Agency">Funding Agency</option>
                                <option value="ILS ID No">ILS ID No</option>
                                <option value="Emergency Contact No">Emergency Contact No</option>
                                <option value="Scholar File No">Scholar File No</option>
                                <option value="Joining Date<">Joining Date</option>
                                <option value="enure Upto">Tenure Upto</option>
                                <option value="SRF W.E.F.">SRF W.E.F.</option>
                                <option value="Document Link">Document Link</option>
                                <option value="No. of Publications">No. of Publications</option>
                                <option value="no_of_conf_attended">No. Conf Attended</option>
                                <option value="No. Conf Attended">Personal Email</option>
                                <option value="fellowship">Fellowship</option>
                                <option value="PI">PI</option>
                                <option value="CO PI">CO PI</option>
                                <option value="Registration No">Registration No</option>
                                <option value="Registration Date">Registration Date</option>
                                <option value="topic">Topic</option>
                                <option value="extension date">Extension Date</option>
                                <option value="submission date">Submission Date</option>
                                <option value="award date">Award Date</option>
                                <option value="thesis availability">Thesis Availability</option>
                                <option value="Date of Completion">Date of Completion</option>
                                <option value="photo">Photo</option>
                                <option value="correspondence">Correspondence</option>
                                <option value="document">Document</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <input type="text" id="search-input" placeholder="Search..."
                                class="form-input rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PI</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fdfr1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fexp1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fseuc1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cdfr1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cexp1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cseuc1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Odfr1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oexp1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oseuc1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fdfr2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fexp2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fseuc2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cdfr2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cexp2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cseuc2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Odfr2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oexp2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oseuc2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fdfr3</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fexp3</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fseuc3</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cdfr3</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cexp3</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cseuc3</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Odfr3</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oexp3</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oseuc3</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fdfr4</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fexp4</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fseuc4</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cdfr4</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cexp4</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cseuc4</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Odfr4</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oseuc4</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fdfr5</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fexp5</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fseuc5</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cdfr5</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cexp5</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cseuc5</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Odfr5</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oexp5</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oseuc5</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($scholars as $scholar)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button onclick="openEditModal({{ $scholar->student_id }})" class="text-blue-600 hover:text-blue-900">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 name">{{ $scholar->name }}</td>
                                <td>{{ $scholar->pi ? $scholar->pi->name : 'N/A' }}</td>
                                @for ($i = 1; $i <= 5; $i++)
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 Fdfr{{ $i }}">{{ $scholar["Fdfr{$i}"] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 Fexp{{ $i }}">{{ $scholar["Fexp{$i}"] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 Fseuc{{ $i }}">{{ $scholar["Fseuc{$i}"] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 Cdfr{{ $i }}">{{ $scholar["Cdfr{$i}"] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 Cexp{{ $i }}">{{ $scholar["Cexp{$i}"] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 Cseuc{{ $i }}">{{ $scholar["Cseuc{$i}"] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 Odfr{{ $i }}">{{ $scholar["Odfr{$i}"] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 Oexp{{ $i }}">{{ $scholar["Oexp{$i}"] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 Oseuc{{ $i }}">{{ $scholar["Oseuc{$i}"] }}</td>
                                @endfor
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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

</x-app-layout>
