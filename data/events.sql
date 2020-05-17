-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2020 at 08:46 PM
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
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eventID` int(2) NOT NULL,
  `team1` int(2) NOT NULL,
  `team2` int(2) NOT NULL,
  `teamA` varchar(10) NOT NULL,
  `teamB` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `sport` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `team1`, `team2`, `teamA`, `teamB`, `Date`, `sport`) VALUES
(1, 1, 2, 'Panthers', 'Bulls', '2020-05-20', 1),
(2, 3, 4, 'Phoenix', 'Falcons', '2020-05-28', 4),
(3, 1, 3, 'Panthers', 'Phoenix', '2020-05-21', 2),
(4, 1, 4, 'Panthers', 'Falcons', '2020-05-30', 5),
(5, 2, 3, 'Bulls', 'Phoenix', '2020-05-11', 6),
(6, 2, 4, 'Bulls', 'Falcons', '2020-05-12', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `team2` (`team2`),
  ADD KEY `team1` (`team1`),
  ADD KEY `sport` (`sport`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`sport`) REFERENCES `sportdetails` (`sID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`team1`) REFERENCES `teamdetails` (`tid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`team2`) REFERENCES `teamdetails` (`tid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
