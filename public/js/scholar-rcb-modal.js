document.addEventListener('DOMContentLoaded', function () {
    // Get modal elements with correct IDs
    const editModal = document.getElementById('editModal');
    const editForm = document.getElementById('editScholarForm');
    const closeModalBtn = document.querySelector('button[onclick="closeModal()"]');
    const piSelect = document.querySelector('select[name="pi_id"]');

    // Close modal function
    window.closeModal = function() {
        if (editModal) {
            editModal.classList.add('hidden');
            // Clear validation errors
            document.querySelectorAll('.text-red-500').forEach(el => el.remove());
            document.querySelectorAll('.border-red-500').forEach(el => {
                el.classList.remove('border-red-500');
            });
        }
    };

    // Fetch PI Users function
    async function fetchPIUsers() {
        try {
            const response = await fetch('/get-role-two-users');
            if (!response.ok) {
                throw new Error('Failed to fetch PI users');
            }
            const data = await response.json();

            if (piSelect) {
                piSelect.innerHTML = '<option value="">Select PI</option>';
                data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = user.name;
                    piSelect.appendChild(option);
                });
            }
        } catch (error) {
            console.error('Error fetching PI users:', error);
        }
    }

    // Initialize accordion functionality
    function initializeAccordion() {
        const accordionHeaders = document.querySelectorAll('.accordion-header');
        accordionHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('.accordion-icon');

                if (content && icon) {
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');

                    // Close other accordions
                    accordionHeaders.forEach(otherHeader => {
                        if (otherHeader !== header) {
                            const otherContent = otherHeader.nextElementSibling;
                            const otherIcon = otherHeader.querySelector('.accordion-icon');
                            if (otherContent && otherIcon) {
                                otherContent.classList.add('hidden');
                                otherIcon.classList.remove('rotate-180');
                            }
                        }
                    });
                }
            });
        });
    }

    // Handle form submission
    if (editForm) {
        editForm.addEventListener('submit', async function(event) {
            event.preventDefault();

            const studentId = this.getAttribute('data-id');
            if (!studentId) {
                console.error("Missing student ID");
                return;
            }

            const formData = new FormData(this);
            formData.append('_method', 'PUT');

            try {
                const response = await fetch(`/students/${studentId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const responseData = await response.json();

                if (!response.ok) {
                    if (response.status === 422) {
                        // Handle validation errors
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
                        throw new Error('Validation failed');
                    }
                    throw new Error(responseData.message || 'Server error');
                }

                alert('Scholar updated successfully');
                closeModal();
                window.location.reload();

            } catch (error) {
                console.error('Error:', error);
                alert('Error updating scholar: ' + error.message);
            }
        });
    }

    // Initialize edit buttons
    function initializeEditButtons() {
        document.querySelectorAll('.edit-scholar-btn').forEach(button => {
            button.addEventListener('click', async function() {
                const studentId = this.dataset.id;
                if (!studentId) return;

                try {
                    await fetchPIUsers();
                    const response = await fetch(`/students/${studentId}/edit`);
                    const data = await response.json();

                    if (piSelect) piSelect.value = data.pi_id || '';

                    // Clear previous errors
                    document.querySelectorAll('.text-red-500').forEach(el => el.remove());
                    document.querySelectorAll('.border-red-500').forEach(el => {
                        el.classList.remove('border-red-500');
                    });

                    // Populate form fields
                    Object.entries(data).forEach(([key, value]) => {
                        const input = document.getElementById(`edit_${key}`);
                        if (input && input.type !== 'file') {
                            input.value = value || '';
                        }
                    });

                    if (editForm) editForm.setAttribute('data-id', studentId);
                    if (editModal) editModal.classList.remove('hidden');

                } catch (error) {
                    console.error('Error fetching scholar data:', error);
                    alert('Error loading scholar data');
                }
            });
        });
    }

    // Initialize all components
    fetchPIUsers();
    initializeAccordion();
    initializeEditButtons();
});
