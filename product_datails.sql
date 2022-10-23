-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2022 at 05:22 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_datails`
--

DROP TABLE IF EXISTS `product_datails`;
CREATE TABLE IF NOT EXISTS `product_datails` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` longtext,
  `price` int(11) DEFAULT NULL,
  `product_details` longtext,
  `product_image` longtext NOT NULL,
  `date` varchar(200) DEFAULT NULL,
  `STATUS` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_datails`
--

INSERT INTO `product_datails` (`product_id`, `product_name`, `price`, `product_details`, `product_image`, `date`, `STATUS`) VALUES
(11, 'Bat', 1800, 'bat', '1-2-short-handle-genius-cricket-bat-kashmir-willow-grade-2-short-original-imafgbh3vfzwdqxg.jpeg', '23-10-2022', '1'),
(10, 'Gun', 999, 'test', '29-inches-awm-sniper-rifle-toy-gun-with-1000-plastic-bb-bullets-original-imafpxunjgx7nmcu.jpeg', '23-10-2022', '1'),
(12, 'Watch', 2300, 'Watch', 'lcs-8188-lois-caron-original-imafq3k9ztzdkyhe.jpeg', '23-10-2022', '1'),
(13, 'football', 1670, 'football', '61R-VccFN9L._SX425_.jpg', '23-10-2022', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
