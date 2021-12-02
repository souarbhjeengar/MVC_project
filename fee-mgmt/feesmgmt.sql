-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 06:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feesmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `fees` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `fees`, `created_at`, `updated_at`) VALUES
(1, 'Webdevelopent', 'All languages', 12050, '2021-04-26 04:39:09', '2021-04-28 04:49:33'),
(2, 'C++ with basic c', 'c++ languages', 2000, '2021-04-27 04:33:54', '2021-04-27 04:34:40'),
(3, 'MERN Stack', 'full stack developer', 25000, '2021-04-27 04:38:08', '2021-04-27 04:38:08'),
(10, 'Larvel', '<p><b>This is best frame work for backend</b></p>', 7000, '2021-04-29 04:34:02', '2021-04-29 04:34:02'),
(18, 'css with html', '<p><b>this is css</b></p>', 3000, '2021-04-29 04:40:48', '2021-05-12 08:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `fees` int(8) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_id`, `fees`, `date`, `created_at`, `updated_at`) VALUES
(1, 2, 3000, '2021-05-01', '2021-05-10 08:32:54', '2021-05-10 08:32:54'),
(2, 2, 4000, '2021-05-05', '2021-05-10 08:33:19', '2021-05-10 08:33:19'),
(3, 3, 100, '2021-04-08', '2021-05-11 08:29:57', '2021-05-11 08:29:57'),
(4, 2, 3000, '2021-05-12', '2021-05-12 08:08:57', '2021-05-12 08:08:57'),
(5, 6, 1500, '2021-05-12', '2021-05-12 08:09:29', '2021-05-12 08:09:29'),
(6, 3, 1900, '2021-05-01', '2021-05-12 08:09:56', '2021-05-12 08:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'axixa', '17e0d99c495d22d0f8c3604fa201310f');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(5) NOT NULL,
  `courses_id` int(5) NOT NULL,
  `sname` varchar(70) NOT NULL,
  `profilepic` varchar(255) NOT NULL,
  `mobileno` varchar(14) NOT NULL,
  `othermobile` varchar(14) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `referby` varchar(100) NOT NULL,
  `joiningdate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `courses_id`, `sname`, `profilepic`, `mobileno`, `othermobile`, `address`, `email`, `referby`, `joiningdate`, `created_at`, `updated_at`) VALUES
(2, 1, 'Rajesh kumar purohit', '', '1234567890', '1234567890', 'gangashahar, gopeshwar basti\r\nbkn', 'rmcats@gmail.com', 'Axixa', '2010-01-02', '2021-05-01 05:01:13', '2021-05-02 07:01:32'),
(3, 18, 'Kajal', '', '4545454543', '1234567890', 'gangashahar, gopeshwar basti\r\nbkn', 'kajal.purohit@gmail.com', 'Rajesh', '2021-05-01', '2021-05-01 05:02:33', '2021-05-02 07:02:05'),
(5, 2, 'Nisha', '1620016205_student-Nisha_PXL_20210321_115547661.jpg', '9251435299', '1234567890', 'gangashahar, gopeshwar basti\r\nbkn', 'nisha@axixa.com', 'Rajesh', '2021-05-03', '2021-05-03 04:30:05', '2021-05-03 04:30:05'),
(6, 2, 'Nisha vyas s', '1620017224_student-Nisha vyas s_PXL_20210321_115607592.jpg', '9251435299', '1234567890', 'gangashahar, gopeshwar basti\r\nbkn', 'rmcats@gmail.com', 'Rajesh', '2021-05-03', '2021-05-03 04:46:14', '2021-05-03 04:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
