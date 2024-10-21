-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 10:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorder`
--
CREATE DATABASE IF NOT EXISTS `foodorder` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `foodorder`;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Mobile` varchar(250) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Name`, `Email`, `Mobile`, `Subject`, `Message`) VALUES
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('BIRJU KUMAR', 'ckj40856@gmail.com', '8903079750', 'asd', 'asdasdasd'),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'asd', 'hfgdsfsx'),
('Geoffrey Hopper', 'kivo@mailinator.com', '22', 'Eum libero at eos id', 'Sit ea dolor aut velit qui rem distinctio Vero in fugiat commodi omnis incididunt');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id` char(36) DEFAULT uuid()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `fullname`, `email`, `contact`, `address`, `password`, `id`) VALUES
('Ahairwe', 'jordan', 'tions@gmail.com', '0775767776', 'Bnada', '123', '0d5b4d03-8f00-11ef-b4be-68f728f17435'),
('amp', 'ampaire', 'isaacfengampaire@gmail.com', '0775767776', 'Bukoto', '123', '0d5b7808-8f00-11ef-b4be-68f728f17435'),
('davis', 'davis atu', 'davis@gmail.com', '0772314503', 'banda', '1234', '0d5b7928-8f00-11ef-b4be-68f728f17435'),
('kezynus', 'Cheyenne Carlson', 'myvylimed@mailinator.com', 'Aliquam animi autem', 'A consectetur possim', 'Pa$$w0rd!', '2812eb80-8f00-11ef-b4be-68f728f17435'),
('sedipovace', 'Joshua Maddox', 'fenir@mailinator.com', 'Ea molestias molesti', 'Ut necessitatibus co', 'Pa$$w0rd!', '75a303b0-8f01-11ef-b4be-68f728f17435'),
('timo', 'sseka timo', 'timothyssekabira2000@gmail.com', '0772314502', 'kireka', '123', '0d5b7c4b-8f00-11ef-b4be-68f728f17435');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `ai_id` int(11) NOT NULL,
  `id` char(36) NOT NULL DEFAULT uuid() COMMENT 'tracking id showed to clients',
  `order_date` date NOT NULL,
  `customer_id` char(36) DEFAULT NULL,
  `payment_status` char(30) DEFAULT 'pending',
  `payment_method` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`ai_id`, `id`, `order_date`, `customer_id`, `payment_status`, `payment_method`) VALUES
(1, '085b6b9b-8f05-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(19, '096ac84b-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(20, '096b7b87-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(21, '18230553-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(22, '1824a27b-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(31, '26cdc0f2-8f0a-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(10, '3034df64-8f06-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(23, '340ac869-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(24, '340b7adc-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(25, '40a21c57-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(26, '40a3c222-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(12, '47b7a0f4-8f07-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(27, '49599372-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(28, '495a7dec-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(34, '4c0bb78d-8f1c-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', 'Cash On Delivery'),
(29, '55223f1a-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(30, '552397bc-8f09-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(35, '67de2083-8f1e-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(36, '6d859695-8f1e-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(37, '6e44e361-8f1e-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(38, '6ef62e1e-8f1e-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(39, '6fcd3b60-8f1e-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', 'Cash On Delivery'),
(40, 'a4884589-8f1e-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(2, 'b83f1a70-8f01-11ef-b4be-68f728f17435', '2024-10-02', '1', 'pending', NULL),
(33, 'c39d6758-8f0c-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(13, 'd32ee113-8f08-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(14, 'd42df510-8f08-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(15, 'd4c8cc58-8f08-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(16, 'd5566db4-8f08-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(17, 'd5d3fcfe-8f08-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(18, 'd6517e79-8f08-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL),
(3, 'e923708b-8f04-11ef-b4be-68f728f17435', '2024-10-20', '2812', 'pending', NULL),
(4, 'ef9b0261-8f04-11ef-b4be-68f728f17435', '2024-10-20', '2812', 'pending', NULL),
(5, 'f3747eac-8f04-11ef-b4be-68f728f17435', '2024-10-20', '2812', 'pending', NULL),
(6, 'f418d9cc-8f04-11ef-b4be-68f728f17435', '2024-10-20', '2812', 'pending', NULL),
(32, 'fe7f4501-8f0b-11ef-b4be-68f728f17435', '2024-10-20', '2812eb80-8f00-11ef-b4be-68f728f17435', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `F_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `images_path` varchar(200) NOT NULL,
  `options` varchar(10) NOT NULL DEFAULT 'ENABLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`F_ID`, `name`, `price`, `description`, `R_ID`, `images_path`, `options`) VALUES
(62, 'Spring Rolls', 6500, 'Delicious Spring Rolls by Dragon Hut, Delhi. Order now!!!', 2, 'images/Spring_Rolls.jpg', 'ENABLE'),
(66, 'Tea', 20000, 'The simple elixir of tea is of our natural world.', 4, 'images/tea.jpg', 'DISABLE'),
(69, 'Coffee', 25000, 'concentrated coffee made by forcing pressurized water through finely ground coffee beans.', 2, 'images/coffee.jpg', 'ENABLE'),
(74, 'Pizza', 20000, 'Good and Tasty ', 2, 'Pizza.jpg', 'DISABLE'),
(75, 'French Fries', 6600, 'Pure Veg and Tasty.', 2, 'frenchfries.jpg', 'DISABLE'),
(77, 'Pizza', 20000, 'Pure Vegetable and Tasty.', 2, 'images/Pizza.jpg', 'ENABLE'),
(78, 'French Fries', 7500, 'Pure Veg and Tasty.', 2, 'images/frenchfries.jpg', 'ENABLE'),
(83, 'Fresh Beef Katogo', 7000, 'Fresh Beef Katogo', 7, 'images/download.jpg', 'ENABLE'),
(89, 'Chicken Pileau', 30000, 'Chicken with Rice', 15, 'images/670ea087b4094.jpeg', 'ENABLE'),
(90, 'Beef Pileau', 30000, 'Beef and Rice', 15, 'images/670ea14fced35.jpeg', 'ENABLE'),
(91, 'Chicken Curry', 35000, 'Chicken Pieces', 15, 'images/670ea17b78627.jpeg', 'ENABLE'),
(92, 'chicken curry', 35000, 'chicken pieces', 15, 'images/670feadfcc6e4.jpeg', 'ENABLE');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `username`, `fullname`, `email`, `contact`, `address`, `password`, `role`) VALUES
(11, 'admin', 'Ssekabila Timo', 'tiom@gmail.com', '0788306302', 'Kireka', '123', 'superadmin'),
(3, 'ckumar', 'Chandan Kumar', 'ckj40856@gmail.com', '9487810674', 'Pondicherry University, SRK HOSTEL ROOM NUMBER-59,', 'Ckumar123', 'manager'),
(12, 'fuxypyziho', 'Brandon Christensen', 'buluq@mailinator.com', '0750084912', 'Eos reprehenderit o', 'Pa$$w0rd!', NULL),
(5, 'isaac', 'ampaire', 'isaacfengampaire@outlook.com', '0775767776', 'Bukoto', 'isaac07liz', 'manager'),
(6, 'roshanraj07', 'Roshan Raj', 'roshan@gmail.com', '9541258761', 'Bihar', 'roshan', 'manager'),
(7, 'timo', 'Ssekabila Timo', 'tiom@gmail.com', '07', 'Kireka', '123', 'manager'),
(8, 'waryxadecy', 'Cruz Clarke', 'bacojukote@mailinator.com', '0765876543', 'Eiusmod veniam elig', 'Pa$$w0rd!', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `F_ID` int(30) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_date` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `customer_order_id` int(11) DEFAULT NULL,
  `status` char(20) NOT NULL DEFAULT 'waiting...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `F_ID`, `foodname`, `price`, `quantity`, `order_date`, `username`, `R_ID`, `customer_order_id`, `status`) VALUES
(136, 90, 'Beef Pileau', 30000, 1, '2024-10-15', 'amp', 15, NULL, 'delivered'),
(137, 89, 'Chicken Pileau', 30000, 4, '2024-10-16', 'davis', 15, NULL, 'delivered'),
(138, 69, 'Coffee', 25000, 1, '2024-10-20', 'amp', 2, NULL, 'waiting...'),
(139, 77, 'Pizza', 20000, 1, '2024-10-20', 'amp', 2, NULL, 'waiting...'),
(140, 69, 'Coffee', 25000, 1, '2024-10-20', 'kezynus', 2, 19, 'waiting...'),
(141, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 20, 'waiting...'),
(142, 69, 'Coffee', 25000, 1, '2024-10-20', 'kezynus', 2, 21, 'waiting...'),
(143, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 22, 'waiting...'),
(144, 69, 'Coffee', 25000, 1, '2024-10-20', 'kezynus', 2, 23, 'waiting...'),
(145, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 24, 'waiting...'),
(146, 69, 'Coffee', 25000, 1, '2024-10-20', 'kezynus', 2, 25, 'waiting...'),
(147, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 26, 'waiting...'),
(148, 69, 'Coffee', 25000, 1, '2024-10-20', 'kezynus', 2, 27, 'waiting...'),
(149, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 28, 'waiting...'),
(150, 69, 'Coffee', 25000, 1, '2024-10-20', 'kezynus', 2, 29, 'waiting...'),
(151, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 30, 'waiting...'),
(152, 69, 'Coffee', 25000, 1, '2024-10-20', 'kezynus', 2, 31, 'waiting...'),
(153, 92, 'chicken curry', 35000, 1, '2024-10-20', 'kezynus', 15, 32, 'delivered'),
(154, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 33, 'waiting...'),
(155, 92, 'chicken curry', 35000, 1, '2024-10-20', 'kezynus', 15, 33, 'delivered'),
(156, 83, 'Fresh Beef Katogo', 7000, 1, '2024-10-20', 'kezynus', 7, 33, 'waiting...'),
(157, 69, 'Coffee', 25000, 1, '2024-10-20', 'kezynus', 2, 34, 'waiting...'),
(158, 90, 'Beef Pileau', 30000, 1, '2024-10-20', 'kezynus', 15, 34, 'waiting...'),
(159, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 35, 'waiting...'),
(160, 78, 'French Fries', 7500, 1, '2024-10-20', 'kezynus', 2, 35, 'waiting...'),
(161, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 36, 'waiting...'),
(162, 78, 'French Fries', 7500, 1, '2024-10-20', 'kezynus', 2, 36, 'waiting...'),
(163, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 37, 'waiting...'),
(164, 78, 'French Fries', 7500, 1, '2024-10-20', 'kezynus', 2, 37, 'waiting...'),
(165, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 38, 'waiting...'),
(166, 78, 'French Fries', 7500, 1, '2024-10-20', 'kezynus', 2, 38, 'waiting...'),
(167, 77, 'Pizza', 20000, 1, '2024-10-20', 'kezynus', 2, 39, 'waiting...'),
(168, 78, 'French Fries', 7500, 1, '2024-10-20', 'kezynus', 2, 39, 'waiting...');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `R_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `M_ID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`R_ID`, `name`, `email`, `contact`, `address`, `M_ID`) VALUES
(2, 'Mwebesa Hotel', 'roshan@restaurant.com', '9887546821', 'Katete', 'roshanraj07'),
(4, 'Food Exploria', 'ckj40856@gmail.com', '09487810674', 'Mbaguta Road', 'ckumar'),
(7, 'Agip Motel', 'vila@mailinator.com', 'Aspernatur ut libero', 'Garage Street', 'waryxadecy'),
(9, 'Isaac', 'isaacfengampaire@outlook.com', '0775767776', 'Bukoto', 'isaac'),
(15, 'Maama', 'maam@bandagmail.com', '0775767877', 'Banda Kyambogo', 'timo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`),
  ADD KEY `idx_customer_id` (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ai_id` (`ai_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`F_ID`,`R_ID`),
  ADD KEY `R_ID` (`R_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `manager_id` (`manager_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `F_ID` (`F_ID`),
  ADD KEY `username` (`username`),
  ADD KEY `R_ID` (`R_ID`),
  ADD KEY `customer_order_id` (`customer_order_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`R_ID`),
  ADD UNIQUE KEY `M_ID_2` (`M_ID`),
  ADD KEY `M_ID` (`M_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `ai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `F_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `R_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `fk_food_restaurants` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`),
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customer` FOREIGN KEY (`username`) REFERENCES `customer` (`username`),
  ADD CONSTRAINT `fk_orders_food` FOREIGN KEY (`F_ID`) REFERENCES `food` (`F_ID`),
  ADD CONSTRAINT `fk_orders_restaurants` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `food` (`F_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`customer_order_id`) REFERENCES `customer_order` (`ai_id`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `fk_restaurants_manager` FOREIGN KEY (`M_ID`) REFERENCES `manager` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`M_ID`) REFERENCES `manager` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
