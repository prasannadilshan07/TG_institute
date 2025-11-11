<?php
include 'db_connect.php';

// Fixed: table name should be 'tutor' (singular) and use tutor_id
$result = $conn->query("SELECT * FROM tutor ORDER BY tutor_id DESC");
if (!$result) {
    die("Error fetching tutors: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TopGrade Institute</title>
  <link rel="stylesheet" href="index.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- Header -->
  <?php include '../header_footer/header.php' ?>

    <!-- Hero Section -->
    <section class="hero" id="home">
      <div class="overlay">
        <h1>TopGrade Institute</h1>
        <p>Climb Higher with TopGrade</p>
        <span>Excellence in Education, Innovation, and Success.</span>
      </div>
    </section>

    <!-- Strength Section -->
    <section class="strength">
      <h2>Our Strength</h2>
      <div class="strength-boxes">
        <div class="box">
          <h3><span>10 Years</span></h3>
          <p>of Excellence</p>
        </div>
        <div class="box">
          <h3><span>5000+</span></h3>
          <p>Students</p>
        </div>
        <div class="box">
          <h3><span>50+</span></h3>
          <p>Expert Tutors</p>
        </div>
      </div>
    </section>


    <!-- Welcome Section -->
    <section class="welcome">
      <div class="text">
        <h2>Welcome to <span>Topgrade Institute</span></h2>
      </div>
      <div class="about">
        <h3>About Topgrade Institute</h3><br>
        <p>
          The main objective of our institute is to provide high-quality education in the field of Information Technology and to prepare students for successful careers in the digital world.
          We aim to create a learning environment that encourages innovation, creativity, and practical knowledge.
          Through our wide range of IT-related courses, such as Artificial Intelligence, Machine Learning, Data Science, Software Engineering, Web Development, and Mobile Development, we empower students to achieve their goals and meet global industry standards.
        </p><br>
        <p>
          Our institute focuses on continuous improvement and staying updated with the latest technological trends. We offer modern facilities, including well-equipped lecture rooms, library and research facilities, to ensure a complete learning experience. With the guidance of our expert tutor panel and support from our staff, we are dedicated to building a community of skilled professionals who can shape the future of technology with confidence and excellence.
        </p>
      </div>
    </section>


    <!-- Trending Courses Section -->
    <section class="courses" id="courses">
      <h2 class="section-title">Trending Courses</h2>
      <div class="card-container">
        <div class="card">
          <img src="ai.webp" alt="Artificial Intelligence">
          <div class="card-content">
            <h3>Artificial Intelligence</h3>
            <p>Explore the world of AI, from neural networks to natural language processing and robotics.</p>
            <a href="../courses/AI_course_page.php" class="btn">Learn More</a>
          </div>
        </div>
        <div class="card">
          <img src="machine.avif" alt="Machine Learning">
          <div class="card-content">
            <h3>Machine Learning</h3>
            <p>Dive into algorithms and data-driven models that power modern applications, enabling computers to learn
              from data.</p>
            <a href="../courses/ML_course_page.php" class="btn">Learn More</a>
          </div>
        </div>
        <div class="card">
          <img src="se.webp" alt="Software Engineering">
          <div class="card-content">
            <h3>Software Engineering</h3>
            <p>Master the art of designing, developing, and maintaining robust software solutions for real-world
              problems.</p>
            <a href="../courses/SE_course_page.php" class="btn">Learn More</a>
          </div>
        </div>
      </div>
      <div class="see-more">
        <a href="../courses/courses_page.php" class="see-more-btn">See more</a>
      </div>
    </section>

    <!-- Latest News Section -->
    <section class="news" id="news">
      <h2 class="section-title">Latest News</h2>
      <div class="news-content">
        <img src="exam result.webp" alt="Exam Results">
        <div class="news-text">
          <h3>Topgrade Institute - Exam Results Announcement</h3>
          <p>
            We are pleased to announce that the results for the Machine Learning Class Exam (Batch 2024) have been
            released!
            Students can now check their scores by logging into the Topgrade Student Portal or visiting the
            administration office.
          </p>
          <p>
            Top performers will receive special recognition certificates. For any inquiries or re-evaluation requests,
            contact our academic office within 7 working days.
          </p>
          <p>
            Congratulations to all students for your hard work! Keep pushing boundaries in AI and data science.
          </p>
          <a href="/TopGrade/News and Events/blog.php" class="see-more-btn">See more</a>
        </div>
      </div>
    </section>

    <!-- Facilities Section -->
    <section class="facilities" id="facilities">
      <h2 class="section-title">Facilities</h2>
      <div class="facility-grid">
        <div class="facility-content">
          <img src="auditorium.webp" alt="Auditorium">
          <h3>Auditorium</h3>
        </div>
        <div class="facility-content">
          <img src="library.webp" alt="Library">
          <h3>Library</h3>
        </div>
        <div class="facility-content">
          <img src="bookshelf.webp" alt="Bookshelf">
          <h3>Bookshelf</h3>
        </div>
        <div class="facility-content">
          <img src="computerlab.webp" alt="Computer Lab">
          <h3>Computer Lab</h3>
        </div>
       
      </div>
      <div class="see-more">
        <a href="/TopGrade/Facilities Main page/facilities_page.php" class="see-more-btn">See more</a>
      </div>
    </section>

    <!-- Tutors Section -->
    <section class="tutors-section" id="tutors">
      <h2 class="title">Our Tutors</h2>
<?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
      <div class="modal fade" id="detailsModal<?= $row['tutor_id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $row['tutor_id'] ?>" aria-hidden="true">
        <!-- Tutor 1 -->
        <a href="/TopGrade/Tutor Main page/Tutor prasanna/prasanna.php">
          <div class="tutor">
            <?php
// Define the image URL, using the dynamic path or a placeholder if empty
$tutor_image_url = !empty($row['image']) 
    ? htmlspecialchars($row['image']) 
    : 'https://via.placeholder.com/280x250?text=Tutor+Photo';
?>
<img src="<?= $tutor_image_url ?>" alt="<?= htmlspecialchars($row['tutor_name']) ?> Photo" class="profile-image">
            <div class="tutor-overly">
              <p><strong><?= htmlspecialchars($row['tutor_name']) ?></strong></p>
            </div>
          </div>
        </a>
      </div>
        <?php endwhile; ?>
        <?php else: ?>
        <?php endif?>
    </section>

    <!-- students review -->
    <section class="testimonial-section">
      <h2>What our Students Say</h2>

      <div class="testimonial-scroll">

        <div class="testimonial-card">
          <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="student">
          <p>Topgrade’s ML program exceeded my expectations. The blend of theory and labs was perfect. Excited for
            advanced courses!</p>
        </div>

        <div class="testimonial-card">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="student">
          <p>The exam preparation was thorough, and the results reflected my effort. Proud to be a Topgrade student!</p>
        </div>

        <div class="testimonial-card">
          <img src="https://randomuser.me/api/portraits/men/51.jpg" alt="student">
          <p>Loved the real-world case studies! The course structure boosted my confidence to tackle industry
            challenges.</p>
        </div>

        
      </div>
    </section>

    <!-- Footer -->
    <?php include '../header_footer/footer.php' ?>
</body>

</html>