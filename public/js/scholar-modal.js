// public/js/scholar-modal.js
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('addScholarModal');
    const openModalBtn = document.querySelector('.add-scholar-btn');
    const closeModalBtns = document.querySelectorAll('.close-modal');
    const form = document.getElementById('addScholarForm');
     // Check if form exists
     if (!form) {
        console.error('Form with ID "addScholarForm" not found.');
        return; // Exit if form is null
    }

    const submitBtn = form.querySelector('button[type="submit"]');

    // Open modal
    openModalBtn.addEventListener('click', function() {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        clearFormErrors();
    });

    // Close modal function
    function closeModal() {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
        form.reset();
        clearFormErrors();
    }

    // Clear previous error messages
    function clearFormErrors() {
        form.querySelectorAll('.error-message').forEach(el => el.remove());
        form.querySelectorAll('.border-red-500').forEach(el => {
            el.classList.remove('border-red-500');
            el.classList.add('border-gray-300');
        });
    }

    // Display error messages
    function showErrors(errors) {
        clearFormErrors();
        Object.keys(errors).forEach(field => {
            const input = form.querySelector(`[name="${field}"]`);
            if (input) {
                input.classList.remove('border-gray-300');
                input.classList.add('border-red-500');
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message text-red-500 text-sm mt-1';
                errorDiv.textContent = errors[field][0];
                input.parentNode.appendChild(errorDiv);
            }
        });
    }

    // Close modal when clicking close button
    closeModalBtns.forEach(btn => {
        btn.addEventListener('click', closeModal);
    });

    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });

        // Form submission handling
        form.addEventListener('submit', async function(e) {
        e.preventDefault();
        clearFormErrors();

        // Disable submit button and show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Saving...
        `;

        try {
            const formData = new FormData(form);

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                credentials: 'same-origin'
            });

            // First check if the response can be parsed as JSON
            let data;
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                data = await response.json();
            } else {
                // If not JSON, get the text and log it for debugging
                const text = await response.text();
                console.error('Received non-JSON response:', text);
                throw new Error('Server returned non-JSON response');
            }

            if (!response.ok) {
                // Handle validation errors
                if (response.status === 422 && data.errors) {
                    showErrors(data.errors);
                    throw new Error('Validation failed');
                }
                throw new Error(data.message || 'An error occurred');
            }

            // Show success message
            const successAlert = document.createElement('div');
            successAlert.className = 'fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded';
            successAlert.role = 'alert';
            successAlert.innerHTML = `
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline"> ${data.message}</span>
            `;
            document.body.appendChild(successAlert);

            // Remove success message after 3 seconds
            setTimeout(() => {
                successAlert.remove();
            }, 3000);

            // Close modal and refresh table
            closeModal();
            window.location.reload();

        } catch (error) {
            console.error('Error:', error);

            // Show error message
            const errorAlert = document.createElement('div');
            errorAlert.className = 'fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded';
            errorAlert.role = 'alert';
            errorAlert.innerHTML = `
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline"> ${error.message}</span>
            `;
            document.body.appendChild(errorAlert);

            // Remove error message after 5 seconds
            setTimeout(() => {
                errorAlert.remove();
            }, 5000);
        } finally {
            // Re-enable submit button and restore original text
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Save Scholar';
        }
    });

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

    const closeButton = document.getElementById('close-edit-modal');
    const cancelButton = document.querySelector('.close-modal');

    // Function to close the modal
    function closeModal() {
        // Add hidden class to hide the modal
        modal.classList.add('hidden');
        // Enable body scroll
        document.body.style.overflow = 'auto';
    }

    // Event listeners for close buttons
    closeButton.addEventListener('click', closeModal);
    cancelButton.addEventListener('click', closeModal);

    // Close modal when clicking outside the modal content
    modal.addEventListener('click', (e) => {
        // Check if the click was on the backdrop (modal background)
        if (e.target === modal || e.target.classList.contains('backdrop-blur-sm')) {
            closeModal();
        }
    });

    // Close modal on escape key press
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
});
