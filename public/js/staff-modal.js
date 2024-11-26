document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('addStaffModal');
    const openModalBtn = document.querySelector('.add-staff-btn');
    const closeModalBtns = document.querySelectorAll('.close-modal');
    const form = document.getElementById('addStaffForm');

    if (!form) {
        console.error('Form with ID "addStaffForm" not found.');
        return;
    }

    const submitBtn = form.querySelector('button[type="submit"]');

    // Open modal
    openModalBtn?.addEventListener('click', function () {
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
    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal on escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });

    // Form submission handling
    form.addEventListener('submit', async function (e) {
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
                    'Accept': 'application/json',
                },
                credentials: 'same-origin',
            });

            let data;
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                data = await response.json();
            } else {
                const text = await response.text();
                console.error('Non-JSON response:', text);
                throw new Error('Server returned non-JSON response');
            }

            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    showErrors(data.errors);
                    throw new Error('Validation failed');
                }
                throw new Error(data.message || 'An error occurred');
            }

            alert('Staff added successfully!');
            closeModal();
            window.location.reload();
        } catch (error) {
            console.error('Error:', error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Save Staff';
        }
    });

    
});
