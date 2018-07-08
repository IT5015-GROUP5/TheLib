-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 04:23 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `actionID` int(11) NOT NULL,
  `action` varchar(150) NOT NULL,
  `time_of_action` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `accountID`, `bookID`, `actionID`, `action`, `time_of_action`) VALUES
(1, 3, 4, 1, 'Added the fourth book of HP', '2018-07-06 11:36:34'),
(2, 3, 12, 1, 'Added The Mark of Athena', '2018-07-06 06:44:52'),
(3, 1, 14, 1, 'Added The Lighting Thief', '2018-07-07 20:08:47'),
(5, 1, 4, 2, 'Edited Harry Potter and The Goblet of Fire', '2018-07-07 21:17:01'),
(8, 2, 20, 3, 'Deleted Harry Potter and The Prisoner of Azkaban', '2018-07-08 02:48:08'),
(9, 2, 14, 2, 'Edited The Lighting Thief', '2018-07-08 02:51:01'),
(10, 2, 21, 1, 'Added Harry Potter and The Prisoner of Azkaban', '2018-07-08 03:00:01'),
(48, 2, 24, 1, 'Added The Sea of Monsters', '2018-07-08 03:25:03'),
(49, 2, 24, 3, 'Deleted The Sea of Monsters', '2018-07-08 03:25:09'),
(50, 2, 25, 2, 'Edited The Sea of Monsters', '2018-07-08 03:25:42'),
(60, 2, 0, 1, 'Added Twilight', '2018-07-08 04:17:25'),
(61, 2, 29, 2, 'Edited Twilight', '2018-07-08 04:17:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `accountID` (`accountID`),
  ADD KEY `bookID` (`bookID`),
  ADD KEY `actionID` (`actionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
