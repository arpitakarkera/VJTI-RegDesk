-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2016 at 09:59 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.27

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
-- Table structure for table `archived_events`
--

CREATE TABLE `archived_events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(64) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `venue` varchar(64) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `committee` tinyint(4) NOT NULL,
  `incharge1_name` varchar(50) NOT NULL,
  `incharge1_contact` char(10) NOT NULL,
  `incharge2_name` varchar(50) NOT NULL,
  `incharge2_contact` char(10) NOT NULL,
  `manager` int(11) NOT NULL,
  `post_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archived_registrations`
--

CREATE TABLE `archived_registrations` (
  `registration_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `registration_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`) VALUES
(1, 'Computer'),
(2, 'Information Technology'),
(3, 'Electronics and Telecommunication'),
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
(6, 'DLA VJTI'),
(7, 'Nirmaan'),
(8, 'Rangawardhan'),
(9, 'Aero VJTI');

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
  `committee` int(11) NOT NULL,
  `incharge1_name` varchar(50) NOT NULL,
  `incharge1_contact` varchar(10) NOT NULL,
  `incharge2_name` varchar(50) DEFAULT NULL,
  `incharge2_contact` varchar(10) DEFAULT NULL,
  `cost` smallint(6) NOT NULL DEFAULT '0',
  `refreshment` tinyint(1) DEFAULT '0',
  `note` text,
  `manager` int(11) NOT NULL,
  `post_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `description`, `start_date`, `start_time`, `end_date`, `end_time`, `venue`, `category`, `committee`, `incharge1_name`, `incharge1_contact`, `incharge2_name`, `incharge2_contact`, `cost`, `refreshment`, `note`, `manager`, `post_timestamp`) VALUES
(1, 'AI Workshop', 'Learn Machine Learning.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-12-31', '09:00:00', NULL, NULL, 'Lab 3, Computer Dept., VJTI', 2, 4, 'Kiranmayi Gandikota', '9999999999', NULL, NULL, 0, 0, 'Bring your own laptops.', 1, '2016-12-29 11:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `manager_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upgrade_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`manager_id`, `user_id`, `upgrade_timestamp`) VALUES
(1, 1, '2016-12-29 07:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `programme_id` int(11) NOT NULL,
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
  `registration_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `user_id` int(11) NOT NULL,
  `request_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`user_id`, `request_timestamp`) VALUES
(1, '2016-12-29 07:11:29');

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
  `contact` varchar(10) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `programme` tinyint(4) DEFAULT NULL,
  `year` tinyint(4) DEFAULT NULL,
  `branch` tinyint(4) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `join_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `id`, `first_name`, `last_name`, `contact`, `gender`, `programme`, `year`, `branch`, `verified`, `join_timestamp`) VALUES
(1, 'appukarkera@gmail.com', '99800b85d3383e3a2fb45eb7d0066a4879a9dad0', '151071041', 'Arpita', 'Karkera', '9999999999', 'F', 1, 2, 1, 1, '2016-12-29 06:59:24'),
(2, 'gkiranmayi97@gmail.com', '99800b85d3383e3a2fb45eb7d0066a4879a9dad0', '151071040', 'Kiranmayi', 'Gandikota', '9999999999', '', 1, 1, 1, 0, '2016-12-30 06:51:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archived_events`
--
ALTER TABLE `archived_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `archived_registrations`
--
ALTER TABLE `archived_registrations`
  ADD PRIMARY KEY (`registration_id`);

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
  ADD KEY `committee` (`committee`);
ALTER TABLE `events` ADD FULLTEXT KEY `fulltext` (`event_name`,`description`);

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
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `committee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `programme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
