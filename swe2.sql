-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 02:39 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swe2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`, `admin_id`) VALUES
('montasser', 'abdo@mail.com', '$2y$10$6Mf/Gg1T9oItMKbbE.S59.d5PY2Gmx6X3X21VUje9fcJMZ7q4HxXW', 1),
('mango', 'mango@mail.com', '$2y$10$TMQoZ55qQt4RsAdzv8RhReRlZA98cgJE.cVpTvA0ayMpC9QNlIz8y', 2),
('Montasser', 'montasser@mail.com', '$2y$10$mGBpAxvqGi.bSbUjI98Tlu/latFSchqNVV2pXkukwvJpz.3ldqxd.', 3),
('ezz', 'ezz@mail.com', '$2y$10$lJUOB8Zg4aR4bZyG5BTiAO32dtDVi.X1XWGkUX2DGvz/q/xWcomZm', 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'vegetables'),
(2, 'fruits'),
(5, 'herbs'),
(6, 'fast food');

-- --------------------------------------------------------

--
-- Table structure for table `coustomer_shipping`
--

CREATE TABLE `coustomer_shipping` (
  `shipping_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(150) NOT NULL,
  `hospital_address` varchar(300) NOT NULL,
  `disease` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_customer`
--

CREATE TABLE `hospital_customer` (
  `hospiatl_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `data_created` varchar(300) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `quantity`, `data_created`, `total_cost`, `customer_id`) VALUES
(2, 1, '12-28-2021 11:44 pm', 50, 1),
(3, 1, '12-29-2021 12:00 am', 25, 2),
(4, 1, '12-29-2021 12:06 am', 25, 2),
(5, 1, '12-29-2021 12:07 am', 100, 2),
(6, 1, '12-29-2021 12:31 am', 12, 1),
(7, 1, '12-29-2021 11:38 am', 12, 3),
(8, 1, '12-29-2021 02:27 pm', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` double NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(11) NOT NULL,
  `image_file_name` varchar(300) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `image_file_name`, `disease`, `category_id`, `quantity`) VALUES
(21, 'apple', 25, 'product-image/c97f9d09cf77f728cb3eff087a20f8efproduct-8.jpg', 'headache', 0, 25);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_info`
--

CREATE TABLE `shipping_info` (
  `shipping_id` int(11) NOT NULL,
  `shipping_type` varchar(150) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `user_email` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`user_email`, `product_name`, `cart_id`) VALUES
('swe2@mail.com', 'mango', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` varchar(70) NOT NULL,
  `session` varchar(200) NOT NULL,
  `phone_number` varchar(300) NOT NULL,
  `cradit_card` int(11) NOT NULL,
  `customerName` varchar(150) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `IMG_URL` varchar(500) NOT NULL DEFAULT 'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.pngall.com%2Fwp-content%2Fuploads%2F5%2FProfile-Avatar-PNG.png&f=1&nofb=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `email`, `role`, `session`, `phone_number`, `cradit_card`, `customerName`, `password`, `address`, `IMG_URL`) VALUES
(1, 'user@mail.com', 'customer', '', '01146401344', 0, 'Montasser', '$2y$10$6RRUE4zSWD67LKH85WSdPODLtnydSNt.xfev47eNTRIsM6t4B.BXa', '6 october ,giza,egypt', 'user-image/a3e3786763f99cf4a7c633335f160f27IMG-20201118-WA0022.jpg'),
(2, 'user2@mail.com', 'admin', '', '17345454780', 0, 'Montasser', '$2y$10$epEdQnyjoMU2xNse9odVduJRpbi3KIokqT7tVBzBgRb6Em7OyVBKe', 'e', 'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.pngall.com%2Fwp-content%2Fuploads%2F5%2FProfile-Avatar-PNG.png&f=1&nofb=1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `shipping_info`
--
ALTER TABLE `shipping_info`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
