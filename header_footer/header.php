<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  scroll-behavior: smooth;
}

body {
  /* font-family: 'Poppins', sans-serif; */
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  color: #333;
  background: #fff;
}

a {
  text-decoration: none;
  color: inherit;
}

ul {
  list-style: none;
}

/* Header */
.header {
  background-color: #fff;
  padding: 0px 80px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
  /* margin-bottom: 40px; Add space below header */
}

.header .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
}

.logo img {
  height: 50px;
  width: auto;
}

.nav ul {
  display: flex;
  list-style: none;
  align-items: center;
  gap: 30px;
}

.nav a {
  text-decoration: none;
  color: #333;
  font-weight: 500;
  transition: color 0.3s ease;
  padding: 10px 0;
}

.nav a:hover {
  color: #2196f3;
}

.contact-btn {
  background-color: #2196f3;
  color: white !important;
  padding: 10px 25px !important;
  border-radius: 25px;
  transition: background-color 0.3s ease;
  text-align: center;
  display: inline-block;
}

.contact-btn:hover {
  background-color: #1976d2;
  color: white !important;
}
/* Hamburger button styles */
.hamburger {
  display: none;
  flex-direction: column;
  justify-content: space-around;
  width: 28px;
  height: 24px;
  background: transparent;
  border: none;
  cursor: pointer;
  padding: 0;
  z-index: 1100; /* above nav */
}

.hamburger:focus {
  outline: none;
}

.bar {
  width: 100%;
  height: 3px;
  background-color: #333;
  border-radius: 2px;
  transition: all 0.3s ease;
}

/* Show hamburger on small screens */
@media (max-width: 768px) {
  .hamburger {
    display: flex;
  }

  /* Hide nav by default */
  .nav ul {
    flex-direction: column;
    background: #0a1d37;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    display: none;
    padding: 1rem 0;
  }

  /* Show nav when active */
  .nav ul.show {
    display: flex;
  }

  .nav ul li {
    margin: 0.5rem 0;
    text-align: center;
  }

  .nav a {
    color: white;
    font-weight: 600;
    padding: 10px 0;
    display: block;
  }

  .contact-btn {
    background-color: #2196f3;
    padding: 10px 20px;
    border-radius: 25px;
    margin: 0 auto;
    width: fit-content;
  }
}

/* Optional: Animate hamburger to X when active */
.hamburger.active .bar:nth-child(1) {
  transform: rotate(45deg) translate(5px, 5px);
}

.hamburger.active .bar:nth-child(2) {
  opacity: 0;
}

.hamburger.active .bar:nth-child(3) {
  transform: rotate(-45deg) translate(5px, -5px);
}

    </style>

</head>
<body>
    <!-- Header -->
     <header class="header">
    <div class="container">
      <div class="logo">
        <a href="/TopGrade/Home page/home.php"><img src="logo.png" alt="Topgrade Institute Logo"></a>
      </div>
      <button class="hamburger" aria-label="Toggle menu" aria-expanded="false">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>
      <nav class="nav">
        <ul>
          <li><a href="/TopGrade\Home page\home.php">Home</a></li>
          <li><a href="/TopGrade\Courses\courses_page.php">Courses</a></li>
          <li><a href="/TopGrade\Home page\home.php#tutors">Tutors</a></li>
          <li><a href="/TopGrade\Facilities Main page\facilities_page.php">Facilities</a></li>
          <li><a href="/TopGrade\News and Events\blog.php">Announcement</a></li>
          <li><a href="/TopGrade\About us page\index.php">About Us</a></li>
          <li><a href="#contact" class="contact-btn">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
</body>
</html>