-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsqlmoo13
-- Generation Time: Jul 30, 2014 at 03:03 PM
-- Server version: 5.5.32
-- PHP Version: 4.4.9
-- 
-- Database: `testhawki`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `Activity`
-- 

DROP TABLE IF EXISTS `Activity`;
CREATE TABLE IF NOT EXISTS `Activity` (
  `Activity_Id` varchar(10) NOT NULL,
  `Activity_Name` varchar(60) NOT NULL,
  PRIMARY KEY (`Activity_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `Activity`
-- 

INSERT INTO `Activity` VALUES ('1', 'Receivables Collected');
INSERT INTO `Activity` VALUES ('2', 'Inspected Defect Items');
INSERT INTO `Activity` VALUES ('3', 'Met Purchase Manager');
INSERT INTO `Activity` VALUES ('4', 'Color Approval');
INSERT INTO `Activity` VALUES ('5', 'Button Design Approval');

-- --------------------------------------------------------

-- 
-- Table structure for table `Customer`
-- 

DROP TABLE IF EXISTS `Customer`;
CREATE TABLE IF NOT EXISTS `Customer` (
  `Customer_Id` varchar(10) NOT NULL,
  `Customer_Name` varchar(60) NOT NULL,
  `Customer_Class` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Customer_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `Customer`
-- 

INSERT INTO `Customer` VALUES ('1', 'Peter England', '1');
INSERT INTO `Customer` VALUES ('2', 'Lee Jeans', '1');

-- --------------------------------------------------------

-- 
-- Table structure for table `Emp_Customer_Visit`
-- 

DROP TABLE IF EXISTS `Emp_Customer_Visit`;
CREATE TABLE IF NOT EXISTS `Emp_Customer_Visit` (
  `Created_By` varchar(60) NOT NULL DEFAULT 'Hawki',
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Visit_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Visit_Date` date NOT NULL,
  `Visit_Time` time NOT NULL,
  `Employee_Id` int(11) NOT NULL,
  `Customer_Id` int(11) NOT NULL,
  `Purpose_Id` int(11) NOT NULL,
  `Comment` varchar(60) DEFAULT NULL,
  `LngLat` varchar(60) DEFAULT NULL,
  `Loc_Address` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Visit_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `Emp_Customer_Visit`
-- 

INSERT INTO `Emp_Customer_Visit` VALUES ('Hawki', '2014-07-30 15:01:24', 2, '2014-07-31', '00:27:30', 106, 1, 1, 'victor', '37.422005,-122.084095', '1600 Amphitheatre Pkwy, Mountain View, United States');
INSERT INTO `Emp_Customer_Visit` VALUES ('Hawki', '2014-07-30 15:01:54', 3, '2014-07-31', '00:31:49', 106, 1, 1, 'victor', '37.422005,-122.084095', '1600 Amphitheatre Pkwy, Mountain View, United States');

-- --------------------------------------------------------

-- 
-- Table structure for table `Emp_Loc_Tracker`
-- 

DROP TABLE IF EXISTS `Emp_Loc_Tracker`;
CREATE TABLE IF NOT EXISTS `Emp_Loc_Tracker` (
  `Created_By` varchar(60) NOT NULL DEFAULT 'Hawki',
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Employee_Id` varchar(10) DEFAULT NULL,
  `LngLat` varchar(60) DEFAULT NULL,
  `Tracker_Timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Loc_Address` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

-- 
-- Dumping data for table `Emp_Loc_Tracker`
-- 

INSERT INTO `Emp_Loc_Tracker` VALUES ('Hawki', '2014-07-30 15:01:53', 122, '106', '37.422005,-122.084095', '2014-07-31 00:31:13', NULL);
INSERT INTO `Emp_Loc_Tracker` VALUES ('Hawki', '2014-07-30 15:01:52', 121, '106', '37.422005,-122.084095', '2014-07-31 00:30:13', NULL);
INSERT INTO `Emp_Loc_Tracker` VALUES ('Hawki', '2014-07-30 15:01:51', 120, '106', '37.422005,-122.084095', '2014-07-31 00:29:13', NULL);
INSERT INTO `Emp_Loc_Tracker` VALUES ('Hawki', '2014-07-30 15:01:50', 119, '106', '37.422005,-122.084095', '2014-07-31 00:28:13', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `Emp_Tracker_Schedule`
-- 

DROP TABLE IF EXISTS `Emp_Tracker_Schedule`;
CREATE TABLE IF NOT EXISTS `Emp_Tracker_Schedule` (
  `Id` int(10) NOT NULL,
  `Employee_Id` varchar(10) DEFAULT NULL,
  `Sun_StartTime` varchar(10) DEFAULT NULL,
  `Sun_EndTime` varchar(10) DEFAULT NULL,
  `Sun_TimeInterval` varchar(10) DEFAULT NULL,
  `Mon_StartTime` varchar(10) DEFAULT NULL,
  `Mon_EndTime` varchar(10) DEFAULT NULL,
  `Mon_TimeInterval` varchar(10) DEFAULT NULL,
  `Tue_StartTime` varchar(10) DEFAULT NULL,
  `Tue_EndTime` varchar(10) DEFAULT NULL,
  `Tue_TimeInterval` varchar(10) DEFAULT NULL,
  `Wed_StartTime` varchar(10) DEFAULT NULL,
  `Wed_EndTime` varchar(10) DEFAULT NULL,
  `Wed_TimeInterval` varchar(10) DEFAULT NULL,
  `Thu_StartTime` varchar(10) DEFAULT NULL,
  `Thu_EndTime` varchar(10) DEFAULT NULL,
  `Thu_TimeInterval` varchar(10) DEFAULT NULL,
  `Fri_StartTime` varchar(10) DEFAULT NULL,
  `Fri_EndTime` varchar(10) DEFAULT NULL,
  `Fri_TimeInterval` varchar(10) DEFAULT NULL,
  `Sat_StartTime` varchar(30) DEFAULT NULL,
  `Sat_EndTime` varchar(30) DEFAULT NULL,
  `Sat_TimeInterval` varchar(10) DEFAULT NULL,
  `Sat_Active` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `Emp_Tracker_Schedule`
-- 

INSERT INTO `Emp_Tracker_Schedule` VALUES (1, '106', '9:00', '23:00', '1', '9:00', '23:00', '1', '9:00', '17:00', '1', '9:00', '23:00', '1', '9:00', '23:00', '1', '9:00', '23:00', '1', '13:00', '23:00', '10', 'Y');
INSERT INTO `Emp_Tracker_Schedule` VALUES (2, '108', '9:00', '17:00', '1', '9:00', '17:00', '10', '9:00', '17:00', '10', '9:00', '17:00', '10', '9:00', '17:00', '10', '9:00', '17:00', '10', '13:00', '17:00', '10', 'Y');

-- --------------------------------------------------------

-- 
-- Table structure for table `Employee`
-- 

DROP TABLE IF EXISTS `Employee`;
CREATE TABLE IF NOT EXISTS `Employee` (
  `Created_By` char(60) NOT NULL DEFAULT 'Hawki',
  `Created_Date` date NOT NULL,
  `Last_update_By` char(60) NOT NULL,
  `Last_Update_Date` date NOT NULL,
  `Employee_Id` varchar(30) NOT NULL,
  `Employee_Name` varchar(60) DEFAULT NULL,
  `Email_Id` varchar(120) DEFAULT NULL,
  `Job_Position` varchar(30) DEFAULT NULL,
  `Job_Code` varchar(30) DEFAULT NULL,
  `Mobile_Num` bigint(20) NOT NULL,
  `Device_Active_Date` date DEFAULT NULL,
  `Activate_Tracking` varchar(2) NOT NULL,
  `Last_update_from_mobile` date DEFAULT NULL,
  PRIMARY KEY (`Employee_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `Employee`
-- 

INSERT INTO `Employee` VALUES ('victor', '2014-07-28', 'victor', '2014-07-28', '106', 'victor', NULL, NULL, NULL, 9791755690, NULL, 'Y', '2014-07-29');

-- --------------------------------------------------------

-- 
-- Table structure for table `Purpose`
-- 

DROP TABLE IF EXISTS `Purpose`;
CREATE TABLE IF NOT EXISTS `Purpose` (
  `Purpose_Id` varchar(10) NOT NULL,
  `Purpose_Name` varchar(60) NOT NULL,
  PRIMARY KEY (`Purpose_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `Purpose`
-- 

INSERT INTO `Purpose` VALUES ('1', 'purchase Order');
INSERT INTO `Purpose` VALUES ('2', 'Supporting');
