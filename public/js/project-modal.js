// public/js/project-modal.js
let currentProject = null;

function showProjectDetails(projectId) {
    $.ajax({
        url: `/project/${projectId}`,
        method: 'GET',
        success: function(project) {
            currentProject = project;
            const details = `
                <div class="detail-row">
                    <span class="detail-label">Project Name:</span>
                    <span>${project.name}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">PI 1:</span>
                    <span>${project.pi_name}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">PI 2:</span>
                    <span>${project.pi2_name}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">File No:</span>
                    <span>${project.project_file_no}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Sanction No:</span>
                    <span>${project.sanction_no_date}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Funding Agency:</span>
                    <span>${project.funding_agency}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">End Date:</span>
                    <span>${project.end_date}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Extension:</span>
                    <span>${project.extension_if_any}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Sanctioned Outlay:</span>
                    <span>${project.sanctioned_outlay}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Project Cost:</span>
                    <span>${project.project_cost}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Balance:</span>
                    <span>${project.balance}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Active:</span>
                    <span>${project.active == '1' ? 'Yes' : 'No'}</span>
                </div>
            `;

            $('#project-details').html(details);
            $('#project_id').val(project.pid);
            $('#project-modal').show();
            showViewMode();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error loading project:', errorThrown);
            alert('Error loading project details. Please try again.');
        }
    });
}

function showEditMode() {
    $('#modal-title').text('Edit Project');
    $('.view-mode').addClass('hidden');
    $('.edit-mode').removeClass('hidden');
    $('.edit-project-btn').addClass('hidden');
    $('.save-project-btn, .cancel-edit-btn').removeClass('hidden');

    // Populate form with current project data
    const form = $('#edit-form');
    for (const [key, value] of Object.entries(currentProject)) {
        form.find(`[name="${key}"]`).val(value);
    }
}

function showViewMode() {
    $('#modal-title').text('Project Details');
    $('.view-mode').removeClass('hidden');
    $('.edit-mode').addClass('hidden');
    $('.edit-project-btn').removeClass('hidden');
    $('.save-project-btn, .cancel-edit-btn').addClass('hidden');
}

// Document ready handlers
$(document).ready(function() {
    // Edit button click
    $('.edit-project-btn').click(function() {
        showEditMode();
    });

    // Cancel edit button click
    $('.cancel-edit-btn').click(function() {
        showViewMode();
    });


    // Save changes button click
    $('.save-project-btn').on('click', function () {
        const projectId = $('#project_id').val();
        const formData = $('#edit-form').serialize();

        $.ajax({
            url: `/project/${projectId}`, // Make sure this matches your route
            method: 'PUT',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json' // Add this line
            },
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    // Update the view without reloading
                    showProjectDetails(projectId);
                    showViewMode();
                }
            },
            error: function (xhr) {
                const errorMessage = xhr.responseJSON?.message || 'Unknown error';
                alert(`Error updating project: ${errorMessage}`);
                console.error(xhr.responseText); // Add this for debugging
            }
        });
    });



    // Close modal handlers
    $('.close-modal, .close-btn, .modal').click(function(e) {
        if (e.target === this) {
            $('#project-modal').hide();
            showViewMode(); // Reset to view mode when closing
        }
    });

    // Prevent modal from closing when clicking content
    $('.modal-content').click(function(e) {
        e.stopPropagation();
    });
});
