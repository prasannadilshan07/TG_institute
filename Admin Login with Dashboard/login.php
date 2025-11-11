<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Login Page -->
    <div id="loginPage" class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h3><i class="bi bi-book-half"></i> Academic Admin</h3>
                <p class="mb-0">Sign in to your dashboard</p>
            </div>
            <div class="login-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    <div class="text-center mt-3">
                        <a href="#" class="text-decoration-none">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Dashboard (initially hidden) -->
    <div id="dashboardPage" style="display: none;">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 col-lg-2 sidebar p-0">
                    <div class="d-flex flex-column p-3">
                        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-4">Academic Admin</span>
                        </a>
                        <hr class="text-light">
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#dashboard" class="nav-link active" aria-current="page">
                                    <i class="bi bi-speedometer2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#courses" class="nav-link text-white">
                                    <i class="bi bi-book"></i>
                                    Courses
                                </a>
                            </li>
                            <li>
                                <a href="#tutors" class="nav-link text-white">
                                    <i class="bi bi-person-badge"></i>
                                    Tutors
                                </a>
                            </li>
                            <li>
                                <a href="#news" class="nav-link text-white">
                                    <i class="bi bi-newspaper"></i>
                                    News & Events
                                </a>
                            </li>
                            <li>
                                <a href="#settings" class="nav-link text-white">
                                    <i class="bi bi-gear"></i>
                                    Settings
                                </a>
                            </li>
                        </ul>
                        <hr class="text-light">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://via.placeholder.com/32" alt="Admin" width="32" height="32" class="rounded-circle me-2">
                                <strong>Admin User</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" id="logoutBtn">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9 col-lg-10 ms-sm-auto px-4 py-4">
                    <!-- Topbar -->
                    <div class="topbar mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Admin Dashboard</h4>
                            <div>
                                <i class="bi bi-bell fs-5 me-3"></i>
                                <i class="bi bi-envelope fs-5"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Section -->
                    <div id="dashboard" class="content-section active">
                        <h2 class="mb-4">Dashboard Overview</h2>
                        <div class="row my-4">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="stat-card bg-courses">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5>Courses</h5>
                                            <h3>6</h3>
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="bi bi-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="stat-card bg-tutors">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5>Tutors</h5>
                                            <h3>6</h3>
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="stat-card bg-news">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5>News</h5>
                                            <h3>4</h3>
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="stat-card bg-events">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5>Events</h5>
                                            <h3>2</h3>
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="bi bi-calendar-event"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card dashboard-card">
                                    <div class="card-header">
                                        <h6>Recent Activity</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-1">New course added: Web Development</h6>
                                                    <small>2 hours ago</small>
                                                </div>
                                                <p class="mb-1">A new course has been added to the website.</p>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-1">Tutor profile updated: Dr. Smith</h6>
                                                    <small>1 day ago</small>
                                                </div>
                                                <p class="mb-1">The profile of Dr. Smith has been updated.</p>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-1">News article published: Annual Conference</h6>
                                                    <small>2 days ago</small>
                                                </div>
                                                <p class="mb-1">A new news article has been published.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Courses Section -->
                    <div id="courses" class="content-section">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Course Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                                <i class="bi bi-plus-circle me-1"></i> Add New Course
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Course Name</th>
                                        <th>Short Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="https://via.placeholder.com/50" class="img-thumbnail" alt="Course"></td>
                                        <td>Web Development</td>
                                        <td>Learn modern web development techniques</td>
                                        <td class="action-buttons">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i> Edit</button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://via.placeholder.com/50" class="img-thumbnail" alt="Course"></td>
                                        <td>Data Science</td>
                                        <td>Introduction to data analysis and visualization</td>
                                        <td class="action-buttons">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i> Edit</button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://via.placeholder.com/50" class="img-thumbnail" alt="Course"></td>
                                        <td>Machine Learning</td>
                                        <td>Advanced algorithms for predictive modeling</td>
                                        <td class="action-buttons">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i> Edit</button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tutors Section -->
                    <div id="tutors" class="content-section">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Tutor Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTutorModal">
                                <i class="bi bi-plus-circle me-1"></i> Add New Tutor
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Department</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="https://via.placeholder.com/50" class="img-thumbnail" alt="Tutor"></td>
                                        <td>Dr. John Smith</td>
                                        <td>Professor</td>
                                        <td>Computer Science</td>
                                        <td class="action-buttons">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i> Edit</button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://via.placeholder.com/50" class="img-thumbnail" alt="Tutor"></td>
                                        <td>Dr. Sarah Johnson</td>
                                        <td>Associate Professor</td>
                                        <td>Mathematics</td>
                                        <td class="action-buttons">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i> Edit</button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- News Section -->
                    <div id="news" class="content-section">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>News & Events Management</h2>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                                <i class="bi bi-plus-circle me-1"></i> Add New News/Event
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="https://via.placeholder.com/50" class="img-thumbnail" alt="News"></td>
                                        <td>Annual Science Conference</td>
                                        <td>2023-10-15</td>
                                        <td class="action-buttons">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i> Edit</button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://via.placeholder.com/50" class="img-thumbnail" alt="News"></td>
                                        <td>New Research Grant Awarded</td>
                                        <td>2023-09-20</td>
                                        <td class="action-buttons">
                                            <button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i> Edit</button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Settings Section -->
                    <div id="settings" class="content-section">
                        <h2 class="mb-4">Site Settings</h2>
                        <div class="card dashboard-card">
                            <div class="card-body">
                                <form>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="siteTitle" class="form-label">Site Title</label>
                                            <input type="text" class="form-control" id="siteTitle" value="Academic Website">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="contactEmail" class="form-label">Contact Email</label>
                                            <input type="email" class="form-control" id="contactEmail" value="contact@academicwebsite.edu">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="siteDescription" class="form-label">Site Description</label>
                                        <textarea class="form-control" id="siteDescription" rows="3">Premium academic institution offering quality education</textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="contactPhone" class="form-label">Contact Phone</label>
                                            <input type="tel" class="form-control" id="contactPhone" value="+1 (555) 123-4567">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="siteLogo" class="form-label">Site Logo</label>
                                            <input class="form-control" type="file" id="siteLogo">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Settings</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
<div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="courseImage" class="form-label">Course Image</label>
                            <input class="form-control" type="file" id="courseImage">
                        </div>
                        <div class="mb-3">
                            <label for="courseName" class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="courseName">
                        </div>
                        <div class="mb-3">
                            <label for="shortDescription" class="form-label">Short Description</label>
                            <textarea class="form-control" id="shortDescription" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="courseDetails" class="form-label">Course Details</label>
                            <textarea class="form-control" id="courseDetails" rows="4"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nextIntake" class="form-label">Next Intake</label>
                                    <input type="date" class="form-control" id="nextIntake">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="timeDuration" class="form-label">Time Duration</label>
                                    <input type="text" class="form-control" id="timeDuration" placeholder="e.g., 6 months, 1 year">
                                </div>
                            </div>
                        </div>

                        <div class="entry-requirements-container mb-3">
                            <h6>Entry Requirements</h6>
                            <div class="entry-requirement-entry mb-2">
                                <input type="text" class="form-control" placeholder="Enter requirement">
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-add-entry-requirement">+ Add Another Requirement</button>
                        </div>

                        <div class="goals-container mb-3">
                            <h6>Our Goals</h6>
                            <div class="goal-entry mb-2">
                                <input type="text" class="form-control" placeholder="Enter goal">
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-add-goal">+ Add Another Goal</button>
                        </div>

                        <div class="course-modules-container mb-3">
                            <h6>Course Modules</h6>
                            <div class="course-module-entry mb-3 p-3 border rounded">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Module Number</label>
                                            <input type="text" class="form-control" placeholder="e.g., 1, 2, 3">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label">Module Name</label>
                                            <input type="text" class="form-control" placeholder="Enter module name">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Module Materials</label>
                                    <input class="form-control" type="file" multiple>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-add-module">+ Add Another Module</button>
                        </div>

                        <div class="mb-3">
                            <label for="teacherMaterials" class="form-label">Teacher Materials</label>
                            <input class="form-control" type="file" id="teacherMaterials" multiple>
                        </div>
                    </form>
                </div>                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Course</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Tutor Modal -->
    <div class="modal fade" id="addTutorModal" tabindex="-1" aria-labelledby="addTutorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTutorModalLabel">Add New Tutor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addTutorForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="tutorImage" class="form-label">Tutor Image</label>
                            <input class="form-control" type="file" id="tutorImage" name="tutorImage" accept="image/*">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tutorName" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="tutorName" name="tutorName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tutorPosition" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="tutorPosition" name="tutorPosition">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tutorDepartment" class="form-label">Department & University</label>
                                    <input type="text" class="form-control" id="tutorDepartment" name="tutorDepartment">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tutorContact" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" id="tutorContact" name="tutorContact">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tutorEmail" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="tutorEmail" name="tutorEmail">
                                </div>
                            </div>
                        </div>
                       
                        <div class="qualifications-container">
                            <h6>Qualifications</h6>
                            <div id="qualificationsList">
                                <div class="qualification-entry mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Qualification Name</label>
                                                <input type="text" class="form-control" name="qualificationName[]">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Institute/Organization</label>
                                                <input type="text" class="form-control" name="qualificationInstitute[]">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Year</label>
                                                <input type="text" class="form-control" name="qualificationYear[]">
                                            </div>
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="button" class="btn btn-outline-danger btn-sm btn-remove-qualification" style="display: none;" title="Remove qualification">&times;</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="btnAddQualification">
                                + Add Another Qualification
                            </button>
                        </div>
                    </form>
                    
                    <!-- Alert for messages -->
                    <div id="formMessage" class="mt-3" style="display: none;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnSubmitTutor">Add Tutor</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add News Modal -->
    <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewsModalLabel">Add News/Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="newsImage" class="form-label">News/Event Image</label>
                            <input class="form-control" type="file" id="newsImage">
                        </div>
                        <div class="mb-3">
                            <label for="newsTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="newsTitle">
                        </div>
                        <div class="mb-3">
                            <label for="newsDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="newsDescription" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="newsDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="newsDate">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add News</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

    <!-- dynamic qualifications script -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const qualificationsList = document.getElementById('qualificationsList');
        const btnAdd = document.getElementById('btnAddQualification');

        function updateRemoveButtons() {
            const entries = qualificationsList.querySelectorAll('.qualification-entry');
            entries.forEach((entry, idx) => {
                const btn = entry.querySelector('.btn-remove-qualification');
                if (btn) {
                    btn.style.display = entries.length > 1 ? 'inline-block' : 'none';
                }
            });
        }

        function createQualificationEntry() {
            const template = qualificationsList.querySelector('.qualification-entry');
            if (!template) return;
            const clone = template.cloneNode(true);
            // clear input values
            clone.querySelectorAll('input').forEach(input => input.value = '');
            qualificationsList.appendChild(clone);
            updateRemoveButtons();
        }

        // Add new entry
        btnAdd.addEventListener('click', function () {
            createQualificationEntry();
        });

        // Remove via event delegation
        qualificationsList.addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-remove-qualification')) {
                const entry = e.target.closest('.qualification-entry');
                if (!entry) return;
                entry.remove();
                updateRemoveButtons();
            }
        });

        // Initialize buttons visibility
        updateRemoveButtons();
    });
    </script>
</body>
</html>