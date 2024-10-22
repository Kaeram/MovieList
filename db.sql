CREATE DATABASE movielist_db;

USE movielist_db;

CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    director VARCHAR(255),
    release_year INT,
    genre VARCHAR(100),
    rating DECIMAL(3, 1),
    description TEXT
);