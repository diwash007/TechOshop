-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 01:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `uid` int(10) DEFAULT NULL,
  `itemid` int(10) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(50,2) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `brand`, `image`, `details`) VALUES
(1, ' iPhone 12', '799.00', 'Apple', 'https://www.gizmochina.com/wp-content/uploads/2020/05/iphone-12-pro-max-family-hero-all-600x600.jpg', '6.1-inch OLED display<br>A14 Bionic chip<br>256GB storage'),
(2, 'iPhone 12 mini', '729.00', 'Apple', 'https://fdn2.gsmarena.com/vv/pics/apple/apple-iphone-12-mini-2.jpg', '5.4-inch Super Retina XDR display<br>Dual 12MP camera system<br>256 GB storage'),
(5, 'iPhone 11', '699.00', 'Apple', 'https://www.gizmochina.com/wp-content/uploads/2019/09/Apple-iPhone-11-1.jpg', 'A13 Bionic chip<br>\r\nsmart HDR<br>\r\n128GB storage<br>'),
(6, 'Samsung Galaxy S21 Ultra', '999.99', 'Samsung', 'https://www.mytrendyphone.no/images/Samsung-Galaxy-S21-Ultra-5G-128GB-Phantom-Black-8806090887505-15012021-01-p.jpg', '5G support<br>\r\nUnlocked device<br>\r\n128GB storage'),
(7, 'Samsung Galaxy A52 5G', '499.00', 'Samsung', 'https://www.mytrendyphone.eu/images/Samsung-Galaxy-A52-5G-Duos-128GB-Black-8806090874017-31032021-01-p.jpg', 'Factory unlocked<br>\r\n64MP camera<br>\r\n128GB storage'),
(8, 'Poco X3 NFC', '221.99', 'Xiaomi', 'https://www.mytrendyphone.eu/images/Xiaomi-Poco-X3-NFC-64GB-Grey-6941059650454-29092020-01-p.jpg', '120 Hz display<br>\r\nSnapdragon 732G<br>\r\nRAM: 6GB<br>\r\nStorage: 64GB'),
(9, 'Redmi Note 10 Pro', '234.99', 'Xiaomi', 'https://cdn.shopify.com/s/files/1/0231/3627/2464/products/Redmi-Note-10-reveal---product-image-01_550ac964-37a5-4331-8b6e-26719e87a94a.png', '108MP main camera<br>\r\n120Hz display<br>\r\nstorage: 64GB'),
(10, 'Find X3 Pro', '999.99', 'Oppo', 'https://img.router-switch.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/o/p/oppo-find-x3-5g_1.jpg', 'CPU: Snapdragon 888<br>\r\nRAM: 8GB<br>\r\nStorage: 256GB'),
(11, 'Find X2 Pro', '999.99', 'Oppo', 'https://www.gizmochina.com/wp-content/uploads/2020/03/Oppo-Find-X2-Pro-500x500.jpg', 'CPU: Snapdragon 865<br>\r\nRAM: 12GB<br>\r\nStorage: 256GB\r\n'),
(12, 'Huawei P30 Pro', '600.00', 'Other', 'https://www.gizmochina.com/wp-content/uploads/2019/03/huawei_p30_pro-480x480.png', 'CPU: Kirin 980<br>\r\nRAM: 8GB<br>\r\nScreen size: 6.47-inch');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `oid` int(10) DEFAULT NULL,
  `itemid` int(10) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `uid` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pass_reset`
--

CREATE TABLE `pass_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `uid` int(10) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `mdate` datetime DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `date` date NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `date`, `role`, `country`, `address`) VALUES
(1, 'random', 'stranger', 'user', 'user@user.com', '$2y$04$GK6eEBu9MXz6I5CZk4xgKutdniLa7atFpCYJtEiS/y.9mZaLjdK8e', '2021-08-05', 'user', '', ''),
(2, 'God', 'Mode', 'admin', 'a@a.com', '$2y$04$KkjUOfdoEQEgM.0cXh5OeOQrRM94Y/86FOw.U290Q/1OLcwFwaBL.', '2021-08-05', 'admin', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass_reset`
--
ALTER TABLE `pass_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pass_reset`
--
ALTER TABLE `pass_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
