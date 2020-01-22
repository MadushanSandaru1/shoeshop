-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 03:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` char(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`) VALUES
('ADM001', 'Dulmini Weeraddana');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Odel'),
(4, 'DSI'),
(5, 'Bata'),
(6, 'Waves');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE IF NOT EXISTS `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `image`) VALUES
(1, 'image/1.jpg'),
(2, 'image/2.jpg'),
(3, 'image/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` char(5) NOT NULL,
  `c_id` char(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`),
  KEY `c_id` (`c_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` char(1) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`) VALUES
('K', 'Kids'),
('M', 'Men'),
('W', 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `contactus_submissions`
--

CREATE TABLE IF NOT EXISTS `contactus_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` char(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `phone`) VALUES
('CUS001', 'Dulmini Sandunika', 'Wijaya Rd, Kolonnawa.', 'duluweeraddana143@gmail.com', '0717191967');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` char(7) NOT NULL,
  `c_id` char(6) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` char(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `category_id` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `brand_id`, `image`, `price`, `category_id`) VALUES
('M0001', 'RUNNING TYLO SHOES', 'Iconic look and superior performance makes it ideal for everyday runner Textile and Mesh upper for lightweight and breathability. Lightstrike IMEVA midsole with the rubber outsole provides best durability.', 1, 'image/product/M0001.jpg', 15411.6, 'M'),
('W0001', 'Nike Air Max 270', 'The bold silhouette of Nike Air lifts the Nike Air Max 270 React to new heights, while the Nike React foam midsole delivers exceptional cushioning. Imagine all-day comfort with unstoppable style.', 2, 'image/product/W0001.jpg', 7628.6, 'W'),
('K0001', 'T8036 Blck 31 - Odel', 'The Nike Air VaporMax 2019 is covered in a translucent layer that shows you the inner layers of the shoe. VaporMax Air cushioning is also translucent to let you see the air you''re standing on.', 3, 'image/product/K0001.jpg', 5360, 'K'),
('M0002', 'Men''s Black Formal Shoe', 'Type of Wear - Formal Shoe\nColor - Black\nMaterial - Smooth Leather\nBrand - Bata\nPackage include 1X pair of shoes', 5, 'image/product/M0002.jpg', 3999, 'M'),
('M0003', 'Brown Casual Shoes', 'Pair these shoes with a denim shirt and chino shorts for a cool casual look.\r\nType:Casual shoes\r\nGender:Men\r\nUpper Material:Synthetic\r\nColour:Brown\r\nSole:TPR', 5, 'image/product/M0003.jpg', 1279, 'M'),
('M0004', 'North Star Black Ankle', 'Whether you''re going out or staying in these casual shoes from Bata provide a versatile style with just the right amount of sophistication. Made from a soft and flexible synthetic upper material these shoes are great to be worn all-day.', 5, 'image/product/M0004.jpg', 1759, 'M'),
('M0005', 'Sunrice', 'Step up your style at the beach with our eye-catching color line tapered flip flops. Stylish and comfortable, these men''s flip flops feature a contrast color two-tone design with a simple unique  print on the heel.', 3, 'image/product/M0005.jpg', 1450, 'M'),
('M0006', 'RUBBER CANVAS-BLACK', 'Natural Rubber Canvas shoes, Non hazardous, Eco product , Non slippery. When you wear a pair of Waves you will feel the difference.', 3, 'image/product/M0006.jpg', 2650, 'M'),
('M0007', 'Zoom Pegasus Turbo 2', 'The Nike Zoom Pegasus Turbo 2 Hakone is updated with a featherlight upper, while energy-returning foam brings revolutionary responsiveness to your long distance training.', 2, 'image/product/M0007.jpg', 20362, 'M'),
('W0002', 'PASIKUDA TRIBAL PRINTED', 'UPPER - RUBBER\nSOLE - EVA', 4, 'image/product/W0002.jpg', 250, 'W');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` char(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `role`) VALUES
('ADM001', '202cb962ac59075b964b07152d234b70', 'admin'),
('CUS001', '202cb962ac59075b964b07152d234b70', 'customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
