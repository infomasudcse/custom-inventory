-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2014 at 03:11 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `megal_plastic`
--
CREATE DATABASE IF NOT EXISTS `megal_plastic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `megal_plastic`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `people_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_type_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `comment` tinytext NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expense_type`
--

CREATE TABLE IF NOT EXISTS `expense_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `expense_type`
--

INSERT INTO `expense_type` (`id`, `name`, `status`) VALUES
(3, 'Transport', 1),
(4, 'Salary', 1),
(5, 'Electricity bill', 1),
(6, 'Salary', 1),
(7, 'Ccc', 1),
(8, 'Ciao', 1),
(9, 'Cccccccc', 1),
(10, 'Cc', 1),
(11, 'Cccdc', 1),
(12, 'Cccdc', 1),
(13, 'Cccdc', 1),
(14, 'Cccdc', 1),
(15, 'Cccdc', 1),
(16, 'Cccc', 1),
(17, 'Vvvv', 1),
(18, 'Vvcvcc', 1),
(19, 'Ccc', 1),
(20, 'Cvb', 1),
(21, 'X', 1),
(22, 'C', 1),
(23, 'Cccdsss', 1),
(24, 'Vcvcv', 1),
(25, 'Vbvbvb', 1),
(26, 'Vbvbvbdsv', 1),
(27, 'Vbvbvbdsvccc', 1),
(28, 'Tt', 1),
(29, 'Rrr', 1),
(30, 'Rrrrrrr', 1),
(31, 'Fffff', 1),
(32, 'Fff', 1),
(33, 'Rr', 1),
(34, 'F', 1),
(35, 'T', 1),
(36, 'Tf', 1),
(37, 'Ffff', 1),
(38, 'Cccc', 1),
(39, 'Vvvv', 1),
(40, 'Ggg', 1),
(41, 'Rrr', 1),
(42, 'Vvvvv', 1),
(43, 'Fff', 1),
(44, 'Ttt', 1),
(45, 'Rr', 1),
(46, 'Ccc', 1),
(47, 'G', 1),
(48, 'F', 1),
(49, 'F', 1),
(50, 'P', 1),
(51, 'T', 1),
(52, 'D', 1),
(53, 'F', 1),
(54, 'H', 1),
(55, 'F', 1),
(56, 'T', 1),
(57, 'G', 1),
(58, 'G', 1),
(59, 'H', 1),
(60, 'F', 1),
(61, 'S', 1),
(62, 'F', 1),
(63, 'F', 1),
(64, 'F', 1),
(65, 'R', 1),
(66, 'R', 1),
(67, 'F', 1),
(68, 'Ff', 1),
(69, 'Dd', 1),
(70, 'G', 1),
(71, 'G', 1),
(72, 'T', 1),
(73, 'D', 1),
(74, 'Weds', 1),
(75, 'Wedstg', 1),
(76, 'G', 1),
(77, 'Gttt', 1),
(78, 'Gtttc', 1),
(79, 'Yyy', 1),
(80, 'Yyytttt', 1),
(81, 'Ttt', 1),
(82, 'Y', 1),
(83, 'Fff', 1),
(84, 'T', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_people_id` int(11) NOT NULL,
  `from_people_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(60) NOT NULL,
  `address` tinytext NOT NULL,
  `contact` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `sub_tot_price` int(11) NOT NULL,
  `invoice` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE IF NOT EXISTS `revenue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `revenue_type_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `comment` tinytext NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `revenue_type`
--

CREATE TABLE IF NOT EXISTS `revenue_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_tot_price` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
