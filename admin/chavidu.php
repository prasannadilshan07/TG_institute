<?php
include 'db_connect.php';
// Define the root path once
define('ROOT_PATH', dirname(__DIR__));

// Fixed: table name should be 'tutor' (singular) and use tutor_id
$result = $conn->query("SELECT * FROM tutor ORDER BY tutor_id DESC");
if (!$result) {
    die("Error fetching tutors: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topgrade Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/TopGrade/Tutor Main page/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
<?php include ROOT_PATH . '/header_footer/header.php'; 
?>
 <?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
    <!-- Main Content -->
<main class="container">
        <div class="profile-container">
            <?php
// Define the image URL, using the dynamic path or a placeholder if empty
$tutor_image_url = !empty($row['image']) 
    ? htmlspecialchars($row['image']) 
    : 'https://via.placeholder.com/280x250?text=Tutor+Photo';
?>

<img src="<?= $tutor_image_url ?>" alt="<?= htmlspecialchars($row['tutor_name']) ?> Photo" class="profile-image">
            <div class="profile-info">
                <h1 class="profile-name"><?= htmlspecialchars($row['tutor_name']) ?></h1>
                <h2 class="profile-title"><?= htmlspecialchars($row['position']) ?></h2>
                <p class="profile-department">
                   <?= htmlspecialchars($row['department']) ?>
                </p>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-mobile-alt"></i>
                        <?php if ($row['mobile']): ?>
                        <span><?= htmlspecialchars($row['mobile']) ?>"><?= htmlspecialchars($row['mobile']) ?></span>
                         <?php endif; ?>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <?php if ($row['email']): ?>
                        <span><a href="mailto:<?= htmlspecialchars($row['email']) ?>"><?= htmlspecialchars($row['email']) ?></a></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="education-section">
            <h2 class="section-title">Qualifications</h2>
            
            <div class="education-item">
                <h3 class="education-degree">PhD in Statistics</h3>
                <p class="education-institution">Massachusetts Institute of Technology (MIT), United States</p>
                <p class="education-year">2024</p>
            </div>
            
            <div class="education-item">
                <h3 class="education-degree">M.S. in Applied Mathematics</h3>
                <p class="education-institution">Harvard University, United States</p>
                <p class="education-year">2020</p>
            </div>
            
            <div class="education-item">
                <h3 class="education-degree">AWS Certified Data Analytics</h3>
                <p class="education-institution">Amazon Web Services (U.S. Corporation)</p>
                <p class="education-year">2016</p>
            </div>
        </div>
    </main>
     <?php endwhile; ?>
        <?php else: ?>
     <?php endif; ?>
    <!-- Footer -->
<?php include ROOT_PATH . '/header_footer/footer.php'; 
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</body>
</html>