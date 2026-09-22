-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2024 at 03:13 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deira`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cusid` varchar(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`cusid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusid`, `username`, `password`, `role`, `telephone`, `email`) VALUES
('cus1', 'Sara AlAbri', 'sA006$3416', 'customer', '65432109', 'sara.alabri@gmail.com'),
('cus2', 'Salman AlKhatri', 'sA354$11#0', 'customer', '89012345', 'salman.alkhatri@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

DROP TABLE IF EXISTS `detail`;
CREATE TABLE IF NOT EXISTS `detail` (
  `tripid` int(12) NOT NULL AUTO_INCREMENT,
  `cusid` varchar(12) NOT NULL,
  `staffid` varchar(12) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `nom` int(20) NOT NULL,
  `sdate` date NOT NULL,
  `comments` varchar(50) NOT NULL,
  PRIMARY KEY (`tripid`),
  KEY `cusid` (`cusid`),
  KEY `staffid` (`staffid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`tripid`, `cusid`, `staffid`, `pname`, `nom`, `sdate`, `comments`) VALUES
(1, 'cus2', 'staff1', 'salalah', 5, '2024-07-10', 'Thanks'),
(2, 'cus1', 'staff3', 'muscat', 3, '2024-09-23', 'No comment');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staffid` varchar(12) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phonenum` varchar(20) NOT NULL,
  PRIMARY KEY (`staffid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `username`, `password`, `role`, `gender`, `phonenum`) VALUES
('staff1', 'Reem AlAbri', 'srE453#$51', 'staff', 'Female', '91234567'),
('staff2', 'Salman AlKhatri', 'ssA334#$00', 'staff', 'Male', '98765432'),
('staff3', 'Ahmed AlMoqbal', 'saH220#$01', 'staff', 'Male', '87651234');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`cusid`) REFERENCES `customer` (`cusid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
