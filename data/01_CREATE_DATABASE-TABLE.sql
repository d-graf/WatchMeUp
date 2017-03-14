-- Create Database and set character set to utf-8 for all tables
CREATE DATABASE `watchmeup`
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;
  
USE `watchmeup`;

-- Create Table for DB watchmeup
CREATE TABLE `user` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(30) NOT NULL,
    `email` VARCHAR(30) NOT NULL,
    `password` VARCHAR(40) NOT NULL,
    `isAdmin` TINYINT DEFAULT 0
    );
    
CREATE TABLE `gallery` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(10) NOT NULL,
    `user_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`)
);

CREATE TABLE `image` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(10) NOT NULL,
    `image` LONGBLOB NOT NULL,
    `cat_id` INT NOT NULL,
    FOREIGN KEY (`cat_id`) REFERENCES `gallery`(`id`)
);