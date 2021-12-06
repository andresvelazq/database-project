-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 04:03 AM
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
(3, '\"Third Book\"', 'Author3', 'ABCD-1234567890123-3', '3', 'Pub3');

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
  `secret` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `fname`, `lname`, `email`, `password`, `secret`) VALUES
(1, 'John', 'Doe', 'johndoe@fcu.edu', 'password', 'secret'),
(2, 'Jane', 'Doe', 'janedoe@fcu.edu', 'password', 'secret'),
(3, 'Joe', 'Smith', 'joesmith@fcu.edu', 'password', 'secret');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `pid`, `bid`, `cid`, `semester`, `qty`) VALUES
(1, 1, 1, 1001, 'Spring-20', 30),
(2, 1, 1, 1002, 'Fall-20', 30),
(3, 2, 3, 2002, 'Spring-21', 10),
(4, 3, 3, 3003, 'Spring-22', 33),
(24, 2, 1, 2003, 'Fall-21', 12),
(25, 3, 2, 3032, 'Summer-19', 25);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `password` text NOT NULL DEFAULT 'password',
  `secret` text NOT NULL,
  `email` text NOT NULL,
  `sadmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `lname`, `password`, `secret`, `email`, `sadmin`) VALUES
(1, 'Sam', 'Admin', 'password', 'secret', 'samadmin@fcu.edu', 1),
(2, 'Dan', 'Admin', 'password', 'secret', 'danadmin@fcu.edu', 0),
(3, 'Pam', 'Admin', 'password', 'secret', 'pamadmin@fcu.edu', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
