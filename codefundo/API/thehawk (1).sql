-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 07:04 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thehawk`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `channel` varchar(11) NOT NULL,
  `org` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`channel`, `org`, `id`) VALUES
('random', 1, 1),
('important', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `numpost`
--

CREATE TABLE `numpost` (
  `index` int(11) NOT NULL,
  `numbpost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `numpost`
--

INSERT INTO `numpost` (`index`, `numbpost`) VALUES
(1, 11),
(2, 21),
(3, 21);

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `org_id` int(11) NOT NULL,
  `orgname` varchar(100) NOT NULL,
  `time_stamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`org_id`, `orgname`, `time_stamp`) VALUES
(1, 'abc', ''),
(2, 'org', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post` mediumtext NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `channel` varchar(100) NOT NULL,
  `confirmation` int(1) NOT NULL,
  `coordinate_x` varchar(100) NOT NULL,
  `coordinate_y` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post`, `user_id`, `channel`, `confirmation`, `coordinate_x`, `coordinate_y`, `id`) VALUES
('Code Fun Do at NR-121', 'karan', 'random', 1, '100', '100', 1),
('The updated schedule for Hall Days is :\r\n\r\nNIVEDITA | 24.03.2018\r\nSN/IG | 25.03.2018\r\nSAM | 26.03.2018\r\nLBS | 27.03.2018\r\nHJB | 28.03.2018\r\nJCB | 28.03.2018\r\nAZAD | 29.03.2018\r\nVS | 29.03.2018\r\nRK | 30.03.2018\r\nNEHRU | 31.03.2018\r\nMMM | 31.03.2018\r\nMS | 01.04.2018\r\nRP | 02.04.2018\r\nLLR | 03.04.2018\r\nPATEL | 03.04.2018', 'pratap', 'random', 1, '23456789', '3456789', 2),
('The YES!+ Society at IIT Kharagpur is conducting life skills workshops for the youth - YES!+ (Youth Empowerment & Skills Workshop) by the Art of Living from 23rd to 25th March. YES!+ is a soft skill & personal development workshop designed specifically for college students.', 'suyash', 'random', 1, '22.316926', '87.3118498', 3),
('Notice | Switch Over from 4 Year B.Tech (Hons.) to Dual Degree programme\r\n\r\nThird-year B.Tech students may refer to the notice below and apply by 10th April 2018.', 'ajinkya', 'dwd', 1, '22.316926', '87.3118498', 8),
('Patel Candidate in election ... no more :P', 'karan', 'dwa', 1, '22.316926', '87.3118498', 9),
('General Championship 2017-18 || Social and Cultural || Hindi Elocution\r\nThese were the announced results:-\r\nGold- Azad Hall (89 points)\r\nSilver- RK Hall (87 points)\r\nBronze- Patel Hall (86 points)', 'ajinkya', 'random', 1, '22.316926', '87.3118498', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `points` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `root` int(11) NOT NULL,
  `org_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `points`, `password`, `root`, `org_id`) VALUES
(1, 'karan', 'abc', 'abc@abc', 0, 'abc', 1, '1'),
(2, 'ajinkya', 'abcd', 'ka@ka', 0, 'abcd', 1, '1'),
(9, 'suyash', 'org', 'org@org', 0, 'org', 1, '2'),
(10, 'pratap', 'bitch', 'b@b', 0, 'b', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numpost`
--
ALTER TABLE `numpost`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `numpost`
--
ALTER TABLE `numpost`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
