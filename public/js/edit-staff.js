document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('edit-staff-modal');
    const editForm = document.getElementById('edit-staff-form');
    const closeEditModal = document.getElementById('close-edit-modal');
    const cancelEditModal = document.getElementById('cancel-edit-modal');

    // Open modal and populate data
    document.querySelectorAll('.edit-staff-btn').forEach(button => {
        button.addEventListener('click', function () {
            const staffId = this.dataset.id;

            if (!staffId) {
                console.error("Staff ID is undefined. Check the data-id attribute on the button.");
                alert("Error: Unable to find the staff ID.");
                return;
            }

            console.log("Editing staff with ID:", staffId);

            // Fetch data using AJAX
            fetch(`/staff/${staffId}/edit`)
                .then(response => {
                    if (!response.ok) throw new Error('Failed to fetch staff data');
                    return response.json();
                })
                .then(data => {
                    // Populate modal fields
                    document.getElementById('edit_fac_name').value = data.fac_name || '';
                    document.getElementById('edit_email').value = data.email || '';
                    document.getElementById('edit_designation').value = data.designation || '';
                    document.getElementById('edit_empid').value = data.empid || '';
                    document.getElementById('edit_EPF_PPRN_No').value = data.EPF_PPRN_No || '';
                    document.getElementById('edit_ltc_availed').value = data.ltc_availed || '';
                    document.getElementById('edit_pay_level').value = data.pay_level || '';
                    document.getElementById('edit_basic_pay').value = data.basic_pay || '';
                    document.getElementById('edit_position_held').value = data.position_held || '';
                    // Set the form action dynamically
                    editForm.dataset.id = staffId;
                    editModal.classList.remove('hidden');
                })
                .catch(error => {
                    console.error("Error fetching staff data:", error);
                    alert('Error fetching staff details.');
                });
        });
    });

    // Close modal
    [closeEditModal, cancelEditModal].forEach(button => {
        button.addEventListener('click', () => {
            editModal.classList.add('hidden');
        });
    });

    // Handle form submission
    editForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const staffId = editForm.dataset.id;

        if (!staffId) {
            alert("Error: Unable to find the staff ID.");
            return;
        }

        // Create an object from form data
        const formData = Object.fromEntries(new FormData(editForm));

        fetch(`/staff/${staffId}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(async response => {
            const data = await response.json();
            if (!response.ok) {
                throw new Error(data.message || 'Error updating staff details');
            }
            return data;
        })
        .then(data => {
            alert(data.message || 'Staff updated successfully.');
            editModal.classList.add('hidden');
            location.reload();
        })
        .catch(error => {
            console.error("Error updating staff details:", error);
            alert(`Error updating staff details: ${error.message}`);
        });
    });
});
