-- 1. Membuat Database
CREATE DATABASE IF NOT EXISTS db_siber;

-- 2. Menggunakan Database
USE db_siber;

-- 3. Membuat Tabel Users
CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user',
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Menambahkan Data User Sampel (Target)
INSERT INTO users (username, password, role) VALUES 
('admin', 'admin', 'admin'),
