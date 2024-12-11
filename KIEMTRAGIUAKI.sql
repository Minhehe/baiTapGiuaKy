CREATE DATABASE QLSV_NguyenDuyMinh;

USE QLSV_NguyenDuyMinh;

CREATE TABLE table_Students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    dob DATETIME NOT NULL,
    gender INT NOT NULL,      -- 0: nữ, 1: nam
    hometown VARCHAR(255),
    level INT NOT NULL,       -- 0: Tiến sĩ, 1: Thạc sĩ, 2: Kỹ sư, 3: Khác
    group_id INT NOT NULL     
);



