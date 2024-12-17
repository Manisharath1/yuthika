// document.addEventListener('DOMContentLoaded', function () {
//     const editModal = document.getElementById('edit-scholar-modal');
//     const editForm = document.getElementById('edit-scholar-form');
//     const closeEditModal = document.getElementById('close-edit-modal');
//     const cancelEditModal = document.getElementById('cancel-edit-modal');

//     const piSelect = document.getElementById('edit_pi');
//     const copiSelect = document.getElementById('edit_coPi');

//     function fetchPIUsers(studentId) {
//         fetch('/get-role-two-users')
//             .then(response => response.json())
//             .then(data => {
//                 piSelect.innerHTML = '<option value="">Select PI</option>';
//                 copiSelect.innerHTML = '<option value="">Select Co-PI</option>';

//                 data.forEach(user => {
//                     // Use user.id as value, name as display
//                     const piOption = document.createElement('option');
//                     piOption.value = user.id;  // Use ID instead of name
//                     piOption.textContent = user.name;
//                     piSelect.appendChild(piOption);

//                     const copiOption = document.createElement('option');
//                     copiOption.value = user.id;  // Use ID instead of name
//                     copiOption.textContent = user.name;
//                     copiSelect.appendChild(copiOption);
//                 });
//             })

//     }

//     // Call the function when the page loads
//     fetchPIUsers();

//     // Handle form submission with detailed error logging
//     editForm.addEventListener('submit', function (event) {
//         event.preventDefault();

//         const studentId = editForm.dataset.id;
//         if (!studentId) {
//             console.error("Missing student ID");
//             return;
//         }

//         // Create FormData object
//         const formData = new FormData(editForm);

//         // Log form data for debugging
//         console.log('Form Data:');
//         for (let pair of formData.entries()) {
//             console.log(pair[0] + ': ' + pair[1]);
//         }

//         // Add method spoofing for Laravel
//         formData.append('_method', 'PUT');

//         fetch(`/students/${studentId}`, {
//             method: 'POST',  // Using POST with _method: PUT for Laravel
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
//                 'Accept': 'application/json'
//             },
//             body: formData
//         })
//         .then(async response => {
//             const responseData = await response.json();

//             // Log the complete server response
//             console.log('Server Response:', responseData);

//             if (!response.ok) {
//                 if (response.status === 422) {
//                     console.error('Validation Errors:', responseData.errors);
//                     // Display validation errors on the form
//                     Object.keys(responseData.errors).forEach(field => {
//                         const input = document.getElementById(`edit_${field}`);
//                         if (input) {
//                             input.classList.add('border-red-500');
//                             const errorDiv = document.createElement('div');
//                             errorDiv.className = 'text-red-500 text-sm mt-1';
//                             errorDiv.textContent = responseData.errors[field].join(', ');
//                             input.parentNode.appendChild(errorDiv);
//                         }
//                     });
//                     throw new Error('Validation failed: ' + JSON.stringify(responseData.errors));
//                 }
//                 throw new Error(responseData.message || 'Server error');
//             }
//             return responseData;
//         })
//         .then(data => {
//             console.log('Success:', data);
//             alert('Student updated successfully');
//             editModal.classList.add('hidden');
//             window.location.reload();
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             // Show a more detailed error message
//             alert('Error updating student: ' + error.message);
//         });
//     });

    // Open modal and populate data
    // document.querySelectorAll('.edit-scholar-btn').forEach(button => {

    //     button.addEventListener('click', function() {
    //         const studentId = this.dataset.id;
    //         console.log('Opening edit modal for student:', studentId);

    //         fetchPIUsers(studentId);

    //         fetch(`/students/${studentId}/edit`)
    //             .then(response => response.json())
    //             .then(data => {
    //                 console.log('Fetched student data:', data);

    //                 piSelect.value = data.pi_id;
    //                 copiSelect.value = data.co_pi_id;

    //                 // Clear any previous error messages
    //                 document.querySelectorAll('.text-red-500').forEach(el => el.remove());
    //                 document.querySelectorAll('.border-red-500').forEach(el => {
    //                     el.classList.remove('border-red-500');
    //                 });

    //                 // Populate form fields
    //                 for (const [key, value] of Object.entries(data)) {
    //                     const input = document.getElementById(`edit_${key}`);
    //                     if (input) {
    //                         input.value = value || '';
    //                     }
    //                 }

    //                 editForm.dataset.id = studentId;
    //                 editModal.classList.remove('hidden');
    //             })
    //             .catch(error => {
    //                 console.error('Error fetching student data:', error);
    //                 alert('Error loading student data');
    //             });
    //     });
    // });

    // Close modal handlers
//     [closeEditModal, cancelEditModal].forEach(button => {
//         button.addEventListener('click', () => {
//             editModal.classList.add('hidden');
//             // Clear validation errors when closing
//             document.querySelectorAll('.text-red-500').forEach(el => el.remove());
//             document.querySelectorAll('.border-red-500').forEach(el => {
//                 el.classList.remove('border-red-500');
//             });
//         });
//     });
// });
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('edit-scholar-modal');
    const editForm = document.getElementById('edit-scholar-form');
    const closeEditModal = document.getElementById('close-edit-modal');
    const cancelEditModal = document.getElementById('cancel-edit-modal');

    const piSelect = document.getElementById('edit_pi');
    const copiSelect = document.getElementById('edit_coPi');

    function fetchPIUsers(studentId) {
        fetch('/get-role-two-users')
            .then(response => response.json())
            .then(data => {
                piSelect.innerHTML = '<option value="">Select PI</option>';
                copiSelect.innerHTML = '<option value="">Select Co-PI</option>';

                data.forEach(user => {
                    // Use user.id as value, name as display
                    const piOption = document.createElement('option');
                    piOption.value = user.id;  // Use ID instead of name
                    piOption.textContent = user.name;
                    piSelect.appendChild(piOption);

                    const copiOption = document.createElement('option');
                    copiOption.value = user.id;  // Use ID instead of name
                    copiOption.textContent = user.name;
                    copiSelect.appendChild(copiOption);
                });
            })

    }

    // Call the function when the page loads
    fetchPIUsers();

    // Handle form submission with detailed error logging
    editForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const studentId = editForm.dataset.id;
        if (!studentId) {
            console.error("Missing student ID");
            return;
        }

        // Create FormData object
        const formData = new FormData(editForm);

        // Log form data for debugging
        console.log('Form Data:');
        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        // Add method spoofing for Laravel
        formData.append('_method', 'PUT');

        fetch(`/students/${studentId}`, {
            method: 'POST',  // Using POST with _method: PUT for Laravel
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(async response => {
            const responseData = await response.json();

            // Log the complete server response
            console.log('Server Response:', responseData);

            if (!response.ok) {
                if (response.status === 422) {
                    console.error('Validation Errors:', responseData.errors);
                    // Display validation errors on the form
                    Object.keys(responseData.errors).forEach(field => {
                        const input = document.getElementById(`edit_${field}`);
                        if (input) {
                            input.classList.add('border-red-500');
                            const errorDiv = document.createElement('div');
                            errorDiv.className = 'text-red-500 text-sm mt-1';
                            errorDiv.textContent = responseData.errors[field].join(', ');
                            input.parentNode.appendChild(errorDiv);
                        }
                    });
                    throw new Error('Validation failed: ' + JSON.stringify(responseData.errors));
                }
                throw new Error(responseData.message || 'Server error');
            }
            return responseData;
        })
        .then(data => {
            console.log('Success:', data);
            alert('Student updated successfully');
            editModal.classList.add('hidden');
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            // Show a more detailed error message
            alert('Error updating student: ' + error.message);
        });
    });

    // Open modal and populate data
    document.querySelectorAll('.edit-scholar-btn').forEach(button => {

        button.addEventListener('click', function() {
            const studentId = this.dataset.id;
            console.log('Opening edit modal for student:', studentId);

            fetchPIUsers(studentId);

            fetch(`/students/${studentId}/edit`)
                .then(response => response.json())
                .then(data => {
                    console.log('Fetched student data:', data);

                    piSelect.value = data.pi_id;
                    copiSelect.value = data.co_pi_id;

                    // Clear any previous error messages
                    document.querySelectorAll('.text-red-500').forEach(el => el.remove());
                    document.querySelectorAll('.border-red-500').forEach(el => {
                        el.classList.remove('border-red-500');
                    });

                    // Populate form fields
                    for (const [key, value] of Object.entries(data)) {
                        const input = document.getElementById('edit_'+key);
                        // alert('edit_'+key+'-'+input+'-'+value);
                        if (input) {
                           if (input.type === 'file') {
                           } else {
                            input.value = value || '';
                           }
                       }
                    }

                    editForm.dataset.id = studentId;
                    editModal.classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error fetching student data:', error);
                    alert('Error loading student data');
                });
        });
    });

    // Close modal handlers
    [closeEditModal, cancelEditModal].forEach(button => {
        button.addEventListener('click', () => {
            editModal.classList.add('hidden');
            // Clear validation errors when closing
            document.querySelectorAll('.text-red-500').forEach(el => el.remove());
            document.querySelectorAll('.border-red-500').forEach(el => {
                el.classList.remove('border-red-500');
            });
        });
    });

    // <!-- Add JavaScript for accordion functionality -->

    const accordionHeaders = document.querySelectorAll('.accordion-header');
    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            // Toggle current accordion
            const content = this.nextElementSibling;
            const icon = this.querySelector('.accordion-icon');

            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');

            // Optional: Close other accordions
            accordionHeaders.forEach(otherHeader => {
                if (otherHeader !== header) {
                    const otherContent = otherHeader.nextElementSibling;
                    const otherIcon = otherHeader.querySelector('.accordion-icon');
                    otherContent.classList.add('hidden');
                    otherIcon.classList.remove('rotate-180');
                }
            });
        });
    });
});
