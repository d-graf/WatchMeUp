-- Create Database and set character set to utf-8 for all tables
CREATE DATABASE `watchmeup`
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;
  
USE `watchmeup`;

-- Create Table for DB watchmeup
CREATE TABLE `user` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(30),
    `email` VARCHAR(30),
    `password` VARCHAR(20)
    );
    
CREATE TABLE `image` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(10),
    `image` LONGBLOB,
    `user_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES user(`id`)
);
