-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2013 at 12:42 AM
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
  `annualincome` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `USERID` varchar(32) NOT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `USERID` varchar(32) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_workin_store`
--

CREATE TABLE IF NOT EXISTS `employee_workin_store` (
  `employeeid` varchar(32) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  KEY `sid` (`sid`),
  KEY `employeeid` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homecustomer`
--

CREATE TABLE IF NOT EXISTS `homecustomer` (
  `USERID` varchar(32) NOT NULL,
  `marriage` char(1) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pkind`
--

CREATE TABLE IF NOT EXISTS `pkind` (
  `kid` int(11) NOT NULL DEFAULT '0',
  `kname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL DEFAULT '0',
  `kid` int(11) NOT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `tinventory` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `imageurl` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `kid` (`kid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `tid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `XUSER`
--

CREATE TABLE IF NOT EXISTS `XUSER` (
  `USERID` varchar(32) NOT NULL,
  `S_EMAIL` varchar(128) DEFAULT NULL,
  `FIRST_NAME` varchar(40) DEFAULT NULL,
  `LAST_NAME` varchar(40) DEFAULT NULL,
  `DOB` int(10) DEFAULT NULL,
  `zip` int(11) NOT NULL,
  `streetaddr` text,
  PRIMARY KEY (`USERID`),
  UNIQUE KEY `zip` (`zip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `AUTH_TOKENS`
--
ALTER TABLE `AUTH_TOKENS`
  ADD CONSTRAINT `AUTH_TOKENS_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `businesscustomer`
--
ALTER TABLE `businesscustomer`
  ADD CONSTRAINT `businesscustomer_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `employee_workin_store_ibfk_5` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `employee_workin_store_ibfk_4` FOREIGN KEY (`sid`) REFERENCES `store` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `homecustomer`
--
ALTER TABLE `homecustomer`
  ADD CONSTRAINT `homecustomer_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PASSWORD`
--
ALTER TABLE `PASSWORD`
  ADD CONSTRAINT `PASSWORD_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`kid`) REFERENCES `pkind` (`kid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`manager`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SESSION`
--
ALTER TABLE `SESSION`
  ADD CONSTRAINT `SESSION_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SESSION_DATA`
--
ALTER TABLE `SESSION_DATA`
  ADD CONSTRAINT `SESSION_DATA_ibfk_1` FOREIGN KEY (`SESSION_ID`) REFERENCES `SESSION` (`SESSION_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_5` FOREIGN KEY (`storemanager`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `store_ibfk_3` FOREIGN KEY (`rid`) REFERENCES `region` (`rid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `store_ibfk_4` FOREIGN KEY (`zip`) REFERENCES `zipcode` (`zip`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `store_has_product`
--
ALTER TABLE `store_has_product`
  ADD CONSTRAINT `store_has_product_ibfk_4` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `store_has_product_ibfk_3` FOREIGN KEY (`sid`) REFERENCES `store` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`);

--
-- Constraints for table `user_belong_store`
--
ALTER TABLE `user_belong_store`
  ADD CONSTRAINT `user_belong_store_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `store` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_belong_store_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_buy_transaction`
--
ALTER TABLE `user_buy_transaction`
  ADD CONSTRAINT `user_buy_transaction_ibfk_4` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_buy_transaction_ibfk_3` FOREIGN KEY (`tid`) REFERENCES `transaction` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_interested_product`
--
ALTER TABLE `user_interested_product`
  ADD CONSTRAINT `user_interested_product_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_interested_product_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_sell_product`
--
ALTER TABLE `user_sell_product`
  ADD CONSTRAINT `user_sell_product_ibfk_4` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_sell_product_ibfk_3` FOREIGN KEY (`tid`) REFERENCES `transaction` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `XUSER`
--
ALTER TABLE `XUSER`
  ADD CONSTRAINT `XUSER_ibfk_1` FOREIGN KEY (`zip`) REFERENCES `zipcode` (`zip`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `XUSER_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
