// Add project modal functionality
$(document).ready(function() {
    // Open modal when Add Project button is clicked
    $('.add-project-btn').click(function() {
        $('#add-project-modal').show();
    });

    // Close modal handlers
    $('.close-modal, .close-btn, #add-project-modal').click(function(e) {
        if (e.target === this) {
            $('#add-project-modal').hide();
            $('#add-project-form')[0].reset();
        }
    });

    // Prevent modal from closing when clicking content
    $('.modal-content').click(function(e) {
        e.stopPropagation();
    });


    // Handle form submission
    $('#add-project-form').submit(function(e) {
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
            url: '/project/store',
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
            },
            success: function(response) {
                if (response.success) {
                    alert('Project added successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errorMessages = Object.values(xhr.responseJSON.errors)
                        .flat()
                        .join('\n');
                    alert('Validation errors:\n' + errorMessages);
                } else {
                    alert('Error adding project: ' + (xhr.responseJSON?.message || error));
                }
            }
        });
    });
});
