-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2013 at 12:22 PM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `RNJ`
--

-- --------------------------------------------------------

--
-- Table structure for table `AUTH_TOKENS`
--

CREATE TABLE IF NOT EXISTS `AUTH_TOKENS` (
  `AUTH_ID` varchar(128) NOT NULL DEFAULT '',
  `USERID` varchar(32) NOT NULL,
  `DATE_CREATED` int(10) NOT NULL,
  PRIMARY KEY (`AUTH_ID`),
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businesscustomer`
--

CREATE TABLE IF NOT EXISTS `businesscustomer` (
  `USERID` varchar(32) NOT NULL,
  `companyname` varchar(50) DEFAULT NULL,
  `annualincome` int(15) DEFAULT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesscustomer`
--

INSERT INTO `businesscustomer` (`USERID`, `companyname`, `annualincome`) VALUES
('ning', 'IBM', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `USERID` varchar(32) NOT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`USERID`) VALUES
('caleks'),
('caleks3'),
('cdixon'),
('cdixon3'),
('cjordan'),
('cjordan3'),
('cpeter'),
('cpeter3'),
('ning');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `USERID` varchar(32) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `salary` int(15) DEFAULT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`USERID`, `title`, `salary`) VALUES
('aleks', NULL, NULL),
('aleks3', NULL, NULL),
('aleks4', NULL, NULL),
('dixon', NULL, NULL),
('dixon3', NULL, NULL),
('dixon4', NULL, NULL),
('jordan', NULL, NULL),
('jordan3', NULL, NULL),
('jordan4', NULL, NULL),
('peter', NULL, NULL),
('peter3', NULL, NULL),
('peter4', NULL, NULL),
('vemployee', 'Sales', 34822);

-- --------------------------------------------------------

--
-- Table structure for table `employee_workin_store`
--

CREATE TABLE IF NOT EXISTS `employee_workin_store` (
  `employeeid` varchar(32) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  PRIMARY KEY (`employeeid`),
  KEY `sid` (`sid`),
  KEY `employeeid` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_workin_store`
--

INSERT INTO `employee_workin_store` (`employeeid`, `sid`) VALUES
('vemployee', 1),
('aleks', 2),
('dixon', 2),
('jordan', 2),
('peter', 2),
('aleks3', 3),
('dixon3', 3),
('jordan3', 3),
('peter3', 3),
('aleks4', 4),
('dixon4', 4),
('jordan4', 4),
('peter4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `homecustomer`
--

CREATE TABLE IF NOT EXISTS `homecustomer` (
  `USERID` varchar(32) NOT NULL,
  `marriage` enum('m','s','d') DEFAULT NULL,
  `gender` enum('m','f') DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `LOGS`
--

CREATE TABLE IF NOT EXISTS `LOGS` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MESSAGE` text,
  `FILENAME` text,
  `TYPE` text,
  `PRIORITY` text,
  `DATETIME` text,
  `LINE` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `PASSWORD`
--

CREATE TABLE IF NOT EXISTS `PASSWORD` (
  `TEMP_PASS` varchar(128) NOT NULL,
  `USE_FLAG` tinyint(1) NOT NULL,
  `TEMP_TIME` int(10) NOT NULL,
  `TOTAL_LOGIN_ATTEMPTS` int(2) NOT NULL DEFAULT '0',
  `LAST_LOGIN_ATTEMPT` int(10) NOT NULL DEFAULT '0',
  `FIRST_LOGIN_ATTEMPT` int(10) NOT NULL DEFAULT '0',
  `USERID` varchar(32) NOT NULL,
  PRIMARY KEY (`USERID`),
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PASSWORD`
--

INSERT INTO `PASSWORD` (`TEMP_PASS`, `USE_FLAG`, `TEMP_TIME`, `TOTAL_LOGIN_ATTEMPTS`, `LAST_LOGIN_ATTEMPT`, `FIRST_LOGIN_ATTEMPT`, `USERID`) VALUES
('85dc887d00', 1, 0, 1, 1386435191, 1386435191, 'jacktheadmin');

-- --------------------------------------------------------

--
-- Table structure for table `pkind`
--

CREATE TABLE IF NOT EXISTS `pkind` (
  `kid` int(4) NOT NULL AUTO_INCREMENT,
  `kname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pkind`
--

INSERT INTO `pkind` (`kid`, `kname`) VALUES
(0, 'Electronics'),
(1, 'Clothes'),
(2, 'Books'),
(3, 'Furniture'),
(4, 'Kitchen');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `kkid` int(4) NOT NULL,
  `pname` text,
  `tinventory` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `imageurl` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `kkid` (`kkid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `kkid`, `pname`, `tinventory`, `price`, `imageurl`) VALUES
(8, 1, 'Asus Monitor', 1492, 200, '7.jpg'),
(9, 1, 'LG Monitor', 1499, 250, '8.jpg'),
(10, 1, 'Samsung Monitor', 1499, 275, '10.jpg'),
(11, 3, 'Harry Potter and the Sorcerer''s Stone', 1499, 14.99, '1.jpg'),
(12, 3, 'Harry Potter and the Chamber of Secrets', 1497, 13.99, '2.jpg'),
(13, 3, 'Harry Potter and the Prisoner of Azkaban', 1495, 15.99, '3.jpg'),
(14, 2, 'HP Laptop', 1497, 399, '3.jpg'),
(15, 2, 'Dell Laptop', 1497, 699, '4.jpg'),
(16, 4, 'Called to care', 1490, 39.99, '4.jpg'),
(17, 4, 'Clean, Green, and Lean', 1498, 25.89, '5.jpg'),
(18, 5, 'Water Technology', 1494, 75, '6.jpg'),
(19, 5, 'Materials Science and Technology', 1491, 32.25, '7.jpg'),
(20, 6, 'Hollister woman jacket', 1497, 59, '1.jpg'),
(21, 6, 'Lacoste man jacket', 1496, 69, '2.jpg'),
(22, 6, 'Columbia coat', 1494, 129, '3.jpg'),
(23, 6, 'The north face jacket', 1498, 99, '4.jpg'),
(24, 7, 'Slim jeans', 1488, 29, '5.jpg'),
(25, 7, 'Denim jacket', 1487, 75, '6.jpg'),
(26, 8, 'Pull-out Sofa', 1500, 159, '1.jpg'),
(27, 8, 'Multimedia Storage Tower', 1500, 35, '2.jpg'),
(28, 10, 'Nonstick 15-Piece Cookware Set', 1500, 110, '2.jpg'),
(29, 10, 'Keurig K75 Platinum Brewing System', 1500, 34, '1.jpg'),
(30, 9, 'Joseph Adjustable Rolling Pin Plu', 1500, 9.95, '4.jpg'),
(31, 9, 'Non-Stick 5-Piece Bakeware Set', 1500, 54, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ptype`
--

CREATE TABLE IF NOT EXISTS `ptype` (
  `kkid` int(4) NOT NULL AUTO_INCREMENT,
  `kid` int(4) NOT NULL,
  `kkname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kkid`),
  KEY `kid` (`kid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ptype`
--

INSERT INTO `ptype` (`kkid`, `kid`, `kkname`) VALUES
(1, 0, 'Monitor'),
(2, 0, 'Laptop'),
(3, 2, 'Fiction'),
(4, 2, 'Personal Care'),
(5, 2, 'Science & Technology'),
(6, 1, 'Outerwear'),
(7, 1, 'Denim'),
(8, 3, 'Living Room Furniture'),
(9, 4, 'Bakeware'),
(10, 4, 'Cookware');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `rid` int(11) NOT NULL DEFAULT '0',
  `rname` varchar(30) DEFAULT NULL,
  `manager` varchar(32) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `manager` (`manager`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`rid`, `rname`, `manager`) VALUES
(1, 'Northeast', 'jack'),
(2, 'Eastern', 'jack'),
(3, 'Southwest', 'jack'),
(4, 'Southeast', 'jack'),
(5, 'Atlantic', 'jack'),
(6, 'Western', 'jack'),
(7, 'Pacific', 'jack');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `USERID` varchar(32) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `comments` varchar(200) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  PRIMARY KEY (`USERID`,`pid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SESSION`
--

CREATE TABLE IF NOT EXISTS `SESSION` (
  `SESSION_ID` varchar(128) NOT NULL,
  `DATE_CREATED` int(10) NOT NULL,
  `LAST_ACTIVITY` int(10) NOT NULL,
  `USERID` varchar(32) NOT NULL,
  PRIMARY KEY (`SESSION_ID`),
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SESSION`
--

INSERT INTO `SESSION` (`SESSION_ID`, `DATE_CREATED`, `LAST_ACTIVITY`, `USERID`) VALUES
('6db1d2b6993a71169ba2759d1fcce0bc4697d3dac0bb2e061d98c70234606b26b571a1b4f6d3ebd31afb006dcc9167690eeee9b32b1e8dc361bb0dd1d2dd9a19', 1386381145, 1386381562, 'jacktheadmin'),
('cb1abc58f79a59f4310e8e5343daa2ad0ffac4cf3f9213f034f09651f34936959bf47f9c3aeea3a997f53a2fde4847dd201c4b4f3953be7422956e6aaca0d423', 1386435946, 1386436770, 'vemployee');

-- --------------------------------------------------------

--
-- Table structure for table `SESSION_DATA`
--

CREATE TABLE IF NOT EXISTS `SESSION_DATA` (
  `SESSION_ID` varchar(128) NOT NULL,
  `KEY` varchar(128) NOT NULL,
  `VALUE` varchar(128) DEFAULT NULL,
  KEY `SESSION_ID` (`SESSION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SESSION_DATA`
--

INSERT INTO `SESSION_DATA` (`SESSION_ID`, `KEY`, `VALUE`) VALUES
('cb1abc58f79a59f4310e8e5343daa2ad0ffac4cf3f9213f034f09651f34936959bf47f9c3aeea3a997f53a2fde4847dd201c4b4f3953be7422956e6aaca0d423', 'productids', '8');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `sid` int(11) NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL,
  `streetaddr` varchar(100) DEFAULT NULL,
  `zip` int(11) NOT NULL,
  `storemanager` varchar(32) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `rid` (`rid`),
  KEY `zip` (`zip`),
  KEY `storemanager` (`storemanager`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`sid`, `rid`, `streetaddr`, `zip`, `storemanager`) VALUES
(1, 1, '421 8th Ave Rm 4202-J1', 10199, 'jack'),
(2, 1, '25 Dorchester Ave', 12288, 'jack'),
(3, 2, '1001 California Ave', 15290, 'jack'),
(4, 2, '2970 Market Street', 19104, 'jack'),
(5, 3, '433 W Harrison 4th Floor', 60607, 'jack'),
(6, 4, 'One Post Office Drive', 78284, 'jack'),
(7, 4, '7499 Northwest 31st St', 33122, 'jack'),
(8, 5, '900 Brentwood RD NE', 20066, 'jack'),
(9, 5, '2901 Scott Futrell Drive', 28228, 'jack'),
(10, 6, '1001 E. Sunset Rd', 89199, 'jack'),
(11, 7, '7001 S. Central Ave. Room 338B', 90052, 'jack');

-- --------------------------------------------------------

--
-- Table structure for table `store_has_product`
--

CREATE TABLE IF NOT EXISTS `store_has_product` (
  `sid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL,
  `sinventory` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`,`pid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_has_product`
--

INSERT INTO `store_has_product` (`sid`, `pid`, `sinventory`) VALUES
(1, 8, 498),
(1, 9, 499),
(1, 10, 499),
(1, 11, 499),
(1, 12, 497),
(1, 13, 495),
(1, 14, 500),
(1, 15, 500),
(1, 16, 500),
(1, 17, 500),
(1, 18, 500),
(1, 19, 500),
(1, 20, 500),
(1, 21, 500),
(1, 22, 500),
(1, 23, 500),
(1, 24, 500),
(1, 25, 500),
(1, 26, 500),
(1, 27, 500),
(1, 28, 500),
(1, 29, 500),
(1, 30, 500),
(1, 31, 500),
(2, 8, 100),
(2, 9, 100),
(2, 10, 100),
(2, 11, 100),
(2, 12, 100),
(2, 13, 100),
(2, 14, 497),
(2, 15, 497),
(2, 16, 490),
(2, 17, 498),
(2, 18, 494),
(2, 19, 491),
(2, 20, 499),
(2, 21, 498),
(2, 22, 497),
(2, 23, 499),
(2, 24, 494),
(2, 25, 492),
(2, 26, 100),
(2, 27, 100),
(2, 28, 100),
(2, 29, 100),
(2, 30, 100),
(2, 31, 100),
(3, 8, 100),
(3, 9, 100),
(3, 10, 100),
(3, 11, 100),
(3, 12, 100),
(3, 13, 100),
(3, 14, 100),
(3, 15, 100),
(3, 16, 100),
(3, 17, 100),
(3, 18, 100),
(3, 19, 100),
(3, 20, 499),
(3, 21, 498),
(3, 22, 497),
(3, 23, 499),
(3, 24, 494),
(3, 25, 495),
(3, 26, 100),
(3, 27, 100),
(3, 28, 100),
(3, 29, 100),
(3, 30, 100),
(3, 31, 100),
(4, 8, 100),
(4, 9, 100),
(4, 10, 100),
(4, 11, 100),
(4, 12, 100),
(4, 13, 100),
(4, 14, 100),
(4, 15, 100),
(4, 16, 100),
(4, 17, 100),
(4, 18, 100),
(4, 19, 100),
(4, 20, 100),
(4, 21, 100),
(4, 22, 100),
(4, 23, 100),
(4, 24, 100),
(4, 25, 100),
(4, 26, 100),
(4, 27, 100),
(4, 28, 100),
(4, 29, 100),
(4, 30, 100),
(4, 31, 100),
(5, 8, 100),
(5, 9, 100),
(5, 10, 100),
(5, 11, 100),
(5, 12, 100),
(5, 13, 100),
(5, 14, 100),
(5, 15, 100),
(5, 16, 100),
(5, 17, 100),
(5, 18, 100),
(5, 19, 100),
(5, 20, 100),
(5, 21, 100),
(5, 22, 100),
(5, 23, 100),
(5, 24, 100),
(5, 25, 100),
(5, 26, 100),
(5, 27, 100),
(5, 28, 100),
(5, 29, 100),
(5, 30, 100),
(5, 31, 100),
(6, 8, 100),
(6, 9, 100),
(6, 10, 100),
(6, 11, 100),
(6, 12, 100),
(6, 13, 100),
(6, 14, 100),
(6, 15, 100),
(6, 16, 100),
(6, 17, 100),
(6, 18, 100),
(6, 19, 100),
(6, 20, 100),
(6, 21, 100),
(6, 22, 100),
(6, 23, 100),
(6, 24, 100),
(6, 25, 100),
(6, 26, 100),
(6, 27, 100),
(6, 28, 100),
(6, 29, 100),
(6, 30, 100),
(6, 31, 100),
(7, 8, 100),
(7, 9, 100),
(7, 10, 100),
(7, 11, 100),
(7, 12, 100),
(7, 13, 100),
(7, 14, 100),
(7, 15, 100),
(7, 16, 100),
(7, 17, 100),
(7, 18, 100),
(7, 19, 100),
(7, 20, 100),
(7, 21, 100),
(7, 22, 100),
(7, 23, 100),
(7, 24, 100),
(7, 25, 100),
(7, 26, 100),
(7, 27, 100),
(7, 28, 100),
(7, 29, 100),
(7, 30, 100),
(7, 31, 100),
(8, 8, 100),
(8, 9, 100),
(8, 10, 100),
(8, 11, 100),
(8, 12, 100),
(8, 13, 100),
(8, 14, 100),
(8, 15, 100),
(8, 16, 100),
(8, 17, 100),
(8, 18, 100),
(8, 19, 100),
(8, 20, 100),
(8, 21, 100),
(8, 22, 100),
(8, 23, 100),
(8, 24, 100),
(8, 25, 100),
(8, 26, 100),
(8, 27, 100),
(8, 28, 100),
(8, 29, 100),
(8, 30, 100),
(8, 31, 100),
(9, 8, 100),
(9, 9, 100),
(9, 10, 100),
(9, 11, 100),
(9, 12, 100),
(9, 13, 100),
(9, 14, 100),
(9, 15, 100),
(9, 16, 100),
(9, 17, 100),
(9, 18, 100),
(9, 19, 100),
(9, 20, 100),
(9, 21, 100),
(9, 22, 100),
(9, 23, 100),
(9, 24, 100),
(9, 25, 100),
(9, 26, 100),
(9, 27, 100),
(9, 28, 100),
(9, 29, 100),
(9, 30, 100),
(9, 31, 100),
(10, 8, 100),
(10, 9, 100),
(10, 10, 100),
(10, 11, 100),
(10, 12, 100),
(10, 13, 100),
(10, 14, 100),
(10, 15, 100),
(10, 16, 100),
(10, 17, 100),
(10, 18, 100),
(10, 19, 100),
(10, 20, 100),
(10, 21, 100),
(10, 22, 100),
(10, 23, 100),
(10, 24, 100),
(10, 25, 100),
(10, 26, 100),
(10, 27, 100),
(10, 28, 100),
(10, 29, 100),
(10, 30, 100),
(10, 31, 100),
(11, 8, 100),
(11, 9, 100),
(11, 10, 100),
(11, 11, 100),
(11, 12, 100),
(11, 13, 100),
(11, 14, 100),
(11, 15, 100),
(11, 16, 100),
(11, 17, 100),
(11, 18, 100),
(11, 19, 100),
(11, 20, 100),
(11, 21, 100),
(11, 22, 100),
(11, 23, 100),
(11, 24, 100),
(11, 25, 100),
(11, 26, 100),
(11, 27, 100),
(11, 28, 100),
(11, 29, 100),
(11, 30, 100),
(11, 31, 100);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `quantity` int(5) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `pid`, `date`, `quantity`) VALUES
(19, 25, 1385690887, 2),
(20, 26, 1385826059, 1),
(21, 12, 11111111, 1),
(22, 13, 11111111, 1),
(23, 25, 1386311391, 1),
(24, 10, 1386374532, 1),
(25, 8, 1386374533, 1),
(26, 8, 1385826059, 1),
(27, 9, 1385691041, 1),
(28, 10, 1385826059, 1),
(29, 11, 1385826059, 1),
(30, 12, 1385691041, 3),
(31, 13, 1385826059, 5),
(32, 14, 1385691041, 1),
(33, 15, 1385826059, 2),
(34, 16, 1385826059, 7),
(35, 17, 1385691041, 1),
(36, 18, 1385826059, 6),
(37, 19, 1385826059, 9),
(38, 20, 1385409875, 1),
(39, 21, 1385691041, 2),
(40, 22, 1385409875, 3),
(41, 23, 1385409875, 1),
(42, 24, 1385691041, 6),
(43, 25, 1385409875, 8),
(44, 20, 1385409875, 1),
(45, 21, 1385691041, 2),
(46, 22, 1385691041, 3),
(47, 23, 1385409875, 1),
(48, 24, 1385691041, 6),
(49, 25, 1385691041, 5),
(50, 14, 1385691041, 2),
(51, 15, 1385826059, 1),
(52, 16, 1385691041, 3),
(53, 17, 1385826059, 1),
(54, 20, 1386435877, 1),
(55, 8, 1386435877, 1),
(56, 8, 1386435997, 1),
(57, 8, 1386436089, 1),
(58, 8, 1386436131, 1),
(59, 8, 1386436421, 3),
(60, 8, 1386436522, 1),
(61, 8, 1386436589, 1);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `USERID` varchar(32) NOT NULL,
  `P_EMAIL` varchar(128) NOT NULL,
  `ACCOUNT_CREATED` int(10) NOT NULL,
  `LOCKED` tinyint(1) NOT NULL DEFAULT '0',
  `INACTIVE` tinyint(1) NOT NULL DEFAULT '1',
  `HASH` varchar(128) NOT NULL,
  `DATE_CREATED` int(10) NOT NULL,
  `ALGO` varchar(15) NOT NULL,
  `DYNAMIC_SALT` varchar(128) NOT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`USERID`, `P_EMAIL`, `ACCOUNT_CREATED`, `LOCKED`, `INACTIVE`, `HASH`, `DATE_CREATED`, `ALGO`, `DYNAMIC_SALT`) VALUES
('aleks', 'aleks@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('aleks3', 'aleks3@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('aleks4', 'aleks4@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('caleks', 'caleks@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('caleks3', 'caleks3@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('cdixon', 'cdixon@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('cdixon3', 'cdixon3@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('cjordan', 'cjordan@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('cjordan3', 'cjordan3@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('cpeter', 'cpeter@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('cpeter3', 'cpeter3@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('dixon', 'dixon@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('dixon3', 'dixon3@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('dixon4', 'dixon4@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('jack', 'rahul.chaudhary@owasp.org', 1382636773, 1, 0, '55dbd88705076de6aac4b27b53cb7495a3927f7eb076f34d7f0b10787767d12a11e8e1b36e39f5dcf93447749afd252eb4735d5900a9a6e77d859dcb7db91bf5', 1382636773, 'sha512', '9c44ce028fb26cf72681a3a0940dbbb508b8207c95121b1366e542fc2c66b3aac5dd7e8e6867b2d64ebf04c71fa123abc646cfb3f6cfc1bb4d9e2e0eade61715'),
('jacktheadmin', 'rahul300chaudhary400@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('jordan', 'jordan@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('jordan3', 'jordan3@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('jordan4', 'jordan4@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('ning', 'rahul300chaudhary400@gmail.com', 1385409875, 0, 0, 'b01b0e9af71634a23aa0cfe5df52dac2311ffd278714aa4233e07243085894cefc779756f9bfb966bd5cc747639d1d8cb82d7ab31f95b3627bc7bfd7dfbb0802', 1385409875, 'sha512', '6bc3c3af402313a8899cf8367bb5c86a94c70c2b570f348987ec1da72f195d9d8e9c4a225128593c23e2c22014ff402afd6519050bbb8a7f6bb82732a401a2ad'),
('ning123', 'rahul300chaudhary400@gmail.com', 1385622426, 0, 0, '5c49393e3fd7c2fe67dbc7d07e9ea46ae0231d3c9b0e3288e3d24355e3f02f12291d5fd3ef509841ee4e92c1878ee29633de22a09cca55b9ec270b48d56a1f99', 1385622426, 'sha512', 'cac9896e9284c39c0d34f2bddc29734bed0b86c40ff7aeea516534a12a2a0affd34c43125d518af1a0c4bd821779d3a46f172cc2b5a4fef46eda6537023496cb'),
('peter', 'peter@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('peter3', 'peter3@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('peter4', 'peter4@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b'),
('vemployee', 'vemployee@gmail.com', 1385691041, 0, 0, '5eadde61bdc3669f007bf6849091f110f5c599102d9eefa8b51826f9e0c3e9084602ffba3bfa7d79a77eed8a822b89cfd6504e77ef1968c2a82e4451da3f2995', 1385691041, 'sha512', 'a0c93442ba23051a59c705712a9e4fb9de67873d84b0c760ee1e8df98ca2ed254e58d12b47d24adab3069d5fe56ee56f3fd20d6041bce016907c0cbde131738b');

-- --------------------------------------------------------

--
-- Table structure for table `user_belong_store`
--

CREATE TABLE IF NOT EXISTS `user_belong_store` (
  `USERID` varchar(32) NOT NULL,
  `sid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`USERID`,`sid`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_belong_store`
--

INSERT INTO `user_belong_store` (`USERID`, `sid`) VALUES
('caleks', 2),
('cdixon', 2),
('cjordan', 2),
('cpeter', 2),
('caleks3', 3),
('cdixon3', 3),
('cjordan3', 3),
('cpeter3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_buy_transaction`
--

CREATE TABLE IF NOT EXISTS `user_buy_transaction` (
  `tid` int(11) NOT NULL DEFAULT '0',
  `USERID` varchar(32) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_buy_transaction`
--

INSERT INTO `user_buy_transaction` (`tid`, `USERID`) VALUES
(26, 'caleks'),
(27, 'caleks'),
(32, 'caleks'),
(33, 'caleks'),
(38, 'caleks'),
(39, 'caleks'),
(44, 'caleks'),
(45, 'caleks'),
(50, 'caleks3'),
(51, 'caleks3'),
(30, 'cjordan'),
(31, 'cjordan'),
(36, 'cjordan'),
(37, 'cjordan'),
(42, 'cjordan'),
(43, 'cjordan'),
(48, 'cjordan'),
(49, 'cjordan'),
(28, 'cpeter'),
(29, 'cpeter'),
(34, 'cpeter'),
(35, 'cpeter'),
(40, 'cpeter'),
(41, 'cpeter'),
(46, 'cpeter'),
(47, 'cpeter'),
(52, 'cpeter3'),
(53, 'cpeter3'),
(54, 'jacktheadmin'),
(55, 'jacktheadmin'),
(24, 'peter'),
(25, 'peter'),
(56, 'vemployee'),
(57, 'vemployee'),
(58, 'vemployee'),
(59, 'vemployee'),
(60, 'vemployee'),
(61, 'vemployee');

-- --------------------------------------------------------

--
-- Table structure for table `user_interested_product`
--

CREATE TABLE IF NOT EXISTS `user_interested_product` (
  `USERID` varchar(32) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`USERID`,`pid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_sell_product`
--

CREATE TABLE IF NOT EXISTS `user_sell_product` (
  `tid` int(11) NOT NULL DEFAULT '0',
  `USERID` varchar(32) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sell_product`
--

INSERT INTO `user_sell_product` (`tid`, `USERID`) VALUES
(32, 'aleks'),
(33, 'aleks'),
(34, 'aleks'),
(35, 'aleks'),
(36, 'aleks'),
(37, 'aleks'),
(50, 'aleks'),
(51, 'aleks'),
(52, 'aleks'),
(53, 'aleks'),
(19, 'jacktheadmin'),
(44, 'jordan3'),
(45, 'jordan3'),
(46, 'jordan3'),
(47, 'jordan3'),
(48, 'jordan3'),
(49, 'jordan3'),
(38, 'peter'),
(39, 'peter'),
(40, 'peter'),
(41, 'peter'),
(42, 'peter'),
(43, 'peter'),
(26, 'vemployee'),
(27, 'vemployee'),
(28, 'vemployee'),
(29, 'vemployee'),
(30, 'vemployee'),
(31, 'vemployee');

-- --------------------------------------------------------

--
-- Table structure for table `XUSER`
--

CREATE TABLE IF NOT EXISTS `XUSER` (
  `USERID` varchar(32) NOT NULL,
  `FIRST_NAME` varchar(40) DEFAULT NULL,
  `LAST_NAME` varchar(40) DEFAULT NULL,
  `type` enum('e','c-b','c-h') DEFAULT NULL,
  `DOB` int(10) DEFAULT NULL,
  `zip` int(11) NOT NULL,
  `streetaddr` text,
  PRIMARY KEY (`USERID`),
  KEY `zip` (`zip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `XUSER`
--

INSERT INTO `XUSER` (`USERID`, `FIRST_NAME`, `LAST_NAME`, `type`, `DOB`, `zip`, `streetaddr`) VALUES
('aleks', 'Aleks', 'Aleks', NULL, NULL, 15213, NULL),
('aleks3', 'aleks3', 'aleks3', NULL, NULL, 15213, NULL),
('aleks4', 'aleks4', 'aleks4', NULL, NULL, 15213, NULL),
('caleks', 'caleks', 'caleks', NULL, NULL, 15213, NULL),
('caleks3', 'caleks3', 'caleks3', NULL, NULL, 15213, NULL),
('cdixon', 'cdixon', 'cdixon', NULL, NULL, 15213, NULL),
('cdixon3', 'cdixon3', 'cdixon3', NULL, NULL, 15213, NULL),
('cjordan', 'cjordan', 'cjordan', NULL, NULL, 15213, NULL),
('cjordan3', 'cjordan3', 'cjordan3', NULL, NULL, 15213, NULL),
('cpeter', 'cpeter', 'cpeter', NULL, NULL, 15213, NULL),
('cpeter3', 'cpeter3', 'cpeter3', NULL, NULL, 15213, NULL),
('dixon', 'dixon', 'dixon', NULL, NULL, 15213, NULL),
('dixon3', 'dixon3', 'dixon3', NULL, NULL, 15213, NULL),
('dixon4', 'dixon4', 'dixon4', NULL, NULL, 15213, NULL),
('jacktheadmin', 'Jaehoon', 'Jung', 'e', NULL, 15213, NULL),
('jordan', 'jordan', 'jordan', NULL, NULL, 15213, NULL),
('jordan3', 'jordan3', 'jordan3', NULL, NULL, 15213, NULL),
('jordan4', 'jordan4', 'jordan4', NULL, NULL, 15213, NULL),
('peter', 'peter', 'peter', NULL, NULL, 15213, NULL),
('peter3', 'peter3', 'peter3', NULL, NULL, 15213, NULL),
('peter4', 'peter4', 'peter4', NULL, NULL, 15213, NULL),
('vemployee', 'vemployee', 'vemployee', 'e', NULL, 15213, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zipcode`
--

CREATE TABLE IF NOT EXISTS `zipcode` (
  `zip` int(11) NOT NULL DEFAULT '0',
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`zip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zipcode`
--

INSERT INTO `zipcode` (`zip`, `city`, `state`) VALUES
(10199, 'NY', 'NY'),
(11256, 'Brooklyn', 'NY'),
(12288, 'Boston', 'MA'),
(15213, 'Pittsburgh', 'PA'),
(15290, 'Pittsburgh', 'PA'),
(16515, 'Erie', 'PA'),
(17107, 'Harrisburg', 'PA'),
(19104, 'Philadelphia', 'PA'),
(20066, 'Washington', 'DC'),
(21233, 'Baltimore', 'MD'),
(23232, 'Richmond', 'VA'),
(27676, 'Raleigh', 'NC'),
(28228, 'Charlotte', 'NC'),
(29292, 'Columbia', 'SC'),
(32799, 'Mid-Florida', 'FL'),
(33122, 'Miami', 'FL'),
(33607, 'Tampa', 'FL'),
(43216, 'Columbus', 'OH'),
(44101, 'Cleveland', 'OH'),
(45234, 'Cincinnati', 'OH'),
(46298, 'Indianapolis', 'IN'),
(53201, 'Milwaukee', 'WI'),
(60607, 'Chicago', 'IL'),
(63155, 'St Louis', 'MO'),
(64108, 'Kansas City', 'MO'),
(72205, 'Little Rock', 'AR'),
(73198, 'Oklahoma City', 'OK'),
(75099, 'Coppell', 'TX'),
(76161, 'Fort Worth', 'TX'),
(77067, 'Houston', 'TX'),
(78284, 'San Antonio', 'TX'),
(80266, 'Denver', 'CO'),
(84199, 'Salt Lake City', 'UT'),
(85026, 'Phoenix', 'AZ'),
(87101, 'Albuquerque', 'NM'),
(89199, 'Las Vegas', 'NV'),
(90052, 'Los Angeles', 'CA'),
(92199, 'San Diego', 'CA'),
(94120, 'San Francisco', 'CA'),
(95799, 'West Sacramento', 'CA'),
(97208, 'Portland', 'OR'),
(98109, 'Seattle', 'WA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AUTH_TOKENS`
--
ALTER TABLE `AUTH_TOKENS`
  ADD CONSTRAINT `auth_tokens_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `businesscustomer`
--
ALTER TABLE `businesscustomer`
  ADD CONSTRAINT `businesscustomer_ibfk_3` FOREIGN KEY (`USERID`) REFERENCES `customer` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee_workin_store`
--
ALTER TABLE `employee_workin_store`
  ADD CONSTRAINT `employee_workin_store_ibfk_4` FOREIGN KEY (`sid`) REFERENCES `store` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `employee_workin_store_ibfk_5` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `homecustomer`
--
ALTER TABLE `homecustomer`
  ADD CONSTRAINT `homecustomer_ibfk_3` FOREIGN KEY (`USERID`) REFERENCES `customer` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PASSWORD`
--
ALTER TABLE `PASSWORD`
  ADD CONSTRAINT `PASSWORD_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`kkid`) REFERENCES `ptype` (`kkid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ptype`
--
ALTER TABLE `ptype`
  ADD CONSTRAINT `ptype_ibfk_1` FOREIGN KEY (`kid`) REFERENCES `pkind` (`kid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`manager`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SESSION`
--
ALTER TABLE `SESSION`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SESSION_DATA`
--
ALTER TABLE `SESSION_DATA`
  ADD CONSTRAINT `session_data_ibfk_1` FOREIGN KEY (`SESSION_ID`) REFERENCES `SESSION` (`SESSION_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_3` FOREIGN KEY (`rid`) REFERENCES `region` (`rid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `store_ibfk_4` FOREIGN KEY (`zip`) REFERENCES `zipcode` (`zip`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `store_ibfk_5` FOREIGN KEY (`storemanager`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `store_has_product`
--
ALTER TABLE `store_has_product`
  ADD CONSTRAINT `store_has_product_ibfk_3` FOREIGN KEY (`sid`) REFERENCES `store` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `store_has_product_ibfk_4` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`);

--
-- Constraints for table `user_belong_store`
--
ALTER TABLE `user_belong_store`
  ADD CONSTRAINT `user_belong_store_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_belong_store_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `store` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_buy_transaction`
--
ALTER TABLE `user_buy_transaction`
  ADD CONSTRAINT `user_buy_transaction_ibfk_3` FOREIGN KEY (`tid`) REFERENCES `transaction` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_buy_transaction_ibfk_4` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_interested_product`
--
ALTER TABLE `user_interested_product`
  ADD CONSTRAINT `user_interested_product_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_interested_product_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_sell_product`
--
ALTER TABLE `user_sell_product`
  ADD CONSTRAINT `user_sell_product_ibfk_3` FOREIGN KEY (`tid`) REFERENCES `transaction` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_sell_product_ibfk_4` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `XUSER`
--
ALTER TABLE `XUSER`
  ADD CONSTRAINT `xuser_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `xuser_ibfk_3` FOREIGN KEY (`zip`) REFERENCES `zipcode` (`zip`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
