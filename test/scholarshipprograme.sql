-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2016 at 09:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scholarshipprograme`
--

-- --------------------------------------------------------

--
-- Table structure for table `doner`
--

CREATE TABLE IF NOT EXISTS `doner` (
`D_ID` int(11) NOT NULL,
  `D_Name` varchar(50) NOT NULL,
  `D_Address` varchar(100) NOT NULL,
  `D_Nationality` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE IF NOT EXISTS `moderator` (
`M_ID` int(11) NOT NULL,
  `M_Name` varchar(50) NOT NULL,
  `M_Address` varchar(100) NOT NULL,
  `M_District` varchar(50) NOT NULL,
  `M_Job` varchar(50) NOT NULL,
  `M_School` varchar(50) NOT NULL,
  `M_NIC` varchar(10) NOT NULL,
  `UserName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`S_ID` int(11) NOT NULL,
  `S_Name` varchar(50) NOT NULL,
  `S_Dob` date NOT NULL,
  `S_Sex` tinyint(1) NOT NULL,
  `S_School` varchar(50) NOT NULL,
  `S_Address` varchar(100) NOT NULL,
  `S_District` varchar(50) NOT NULL,
  `Income` int(11) NOT NULL,
  `S_Status` tinyint(1) NOT NULL,
  `S_NIC` int(12) DEFAULT NULL,
  `RelToGuardian` varchar(20) DEFAULT NULL,
  `G_Name` varchar(50) DEFAULT NULL,
  `G_NIC` int(12) DEFAULT NULL,
  `UserName` varchar(50) NOT NULL,
  `M_Id` int(11) DEFAULT NULL,
  `Acc_No` int(11) NOT NULL,
  `Acc_Bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentdoner`
--

CREATE TABLE IF NOT EXISTS `studentdoner` (
`T_Id` int(11) NOT NULL,
  `D_Id` int(11) NOT NULL,
  `S_Id` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doner`
--
ALTER TABLE `doner`
 ADD PRIMARY KEY (`D_ID`), ADD KEY `U_Id` (`UserName`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
 ADD PRIMARY KEY (`M_ID`), ADD KEY `U_Id` (`UserName`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`S_ID`), ADD UNIQUE KEY `S_NIC` (`S_NIC`), ADD UNIQUE KEY `S_NIC_2` (`S_NIC`), ADD KEY `Acc_Id` (`Acc_No`,`M_Id`,`UserName`), ADD KEY `UserName` (`UserName`), ADD KEY `M_Id` (`M_Id`);

--
-- Indexes for table `studentdoner`
--
ALTER TABLE `studentdoner`
 ADD PRIMARY KEY (`T_Id`), ADD KEY `D_Id` (`D_Id`), ADD KEY `S_Id` (`S_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doner`
--
ALTER TABLE `doner`
MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentdoner`
--
ALTER TABLE `studentdoner`
MODIFY `T_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `doner`
--
ALTER TABLE `doner`
ADD CONSTRAINT `doner_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `login` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderator`
--
ALTER TABLE `moderator`
ADD CONSTRAINT `moderator_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `login` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `login` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`M_Id`) REFERENCES `moderator` (`M_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentdoner`
--
ALTER TABLE `studentdoner`
ADD CONSTRAINT `studentdoner_ibfk_1` FOREIGN KEY (`D_Id`) REFERENCES `doner` (`D_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `studentdoner_ibfk_2` FOREIGN KEY (`S_Id`) REFERENCES `student` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
