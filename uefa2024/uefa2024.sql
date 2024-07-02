CREATE DATABASE uefa2024;

USE uefa2024;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_name VARCHAR(1) NOT NULL
);

CREATE TABLE countries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_id INT,
    country_name VARCHAR(100) NOT NULL,
    wins INT DEFAULT 0,
    draws INT DEFAULT 0,
    losses INT DEFAULT 0,
    points INT DEFAULT 0,
    FOREIGN KEY (group_id) REFERENCES groups(id)
);
