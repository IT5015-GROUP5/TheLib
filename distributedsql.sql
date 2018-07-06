-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 06:47 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distributedsql`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `actionID` int(11) NOT NULL,
  `action_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`actionID`, `action_name`) VALUES
(1, 'Added Book'),
(2, 'Edited Book'),
(3, 'Deleted Book');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorID`, `firstName`, `lastName`) VALUES
(1, 'J.K.', 'Rowling'),
(3, 'Rick', 'Riordan');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `book_name` varchar(150) NOT NULL,
  `year_pub` int(5) NOT NULL,
  `isbn` varchar(60) NOT NULL,
  `description` varchar(500) NOT NULL,
  `page_number` int(11) NOT NULL,
  `book_author` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `book_name`, `year_pub`, `isbn`, `description`, `page_number`, `book_author`) VALUES
(1, 'Harry Potter and The Sorcerer''s Stone', 1997, '0-7475-3269-9', 'Harry Potter and The Sorcerer''s Stone', 333, 1),
(2, 'Harry Potter and The Chamber of Secrets', 1998, '9-7804-3906-486-6', 'Harry Potter and The Chamber of Secrets', 500, 1),
(3, 'Harry Potter and The Prisoner of Azkaban', 1999, '9-7814-0885-567-6', 'Harry Potter and The Prisoner of Azkaban', 654, 1),
(4, 'Harry Potter and The Goblet of Fire', 2000, '9-7807-4755-099-0', 'Harry Potter and The Goblet of Fire', 655, 1),
(5, 'Harry Potter and The Order of Phoenix', 2003, '9-7817-8110-053-0', 'Harry Potter and The Order of Phoenix', 600, 1),
(6, 'Harry Potter and The Half Blood Prince', 2005, '9-7814-0885-594-2', 'Harry Potter and The Half Blood Prince', 780, 1),
(7, 'Harry Potter and The Deathly Hallows', 2007, '9-7805-4501-022-1', 'Harry Potter and The Deathly Hallows', 954, 1),
(8, 'Fantastic Beasts and Where to Find Them', 2001, '-11093', 'Fantastic Beasts and Where to Find Them is a 2001 book written by British author J. K. Rowling about the magical creatures in the Harry Potter universe.', 158, 1),
(9, 'The Son of Neptune', 2011, '-6277', 'The Son of Neptune is a 2011 fantasy-adventure novel written by American author Rick Riordan, based on Greek and Roman mythology. It is the second book in The Heroes of Olympus series, preceded by The Lost Hero and followed by The Mark of Athena.', 513, 3),
(11, 'The Lost Hero', 2010, '-12828', 'The Lost Hero is an American fantasy-adventure novel written by Rick Riordan, based on Greek and Roman mythology.', 557, 3),
(12, 'The Mark of Athena', 2012, '-1803', 'The Mark of Athena is an American fantasy-adventure novel written by Rick Riordan, based on Greek and Roman mythology.', 586, 3),
(13, 'The Mark of Athena', 2012, '-1803', 'The Mark of Athena is an American fantasy-adventure novel written by Rick Riordan, based on Greek and Roman mythology.', 586, 3);

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
(2, 3, 4, 1, 'Added the fourth book of HP', '2018-07-06 11:36:34'),
(6, 3, 12, 1, 'Added The Mark of Athena', '2018-07-06 06:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `username`, `password`) VALUES
(1, 'Janine Cabahug', 'Janine', 'janine123'),
(2, 'Mae Rhealyn Watin', 'MimiWatin', 'mimi12345'),
(3, 'Marian Isabel', 'marianmozo', 'qwert123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`actionID`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `book_author` (`book_author`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `accountID` (`accountID`),
  ADD KEY `bookID` (`bookID`),
  ADD KEY `actionID` (`actionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `actionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`book_author`) REFERENCES `author` (`authorID`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`),
  ADD CONSTRAINT `logs_ibfk_3` FOREIGN KEY (`actionID`) REFERENCES `actions` (`actionID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
