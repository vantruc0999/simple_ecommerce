-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3366
-- Generation Time: Dec 11, 2022 at 10:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `Description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`, `Description`) VALUES
(1, 'Laptop', 'Máy tính xách tayyyy'),
(2, 'Smart Phone', 'Điện thoại thông minh'),
(4, 'Tablet', 'Máy tính bảng'),
(7, 'Gear PC', 'Mouse, Pad, Keyboard, ....');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `NameReceiver` varchar(50) DEFAULT NULL,
  `CustomerId` int(11) DEFAULT NULL,
  `PhoneReceiver` varchar(12) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `TotalPrice` float DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderId`, `Address`, `Email`, `NameReceiver`, `CustomerId`, `PhoneReceiver`, `Status`, `TotalPrice`, `CreatedAt`) VALUES
(2, 'Le Dinh Tham', 'trucdang9999@gmail.com', 'Truc Dang', 7, '0963234987', 'delivering', 12500000, '2022-12-11 05:37:06'),
(4, 'Le Dinh Tham', 'trucdang9999@gmail.com', 'Truc Dang', 6, '0963234987', 'cancel', 67000000, '2022-12-11 05:37:09'),
(6, 'Que Phu', 'nguyenxuanphuc@gmail.com', 'Phuc Nguyen Xuan', 6, '1234556788', 'done', 67000000, '2022-12-11 05:37:15'),
(7, 'Que Son', 'tinxomsong@gmail.com', 'Tin Nguyen Dinh', 6, '0987612345', 'done', 67000000, '2022-12-11 05:37:22'),
(8, 'Phan Thanh', 'admin@gmail.com', 'Tuyết Đặng', 7, '0908222111', 'canceled', 30500000, '2022-12-11 05:38:58'),
(9, 'Kinh Duong Vuong', 'longhoang2k1@gmail.com', 'Long Nguyen', 7, '1234666789', 'delivering', 179500000, '2022-12-11 05:37:38'),
(10, 'Le Dinh Tham', 'trucdang9999@gmail.com', 'Truc Dang', 7, '0963234987', 'pending', 28500000, '2022-12-10 11:37:29'),
(11, 'Le Dinh Tham', 'trucdang9999@gmail.com', 'Truc Dang', 7, '0963234987', 'cancel', 108500000, '2022-12-11 05:37:44'),
(12, 'Que Son', 'tinxomsong@gmail.com', 'Tin Nguyen Dinh', 7, '0987612345', 'pending', 54500000, '2022-12-10 20:07:55'),
(13, 'Phan Thanh', 'vantruc0409@gmail.com', 'asdasd', 7, '0908222111', 'canceled', 24000000, '2022-12-11 05:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders_product`
--

CREATE TABLE `orders_product` (
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_product`
--

INSERT INTO `orders_product` (`OrderId`, `ProductId`, `Quantity`) VALUES
(7, 22, 1),
(7, 23, 2),
(7, 24, 1),
(8, 23, 1),
(8, 24, 1),
(9, 21, 1),
(9, 22, 3),
(9, 23, 2),
(9, 24, 3),
(10, 21, 1),
(11, 22, 4),
(11, 23, 1),
(12, 22, 1),
(12, 23, 1),
(12, 24, 1),
(13, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Image` varchar(250) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `Description`, `Image`, `Price`, `CategoryId`) VALUES
(21, 'Iphone 14 pro max', '256GB, 16GB', 'images/9813236581670737318.jpg', 28500000, 2),
(22, 'Asus', 'Asus ROG', 'images/3237376991670592568.jpg', 24000000, 1),
(23, 'Oppo Reno 12', 'Dien thoai sep Tung', 'images/3893631081670592618.jpg', 12500000, 2),
(24, 'Ipad Pro', '128GB, 8GB', 'images/13624510711670592643.jpg', 18000000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `PhoneNumber` varchar(250) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Email`, `Password`, `FirstName`, `LastName`, `Address`, `PhoneNumber`, `is_admin`) VALUES
(6, 'trucdang9999@gmail.com', '$2y$10$nbIh.IJf4LE33UhIs2/jAegicGCSKjaZTAhpDPHp2O3.VP46czhBO', 'Truc', 'Dang', 'Le Dinh Tham', '0963234987', 1),
(7, 'thanhquang1310@gmail.com', '$2y$10$ZODJFp6uDo0V4iCwG7UT/OGKToDSlnXP9/rHjpyt.fJLurDdcFrGC', 'Tuyết', 'Đặng', '', '', 0),
(8, 'trucdang0409@gmail.com', '$2y$10$pKlLB1m2FPi.JJIGC6/r2.EwxCgm4movtqUrWkze5pvDxQgO65b5G', 'Truccccccccc', 'Nguyennnnnn', 'Le Dinh Tham', '0963234666', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `orders_product`
--
ALTER TABLE `orders_product`
  ADD PRIMARY KEY (`OrderId`,`ProductId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `orders_product`
--
ALTER TABLE `orders_product`
  ADD CONSTRAINT `orders_product_ibfk_1` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`OrderId`),
  ADD CONSTRAINT `orders_product_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
