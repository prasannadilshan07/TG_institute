<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities - Topgrade Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="facilities_css.css">
</head>
<body>
    <!-- Header -->
    <?php include '../header_footer/header.php' ?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <h1 class="page-title">TopGrade Facilities</h1>
            
            <div class="facilities-grid">
                <!-- Library Facilities -->
                <div class="facility-item">
                    <div class="facility-image">
                        <img src="library.jpg" alt="Library Facilities">
                    </div>
                    <div class="facility-content">
                        <div class="facility-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h2 class="facility-title">Library Facilities</h2>
                        <p class="facility-description">
                            Our modern library provides a vast collection of academic books, journals, e-resources, and study materials. It offers a quiet, comfortable environment for focused learning, with computer access and dedicated reading areas.
                        </p>
                    </div>
                </div>

                <!-- Research Facilities -->
                <div class="facility-item reverse">
                    <div class="facility-content">
                        <div class="facility-icon">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <h2 class="facility-title">Research Facilities</h2>
                        <p class="facility-description">
                            TopGrade Institute supports innovation with well-equipped research labs, access to online databases, and guidance from experienced faculty. Students are encouraged to explore, experiment, and contribute to real-world advancements.
                        </p>
                    </div>
                    <div class="facility-image">
                        <img src="research.jpg" alt="Research Facilities">
                    </div>
                </div>

                <!-- Sport Club & Societies -->
                <div class="facility-item">
                    <div class="facility-image">
                        <img src="sports.jpg" alt="Sport Club & Societies">
                    </div>
                    <div class="facility-content">
                        <div class="facility-icon">
                            <i class="fas fa-running"></i>
                        </div>
                        <h2 class="facility-title">Sport Club & Societies</h2>
                        <p class="facility-description">
                            We promote a balanced lifestyle through active participation in sports and clubs. From football to chess, our student-run societies and sport clubs offer opportunities to develop leadership, teamwork, and social skills.
                        </p>
                    </div>
                </div>

                <!-- Lecture Rooms -->
                <div class="facility-item reverse">
                    <div class="facility-content">
                        <div class="facility-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h2 class="facility-title">Lecture Rooms</h2>
                        <p class="facility-description">
                            Our spacious and air-conditioned lecture rooms are designed for interactive learning. Equipped with multimedia projectors and Wi-Fi, they provide a conducive environment for both students and lecturers.
                        </p>
                    </div>
                    <div class="facility-image">
                        <img src="Auditorium.jpg" alt="Lecture Rooms">
                    </div>
                </div>
            </div>

         <!-- Pagination -->
            <div class="pagination">
                <a href="#">Previous</a>
                <a href="#" class="page-number  active">1</a>
                <a href="#" class="page-number">2</a>
                <a href="#">Next</a>
            </div>
    </main>

     <!-- Footer -->
    <?php include '../header_footer/footer.php' ?>

   
</body>
</html>