-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2017 at 09:40 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restorentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmaster`
--

DROP TABLE IF EXISTS `adminmaster`;
CREATE TABLE IF NOT EXISTS `adminmaster` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmaster`
--

INSERT INTO `adminmaster` (`username`, `password`, `isActive`) VALUES
('shubham', 'shubham887', 1),
('rahul', 'rahul887', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

DROP TABLE IF EXISTS `customerinfo`;
CREATE TABLE IF NOT EXISTS `customerinfo` (
  `customer_name` varchar(15) NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `table_no` int(15) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`customer_name`, `customer_id`, `table_no`) VALUES
('Rahul Panchal', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `ordermaster`
--

DROP TABLE IF EXISTS `ordermaster`;
CREATE TABLE IF NOT EXISTS `ordermaster` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(4) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `is_active` bit(1) NOT NULL DEFAULT b'1',
  `order_status` tinyint(1) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordermaster`
--

INSERT INTO `ordermaster` (`order_id`, `product_id`, `customer_id`, `is_active`, `order_status`, `quantity`) VALUES
(78, 8, '1', b'1', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

DROP TABLE IF EXISTS `productmaster`;
CREATE TABLE IF NOT EXISTS `productmaster` (
  `ProdctID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `RatePerProduct` int(11) NOT NULL,
  `IsAvaliable` bit(1) NOT NULL DEFAULT b'0',
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ProdctID`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`ProdctID`, `ProductName`, `Quantity`, `RatePerProduct`, `IsAvaliable`, `IsActive`, `CreatedDate`) VALUES
(8, 'Bhuna Kebab Meal', 15, 200, b'1', b'1', '2017-11-19 14:46:01'),
(7, 'Amritsari Chole Rice Box', 15, 148, b'1', b'1', '2017-11-19 14:46:01'),
(9, 'Bombay Special Sandwich', 15, 128, b'1', b'1', '2017-11-19 14:46:01'),
(10, 'Butter Chicken', 15, 298, b'1', b'1', '2017-11-19 14:46:01'),
(11, 'Chicken Mughlai ', 15, 268, b'1', b'1', '2017-11-19 14:46:01'),
(12, 'Chicken Tikka Biryani', 15, 258, b'1', b'1', '2017-11-19 14:46:01'),
(13, 'Choco Lava Cake', 15, 78, b'1', b'1', '2017-11-19 14:46:01'),
(14, 'Chole Tikki Meal', 15, 198, b'1', b'1', '2017-11-19 14:46:01'),
(15, 'Cookie & Cream', 15, 212, b'1', b'1', '2017-11-19 14:46:01'),
(16, 'Dal Makhni Meal', 15, 178, b'1', b'1', '2017-11-19 14:46:01'),
(17, 'Dal Makhni Rice Box', 15, 148, b'1', b'1', '2017-11-19 14:46:01'),
(18, 'Farmers Market Salad', 15, 178, b'1', b'1', '2017-11-19 14:46:01'),
(19, 'Fiery Paneer Sandwich', 15, 158, b'1', b'1', '2017-11-19 14:46:01'),
(20, 'Firangi Subz Biryani', 15, 198, b'1', b'1', '2017-11-19 14:46:01'),
(21, 'Grilled Patty Sandwich', 15, 98, b'1', b'1', '2017-11-19 14:46:01'),
(22, 'Grilled Tikki Box', 15, 188, b'1', b'1', '2017-11-19 14:46:01'),
(23, 'Herbed Chicken Salad', 15, 228, b'1', b'1', '2017-11-19 14:46:01'),
(24, 'Kadhai Paneer ', 15, 248, b'1', b'1', '2017-11-19 14:46:01'),
(25, 'Kebab Peshawari Box', 15, 178, b'1', b'1', '2017-11-19 14:46:01'),
(26, 'Murg Dum Biryani', 15, 228, b'1', b'1', '2017-11-19 14:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `table_master`
--

DROP TABLE IF EXISTS `table_master`;
CREATE TABLE IF NOT EXISTS `table_master` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `status` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_master`
--

INSERT INTO `table_master` (`id`, `status`) VALUES
(1, b'1'),
(2, b'1'),
(3, b'1'),
(4, b'1'),
(5, b'1'),
(6, b'1'),
(7, b'1'),
(8, b'1'),
(9, b'1'),
(10, b'1'),
(11, b'1'),
(12, b'1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
