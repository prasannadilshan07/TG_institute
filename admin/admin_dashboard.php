<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "academic_portal";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { 
    die("Database Connection Failed: " . $conn->connect_error); 
}

$conn->set_charset("utf8mb4");

if (!file_exists('uploads')) { 
    mkdir('uploads', 0777, true); 
}

$message = '';

// ========== COURSE OPERATIONS ==========
if (isset($_POST['add_course'])) {
    $name = $conn->real_escape_string($_POST['course_name']);
    $short = $conn->real_escape_string($_POST['short_description']);
    $full = $conn->real_escape_string($_POST['course_details']);
    $imagePath = '';
    
    if (!empty($_FILES['course_image']['name'])) {
        $imageName = time().'_'.basename($_FILES['course_image']['name']);
        $target = 'uploads/'.$imageName;
        if (move_uploaded_file($_FILES['course_image']['tmp_name'], $target)) {
            $imagePath = $target;
        }
    }
    
    $sql = "INSERT INTO courses (course_name, short_description, full_description, image)
            VALUES ('$name', '$short', '$full', '$imagePath')";
    
    if ($conn->query($sql)) {
        $message = 'Course added successfully!';
    } else {
        $message = 'Error adding course: ' . $conn->error;
    }
}

if (isset($_POST['update_course'])) {
    $id = (int)$_POST['course_id'];
    $name = $conn->real_escape_string($_POST['course_name']);
    $short = $conn->real_escape_string($_POST['short_description']);
    $full = $conn->real_escape_string($_POST['course_details']);
    $imageSQL = '';
    
    if (!empty($_FILES['course_image']['name'])) {
        $imageName = time().'_'.basename($_FILES['course_image']['name']);
        $target = 'uploads/'.$imageName;
        if (move_uploaded_file($_FILES['course_image']['tmp_name'], $target)) {
            $imageSQL = ", image='$target'";
        }
    }
    
    $sql = "UPDATE courses SET course_name='$name', short_description='$short', 
            full_description='$full' $imageSQL WHERE id=$id";
    
    if ($conn->query($sql)) {
        $message = 'Course updated successfully!';
    } else {
        $message = 'Error updating course: ' . $conn->error;
    }
}

if (isset($_GET['delete_course'])) {
    $id = (int)$_GET['delete_course'];
    if ($conn->query("DELETE FROM courses WHERE id=$id")) {
        $message = 'Course deleted successfully!';
    } else {
        $message = 'Error deleting course: ' . $conn->error;
    }
}

// ========== TUTOR OPERATIONS ==========
if (isset($_POST['add_tutor'])) {
    $tname = $conn->real_escape_string($_POST['tutor_name']);
    $position = $conn->real_escape_string($_POST['position']);
    $department = $conn->real_escape_string($_POST['department']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $email = $conn->real_escape_string($_POST['email']);
    $imagePath = '';
    
    if (!empty($_FILES['tutor_image']['name'])) {
        $imageName = time().'_'.basename($_FILES['tutor_image']['name']);
        $target = 'uploads/'.$imageName;
        if (move_uploaded_file($_FILES['tutor_image']['tmp_name'], $target)) {
            $imagePath = $target;
        }
    }
    
    $sql = "INSERT INTO tutor (tutor_name, position, department, mobile, email, image)
            VALUES ('$tname', '$position', '$department', '$mobile', '$email', '$imagePath')";
    
    if ($conn->query($sql)) {
        $message = 'Tutor added successfully!';
    } else {
        $message = 'Error adding tutor: ' . $conn->error;
    }
}

if (isset($_POST['update_tutor'])) {
    $id = (int)$_POST['tutor_id'];
    $tname = $conn->real_escape_string($_POST['tutor_name']);
    $position = $conn->real_escape_string($_POST['position']);
    $department = $conn->real_escape_string($_POST['department']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $email = $conn->real_escape_string($_POST['email']);
    $imageSQL = '';
    
    if (!empty($_FILES['tutor_image']['name'])) {
        $imageName = time().'_'.basename($_FILES['tutor_image']['name']);
        $target = 'uploads/'.$imageName;
        if (move_uploaded_file($_FILES['tutor_image']['tmp_name'], $target)) {
            $imageSQL = ", image='$target'";
        }
    }
    
    $sql = "UPDATE tutor SET tutor_name='$tname', position='$position', 
            department='$department', mobile='$mobile', email='$email' $imageSQL 
            WHERE tutor_id=$id";
    
    if ($conn->query($sql)) {
        $message = 'Tutor updated successfully!';
    } else {
        $message = 'Error updating tutor: ' . $conn->error;
    }
}

if (isset($_GET['delete_tutor'])) {
    $id = (int)$_GET['delete_tutor'];
    if ($conn->query("DELETE FROM tutor WHERE tutor_id=$id")) {
        $message = 'Tutor deleted successfully!';
    } else {
        $message = 'Error deleting tutor: ' . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Academic Admin Dashboard</title>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css'>
<style>
body { background-color: #f8f9fc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
.sidebar { min-height: 100vh; background: linear-gradient(180deg, #4e73df 0%, #2a3e9d 100%); color: white; }
.sidebar .nav-link { color: rgba(255,255,255,0.8); padding: 12px 20px; margin: 5px 0; border-radius: 5px; }
.sidebar .nav-link:hover, .sidebar .nav-link.active { color: white; background: rgba(255,255,255,0.1); }
.topbar { background: white; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: .75rem 1.5rem; margin-bottom: 2rem; }
.content-section { display: none; padding: 20px; }
.content-section.active { display: block; animation: fadeIn .5s; }
@keyframes fadeIn { from{opacity:0;} to{opacity:1;} }
.course-card { transition: transform 0.3s; }
.course-card:hover { transform: translateY(-5px); }
</style>
</head>
<body>
<div class='container-fluid'>
<div class='row'>
<!-- Sidebar -->
<div class='col-md-3 col-lg-2 sidebar p-3'>
<h4 class='text-white mb-4'><i class='bi bi-book-half'></i> Admin Panel</h4>
<ul class='nav nav-pills flex-column mb-auto'>
<li><a href='#dashboard' class='nav-link active'><i class='bi bi-speedometer2'></i> Dashboard</a></li>
<li><a href='#courses' class='nav-link'><i class='bi bi-book'></i> Courses</a></li>
<li><a href='#tutors' class='nav-link'><i class='bi bi-person-badge'></i> Tutors</a></li>
<li><a href='#news' class='nav-link'><i class='bi bi-newspaper'></i> News and Events</a></li>
<li><a href='#settings' class='nav-link'><i class='bi bi-gear'></i> Settings</a></li>
</ul>
</div>

<!-- Main Content -->
<div class='col-md-9 col-lg-10 ms-sm-auto px-4 py-4'>
<div class='topbar mb-4'>
<h4>Admin Dashboard</h4>
</div>

<?php if ($message): ?>
<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <?= htmlspecialchars($message) ?>
    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
</div>
<?php endif; ?>

<!-- Dashboard Section -->
<div id='dashboard' class='content-section active'>
<h2>Welcome Admin</h2>
<p>Use the sidebar to manage courses, tutors, and settings.</p>
<div class='row mt-4'>
<div class='col-md-4'>
<div class='card text-white bg-primary mb-3'>
<div class='card-body'>
<h5 class='card-title'><i class='bi bi-book'></i> Total Courses</h5>
<h2><?= $conn->query('SELECT COUNT(*) as cnt FROM courses')->fetch_assoc()['cnt'] ?></h2>
</div>
</div>
</div>
<div class='col-md-4'>
<div class='card text-white bg-success mb-3'>
<div class='card-body'>
<h5 class='card-title'><i class='bi bi-person-badge'></i> Total Tutors</h5>
<h2><?= $conn->query('SELECT COUNT(*) as cnt FROM tutor')->fetch_assoc()['cnt'] ?></h2>
</div>
</div>
</div>
</div>
</div>

<!-- Courses Section -->
<div id='courses' class='content-section'>
<div class='d-flex justify-content-between align-items-center mb-4'>
<h2>Course Management</h2>
<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#addCourseModal'>
<i class='bi bi-plus-circle'></i> Add New Course
</button>
</div>

<div class='table-responsive'>
<table class='table table-hover'>
<thead class='table-light'>
<tr>
<th>Image</th>
<th>Course Name</th>
<th>Short Description</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php 
$result = $conn->query('SELECT * FROM courses ORDER BY id DESC');
while($row = $result->fetch_assoc()): 
?>
<tr>
<td>
<img src='<?= htmlspecialchars($row['image'] ?: "https://via.placeholder.com/50") ?>' 
     width='50' height='50' class='img-thumbnail' alt='Course Image'>
</td>
<td><?= htmlspecialchars($row['course_name']) ?></td>
<td><?= htmlspecialchars($row['short_description']) ?></td>
<td>
<button class='btn btn-sm btn-info' data-bs-toggle='modal' 
        data-bs-target='#editCourseModal<?= $row['id'] ?>'>
<i class='bi bi-pencil'></i> Edit
</button>
<a href='?delete_course=<?= $row['id'] ?>' 
   onclick='return confirm("Are you sure you want to delete this course?");' 
   class='btn btn-sm btn-danger'>
<i class='bi bi-trash'></i> Delete
</a>
</td>
</tr>

<!-- Edit Course Modal -->
<div class='modal fade' id='editCourseModal<?= $row['id'] ?>' tabindex='-1'>
<div class='modal-dialog modal-lg'>
<div class='modal-content'>
<form method='POST' enctype='multipart/form-data'>
<div class='modal-header'>
<h5 class='modal-title'>Edit Course</h5>
<button type='button' class='btn-close' data-bs-dismiss='modal'></button>
</div>
<div class='modal-body'>
<input type='hidden' name='course_id' value='<?= $row['id'] ?>'>
<div class='mb-3'>
<label class='form-label'>Course Image</label>
<input class='form-control' type='file' name='course_image' accept='image/*'>
<?php if($row['image']): ?>
<small class='text-muted'>Current: <?= basename($row['image']) ?></small>
<?php endif; ?>
</div>
<div class='mb-3'>
<label class='form-label'>Course Name</label>
<input type='text' class='form-control' name='course_name' 
       value='<?= htmlspecialchars($row['course_name']) ?>' required>
</div>
<div class='mb-3'>
<label class='form-label'>Short Description</label>
<textarea class='form-control' name='short_description' rows='2'><?= htmlspecialchars($row['short_description']) ?></textarea>
</div>
<div class='mb-3'>
<label class='form-label'>Course Details</label>
<textarea class='form-control' name='course_details' rows='4'><?= htmlspecialchars($row['full_description']) ?></textarea>
</div>
</div>
<div class='modal-footer'>
<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
<button type='submit' name='update_course' class='btn btn-primary'>Save Changes</button>
</div>
</form>
</div>
</div>
</div>
<?php endwhile; ?>
</tbody>
</table>
</div>
</div>

<!-- Add Course Modal -->
<div class='modal fade' id='addCourseModal' tabindex='-1'>
<div class='modal-dialog modal-lg'>
<div class='modal-content'>
<form method='POST' enctype='multipart/form-data'>
<div class='modal-header'>
<h5 class='modal-title'>Add New Course</h5>
<button type='button' class='btn-close' data-bs-dismiss='modal'></button>
</div>
<div class='modal-body'>
<div class='mb-3'>
<label class='form-label'>Course Image</label>
<input class='form-control' type='file' name='course_image' accept='image/*'>
</div>
<div class='mb-3'>
<label class='form-label'>Course Name</label>
<input type='text' class='form-control' name='course_name' required>
</div>
<div class='mb-3'>
<label class='form-label'>Short Description</label>
<textarea class='form-control' name='short_description' rows='2'></textarea>
</div>
<div class='mb-3'>
<label class='form-label'>Course Details</label>
<textarea class='form-control' name='course_details' rows='4'></textarea>
</div>
</div>
<div class='modal-footer'>
<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
<button type='submit' name='add_course' class='btn btn-primary'>Add Course</button>
</div>
</form>
</div>
</div>
</div>

<!-- Tutors Section -->
<div id='tutors' class='content-section'>
<div class='d-flex justify-content-between align-items-center mb-4'>
<h2>Tutor Management</h2>
<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#addTutorModal'>
<i class='bi bi-plus-circle'></i> Add New Tutor
</button>
</div>

<div class='table-responsive'>
<table class='table table-hover'>
<thead class='table-light'>
<tr>
<th>Image</th>
<th>Name</th>
<th>Position</th>
<th>Department</th>
<th>Mobile</th>
<th>Email</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php 
$result = $conn->query('SELECT * FROM tutor ORDER BY tutor_id DESC');
while($row = $result->fetch_assoc()): 
?>
<tr>
<td>
<img src='<?= htmlspecialchars($row['image'] ?: "https://via.placeholder.com/50") ?>' 
     width='50' height='50' class='img-thumbnail' alt='Tutor Image'>
</td>
<td><?= htmlspecialchars($row['tutor_name']) ?></td>
<td><?= htmlspecialchars($row['position']) ?></td>
<td><?= htmlspecialchars($row['department']) ?></td>
<td><?= htmlspecialchars($row['mobile']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>
<td>
<button class='btn btn-sm btn-info' data-bs-toggle='modal' 
        data-bs-target='#editTutorModal<?= $row['tutor_id'] ?>'>
<i class='bi bi-pencil'></i> Edit
</button>
<a href='?delete_tutor=<?= $row['tutor_id'] ?>' 
   onclick='return confirm("Are you sure you want to delete this tutor?");' 
   class='btn btn-sm btn-danger'>
<i class='bi bi-trash'></i> Delete
</a>
</td>
</tr>

<!-- Edit Tutor Modal -->
<div class='modal fade' id='editTutorModal<?= $row['tutor_id'] ?>' tabindex='-1'>
<div class='modal-dialog modal-lg'>
<div class='modal-content'>
<form method='POST' enctype='multipart/form-data'>
<div class='modal-header'>
<h5 class='modal-title'>Edit Tutor</h5>
<button type='button' class='btn-close' data-bs-dismiss='modal'></button>
</div>
<div class='modal-body'>
<input type='hidden' name='tutor_id' value='<?= $row['tutor_id'] ?>'>
<div class='mb-3'>
<label class='form-label'>Tutor Image</label>
<input class='form-control' type='file' name='tutor_image' accept='image/*'>
<?php if($row['image']): ?>
<small class='text-muted'>Current: <?= basename($row['image']) ?></small>
<?php endif; ?>
</div>
<div class='mb-3'>
<label class='form-label'>Tutor Name</label>
<input type='text' class='form-control' name='tutor_name' 
       value='<?= htmlspecialchars($row['tutor_name']) ?>' required>
</div>
<div class='mb-3'>
<label class='form-label'>Position</label>
<input type='text' class='form-control' name='position' 
       value='<?= htmlspecialchars($row['position']) ?>'>
</div>
<div class='mb-3'>
<label class='form-label'>Department</label>
<input type='text' class='form-control' name='department' 
       value='<?= htmlspecialchars($row['department']) ?>'>
</div>
<div class='mb-3'>
<label class='form-label'>Mobile</label>
<input type='text' class='form-control' name='mobile' 
       value='<?= htmlspecialchars($row['mobile']) ?>'>
</div>
<div class='mb-3'>
<label class='form-label'>Email</label>
<input type='email' class='form-control' name='email' 
       value='<?= htmlspecialchars($row['email']) ?>'>
</div>
</div>
<div class='modal-footer'>
<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
<button type='submit' name='update_tutor' class='btn btn-primary'>Save Changes</button>
</div>
</form>
</div>
</div>
</div>
<?php endwhile; ?>
</tbody>
</table>
</div>
</div>

<!-- Add Tutor Modal -->
<div class='modal fade' id='addTutorModal' tabindex='-1'>
<div class='modal-dialog modal-lg'>
<div class='modal-content'>
<form method='POST' enctype='multipart/form-data'>
<div class='modal-header'>
<h5 class='modal-title'>Add New Tutor</h5>
<button type='button' class='btn-close' data-bs-dismiss='modal'></button>
</div>
<div class='modal-body'>
<div class='mb-3'>
<label class='form-label'>Tutor Image</label>
<input class='form-control' type='file' name='tutor_image' accept='image/*'>
</div>
<div class='mb-3'>
<label class='form-label'>Tutor Name</label>
<input type='text' class='form-control' name='tutor_name' required>
</div>
<div class='mb-3'>
<label class='form-label'>Position</label>
<input type='text' class='form-control' name='position'>
</div>
<div class='mb-3'>
<label class='form-label'>Department</label>
<input type='text' class='form-control' name='department'>
</div>
<div class='mb-3'>
<label class='form-label'>Mobile</label>
<input type='text' class='form-control' name='mobile'>
</div>
<div class='mb-3'>
<label class='form-label'>Email</label>
<input type='email' class='form-control' name='email'>
</div>
</div>
<div class='modal-footer'>
<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
<button type='submit' name='add_tutor' class='btn btn-primary'>Add Tutor</button>
</div>
</form>
</div>
</div>
</div>

<!-- News Section -->
<div id='news' class='content-section'>
<h2>News and Events</h2>
<p>Coming soon...</p>
</div>

<!-- Settings Section -->
<div id='settings' class='content-section'>
<h2>Site Settings</h2>
<p>Coming soon...</p>
</div>

</div>
</div>
</div>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
<script>
// Navigation handling
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Remove active class from all links
        document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
        
        // Add active class to clicked link
        this.classList.add('active');
        
        // Hide all content sections
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.remove('active');
        });
        
        // Show target section
        const targetId = this.getAttribute('href').substring(1);
        document.getElementById(targetId).classList.add('active');
    });
});

// Auto-dismiss alerts after 5 seconds
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    });
}, 5000);
</script>
</body>
</html>