document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editModal');
    const editForm = document.getElementById('editScholarForm');
    const piSelect = document.getElementById('edit_pi_id');

    // Initialize accordion functionality
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.accordion-icon');

            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });

    // Fetch PI users for dropdown
    function fetchPIUsers() {
        fetch('/get-role-two-users')
            .then(response => response.json())
            .then(data => {
                piSelect.innerHTML = '<option value="">Select PI</option>';
                data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = user.name;
                    piSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching PI users:', error);
            });
    }

    // Call the function when the page loads
    fetchPIUsers();

    // Handle form submission
    editForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const studentId = document.getElementById('scholar_id').value;
        if (!studentId) {
            console.error("Missing student ID");
            return;
        }

        const formData = new FormData(editForm);

        // Log form data for debugging
        console.log('Form Data:');
        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        fetch(`/students/${studentId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(async response => {
            const responseData = await response.json();
            console.log('Server Response:', responseData);

            if (!response.ok) {
                if (response.status === 422) {
                    console.error('Validation Errors:', responseData.errors);
                    // Clear previous errors
                    clearValidationErrors();
                    // Display new validation errors
                    displayValidationErrors(responseData.errors);
                    throw new Error('Validation failed');
                }
                throw new Error(responseData.message || 'Server error');
            }
            return responseData;
        })
        .then(data => {
            console.log('Success:', data);
            if (data.success) {
                showAlert('Student updated successfully', 'success');
                closeModal();
                window.location.reload();
            } else {
                showAlert(data.message || 'Error updating student', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('Error updating student: ' + error.message, 'error');
        });
    });

    // Edit button click handler
    document.querySelectorAll('.edit-scholar-btn').forEach(button => {
        button.addEventListener('click', function() {
            const studentId = this.dataset.id;
            console.log('Opening edit modal for student:', studentId);

            // Clear previous form data and errors
            clearValidationErrors();
            editForm.reset();

            fetch(`/students/${studentId}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Fetched student data:', data);
                    document.getElementById('scholar_id').value = studentId;

                    // Populate form fields
                    Object.entries(data).forEach(([key, value]) => {
                        const input = document.getElementById(`edit_${key}`);
                        if (input) {
                            if (key === 'joining_date' || key === 'date_of_registration') {
                                // Format date to YYYY-MM-DD for input[type="date"]
                                if (value) {
                                    input.value = value.split('T')[0];
                                }
                            } else {
                                input.value = value || '';
                            }
                        }
                    });

                    // Set PI value
                    if (data.pi_id) {
                        piSelect.value = data.pi_id;
                    }

                    // Show first accordion section by default
                    const firstAccordion = document.querySelector('.accordion-content');
                    const firstAccordionIcon = document.querySelector('.accordion-icon');
                    if (firstAccordion && firstAccordionIcon) {
                        firstAccordion.classList.remove('hidden');
                        firstAccordionIcon.classList.add('rotate-180');
                    }

                    // Show modal
                    editModal.classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error fetching student data:', error);
                    showAlert('Error loading student data: ' + error.message, 'error');
                });
        });
    });

    // Helper functions
    function clearValidationErrors() {
        document.querySelectorAll('.error-message').forEach(el => el.remove());
        document.querySelectorAll('.border-red-500').forEach(el => {
            el.classList.remove('border-red-500');
        });
    }

    function displayValidationErrors(errors) {
        Object.entries(errors).forEach(([field, messages]) => {
            const input = document.getElementById(`edit_${field}`);
            if (input) {
                input.classList.add('border-red-500');
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message text-red-500 text-sm mt-1';
                errorDiv.textContent = messages.join(', ');
                input.parentNode.appendChild(errorDiv);
            }
        });
    }

    function showAlert(message, type) {
        alert(message);
    }

    // Close modal function (referenced in HTML)
    window.closeModal = function() {
        editModal.classList.add('hidden');
        clearValidationErrors();
        editForm.reset();
    };
});
