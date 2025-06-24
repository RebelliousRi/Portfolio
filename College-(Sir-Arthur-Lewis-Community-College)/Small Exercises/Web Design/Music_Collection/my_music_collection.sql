
-- Create Database
CREATE DATABASE IF NOT EXISTS 1my_music_collection;
USE 1my_music_collection;

-- Create Artists Table
CREATE TABLE artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    genre VARCHAR(50)
);

-- Create Songs Table
CREATE TABLE songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    release_year INT,
    artist_id INT,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
);

-- Insert Sample Artists
INSERT INTO artists (name, genre) VALUES
('Adele', 'Pop'),
('Coldplay', 'Alternative Rock'),
('Beyoncé', 'R&B'),
('Imagine Dragons', 'Pop Rock'),
('Ed Sheeran', 'Pop');

-- Insert Sample Songs
INSERT INTO songs (title, release_year, artist_id) VALUES
('Rolling in the Deep', 2011, 1),
('Fix You', 2005, 2),
('Halo', 2008, 3),
('Believer', 2017, 4),
('Shape of You', 2017, 5);
