<?php
// Adjust the path to db_connect.php based on your file structure.
require_once __DIR__ . '/../db_connect.php'; 

// --- 1. FETCH ALL COURSES ---
// Select only necessary fields for the course card
$course_id = !empty($GET_['id'])? (int)$GET_['id']:0;

//Initialize variables
$course=[];
$requirements=[];
$modules=[];
$marterials=[];


//---2. FETCH COURSE DETAILS---
if($course_id>0){
    $sql_course = "SELECT name, shoert_description, course_details, next_intake, duration, image FROM course WHERE course_id=?";
    $stmt_course = $connect->prepare($sql_course);
    $stmt_course->bind_param('i', $course_id);
    $stmt_course->execute();
    $course = $stmt_course->get_result()->fetch_assoc() ?: [];
    $stmt_course->close();
}


// --- 3. FETCH RELATED DATA (Requirements, Goals, Modules, Materials) ---
if (!empty($course)) {
    // 3a. Requirements
    $sql_reqs = "SELECT requirement_text FROM course_requirement WHERE course_id = ?";
    $stmt_reqs = $connect->prepare($sql_reqs);
    $stmt_reqs->bind_param('i', $course_id);
    $stmt_reqs->execute();
    while ($row = $stmt_reqs->get_result()->fetch_assoc()) { $requirements[] = $row; }
    $stmt_reqs->close();

    // 3b. Goals
    $sql_goals = "SELECT goal_text FROM course_goal WHERE course_id = ?";
    $stmt_goals = $connect->prepare($sql_goals);
    $stmt_goals->bind_param('i', $course_id);
    $stmt_goals->execute();
    while ($row = $stmt_goals->get_result()->fetch_assoc()) { $goals[] = $row; }
    $stmt_goals->close();

    // 3c. Modules (Assuming a module_number and module_name field in course_module table)
    $sql_modules = "SELECT module_number, module_name FROM course_module WHERE course_id = ? ORDER BY module_number ASC";
    $stmt_modules = $connect->prepare($sql_modules);
    $stmt_modules->bind_param('i', $course_id);
    $stmt_modules->execute();
    while ($row = $stmt_modules->get_result()->fetch_assoc()) { $modules[] = $row; }
    $stmt_modules->close();

    // 3d. Materials (Assuming original_name and file_path fields in course_materials table)
    $sql_mats = "SELECT original_name, file_path FROM course_materials WHERE course_id = ?";
    $stmt_mats = $connect->prepare($sql_mats);
    $stmt_mats->bind_param('i', $course_id);
    $stmt_mats->execute();
    while ($row = $stmt_mats->get_result()->fetch_assoc()) { $materials[] = $row; }
    $stmt_mats->close();
}

$connect->close(); // Close the database connection
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['name'] ?? 'Course Not Found'); ?> - TechPro Institute</title>
    <link rel="stylesheet" href="coursestyle.css" />
</head>

<body>
    <!-- Header -->
    <?php include '../header_footer/header.php' ?>


    <section class="hero" style="background:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('/TopGrade/Courses/AI.png');
            background-size: cover;
            background-position: center;">
        <div class="floating-shapes">
            <div class="shape shape-circle"></div>
            <div class="shape shape-square pulse-animation"></div>
            <div class="shape shape-triangle"></div>
            <div class="shape shape-circle pulse-animation"></div>
        </div>
       h3>Next Intake: </h3>
                </div>

                <div class="course-info">
                    <h3>Duration: </h3>
                </div>
 <div class="hero-content">
           <div class="hero-text">
                                <h1><?php echo htmlspecialchars($course['name'] ?? 'Course Not Found'); ?></h1>
            </div>
            <div class="hero-left">
                                <p><?php echo htmlspecialchars($course['short_description'] ?? 'No description available.'); ?></p>

                <div class="course-info">
                                        <h3>Next Intake: <?php echo htmlspecialchars($course['intake'] ?? 'TBA'); ?></h3>
                </div>

                <div class="course-info">
                                        <h3>Duration: <?php echo htmlspecialchars($course['duration'] ?? 'N/A'); ?></h3>
                </div>

                <div class="entry-requirements">
                    <h3>Entry Requirements:</h3>
                    <ul class="requirements-list">
                                                <?php if (!empty($requirements)): ?>
                            <?php foreach ($requirements as $req): ?>
                                <li><?php echo htmlspecialchars($req['requirement_text']); ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>No specific entry requirements listed.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="course-outline">
        <div class="container">
            <h2 class="section-title">Course Outline</h2>

             <?php if (!empty($course['course_details'])): ?>
            <p><?php echo nl2br(htmlspecialchars($course['course_details'])); ?></p>
            <?php endif; ?>

            <div class="goals-section">
                <h3 class="subsection-title">Our Goals</h3>
                <ul class="goals-list">
                     <?php if (!empty($goals)): ?>
                        <?php foreach ($goals as $goal): ?>
                            <li><?php echo htmlspecialchars($goal['goal_text']); ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>Course goals not yet defined.</li>
                    <?php endif; ?>
                </ul>
            </div>
                   
             <div class="modules-section">
                <h3 class="subsection-title">Course Modules</h3>

                                <?php if (!empty($modules)): ?>
                    <?php foreach ($modules as $module): ?>
                <div class="module">
                    <h3>Module <?php echo htmlspecialchars($module['module_number']); ?>:</h3>
                    <p><?php echo htmlspecialchars($module['module_name']); ?></p>
                </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Course modules are currently being finalized.</p>
                <?php endif; ?>

            </div>
            

                
          <div class="materials-section">
                <h3 class="subsection-title">Course Materials</h3>
                <div class="materials-grid">
                                        <?php if (!empty($materials)): ?>
                        <?php foreach ($materials as $material): ?>
                    <div class="material-item">
                        <div class="file-icon">
                                                        <a href="/<?php echo htmlspecialchars($material['file_path']); ?>" target="_blank" download>
                                <button class="si1btn" aria-label="Download material">📄</button>
                            </a>
                        </div>
                                                <p><?php echo htmlspecialchars($material['original_name']); ?></p>
                    </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No course materials are currently available for download.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../header_footer/footer.php' ?>


    <script src="ai_material_download.js"></script>

</body>

</html>