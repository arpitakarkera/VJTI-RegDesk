-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 04:52 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vjti_regdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`) VALUES
(1, 'Computer'),
(2, 'Information Technology'),
(3, 'Electronics and Telecommunications'),
(4, 'Electronics'),
(5, 'Electrical'),
(6, 'Mechanical'),
(7, 'Civil'),
(8, 'Production'),
(9, 'Textile'),
(10, 'Technical Chemistry'),
(11, 'Project Management');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id` varchar(9) NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `programme` varchar(32) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `branch` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `id`, `first_name`, `last_name`, `email`, `contact`, `gender`, `programme`, `year`, `branch`) VALUES
(1, 'arpita97', '99800b85d3383e3a2fb45eb7d0066a4879a9dad0', '151515151', 'Arpita', 'Karkera', 'blahblah@blahblah.com', '9999999999', 'F', 'B.Tech.', 'Second', '1'),
(2, 'fakeapeksha', '99800b85d3383e3a2fb45eb7d0066a4879a9dad0', '171717171', 'Apeksha', 'Gothawal', 'haha@haha.com', '8888888888', 'F', 'B.Tech.', 'Second', '1'),
(3, 'msgabbu', '99800b85d3383e3a2fb45eb7d0066a4879a9dad0', '111111111', 'Sunaina', 'Punyani', 'ting@tong.com', '7777777777', 'F', 'B.Tech.', 'Second', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
