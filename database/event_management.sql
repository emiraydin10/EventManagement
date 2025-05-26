CREATE DATABASE event_management;
USE event_management;

-- USERS TABLOSU
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- EVENTS TABLOSU
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255),
    description TEXT,
    event_date DATE,
    location VARCHAR(255),
    event_type VARCHAR(255),
    organizer VARCHAR(255),
    contact_instagram VARCHAR(255),
    contact_email VARCHAR(255),
    contact_phone VARCHAR(255),
    ticket_location VARCHAR(255),
    dress_code VARCHAR(255),
    age_limit VARCHAR(255),
    capacity VARCHAR(255),
    rules TEXT,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
