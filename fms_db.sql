-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 09:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `date_updated` datetime NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `description`, `user_id`, `folder_id`, `file_type`, `date_updated`, `size`) VALUES
(1, 'ACCEPTANCE LETTER.pdf', '', 1, 1, 'application/pdf', '2022-07-23 17:21:18', '173931'),
(2, 'RESUME.pdf', '', 1, 1, 'application/pdf', '2022-07-23 17:21:36', '204043'),
(3, 'DAILY JOURNAL TEMPLATE.docx', '', 1, 2, 'application/word', '2022-07-24 12:26:52', '37142'),
(4, 'Letter_of_Agreement_Advance_COC.docx', '', 1, 3, 'application/word', '2022-07-24 12:27:00', '13604'),
(5, 'uip_logo.png', '', 0, 4, 'image/png', '2022-07-23 12:27:10', '17590'),
(7, 'dashboard.php', '', 0, 5, 'application/octet-stream', '2022-07-23 12:27:19', '228006'),
(8, 'RTU WEEKLY REPORT.docx', '', 0, 6, 'application/word', '2022-07-24 12:27:28', '376645'),
(9, 'WEEKLY JOURNAL TEMPLATE.docx', '', 0, 7, 'application/word', '2022-07-24 12:27:37', '235493'),
(10, 'ENDORSEMENT LETTER.pdf', '', 0, 1, 'application/pdf', '2022-07-23 12:27:51', '788782'),
(11, 'DAILY JOURNAL #1.docx', '', 0, 8, 'application/word', '2022-07-24 12:28:04', '25017'),
(12, 'DAILY JOURNAL #2.docx', '', 0, 8, 'application/word', '2022-07-23 17:24:37', '2924826'),
(13, 'DAILY JOURNAL #1.pdf', '', 0, 9, 'application/pdf', '2022-07-24 15:24:19', '91502');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `folder_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `user_id`, `name`, `folder_type`) VALUES
(1, 1, 'Requirements', 'Pre-Boarding'),
(2, 1, 'Daily Journals', 'On-Boarding'),
(3, 1, 'Signed Documents', 'Off-Boarding'),
(4, 1, 'File Manager System', 'Tasks'),
(5, 1, 'Codes', 'Tasks'),
(6, 1, 'Reports', 'Off-Boarding'),
(7, 1, 'Weekly Journal', 'On-Boarding'),
(8, 1, 'Templates', 'Pre-Boarding'),
(9, 1, 'Attendance', 'Pre-Boarding');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `profile` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `user_type`, `profile`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'vezekiel180@gmail.com', 'user', ''),
(2, 'kiel', '827ccb0eea8a706c4c34a16891f84e7b\r\n', 'vez@email.com', 'admin', ''),
(13, 'kiel', '827ccb0eea8a706c4c34a16891f84e7b', 'vezekiel180@gmail.com', 'admin', ''),
(14, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'vezekiel180@gmail.com', 'user', ''),
(15, 'haha', '827ccb0eea8a706c4c34a16891f84e7b', 'vezekiel180@gmail.com', 'user', ''),
(16, 'angelo', '827ccb0eea8a706c4c34a16891f84e7b', 'kiel123@mail.com', 'admin', ''),
(17, 'kiel4562@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'haha@gmail.com', 'admin', ''),
(18, 'zek', '21232f297a57a5a743894a0e4a801fc3', 'zek@mail.com', 'admin', ''),
(19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@email.com', 'admin', ''),
(20, 'kiel', '827ccb0eea8a706c4c34a16891f84e7b', 'luffy@mail.com', 'admin', ''),
(21, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'vezekiel180@gmail.com', 'admin', ''),
(22, 'staff', '827ccb0eea8a706c4c34a16891f84e7b', 'ff@gmail.com', 'user', ''),
(23, 'staff', '1253208465b1efa876f982d8a9e73eef', 'vezekiel180@gmail.com', 'user', ''),
(24, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user@mail.com', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
