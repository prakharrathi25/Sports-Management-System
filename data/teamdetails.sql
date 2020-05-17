-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2020 at 08:48 PM
-- Server version: 5.6.47-log
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `teamdetails`
--

CREATE TABLE IF NOT EXISTS `teamdetails` (
  `tid` int(2) NOT NULL,
  `teamName` varchar(10) NOT NULL,
  `points` int(4) NOT NULL,
  `numPlayers` int(3) NOT NULL,
  `mid` int(2) NOT NULL,
  `logo` text COMMENT 'Location of the Logo'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teamdetails`
--

INSERT INTO `teamdetails` (`tid`, `teamName`, `points`, `numPlayers`, `mid`, `logo`) VALUES
(1, 'Panthers', 55, 12, 1, 'assets\\images\\panthers_logo.jpeg'),
(2, 'Bulls', 55, 12, 2, 'assets\\images\\bulls_logo.jpeg'),
(3, 'Phoenix', 48, 11, 3, 'assets\\images\\phoenix_logo.jpeg'),
(4, 'Falcons', 56, 12, 4, 'assets\\images\\falcons_logo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teamdetails`
--
ALTER TABLE `teamdetails`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `mid` (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teamdetails`
--
ALTER TABLE `teamdetails`
  MODIFY `tid` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `teamdetails`
--
ALTER TABLE `teamdetails`
  ADD CONSTRAINT `teamdetails_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `managerdetails` (`teamID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `teamdetails_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `managerdetails` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
