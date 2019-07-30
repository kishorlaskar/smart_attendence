-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 08:09 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diu`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `number` int(250) NOT NULL,
  `id` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `date` varchar(15) NOT NULL,
  `present` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`number`, `id`, `name`, `semester`, `section`, `course_id`, `date`, `present`) VALUES
(17, '151-15-460', 'md hamidur ', 'spring', 'PC(B)', 'CSE1', '2018-02-21', '1'),
(18, '151-15-461', 'himel', 'spring', 'PC(B)', 'CSE1', '2018-02-21', '1'),
(19, '151-15-469', 'mokbul', 'spring', 'PC(B)', 'CSE1', '2018-02-21', '0'),
(20, '151-15-460', 'md hamidur ', 'spring', 'PC(B)', 'CSE1', '2018-02-04', '1'),
(21, '151-15-461', 'himel', 'spring', 'PC(B)', 'CSE1', '2018-02-04', '1'),
(22, '151-15-469', 'mokbul', 'spring', 'PC(B)', 'CSE1', '2018-02-04', '1'),
(23, '151-15-460', 'md hamidur ', 'spring', 'PC(B)', 'CSE1', '2018-02-12', '1'),
(24, '151-15-461', 'himel', 'spring', 'PC(B)', 'CSE1', '2018-02-12', '1'),
(25, '151-15-469', 'mokbul', 'spring', 'PC(B)', 'CSE1', '2018-02-12', '0'),
(26, '151-15-460', 'md hamidur ', 'spring', 'PC(B)', 'CSE1', '2018-02-01', '1'),
(27, '151-15-461', 'himel', 'spring', 'PC(B)', 'CSE1', '2018-02-01', '1'),
(28, '151-15-469', 'mokbul', 'spring', 'PC(B)', 'CSE1', '2018-02-01', '1'),
(29, '151-15-460', 'md hamidur ', 'spring', 'PC(B)', 'CSE1', '2018-02-24', '0'),
(30, '151-15-461', 'himel', 'spring', 'PC(B)', 'CSE1', '2018-02-24', '0'),
(31, '151-15-469', 'mokbul', 'spring', 'PC(B)', 'CSE1', '2018-02-24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `sl` int(250) NOT NULL,
  `teacher_id` varchar(20) NOT NULL,
  `teacher_name` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `section` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`sl`, `teacher_id`, `teacher_name`, `semester`, `section`, `course_id`, `course_name`) VALUES
(1, '151-15-444', 'tanvir', 'spring', 'PC(B)', 'CSE1', 'computer'),
(2, '151-15-444', 'tanvir', 'spring', 'PC(B)', 'CSE2', 'Database');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `semester`, `section`, `course_id`) VALUES
('151-15-460', 'md hamidur ', 'spring', 'PC(B)', 'CSE1'),
('151-15-461', 'himel', 'spring', 'PC(B)', 'CSE1'),
('151-15-469', 'mokbul', 'spring', 'PC(B)', 'CSE1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `number` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `sl` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
