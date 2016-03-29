-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2016 at 08:57 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanctuary`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptionrequest`
--

DROP TABLE IF EXISTS `adoptionrequest`;
CREATE TABLE IF NOT EXISTS `adoptionrequest` (
  `adoptionID` int(225) NOT NULL AUTO_INCREMENT,
  `userID` int(225) NOT NULL,
  `animalID` int(225) NOT NULL,
  `approved` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`adoptionID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `animalID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `dateofbirth` date NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(225) NOT NULL,
  `breed` varchar(225) NOT NULL DEFAULT 'N/A',
  PRIMARY KEY (`animalID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

DROP TABLE IF EXISTS `owns`;
CREATE TABLE IF NOT EXISTS `owns` (
  `userID` int(225) NOT NULL,
  `animalID` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `staff` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(12) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
