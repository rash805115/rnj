-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2013 at 02:31 PM
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

--
-- Dumping data for table `AUTH_TOKENS`
--

INSERT INTO `AUTH_TOKENS` (`AUTH_ID`, `USERID`, `DATE_CREATED`) VALUES
('26b2fda1eeea1dafa3970bab5067b5821011d65a7643bbb08fed2599f693eec1446fbee2ad724479e5156c89f371ed5722ba395db2effc45669045732a86fb1a', 'rash', 1382050547),
('3011c1d3f5852c9e950a2c723edbec34c3fdcbb208d66505de5b742959a79ff40a2580f3d86421a370870103f6a935aca154ed0226c1553f985ff6f4e942fb13', 'rash', 1382041225);

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
('rash', 'gg', 241);

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
('rash');

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
('rash', 'agaga', 352);

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
  `marriage` enum('m','s','d') DEFAULT NULL,
  `gender` enum('m','f') DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homecustomer`
--

INSERT INTO `homecustomer` (`USERID`, `marriage`, `gender`, `income`) VALUES
('rash', 'd', 'f', 34);

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
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PASSWORD`
--

INSERT INTO `PASSWORD` (`TEMP_PASS`, `USE_FLAG`, `TEMP_TIME`, `TOTAL_LOGIN_ATTEMPTS`, `LAST_LOGIN_ATTEMPT`, `FIRST_LOGIN_ATTEMPT`, `USERID`) VALUES
('8bf6a90306', 1, 0, 1, 1382234585, 1382234585, 'rash'),
('8f47155b0d97f3d01a00cec52fd461e50a7af8a2735c87fce6fe1eabb0bb49fd46ae2d8f8912279deb3cd4b8992e72bf46dd4f1509f9edd737de3be140db3baf', 0, 1382233239, 0, 0, 0, 'root'),
('2bff93df10', 1, 0, 0, 0, 0, 'jack');

-- --------------------------------------------------------

--
-- Table structure for table `pkind`
--

CREATE TABLE IF NOT EXISTS `pkind` (
  `kid` int(4) NOT NULL AUTO_INCREMENT,
  `kname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pkind`
--

INSERT INTO `pkind` (`kid`, `kname`) VALUES
(0, 'Electronics'),
(1, 'Clothes'),
(2, 'Books');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `kkid`, `pname`, `tinventory`, `price`, `imageurl`) VALUES
(8, 1, 'Asus Monitor', 1, 200, '7.jpg'),
(9, 1, 'LG Monitor', 1, 250, '8.jpg'),
(10, 1, 'Samsung Monitor', 1, 275, '10.jpg'),
(11, 3, 'Harry Potter and the Sorcerer''s Stone', 2, 14.99, '1.jpg'),
(12, 3, 'Harry Potter and the Chamber of Secrets', 5, 13.99, '2.gif'),
(13, 3, 'Harry Potter and the Prisoner of Azkaban', 3, 15.99, '3.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ptype`
--

INSERT INTO `ptype` (`kkid`, `kid`, `kkname`) VALUES
(1, 0, 'Monitor'),
(2, 0, 'Laptop'),
(3, 2, 'Fiction'),
(4, 2, 'Personal Care'),
(5, 2, 'Science & Technology');

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

--
-- Dumping data for table `SESSION`
--

INSERT INTO `SESSION` (`SESSION_ID`, `DATE_CREATED`, `LAST_ACTIVITY`, `USERID`) VALUES
('075ec715814f84c5961ca234399a4bd0f7b73b0a6f4be2723be8722298c065ea4a14133642f40da38767a67b20554f3ee60e8686e88ee2d153c190f364567c0a', 1382041225, 1382041225, 'rash'),
('0fa42527dc1115e8f992d1ca3dfc6f8a8152fbf07116d2fcfdb53115842adff2464192a6ecdeae049a8bd53da46c0115fb55f0d7ada204b12b0fa157ed4fc71a', 1382041266, 1382041266, 'rash'),
('25fa891b2e1d8c72b68addcf1909e6193e8a264db76c2001a2e62b9f1d52d0587c8a22fe47cd70ff96a6d0f60e31e45d51aa60d9cf5ad26d860728ac25e925e2', 1382045315, 1382045315, 'rash'),
('2788f524094d57324b4dd1ceaae4f62705ecd8b7003c045473bc0ce79777c01bb773d11465289a2ecc20e976b5e0fbf87ff8f8d08008a4d8ade63a407265f31f', 1382041271, 1382041271, 'rash'),
('2f8768811ae03b184cf7002db0702c25137af17c19fddea373711c388714cb5cf5a7b77d56f3e55bc6fc3ac64df8634c2ffe63f8e1e0560258dec2ba77feb559', 1382041186, 1382041186, 'rash'),
('350987978c4808a2d47e223aadd5b0b9ce6755c0b2e354114d4380b9189a006b0110161ffce91ce91faf3bfdb5fd68de937ec4ddbe96f96aabed5aa5bd60db26', 1382044641, 1382044641, 'rash'),
('396b08d47358f34fcab5d4b3860df8065be15b8d10afeb54716975e298c446d89ef0f50d79212f9df6bc942046b777dca98fdf1a326892760fac97754f9df4e4', 1382050995, 1382050995, 'rash'),
('4ad610ac988b268295690981e9281f17f6a00db4330a3022211712f450814cb40901182d7ae42c404a02609fbc514722b2b3822c13bc6abbd3b114807ce00be9', 1385407334, 1385407334, 'rash'),
('568b0e967e839825fb13029980c2f6f17c5435d55ff151d0ff530b4bc2db793b1d5cd569eff2bfcb17a8d9b501b11ad018e94fdfce06d3cc58264d7077b35fc3', 1381999778, 1381999778, 'rash'),
('5b9cda7d70bbb4f4822299049dbc0466fa88c6f81a35cc40fd898380d6cecb8342bdb8c72ebd0ccd917cbc76679b85fb32dc293551558eabf53a4cb6db2f06d8', 1382047006, 1382047006, 'rash'),
('6532106cec75b95900be5dc5346bad1c7579764029438bbeebd650abd37e5cbd18c4b45131bff53ad98ccac8e8591327a1e2cab5ad0df78c26fa3cb36b60bfc7', 1381999678, 1381999678, 'rash'),
('6b9f99b79142a60c5e2fdc322e2c517a2b35daf7ba0655f2ed01c70bdd3b0a2ac3a0fcf07c9cfa214e98bed3a6785985a9d3e23a552f835d77329f29e4a9edcd', 1382811781, 1382811781, 'rash'),
('8191dc91c2d9b14307117a4c13362cc698f43d15bc4026d4bc40cf4ae127e0e30d36b0b17a7dd76e086ff04547112fcb77d05930ae9d96cb7afd50e4eb6cca53', 1382044893, 1382044893, 'rash'),
('9d11bfc31367eafeb7c02187f4713436f6d9b3b6a0a57eed6d8b744829b6c492315a577c09a2febc6e50b4ad85a321200bd0e44267cd55570a70d6d219b57be4', 1382097240, 1382097240, 'rash'),
('aeb33f4ba8a072004db2d6317e9597520fb422a0c74c208947eedd29465ef2183c17c1978f2ddc81eac23b24239de00baa0e47b1fe35665946bfecf225ea0f75', 1381999575, 1381999575, 'rash'),
('b21d332d9eff86aae39437fb3ad01c846801b8f9d352b8ec06d00ef404cf5764e4bcbc1675d4b0809335a54c8255289bcc5b97bc164ea5df3f7d3c3dfdba5795', 1381999727, 1381999727, 'rash'),
('b622693dcb4a2bf900068751510f4d29683dd3d63041460c0659a0e94b87d150645d7e8811f280b4e1bde395e42fda59a3613ef7aeecd4bcc1355ee93cd0ad12', 1382041251, 1382041251, 'rash'),
('f770b481aeb079ec5a089fd4dc169a01df059f39774f3fa0ebd3969681f89c6c63f174a9724936d4fa5e016cf82589fdccec10a2f01de9fed379a2b9a8664ede', 1382046316, 1382046316, 'rash');

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

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`USERID`, `P_EMAIL`, `ACCOUNT_CREATED`, `LOCKED`, `INACTIVE`, `HASH`, `DATE_CREATED`, `ALGO`, `DYNAMIC_SALT`) VALUES
('jack', 'rahul.chaudhary@owasp.org', 1382636773, 1, 0, '55dbd88705076de6aac4b27b53cb7495a3927f7eb076f34d7f0b10787767d12a11e8e1b36e39f5dcf93447749afd252eb4735d5900a9a6e77d859dcb7db91bf5', 1382636773, 'sha512', '9c44ce028fb26cf72681a3a0940dbbb508b8207c95121b1366e542fc2c66b3aac5dd7e8e6867b2d64ebf04c71fa123abc646cfb3f6cfc1bb4d9e2e0eade61715'),
('owasp', 'rash@a.com', 1384763795, 0, 1, 'b20c4f48237727ffaf05ae94ce46a3e24dd3027fbb099706d3f9657d0bc6c8aca1bf1aadbc54670359affb920433ec28457727ef3b76d47e1e8740671c9522a7', 1384763795, 'sha512', '34c79dc83ca4a897e3a353988379b41168d21a4ddb172eda0ee017f9d3d57f14abcf3ad848544b5b3a0d5880c1575525e4596ab25159713259223d8a35b253f1'),
('rash', 'rahul.chaudhary@owasp.org', 1381998328, 0, 0, 'b6b253f620bf3afcd56933058e2bdb3b6c015ef474a2388fe0b9c969fe5fc70906441d3c499eb06520c513807c2afd4b7c4b47d0175319fc06e5c8300b750f63', 1382233652, 'sha512', '8b140860ae9a43caa783ce1a9aabdefc21613e8dd09b1425d0dc2c1f3ec2a2559ee5419a8e4496f5bce4583415ac3ddc8cd8727e9b8e3039352d8a1e6474c024'),
('root', 'rac130@pitt.edu', 1382232424, 0, 1, 'c99d0727ab89828f79d81689c7a53f95a34d92bccd133ae7a38354e8bc5b737c843cecccfa949b2fcce59c141f953f1d849dd5ef7c9b965594f84cb6313bb99a', 1382232424, 'sha512', '3963caa6707112b947e1425dd408b22e47f2b28f41ac9a5fdea301a47789ecfe6df2f9988a19edd9427227fe6addc79f23af061e7b6c241c79a82e2ffa623b8d');

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
  `FIRST_NAME` varchar(40) DEFAULT NULL,
  `LAST_NAME` varchar(40) DEFAULT NULL,
  `type` enum('e','c-b','c-h') DEFAULT NULL,
  `DOB` int(10) DEFAULT NULL,
  `zip` int(11) NOT NULL,
  `streetaddr` text,
  PRIMARY KEY (`USERID`),
  UNIQUE KEY `zip` (`zip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `XUSER`
--

INSERT INTO `XUSER` (`USERID`, `FIRST_NAME`, `LAST_NAME`, `type`, `DOB`, `zip`, `streetaddr`) VALUES
('rash', 'rah', 'cha', 'e', 13, 15213, 'agaga');

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
(15213, 'Pittsburgh', 'PA');

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
  ADD CONSTRAINT `XUSER_ibfk_1` FOREIGN KEY (`zip`) REFERENCES `zipcode` (`zip`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `XUSER_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `USER` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
