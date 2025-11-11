CREATE DATABASE IF NOT EXISTS academic_portal;
USE academic_portal;

-- Courses Table
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    short_description TEXT,
    full_description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tutor Table
CREATE TABLE IF NOT EXISTS tutor (
    tutor_id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255),
    tutor_name VARCHAR(100) NOT NULL,
    position VARCHAR(100),
    department VARCHAR(100),
    mobile VARCHAR(20),
    email VARCHAR(255) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Announcements/News and Events Table
CREATE TABLE IF NOT EXISTS announcement (
    announcement_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    announcement_date DATE NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);