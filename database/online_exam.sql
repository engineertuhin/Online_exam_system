-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2021 at 09:43 AM
-- Server version: 10.3.29-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `Name` varchar(25) DEFAULT NULL,
  `Email` varchar(33) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Email`, `password`, `status`) VALUES
(7, 'Akram hossain tuhin', 'tuhin1191@gmail.com', '$2y$10$BzrLRK.VtWfGV3d/LTpxK.FSxRw1k7N.hXmIu64xzr.DBLaWNH5/6', 'Active'),
(11, 'admin', 'aad@gmail.com', '$2y$10$aFlPgL9wXsnZWT0o1Uz42eY55KM2ws1j/8KFofVOONehWtSG2HzVW', 'Unactive'),
(12, 'Akram hossain tuhin', 'tuhin114491@gmail.com', '$2y$10$FO1Gm2z4ZSptOPOo6Inu0e0EfFtoAnTNqQ5ignlus9QS6AzU4n6Ym', 'Unactive');

-- --------------------------------------------------------

--
-- Table structure for table `examstart`
--

CREATE TABLE `examstart` (
  `id` int(10) NOT NULL,
  `Examname` varchar(20) DEFAULT NULL,
  `examtime` varchar(10) DEFAULT NULL,
  `examstart` varchar(13) DEFAULT NULL,
  `continue` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `id` int(10) NOT NULL,
  `question_no` int(10) DEFAULT NULL,
  `question` varchar(150) DEFAULT NULL,
  `option1` varchar(150) NOT NULL,
  `option2` varchar(150) NOT NULL,
  `option3` varchar(150) NOT NULL,
  `option4` varchar(150) NOT NULL,
  `option5` varchar(150) NOT NULL,
  `option6` varchar(150) NOT NULL,
  `option7` varchar(150) NOT NULL,
  `currect` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`id`, `question_no`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `currect`) VALUES
(1, 1, 'Whats is morden science ?', 'Science is morder Technology ', 'science is  Future thing', 'science is nothing', 'Science is anaything', '?', '?', '?', 'Science is morder Technology '),
(5, 2, 'What want to know about Computer Science ?', 'This is new future', 'This is old technology', 'This is not Future', 'This is a knowladge House', '?', '?', '?', 'This is a knowladge House'),
(6, 3, 'What is programming ? ', 'Lot of languages', 'So many Coding', 'Math and logic ', 'Other Thing', '?', '?', '?', 'Math and logic '),
(7, 4, 'what is Object Oriented Programming Language ?', 'PHP', 'java Script', 'jQuery', 'Html', '?', '?', '?', 'PHP'),
(8, 5, 'What is method ?', 'Class Function', 'only Function', 'anaything', 'Other ', '?', '?', '?', 'Class Function'),
(9, 6, 'anadndbad', 'jsj', 'snjs', 'ssdfn', 'nfnsj', '?', '?', '?', 'ssdfn');

-- --------------------------------------------------------

--
-- Table structure for table `limittime`
--

CREATE TABLE `limittime` (
  `id` int(10) NOT NULL,
  `getall` varchar(140) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pointcalculation`
--

CREATE TABLE `pointcalculation` (
  `id` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `point` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `point` varchar(12) NOT NULL,
  `ids` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`name`, `email`, `exam_name`, `point`, `ids`, `id`, `date`) VALUES
('Akram hossain tuhin', 'tuhin1191@gmail.com', '1st Exam', '0', 17, 12, '2020-12-29 18:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(10) NOT NULL,
  `rules` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `rules`) VALUES
(3, 'Do you best to answer each question correctly.Good luck'),
(4, 'There are 10 question and most are worth 10 point each'),
(5, 'There is a 15 minute time limit.you need complide this time'),
(6, 'This is a short and sample quiz of computer scince'),
(7, 'This is a short and sample quiz of computer scince');

-- --------------------------------------------------------

--
-- Table structure for table `stuentinfo`
--

CREATE TABLE `stuentinfo` (
  `id` int(15) NOT NULL,
  `name` varchar(28) DEFAULT NULL,
  `roll` varchar(17) DEFAULT NULL,
  `registation` varchar(22) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `department` varchar(27) DEFAULT NULL,
  `section` varchar(5) DEFAULT NULL,
  `semester` varchar(28) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stuentinfo`
--

INSERT INTO `stuentinfo` (`id`, `name`, `roll`, `registation`, `mobile`, `email`, `department`, `section`, `semester`) VALUES
(8, 'Jannatul Fardauz', '977235', '000012332322', '01859788216', 'tuhin11w91@gmail.com', 'Computer', 'A', '6th Semester'),
(17, 'Akram hossain tuhin', '21', '312', '10939321', 'tuhin1191@gmail.com', 'Computer', 'A', '6th Semester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examstart`
--
ALTER TABLE `examstart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limittime`
--
ALTER TABLE `limittime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pointcalculation`
--
ALTER TABLE `pointcalculation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuentinfo`
--
ALTER TABLE `stuentinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `examstart`
--
ALTER TABLE `examstart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `limittime`
--
ALTER TABLE `limittime`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pointcalculation`
--
ALTER TABLE `pointcalculation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stuentinfo`
--
ALTER TABLE `stuentinfo`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
