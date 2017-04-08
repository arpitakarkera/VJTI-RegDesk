-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2017 at 01:16 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

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
(9, 'Aero VJTI'),
(10, 'Enthusia');

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
  `banner` varchar(5) NOT NULL DEFAULT '.jpg',
  `post_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `description`, `start_date`, `start_time`, `end_date`, `end_time`, `venue`, `category`, `committee`, `incharge1_name`, `incharge1_contact`, `incharge2_name`, `incharge2_contact`, `cost`, `refreshment`, `note`, `manager`, `banner`, `post_timestamp`) VALUES
(1, 'Game Development Workshop', 'Bored of finding prime numbers?\r\nWant to build a game?\r\nWe Promised. Now we Deliver.\r\nThe Community of Coders announces its next workshop on C++ Game Development.\r\nLearn to develop ASCII Showdown from scratch!\r\nDonâ€™t think you have it to build one? \r\nWe reckon, You do!\r\nSee you then!', '2017-04-15', '09:00:00', NULL, '17:00:00', 'Lab 3, Computer Dept., VJTI', 2, 4, 'Sunaina Punyani', '9999999999', 'Apeksha Gothawal', '8888888888', 0, 0, 'Bring your own laptops', 5, '.jpg', '2017-04-08 11:59:09'),
(2, 'Inheritance', 'Inheritance - Student Mentorship Program\r\nGear Up! Summer is coming!\r\nAfter the year-long successful sessions of COC, we now introduce you to the Community of Coders Mentorship program, Inheritance. Being conducted this summer, your seniors will be your mentors and will guide you at every stage of your project. So come forward and submit your ideas ðŸ™‡ðŸ» in a group of 2-4. We will select the 15 best ideas ðŸ’¡, so give it your best shot!\r\nTake a look at these inheritance projects by your seniors:\r\nhttps://drive.google.com/â€¦/0B--t8PKtk-dpdnFvbHhHQ0lGLâ€¦/viewâ€¦\r\nAll you have to do is fill out this form:\r\nhttps://goo.gl/forms/0z8vCZsSAHFjjRgo1\r\nThe last date to submit your ideas is 11th May. So mark your calendars and make sure you submit your ideas well beforehand.', '2017-05-07', '00:00:00', '2017-06-30', '05:30:00', 'VJTI', 1, 4, 'Kiranmayi', '9999999999', NULL, NULL, 0, 0, '', 5, '.jpg', '2017-04-08 12:28:50'),
(3, 'Techno Party', 'lorem ipsum', '2017-04-21', '01:30:00', NULL, '05:30:00', 'VJTI', 1, 1, 'Shruthi', '9999999999', NULL, NULL, 0, 0, '', 5, '.png', '2017-04-08 12:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `manager_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upgrade_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`manager_id`, `user_id`, `upgrade_timestamp`) VALUES
(2, 1, '2017-01-01 15:44:23'),
(4, 2, '2017-01-01 16:08:09'),
(5, 9, '2017-04-04 10:29:08');

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

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registration_id`, `user_id`, `event_id`, `registration_timestamp`) VALUES
(1, 1, 1, '2016-12-31 11:48:02'),
(2, 2, 2, '2017-01-01 16:09:53'),
(3, 1, 2, '2017-03-24 19:26:34'),
(4, 1, 3, '2017-03-26 06:50:36'),
(5, 9, 1, '2017-04-06 06:44:12'),
(6, 9, 3, '2017-04-08 12:53:54');

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
  `password` varchar(60) NOT NULL,
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
(2, 'gkiranmayi97@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '151071040', 'Kiranmayi', 'Gandikota', '9999999999', '', 1, 1, 1, 1, '2016-12-30 06:51:22'),
(3, 'karkeraarpita@gmail.com', '33b1eac210971fb02a3b90afce9dbff758be794d', '123456789', 'Archita', 'Ray', '9999999999', 'F', 1, 1, 1, 0, '2016-12-30 10:08:38'),
(4, 'shru_hariharan@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123456789', 'Shruthi', 'Hariharan', '9898214312', 'F', 1, 2, 2, 0, '2016-12-31 15:36:07'),
(5, 'apekshagothawal58@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123456789', '<p>testing</p>', '<!--', '9876543210', 'F', 4, 4, 11, 0, '2016-12-31 15:40:50'),
(7, 'm.himanshu2311@gmail.com', '155c432deede6730b5b01b10744ae3c818c21e68', '141070038', 'Himanshu', 'Maheshwari', '9029925535', 'M', 1, 3, 1, 1, '2017-01-22 11:45:00'),
(9, 'appukarkera@gmail.com', '$2y$10$AgFdS7TNWrryWT48aLCJSe76Ci.tgSDFmT/K35Je0ohhGPuh8yJVy', '151071041', 'Arpita', 'Karkera', '9999999999', 'F', 1, 2, 1, 1, '2017-04-04 08:43:13');

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
  MODIFY `committee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `programme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
