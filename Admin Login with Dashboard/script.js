document.addEventListener('DOMContentLoaded', function() {
    // Login functionality
    const loginForm = document.getElementById('loginForm');
    const loginPage = document.getElementById('loginPage');
    const dashboardPage = document.getElementById('dashboardPage');
    const logoutBtn = document.getElementById('logoutBtn');
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        
        // Simple validation (in a real app, this would be done server-side)
        if (username === 'admin' && password === 'password') {
            loginPage.style.display = 'none';
            dashboardPage.style.display = 'block';
        } else {
            alert('Invalid credentials. Try admin/password');
        }
    });
    
    logoutBtn.addEventListener('click', function() {
        loginPage.style.display = 'flex';
        dashboardPage.style.display = 'none';
        document.getElementById('loginForm').reset();
    });
    
    // Navigation functionality
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(navLink => {
                navLink.classList.remove('active');
            });
            this.classList.add('active');
            
            // Show corresponding section
            const targetId = this.getAttribute('href').substring(1);
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(targetId).classList.add('active');
        });
    });
    
    // Add qualification functionality for Tutor form (Enhanced version)
    const addQualificationBtn = document.querySelector('.btn-add-qualification');
    const btnAddQual = document.getElementById('btnAddQualification');
    
    // Use either button (whichever exists)
    const qualificationButton = addQualificationBtn || btnAddQual;
    
    if (qualificationButton) {
        qualificationButton.addEventListener('click', function() {
            const qualList = document.getElementById('qualificationsList') || document.querySelector('.qualifications-container');
            const qualificationEntry = document.querySelector('.qualification-entry').cloneNode(true);
            
            qualificationEntry.querySelectorAll('input').forEach(input => input.value = '');
            
            // Add remove button for dynamically added qualifications
            if (!qualificationEntry.querySelector('.btn-remove-qualification') && !qualificationEntry.querySelector('.btn-remove-qual')) {
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'btn btn-sm btn-outline-danger btn-remove-qualification mt-2';
                removeBtn.textContent = '× Remove';
                removeBtn.addEventListener('click', function() {
                    qualificationEntry.remove();
                });
                qualificationEntry.appendChild(removeBtn);
            }
            
            qualList.insertBefore(qualificationEntry, qualificationButton);
        });
    }
    
    // Enhanced qualification removal functionality
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remove-qualification') || e.target.classList.contains('btn-remove-qual')) {
            e.target.closest('.qualification-entry').remove();
        }
        if (e.target.classList.contains('btn-remove-entry')) {
            e.target.closest('.entry-requirement-entry').remove();
        }
        if (e.target.classList.contains('btn-remove-goal')) {
            e.target.closest('.goal-entry').remove();
        }
        if (e.target.classList.contains('btn-remove-module')) {
            e.target.closest('.course-module-entry').remove();
        }
    });
    
    // Add Entry Requirement functionality for Course form
    const addEntryRequirementBtn = document.querySelector('.btn-add-entry-requirement');
    if (addEntryRequirementBtn) {
        addEntryRequirementBtn.addEventListener('click', function() {
            const entryRequirementEntry = document.querySelector('.entry-requirement-entry').cloneNode(true);
            entryRequirementEntry.querySelector('input').value = '';
            
            // Add remove button
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-sm btn-outline-danger btn-remove-entry ms-2';
            removeBtn.textContent = '×';
            removeBtn.addEventListener('click', function() {
                entryRequirementEntry.remove();
            });
            
            const inputWrapper = document.createElement('div');
            inputWrapper.className = 'd-flex align-items-center mb-2';
            inputWrapper.appendChild(entryRequirementEntry.querySelector('input'));
            inputWrapper.appendChild(removeBtn);
            entryRequirementEntry.appendChild(inputWrapper);
            
            document.querySelector('.entry-requirements-container').insertBefore(entryRequirementEntry, this);
        });
    }
    
    // Add Goal functionality for Course form
    const addGoalBtn = document.querySelector('.btn-add-goal');
    if (addGoalBtn) {
        addGoalBtn.addEventListener('click', function() {
            const goalEntry = document.querySelector('.goal-entry').cloneNode(true);
            goalEntry.querySelector('input').value = '';
            
            // Add remove button
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-sm btn-outline-danger btn-remove-goal ms-2';
            removeBtn.textContent = '×';
            removeBtn.addEventListener('click', function() {
                goalEntry.remove();
            });
            
            const inputWrapper = document.createElement('div');
            inputWrapper.className = 'd-flex align-items-center mb-2';
            inputWrapper.appendChild(goalEntry.querySelector('input'));
            inputWrapper.appendChild(removeBtn);
            goalEntry.appendChild(inputWrapper);
            
            document.querySelector('.goals-container').insertBefore(goalEntry, this);
        });
    }
    
    // Add Course Module functionality for Course form
    const addModuleBtn = document.querySelector('.btn-add-module');
    if (addModuleBtn) {
        addModuleBtn.addEventListener('click', function() {
            const moduleEntry = document.querySelector('.course-module-entry').cloneNode(true);
            moduleEntry.querySelectorAll('input').forEach(input => {
                if (input.type !== 'file') {
                    input.value = '';
                } else {
                    input.value = null;
                }
            });
            
            // Add remove button for dynamically added modules
            if (!moduleEntry.querySelector('.btn-remove-module')) {
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'btn btn-sm btn-outline-danger btn-remove-module';
                removeBtn.textContent = '× Remove Module';
                removeBtn.addEventListener('click', function() {
                    moduleEntry.remove();
                });
                moduleEntry.appendChild(removeBtn);
            }
            
            document.querySelector('.course-modules-container').insertBefore(moduleEntry, this);
        });
    }
    
    // Enhanced Tutor Form Submission (from new code)
    const tutorForm = document.getElementById('addTutorForm');
    const btnSubmitTutor = document.getElementById('btnSubmitTutor');
    
    if (tutorForm && btnSubmitTutor) {
        btnSubmitTutor.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (!tutorForm.checkValidity()) {
                tutorForm.reportValidity();
                return;
            }
            
            btnSubmitTutor.disabled = true;
            btnSubmitTutor.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
            
            const formData = new FormData(tutorForm);
            
            fetch('save_tutor.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.getElementById('formMessage');
                
                if (data.success) {
                    showMessage('success', data.message);
                    setTimeout(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('addTutorModal'));
                        modal.hide();
                        tutorForm.reset();
                        location.reload(); // Reload page to show new tutor
                    }, 1500);
                } else {
                    showMessage('danger', data.message);
                    btnSubmitTutor.disabled = false;
                    btnSubmitTutor.textContent = 'Add Tutor';
                }
            })
            .catch(error => {
                showMessage('danger', 'An error occurred. Please try again.');
                btnSubmitTutor.disabled = false;
                btnSubmitTutor.textContent = 'Add Tutor';
            });
        });
    }
    
    // Handle other form submissions (fallback for non-AJAX forms)
    document.querySelectorAll('form').forEach(form => {
        if (form.id !== 'addTutorForm' && form.id !== 'loginForm') {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('In a real implementation, this would save to a database.');
            });
        }
    });
    
    // Helper function for showing messages
    function showMessage(type, message) {
        const messageDiv = document.getElementById('formMessage');
        if (messageDiv) {
            messageDiv.className = `alert alert-${type}`;
            messageDiv.textContent = message;
            messageDiv.style.display = 'block';
            
            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 5000);
        }
    }
});