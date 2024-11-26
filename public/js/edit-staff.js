document.addEventListener('DOMContentLoaded', function() {
    // Fetching the modal and form elements
    const editModal = document.getElementById('staff-edit-modal');
    const editForm = document.getElementById('edit-staff-form');
    const closeButton = document.querySelector('#staff-edit-modal button[onclick="closeEditModal()"]');

    // Function to close the modal
    function closeEditModal() {
        editModal.classList.add('hidden');
    }

    // Attach close functionality
    closeButton.addEventListener('click', closeEditModal);

    // Open the modal and fetch staff data for editing
    document.querySelectorAll('.edit-staff-btn').forEach(button => {
        button.addEventListener('click', function() {
            const staffId = this.dataset.id; // Get staff ID from button data attribute

            // Fetch staff data via AJAX
            fetch(`/staff/${staffId}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to fetch staff data');
                    }
                    return response.json();
                })
                .then(data => {
                    // Populate the form fields with fetched data
                    document.getElementById('edit_fac_name').value = data.fac_name || '';
                    document.getElementById('edit_email').value = data.email || '';
                    document.getElementById('edit_designation').value = data.designation || '';
                    document.getElementById('edit_empid').value = data.empid || '';
                    document.getElementById('edit_EPF_PPRN_No').value = data.EPF_PPRN_No || '';
                    document.getElementById('edit_ltc_availed').value = data.ltc_availed || '';
                    document.getElementById('edit_pay_level').value = data.pay_level || '';
                    document.getElementById('edit_basic_pay').value = data.basic_pay || '';
                    document.getElementById('edit_position_held').value = data.position_held || '';

                    // Set the form action to the appropriate update route
                    editForm.action = `/staff/${staffId}`;
                    document.getElementById('staff-edit-modal').classList.remove('hidden');

                    // Show the modal
                    editModal.classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error fetching staff data:', error);
                    alert('Failed to load staff data. Please try again.');
                });
        });
    });

    // Handle form submission for updating staff details
    editForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        const formData = new FormData(editForm);

        // Send the PUT request via AJAX
        fetch(editForm.action, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update staff details');
            }
            return response.json();
        })
        .then(data => {
            alert(data.message || 'Staff updated successfully.');
            closeEditModal(); // Close the modal
            location.reload(); // Refresh the page to reflect changes (or update the table dynamically)
        })
        .catch(error => {
            console.error('Error updating staff details:', error);
            alert('Failed to update staff details. Please try again.');
        });
    });
});
