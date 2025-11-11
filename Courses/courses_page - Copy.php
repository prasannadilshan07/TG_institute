<?php
// Include the database connection file
include 'db_connect.php';

// Check if $conn is valid before querying (to prevent the 'Call to a member function query() on null' error)
if (!isset($conn) || $conn->connect_error) {
    die("Database connection failed.");
}

// Fetch all courses from the database, ordered by ID descending
$result = $conn->query("SELECT * FROM courses ORDER BY id DESC");
if (!$result) {
    die("Error fetching courses: " . $conn->error);
}

// Set a default image path for courses without an uploaded image
$default_image = 'https://via.placeholder.com/400x200?text=Course+Image';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - TechPro Institute</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="coursePage.css" /> 
</head>

<body>
    <?php include '../header_footer/header.php' ?>
    

    <section class="hero">
        <div class="hero-content">
            <h1>Start Learning from the Best Institute</h1>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="content-grid">
                <div class="our-courses">
                    <h2>Our Courses</h2>
                    <p>Explore our comprehensive selection of courses tailored to meet industry standards and academic
                        excellence. Each program is designed to provide practical knowledge, expert insights, and
                        career-ready skills for a successful future.
                    </p>
                </div>

                <div class="institute-info">
                    <p>TopGrade Institute, in collaboration with leading international partners, offers world-class
                        undergraduate degrees in their areas and Information Technology. Our Foundation Programme in
                        Higher Education provides two specialized pathways – Business and IT – designed to prepare
                        students for diverse entry routes into degree programmes. In addition, TopGrade Institute
                        empowers graduates to advance their expertise through a range of cutting-edge postgraduate
                        programmes, ensuring they stay ahead in today's competitive global landscape.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="courses-section">
        <div class="container">
            <div class="courses-grid">
        
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): 
                // Determine the correct image path
                $image_url = !empty($row['image']) ? htmlspecialchars($row['image']) : $default_image;
            ?>
                <div class="course-card">
                    <div class="course-image" style="background-image: url('<?= $image_url ?>');"></div>
                    <div class="course-content">
                        <h3 class="course-title"><?= htmlspecialchars($row['course_name']) ?></h3>
                        <p class="course-description">
                            <?= htmlspecialchars(substr($row['short_description'], 0, 100)) ?>
                            <?= strlen($row['short_description']) > 100 ? '...' : '' ?>
                        </p>
                        <button class="more-btn" data-bs-toggle="modal" data-bs-target="#detailsModal<?= $row['id'] ?>">
                            More
                        </button>
                    </div>
                </div>

                <div class="modal fade" id="detailsModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $row['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel<?= $row['id'] ?>"><?= htmlspecialchars($row['course_name']) ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php if ($row['image']): ?>
                                <img src="<?= htmlspecialchars($row['image']) ?>" class="img-fluid mb-3 rounded" alt="<?= htmlspecialchars($row['course_name']) ?>">
                                <?php endif; ?>
                                <h6>Description:</h6>
                                <p><?= nl2br(htmlspecialchars($row['full_description'])) ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">No courses available at the moment. Please add courses via the admin dashboard.</p>
            </div>
        <?php endif; ?>

            </div>
        </div>
    </section>

    <?php include '../header_footer/footer.php' ?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>