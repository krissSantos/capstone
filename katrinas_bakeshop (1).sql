-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 02:48 AM
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
-- Table structure for table `customers_feedback`
--

CREATE TABLE `customers_feedback` (
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` enum('Comment/Suggestion','Followup','Complain') NOT NULL DEFAULT 'Comment/Suggestion',
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_feedback`
--

INSERT INTO `customers_feedback` (`full_name`, `email`, `subject`, `message`) VALUES
('kriss', 'asdasd@yahoo.com', 'Comment/Suggestion', 'asdasd'),
('kriss', 'asdasd@yahoo.com', 'Followup', '21312l3j lk;12jel;k ashjd;ilkahs d 12 e412e564564dqw40 40 0da50sd40 A0S5 D04AS D04A0S46 A0S46 0A4S6 40AS6D 04AS40D 6A40SD 04021 0D104 D0D0AS5D 0A5SD0 5A0SD 5A5SD0\r\n AS50\r\nD 45ASD AS40 D40AS5D 4A5SD45AS45DAS456\r\nD');

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
(1, 'Blueberry Cheesecake', 1499, 10),
(2, 'Redvelvet Cake', 1299, 8),
(3, 'Strawberry Shortcake', 1699, 10),
(4, 'Mocha Cake', 1399, 10),
(5, 'Triple chocolate Cake', 1199, 10),
(6, 'Sans Rival', 1999, 10),
(7, 'Carrot Cake', 999, 10),
(8, 'Brazo De Mercedes', 699, 10),
(9, 'Ube Macapuno Cake', 1899, 10),
(10, 'Filled Croissant', 30, 10),
(11, 'Macarons', 50, 10),
(12, 'Glazed Donuts', 30, 10),
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
(16, '202211210219gitbash.png'),
(20, '202211211125gitbash.png'),
(21, '202211230134mastercard.png');

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
(3, 'admin', 'admin', 'admin@gmail.com', '$2y$10$RWJwg6pTsBjJahCjaBeGYOXcclAr91h4vrarHfgBLd78szYHn11Ky', 'admin');

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
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `op_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
