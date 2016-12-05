CREATE TABLE `users` (
    `user_id` INT AUTO_INCREMENT,
    `username` VARCHAR(32),
    `password` VARCHAR(40),
    `first_name` VARCHAR(32),
    `last_name` VARCHAR(32),
    `email` VARCHAR(100),
    `contact` VARCHAR(20),
    `gender` VARCHAR(1),
    `programme` VARCHAR(32),
    `year` VARCHAR(10),
    `branch` VARCHAR(64),
    PRIMARY KEY (`user_id`)
);