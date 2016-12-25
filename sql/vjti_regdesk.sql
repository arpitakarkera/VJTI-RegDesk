-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2016 at 11:14 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Event'),
(2, 'Workshop'),
(3, 'Competition'),
(4, 'Lecture');

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `committee_id` int(11) NOT NULL,
  `committee_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`committee_id`, `committee_name`) VALUES
(1, 'Technovanza'),
(2, 'Pratibimb'),
(3, 'SRA'),
(4, 'COC'),
(5, 'E-Cell VJTI'),
(6, 'DLA'),
(7, 'Nirmaan'),
(8, 'Rangawardhan');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `venue` varchar(64) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `committee` tinyint(4) NOT NULL,
  `incharge1_name` varchar(50) NOT NULL,
  `incharge1_contact` varchar(10) NOT NULL,
  `incharge2_name` varchar(50) DEFAULT NULL,
  `incharge2_contact` varchar(10) DEFAULT NULL,
  `cost` smallint(6) NOT NULL DEFAULT '0',
  `refreshment` tinyint(1) NOT NULL DEFAULT '0',
  `note` text,
  `manager` int(11) NOT NULL,
  `post_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `description`, `start_date`, `start_time`, `end_date`, `end_time`, `venue`, `category`, `committee`, `incharge1_name`, `incharge1_contact`, `incharge2_name`, `incharge2_contact`, `cost`, `refreshment`, `note`, `manager`, `post_timestamp`) VALUES
(1, 'Treasure Hunt', 'Find all the clues!', '2016-12-30', '08:00:00', NULL, NULL, 'Auditorium, VJTI', 1, 4, 'Shruthi Hariharan', '9999999999', NULL, NULL, 0, 0, NULL, 1, '2016-12-23 07:42:02'),
(2, 'Clue Finder', 'Find all the clues', '2016-12-24', '08:00:00', NULL, NULL, 'CCF, VJTI', 1, 2, 'Parina Lipare', '9999999999', NULL, NULL, 0, 0, NULL, 1, '2016-12-23 07:45:55'),
(3, 'AI Workshop', 'Learn machine learning', '2016-12-30', '09:00:00', '2016-12-31', '00:00:00', 'Computer Lab', 2, 1, 'Kiranmayi Gandikota', '9999999999', 'Swetha Srinivasaraghavan', '0000000000', 0, 0, 'Bring your laptops', 1, '2016-12-23 08:54:58'),
(5, 'Apeksha''s Birthday Party', 'Apeksha is organising her bithday bash. You all are welcome.', '2016-12-27', '16:00:00', NULL, NULL, 'Canteen', 1, 8, 'Apeksha Gothawal', '9999999999', NULL, NULL, 0, 1, 'Don''t forget to bring gifts. Amazon gift cards accepted.', 1, '2016-12-23 09:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `management_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `manager_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upgrade_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`manager_id`, `user_id`, `upgrade_date`) VALUES
(1, 1, '2016-12-19 16:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `programme_id` tinyint(4) NOT NULL,
  `programme_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`programme_id`, `programme_name`) VALUES
(1, 'B.Tech.'),
(2, 'M.Tech.'),
(3, 'Diploma'),
(4, 'PhD'),
(5, 'M.C.A.');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registration_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `registration_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registration_id`, `user_id`, `event_id`, `registration_time`) VALUES
(9, 1, 1, '2016-12-17 17:24:11'),
(10, 1, 2, '2016-12-23 10:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `user_id` int(11) NOT NULL,
  `request_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id` varchar(9) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `programme` tinyint(4) DEFAULT NULL,
  `year` tinyint(4) DEFAULT NULL,
  `branch` tinyint(4) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `join_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `id`, `first_name`, `last_name`, `contact`, `gender`, `programme`, `year`, `branch`, `verified`, `join_timestamp`) VALUES
(1, 'appukarkera@gmail.com', '99800b85d3383e3a2fb45eb7d0066a4879a9dad0', '151071041', 'Arpita', 'Karkera', '9999999999', 'F', 1, 2, 1, 1, '2016-12-13 13:09:16'),
(2, 'punyanisunaina38@gmail.com', '99800b85d3383e3a2fb45eb7d0066a4879a9dad0', '151071006', 'Sunaina', 'Punyani', '9999999999', 'F', 1, 4, 2, 0, '2016-12-13 13:16:43'),
(3, 'gkiranmayi97@gmail.com', '99800b85d3383e3a2fb45eb7d0066a4879a9dad0', '151071042', 'Kriranmayi', 'Gandikota', '9999999999', 'F', 1, 2, 1, 0, '2016-12-14 16:24:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`committee_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `category` (`category`),
  ADD KEY `committee` (`committee`),
  ADD KEY `manager` (`manager`);
ALTER TABLE `events` ADD FULLTEXT KEY `fulltext` (`event_name`,`description`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`management_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`programme_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `committee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `management_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `programme_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
