-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 07:22 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` char(6) NOT NULL,
  `name` varchar(50) NOT NULL
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

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` char(5) NOT NULL,
  `customer_id` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `customer_id`) VALUES
(11, 'K0001', 'CUS001'),
(12, 'M0003', 'CUS001');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` char(1) NOT NULL,
  `type` varchar(5) NOT NULL
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

CREATE TABLE `contactus_submissions` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` char(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(10) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `phone`, `district_id`) VALUES
('CUS001', 'Dulmini Sandunika', 'Wijaya Rd, Kolonnawa.', 'duluweeraddana143@gmail.com', '0717191967', 0),
('CUS002', 'mashan', 'matara', 'mashan@gmail.com', '0253641258', 17);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` char(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Ampara'),
(2, 'Anuradhapura'),
(3, 'Badulla'),
(4, 'Batticaloa'),
(5, 'Colombo'),
(6, 'Galle'),
(7, 'Gampaha'),
(8, 'Hambantota'),
(9, 'Jaffna'),
(10, 'Kalutara'),
(11, 'Kandy'),
(12, 'Kegalle'),
(13, 'Kilinochchi'),
(14, 'Kurunegala'),
(15, 'Mannar'),
(16, 'Matale'),
(17, 'Matara'),
(18, 'Moneragala'),
(19, 'Mullaitivu'),
(20, 'Nuwara Eliya'),
(21, 'Polonnaruwa'),
(22, 'Puttalam'),
(23, 'Ratnapura'),
(24, 'Trincomalee'),
(25, 'Vavuniya');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` char(7) NOT NULL,
  `c_id` char(6) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` char(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `category_id` char(1) NOT NULL,
  `weight` double NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `brand_id`, `image`, `price`, `category_id`, `weight`, `location`) VALUES
('M0001', 'RUNNING TYLO SHOES', 'Iconic look and superior performance makes it ideal for everyday runner Textile and Mesh upper for lightweight and breathability. Lightstrike IMEVA midsole with the rubber outsole provides best durability.', 1, 'image/product/M0001.jpg', 15411.6, 'M', 0, '0'),
('W0001', 'Nike Air Max 270', 'The bold silhouette of Nike Air lifts the Nike Air Max 270 React to new heights, while the Nike React foam midsole delivers exceptional cushioning. Imagine all-day comfort with unstoppable style.', 2, 'image/product/W0001.jpg', 7628.6, 'W', 0, '0'),
('K0001', 'T8036 Blck 31 - Odel', 'The Nike Air VaporMax 2019 is covered in a translucent layer that shows you the inner layers of the shoe. VaporMax Air cushioning is also translucent to let you see the air you\'re standing on.', 3, 'image/product/K0001.jpg', 5360, 'K', 0, '0'),
('M0002', 'Men\'s Black Formal Shoe', 'Type of Wear - Formal Shoe\nColor - Black\nMaterial - Smooth Leather\nBrand - Bata\nPackage include 1X pair of shoes', 5, 'image/product/M0002.jpg', 3999, 'M', 0, '0'),
('M0003', 'Brown Casual Shoes', 'Pair these shoes with a denim shirt and chino shorts for a cool casual look.\r\nType:Casual shoes\r\nGender:Men\r\nUpper Material:Synthetic\r\nColour:Brown\r\nSole:TPR', 5, 'image/product/M0003.jpg', 1279, 'M', 0, '0'),
('M0004', 'North Star Black Ankle', 'Whether you\'re going out or staying in these casual shoes from Bata provide a versatile style with just the right amount of sophistication. Made from a soft and flexible synthetic upper material these shoes are great to be worn all-day.', 5, 'image/product/M0004.jpg', 1759, 'M', 0, '0'),
('M0005', 'Sunrice', 'Step up your style at the beach with our eye-catching color line tapered flip flops. Stylish and comfortable, these men\'s flip flops feature a contrast color two-tone design with a simple unique  print on the heel.', 3, 'image/product/M0005.jpg', 1450, 'M', 0, '0'),
('M0006', 'RUBBER CANVAS-BLACK', 'Natural Rubber Canvas shoes, Non hazardous, Eco product , Non slippery. When you wear a pair of Waves you will feel the difference.', 3, 'image/product/M0006.jpg', 2650, 'M', 0, '0'),
('M0007', 'Zoom Pegasus Turbo 2', 'The Nike Zoom Pegasus Turbo 2 Hakone is updated with a featherlight upper, while energy-returning foam brings revolutionary responsiveness to your long distance training.', 2, 'image/product/M0007.jpg', 20362, 'M', 0, '0'),
('W0002', 'PASIKUDA TRIBAL PRINTED', 'UPPER - RUBBER\nSOLE - EVA', 4, 'image/product/W0002.jpg', 250, 'W', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `p_id` char(5) NOT NULL,
  `u_id` char(6) NOT NULL,
  `r_num` int(11) NOT NULL,
  `r_text` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`p_id`, `u_id`, `r_num`, `r_text`) VALUES
('M0001', 'CUS001', 4, 'Good'),
('M0001', 'CUS002', 5, 'Very Good');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_price`
--

CREATE TABLE `shipping_price` (
  `location` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL,
  `max_distance` int(11) NOT NULL,
  `weight_price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` char(5) NOT NULL,
  `size` char(3) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `size`, `available`) VALUES
('M0001', '30', 15),
('M0001', '32', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` char(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `role`) VALUES
('ADM001', '202cb962ac59075b964b07152d234b70', 'admin'),
('CUS001', '202cb962ac59075b964b07152d234b70', 'customer'),
('CUS002', '202cb962ac59075b964b07152d234b70', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`product_id`),
  ADD KEY `c_id` (`customer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus_submissions`
--
ALTER TABLE `contactus_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `location` (`location`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`p_id`,`u_id`);

--
-- Indexes for table `shipping_price`
--
ALTER TABLE `shipping_price`
  ADD PRIMARY KEY (`location`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`,`size`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contactus_submissions`
--
ALTER TABLE `contactus_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
