-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 05:13 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinemobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`) VALUES
(16, 'Samsung'),
(20, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `cart_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`cart_id`, `user_id`, `product_id`) VALUES
(103, 0, 7),
(105, 15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `ID` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`ID`, `email`, `address`, `contact`) VALUES
(1, 'ishwarkhadka@kcc.edu.np', 'Koteshwor Kathmandu', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`id`, `name`, `email`, `message`) VALUES
(4, 'Ishwar Khadka', 'ishwarkhadka245@gmail.com', 'Thank you so much for the product. It is always appreciated'),
(5, 'Yubraj Khadka', 'yubrajkhadka@kcc.edu.np', 'Your contact number please!!'),
(6, 'Ishwar Khadka', 'khadkaishwar1234562@gmail.com', 'Prabhat Kirna');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `productid` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `orderdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `ram` int(255) NOT NULL,
  `hdd` int(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `screen_size` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `camera` int(225) NOT NULL,
  `discounted_price` int(11) NOT NULL,
  `front_camera` varchar(255) NOT NULL,
  `launch_year` date DEFAULT NULL,
  `battery` int(11) NOT NULL,
  `fingerprint` tinyint(1) NOT NULL,
  `gyro` tinyint(1) NOT NULL,
  `proximity` tinyint(1) NOT NULL,
  `accelemetter` tinyint(1) NOT NULL,
  `lidar` tinyint(1) NOT NULL,
  `magnetometer` tinyint(1) NOT NULL,
  `gprs` tinyint(1) NOT NULL,
  `rating` float NOT NULL,
  `number_of_rating` int(11) NOT NULL,
  `display_discription` varchar(225) NOT NULL,
  `color` varchar(255) NOT NULL,
  `number_of_sells` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `brand`, `product_name`, `product_price`, `ram`, `hdd`, `processor`, `screen_size`, `os`, `image`, `camera`, `discounted_price`, `front_camera`, `launch_year`, `battery`, `fingerprint`, `gyro`, `proximity`, `accelemetter`, `lidar`, `magnetometer`, `gprs`, `rating`, `number_of_rating`, `display_discription`, `color`, `number_of_sells`, `stock`) VALUES
(5, 'Samsung', 'Samsung Galaxy A03', 16000, 3, 32, 'UI 3.1 core', '6.23', 'Anroid11', './assets/products/refined/Samsung-Galaxy-A03s.jpg', 13, 14000, '5', '2021-09-08', 5000, 1, 1, 0, 0, 0, 0, 1, 4.5, 30, 'PLS TFT LCD', 'Black,Blue,White', 15, 5),
(6, 'iphone', 'iphone-11', 124000, 4, 256, 'A13 bionic', '6.1', 'ios 15', './assets/products/refined/iPhone-11-.jpg', 12, 120000, '12', '2019-01-01', 3110, 0, 1, 1, 1, 1, 1, 1, 5, 50, 'LIquid Retina Display 326ppi', 'Purple,White,Red,Green,Black', 10, 10),
(7, 'Redmi', 'Redmi 9C', 14999, 3, 64, 'Octa-core', '6.53', 'Android 10', './assets/products/refined/Redmi-9C.jpg', 13, 12000, '5', '2020-07-08', 5000, 1, 1, 1, 0, 0, 0, 1, 3.5, 70, 'HD+ 20:9', 'Yellow', 40, 10),
(8, 'Xiaomi', 'Mi-11 lite', 35000, 6, 128, 'qualcomm snapdragon', '6.55', 'Android11', './assets/products/refined/xiaomi-mi-11.jpg', 16, 30000, '16', '2018-06-12', 4250, 1, 1, 1, 1, 0, 1, 1, 4.6, 80, 'Amoled dot display', 'Peach pink, Bubblegum Blue', 30, 5),
(9, 'Poco', 'poco c31', 15999, 4, 64, 'Octa-Core', '6.53', 'Android 10', './assets/products/refined/Poco-C31-.jpg', 13, 14999, '5', '2021-09-08', 5000, 1, 1, 1, 0, 0, 1, 1, 4.2, 90, 'Lcd Display', 'Royal Blue, Shadow Grey', 8, 12),
(10, 'OnePlus', 'OnePlus 8T', 85999, 12, 256, 'Octa-Core', '6.38', 'OxygenOS11', './assets/products/refined/OnePlus-8T-.jpg', 48, 85999, '16', '2019-01-02', 4500, 1, 1, 1, 1, 0, 1, 1, 4.7, 98, 'Fluid Amoled panel', 'Aquamarine green,lunarsilver', 5, 5),
(11, 'Vivo', 'Vivo V21', 50000, 8, 128, 'MediaTek Dimensity 800U', '6.77', 'Android11', './assets/products/refined/Vivo-V21-.jpg', 64, 50000, '44', '2020-10-07', 4000, 1, 1, 1, 0, 0, 0, 1, 4, 60, 'AmoledPanel', 'Sunset Dazzle,Arctic White', 10, 3),
(12, 'Oppo', 'OppoF17', 43990, 8, 128, 'octacore', '6.44', 'ColorOS7.2', './assets/products/refined/OPPO-F17.jpg', 16, 43000, '16', '2020-01-15', 4015, 1, 1, 0, 0, 0, 0, 1, 3.5, 50, 'AmoledPanel', 'Magic Blue, Matte Black', 20, 8),
(13, 'Nokia', 'NokiaG-10', 16999, 4, 64, 'MediaTek Helio G25', '6.5', 'Android11', './assets/products/refined/Nokia-G10-.jpg', 13, 15000, '8', '2021-01-20', 5050, 0, 1, 1, 1, 0, 1, 1, 2.5, 30, 'IPS LCD', 'Blue,Dusk', 15, 5),
(14, 'Nokia', 'Nokia G20', 19999, 4, 64, 'MediaTek Helio G35', '6.5', 'Android11', './assets/products/refined/Nokia-G20.jpg', 48, 18000, '8', '2021-08-10', 5050, 0, 0, 0, 0, 0, 0, 1, 3, 40, 'LCD Pannel', 'Night,Glacer', 13, 2),
(15, 'Samsung', 'Samsung Galaxy-Z-Flip', 229999, 12, 512, 'octa-core', '7.6', 'Android11', './assets/products/refined/Samsung-Galaxy-Z-Flip-.jpg', 12, 229999, '10', '2021-01-05', 4400, 1, 1, 1, 1, 0, 1, 1, 2.5, 20, 'Super Amoled', 'Phantom Black,Phantom green', 18, 5),
(16, 'iphone', 'iphone13promax', 274990, 6, 1024, 'Six-core A15 Bionic', '6.7', 'ios 15', './assets/products/refined/Pic 8 apple-iphone-13-01.jpg', 12, 274990, '12', '2020-09-08', 4352, 0, 1, 1, 1, 1, 0, 1, 4, 7, 'promotion 120 super retina led display', 'sierra blue', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `name`, `address`, `email`, `contact`, `password`, `question`, `answer`) VALUES
(2, 'Ishwar Khadka', 'purano thimi', 'ishwarkhadka245@gmail.com', '9828039221', '$2y$10$4vSXIN.kEH2jpdOoK/6UNuivUOBKAbgBbrmUSVhujE/wSUZvrQlv6', '', ''),
(4, 'Ishwar Khadka', 'purano thimi', 'ishwarkhadka24@gmail.com', '9828039221', '$2y$10$Wj.lj29rjhLcR9KlQa.4p.HCxI3jfdiXUEEhoTzw2vaFaCKYfObsC', '', ''),
(7, 'Ishwar Khadka', 'purano thimi', 'ishwarkhadka2@gmail.com', '9828039221', '$2y$10$gmC7m0o3y1fVrw5vw7iyj.73tIQmZHtc4hs9vFi/gCOHe/VHfZRLe', '', ''),
(15, 'Ishwar Khadka', 'purano thimi', 'ishwarkhadka@gmail.com', '9828039221', '$2y$10$H5iH2SJ3SymHNNKEwT7xSOnJNDRcoupp7duBk.V2tjvzebxCEwP9W', '', ''),
(21, 'Ishwar Khadka', 'purano thimi', 'ishwarkhadka000@gmail.com', '9828039221', '$2y$10$R99knD93ZyQAgxO6MTpRKegvkYFQX0TBBpmDrNTxnZ5TMzmRh49zy', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_table`
--

CREATE TABLE `wishlist_table` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist_table`
--

INSERT INTO `wishlist_table` (`cart_id`, `user_id`, `product_id`) VALUES
(104, 15, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD UNIQUE KEY `user` (`username`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_table_ibfk_1` (`product_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist_table`
--
ALTER TABLE `wishlist_table`
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `wishlist_table_ibfk_1` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD CONSTRAINT `cart_table_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_table` (`id`);

--
-- Constraints for table `wishlist_table`
--
ALTER TABLE `wishlist_table`
  ADD CONSTRAINT `wishlist_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
