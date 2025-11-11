<?php
// Include the database connection file
include 'db_connect.php';

// Check if $conn is valid before querying
if (!isset($conn) || $conn->connect_error) {
    die("Database connection failed.");
}

// 1. Get the Course ID from the URL (e.g., course_details.php?id=1)
// We assume this page is now generic and can handle any course ID
$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 1; // Default to ID 1 if none is set

// 2. Fetch the specific course data
$sql = "SELECT * FROM courses WHERE id = $course_id LIMIT 1";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    die("Course not found.");
}

$course = $result->fetch_assoc();

// Set up dynamic variables
$course_name = htmlspecialchars($course['course_name']);
$course_description = htmlspecialchars($course['full_description']);
$image_url = !empty($course['image']) ? htmlspecialchars($course['image']) : 'https://via.placeholder.com/1200x400?text=Course+Hero+Image';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $course_name ?> - TechPro Institute</title>
    <link rel="stylesheet" href="coursestyle.css" />
</head>

<body>
    <?php include '../header_footer/header.php' ?>


    <section class="hero" style="background:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('<?= $image_url ?>');
            background-size: cover;
            background-position: center;">
        <div class="floating-shapes">
            <div class="shape shape-circle"></div>
            <div class="shape shape-square pulse-animation"></div>
            <div class="shape shape-triangle"></div>
            <div class="shape shape-circle pulse-animation"></div>
        </div>
        <div class="hero-content">
            <div class="hero-text">
                <h1><?= $course_name ?></h1>
            </div>
            <div class="hero-left">
                <p><?= nl2br($course_description) ?></p>

                <div class="course-info">
                    <h3>Next Intake: 25th August 2025</h3>
                </div>

                <div class="course-info">
                    <h3>Duration: 01 Year</h3>
                </div>

                <div class="entry-requirements">
                    <h3>Entry Requirements:</h3>
                    <ul>
                        <li> 3 A/L passes in Mathematics or ICT with English proficiency (O/L pass or equivalent)</li>
                        <li>Diploma in Computer and Information Technology (CIT) or equivalent</li>
                        <li>Certificate from recognized institutes (Pearson VUE, Prometric)</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="course-outline">
        <div class="container">
            <h2 class="section-title">Course Outline</h2>

            <div class="goals-section">
                <h3 class="subsection-title">Our Goals</h3>
                <ul class="goals-list">
                    <li>Understand core AI concepts: search, logic, planning, reasoning.</li>
                    <li>Represent and manipulate knowledge computationally.</li>
                    <li>Explore logic, rule-based systems, and simple autonomous agents.</li>
                    <li>Appreciate ethical, societal, and philosophical dimensions of AI.</li>
                </ul>
            </div>

            <div class="modules-section">
                <h3 class="subsection-title">Course Modules</h3>

                <div class="module">
                    <h3>Module 01:</h3>
                    <p>Introduction to AI & History – definitions, Turing test, AI agents</p>
                </div>
                </div>
            
            </div>
    </section>

    <?php include '../header_footer/footer.php' ?>

    <script src="ai_material_download.js"></script>

</body>

</html>