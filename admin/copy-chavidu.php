<?php
// IMPORTANT: Adjust the path to db_connect.php based on your file structure.
require_once __DIR__ . '/db_connect.php'; 

// --- 1. FETCH ALL TUTORS ---
$sql = "SELECT tutor_id, name, image, position FROM tutor ORDER BY name ASC";
$result = $connect->query($sql);
$tutors = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tutors[] = $row;
    }
}

$connect->close(); // Close the database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topgrade Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/TopGrade/Tutor Main page/style.css">
</head>
<body>
    <!-- Header -->
    <?php include '../../header_footer/header.php'; ?>

    <!-- Main Content -->
<main class="container">
        <div class="profile-container">
            <img src="<?php echo htmlspecialchars($tutor['image'] ?? 'default.jpg'); ?>" alt="<?php echo htmlspecialchars($tutor['name'] ?? 'Tutor'); ?>" alt="" class="profile-image">
            <div class="profile-info">
                <h1 class="profile-name"><?php echo htmlspecialchars($tutor['name'] ?? 'Name Not Found'); ?></h1>
                <h2 class="profile-title"><?php echo htmlspecialchars($tutor['position'] ?? 'Position Not Set'); ?></h2>
                <p class="profile-department"><?php echo nl2br(htmlspecialchars($tutor['department'] ?? 'Department details not set.')); ?>
                    
                </p>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-mobile-alt"></i>
                        <span><?php echo htmlspecialchars($tutor['mobile'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span><?php echo htmlspecialchars($tutor['email'] ?? 'N/A'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="education-section">
            <h2 class="section-title"></h2>
            <?php if (!empty($qualifications)): ?>
                <?php foreach ($qualifications as $qual): ?>
            
            <div class="education-item">
                <h3 class="education-degree"><?php echo htmlspecialchars($qual['q_name']); ?></h3>
                <p class="education-institution"><?php echo htmlspecialchars($qual['q_place']); ?></p>
                <p class="education-year"><?php echo htmlspecialchars($qual['q_year']); ?></p>
            </div>
                <?php endforeach; ?>
            <?php else: ?>
            <p>No qualifications listed for this tutor.</p>
            <?php endif; ?>
            
    </main>

    <!-- Footer -->
    <?php include '../../header_footer/footer.php' ?>

   
</body>
</html>