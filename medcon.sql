-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2024 at 02:49 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `content` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(64) NOT NULL,
  `date` varchar(16) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appID` int NOT NULL AUTO_INCREMENT,
  `reqDate` varchar(16) NOT NULL,
  `schedDate` varchar(16) DEFAULT NULL,
  `schedTime` varchar(8) DEFAULT NULL,
  `description` varchar(512) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `userID` int NOT NULL,
  `serviceID` int NOT NULL,
  PRIMARY KEY (`appID`),
  KEY `userID` (`userID`,`serviceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `batchID` int NOT NULL AUTO_INCREMENT,
  `recDate` varchar(16) NOT NULL,
  `expDate` varchar(16) NOT NULL,
  PRIMARY KEY (`batchID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchID`, `recDate`, `expDate`) VALUES
(1, '2024-10-08', '2024-11-06'),
(2, '2024-10-24', '2027-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

DROP TABLE IF EXISTS `clinic`;
CREATE TABLE IF NOT EXISTS `clinic` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `description` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(64) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `courseID` int NOT NULL AUTO_INCREMENT,
  `courseName` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `courseABR` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `courseABR`) VALUES
(1, 'Bachelor of Technical Teacher Education major in Welding and Fabrication', 'BTVTEd'),
(2, 'Bachelor of Science in Computer Science', 'BSCS'),
(3, 'Bachelor of Science in Computer Engineering', 'BSCpE'),
(4, 'Bachelor of Science in Hotel and Restaurant Management', 'BSHM'),
(5, 'Bachelor of Science in Information Technology', 'BS Info Tech');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `inventoryID` int NOT NULL AUTO_INCREMENT,
  `medType` tinyint NOT NULL DEFAULT '1' COMMENT '1 - tabs, 2 - caps, liquid, 3 - other',
  `genericName` varchar(32) NOT NULL,
  `brandName` varchar(32) DEFAULT NULL,
  `qty` int NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `batchID` int NOT NULL,
  PRIMARY KEY (`inventoryID`),
  KEY `batchID` (`batchID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryID`, `medType`, `genericName`, `brandName`, `qty`, `description`, `batchID`) VALUES
(1, 1, 'Mefenamic Acid', 'Ritemed', 13, 'Pain Reliever', 1),
(2, 1, 'Paracetamol', 'Biogesic', 189, 'For common colds and headache', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `prescID` int NOT NULL AUTO_INCREMENT,
  `issueDate` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `qty` int NOT NULL,
  `userID` int NOT NULL,
  `adminID` int NOT NULL,
  `inventoryID` int NOT NULL,
  PRIMARY KEY (`prescID`),
  KEY `userID` (`userID`,`adminID`,`inventoryID`),
  KEY `prescription_ibfk_1` (`inventoryID`),
  KEY `prescription_ibfk_3` (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `serviceID` int NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(64) NOT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `serviceName`) VALUES
(1, 'Medical Certificate'),
(2, 'General Checkup'),
(3, 'Medicine Request'),
(4, 'General Ailment Treatment');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `sessionID` int NOT NULL AUTO_INCREMENT,
  `dateGenerated` date NOT NULL,
  `timeGenerated` time NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`sessionID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `studentID` int NOT NULL,
  `year` int NOT NULL,
  `courseID` int NOT NULL,
  UNIQUE KEY `studentID_2` (`studentID`),
  KEY `studentID` (`studentID`,`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

DROP TABLE IF EXISTS `usergroups`;
CREATE TABLE IF NOT EXISTS `usergroups` (
  `groupID` int NOT NULL AUTO_INCREMENT,
  `groupName` varchar(32) NOT NULL,
  `level` tinyint UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usergroups`
--

INSERT INTO `usergroups` (`groupID`, `groupName`, `level`) VALUES
(1, 'Student', 0),
(2, 'Faculty', 1),
(3, 'Doctor', 3),
(4, 'Admin', 3),
(5, 'Dentist', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `mname` varchar(32) NOT NULL,
  `bday` varchar(16) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `groupID` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `cor` varchar(256) DEFAULT NULL,
  `schoolID` varchar(64) NOT NULL,
  `cNum` varchar(16) NOT NULL,
  `cPerson` varchar(64) NOT NULL,
  PRIMARY KEY (`userID`),
  KEY `city` (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fname`, `lname`, `mname`, `bday`, `phone`, `address`, `email`, `password`, `groupID`, `status`, `cor`, `schoolID`, `cNum`, `cPerson`) VALUES
(1, 'Medcon', 'Medcon', 'Nemsu', '1/1/2001', '09123456789', 'Orillaneda Street, Cantilan, Surigao del Sur', 'medconnemsu@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 4, 1, NULL, '', '', ''),
(2, 'Lloyd Jay', 'Edradan', 'Arpilleda', '2002-02-20', '09157784831', 'Baybay Rose, Boulevard', 'lloydjayedradan@gmail.com', 'f7a8d6df1f6ece2df489262191405997390765de23b04abd809fb19f59606383', 1, 1, NULL, '24123123', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`batchID`) REFERENCES `batch` (`batchID`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`inventoryID`) REFERENCES `inventory` (`inventoryID`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `prescription_ibfk_3` FOREIGN KEY (`adminID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `usergroups` (`groupID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
