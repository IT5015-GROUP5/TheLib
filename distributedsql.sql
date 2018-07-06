-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 04:56 PM
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
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorID` int(11) NOT NULL,
  `author_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorID`, `author_name`) VALUES
(1, 'J.K. Rowling');

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
  `book_author` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `book_name`, `year_pub`, `isbn`, `description`, `book_author`) VALUES
(1, 'Harry Potter and The Sorcerer''s Stone', 1997, '0-7475-3269-9', 'Harry Potter and The Sorcerer''s Stone', 1),
(2, 'Harry Potter and The Chamber of Secrets', 1998, '9-7804-3906-486-6', 'Harry Potter and The Chamber of Secrets', 1),
(3, 'Harry Potter and The Prisoner of Azkaban', 1999, '9-7814-0885-567-6', 'Harry Potter and The Prisoner of Azkaban', 1),
(4, 'Harry Potter and The Goblet of Fire', 2000, '9-7807-4755-099-0', 'Harry Potter and The Goblet of Fire', 1),
(5, 'Harry Potter and The Order of Phoenix', 2003, '9-7817-8110-053-0', 'Harry Potter and The Order of Phoenix', 1),
(6, 'Harry Potter and The Half Blood Prince', 2005, '9-7814-0885-594-2', 'Harry Potter and The Half Blood Prince', 1),
(7, 'Harry Potter and The Deathly Hallows', 2007, '9-7805-4501-022-1', 'Harry Potter and The Deathly Hallows', 1);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;