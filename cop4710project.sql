-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 09:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cop4710project`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `isbn` text NOT NULL,
  `edition` text NOT NULL,
  `publisher` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `isbn`, `edition`, `publisher`) VALUES
(1, '\"First Book\"', 'Author1', 'ABCD-1234567890123-1', '1', 'Pub1'),
(2, '\"Second Book\"', 'Author2', 'ABCD-1234567890123-2', '2', 'Pub2'),
(3, '\"Third Book\"', 'Author3', 'ABCD-1234567890123-3', '3', 'Pub3'),
(9, '\"Fourth Book\"', 'Author4', 'ABCD-1234567890123-4', '4', 'Pub4'),
(10, '\"Fifth Book\"', 'Author5', 'ABCD1234567890123-5', '5', 'Pub5');

-- --------------------------------------------------------

--
-- Table structure for table `deadlines`
--

CREATE TABLE `deadlines` (
  `semester` varchar(10) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deadlines`
--

INSERT INTO `deadlines` (`semester`, `deadline`) VALUES
('fallSem', '2022-08-01'),
('springSem', '2021-12-31'),
('summerSem', '2022-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL DEFAULT 'password',
  `secret` text NOT NULL,
  `reset` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `fname`, `lname`, `email`, `password`, `secret`, `reset`) VALUES
(1, 'John', 'Doe', 'johndoe@fcu.edu', 'password', 'secret', 0),
(2, 'Jane', 'Doe', 'janedoe@fcu.edu', 'password', 'secret', 0),
(3, 'Joe', 'Smith', 'joesmith@fcu.edu', 'password', 'secret', 0),
(29, 'Boyd', 'Veronica', 'boydveronica@fcu.edu', 'password', 'secret', 0),
(30, 'Madonna', 'Yolonda', 'maddonayolonda@fcu.edu', 'password', 'secret', 0),
(31, 'Lila', 'Krystal', 'lilakrystal@fcu.edu', 'password', 'secret', 0),
(32, 'Clare', 'Chauncey', 'clarechauncey@fcu.edu', 'password', 'secret', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `pid`, `bid`, `cid`, `semester`, `qty`) VALUES
(1, 1, 1, '1001', 'summerSem', 30),
(2, 1, 1, '1002', 'springSem', 30),
(3, 2, 3, '2002', 'summerSem', 10),
(4, 3, 3, '3003', 'fallSem', 33),
(5, 1, 1, '1003', 'fallSem', 10),
(6, 2, 1, '2003', 'springSem', 12),
(7, 3, 2, '3032', 'fallSem', 25),
(66, 29, 2, 'C1001', 'springSem', 20),
(67, 29, 3, 'D2002', 'summerSem', 10),
(68, 29, 9, 'E3003', 'fallSem', 30),
(69, 29, 10, 'D4004', 'summerSem', 12),
(70, 29, 1, 'F5005', 'springSem', 15),
(71, 30, 2, 'A1001', 'springSem', 17),
(72, 30, 3, 'C2002', 'summerSem', 25),
(73, 30, 3, 'F1001', 'fallSem', 10),
(74, 31, 10, 'A1001', 'springSem', 17),
(75, 31, 1, 'B2002', 'summerSem', 12),
(76, 31, 3, 'C3003', 'fallSem', 5),
(77, 32, 10, 'A1001', 'springSem', 18),
(78, 32, 9, 'B2002', 'springSem', 32),
(79, 32, 3, 'C3003', 'summerSem', 29),
(80, 32, 2, 'D4004', 'summerSem', 16),
(81, 32, 1, 'E5005', 'fallSem', 13);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL DEFAULT 'password',
  `secret` text NOT NULL,
  `reset` tinyint(1) NOT NULL DEFAULT 0,
  `sadmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `lname`, `email`, `password`, `secret`, `reset`, `sadmin`) VALUES
(1, 'Sam', 'Admin', 'samadmin@fcu.edu', 'password', 'secret', 0, 1),
(2, 'Dan', 'Admin', 'danadmin@fcu.edu', 'password', 'secret', 0, 0),
(3, 'Pam', 'Admin', 'pamadmin@fcu.edu', 'password', 'secret', 0, 0),
(12, 'Melina', 'Shou', 'melinashou@fcu.edu', 'password', 'secret', 0, 0),
(13, 'Roger', 'Praise', 'rogerpraise@fcu.edu', 'password', 'secret', 0, 0),
(14, 'Katrina', 'Jeremy', 'katrinajeremy@fcu.edu', 'password', 'secret', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deadlines`
--
ALTER TABLE `deadlines`
  ADD PRIMARY KEY (`semester`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
