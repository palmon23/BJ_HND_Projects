--create database
CREATE DATABASE IF NOT EXISTS application;
USE application;

-- Table for storage
CREATE TABLE IF NOT EXISTS applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    subject VARCHAR(150) NOT NULL,
    country VARCHAR(50),
    comment TEXT,
    gender CHAR(1),
    degree_level VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
