-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 07:45 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katrinas_bakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(11) NOT NULL,
  `time_placed` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','approved','preparing','delivering','delivered','completed','cancelled') NOT NULL DEFAULT 'pending',
  `customer_ID` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cardholder_name` varchar(50) NOT NULL,
  `cardholder_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `op_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_ID` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `product_name`, `price`, `stock`) VALUES
(1, 'Blueberry Cheesecake', 1499, 7),
(2, 'Redvelvet Cake', 1299, 10),
(3, 'Strawberry Shortcake', 1699, 10),
(4, 'Mocha Cake', 1399, 5),
(5, 'Triple chocolate Cake', 1199, 10),
(6, 'Sans Rival', 1999, 10),
(7, 'Carrot Cake', 999, 10),
(8, 'Brazo De Mercedes', 699, 7),
(9, 'Ube Macapuno Cake', 1899, 8),
(10, 'Filled Croissant', 30, 10),
(11, 'Macarons', 50, 7),
(12, 'Glazed Donuts', 30, 8),
(13, 'Baguette', 90, 10),
(14, 'Premium Muffins', 65, 10),
(15, 'Assorted Cupcakes', 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products_photos`
--

CREATE TABLE `products_photos` (
  `product_ID` int(11) NOT NULL,
  `image` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_photos`
--

INSERT INTO `products_photos` (`product_ID`, `image`) VALUES
(1, '202211160852p1_blueberry.jpg'),
(2, '202211161513p2_Redvelvet_cake.jpg'),
(3, '202211161514p5_strawberryshortcake.jpg'),
(4, '202211161514p6_mocha_cake.jpg'),
(5, '202211161515p3_triple_chocolate_cake.jpg'),
(6, '202211161515p9_sans_rival.jpg'),
(7, '202211161516p4_carrotcake'),
(8, '202211161516p8_brazo_de_mercedes.jpg'),
(9, '202211161517p14_ube_macapuno.jpg'),
(10, '202211161517p12_croissant.webp'),
(11, '202211161517p7_macaroon.jpg'),
(12, '202211161518p11_glazed donut.jpg'),
(13, '202211161518bread.jpg'),
(14, '202211161519p13_chocolate chip_muffins.webp'),
(15, '202211161519p13 cupcake.jpg'),
(16, '202211210219gitbash.png');

-- --------------------------------------------------------

--
-- Table structure for table `recent_orders`
--

CREATE TABLE `recent_orders` (
  `product_ID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recent_orders`
--

INSERT INTO `recent_orders` (`product_ID`, `quantity`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `customer_ID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`customer_ID`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(3, 'admin', 'admin', 'admin@gmail.com', '$2y$10$RWJwg6pTsBjJahCjaBeGYOXcclAr91h4vrarHfgBLd78szYHn11Ky', 'admin'),
(10, 'kriss', 'santos', 'asdasd@yahoo.com', '$2y$10$r/fiCGNfddqVtHkBtvq66ummo.0K3/OhESNMxPmb1HU8UIXGbCQCm', 'user'),
(11, 'Patricia', 'santos', 'patricia@gmail.com', '$2y$10$jsamj2TXWNCCGOb9Nlbhiu/0CoAFKCMK0nMXHvlXwn3Tooi65YYJe', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`op_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`customer_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `op_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
