-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 08:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `image` varchar(6000) NOT NULL,
  `userid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `itemname`, `description`, `price`, `quantity`, `image`, `userid`) VALUES
(52, '123', '123', 132, 123, 'partial/', 16),
(53, '123', '123', 132, 123, 'partial/', 16),
(54, '123', '123', 132, 123, 'partial/', 1),
(97, 'newproduct', '1223', 123, 123, '', 16),
(99, 'newproduct', '1223', 123, 123, '', 16),
(100, 'newproduct', '1223', 123, 123, 'partial/', 16),
(101, 'newproduct', '1223', 123, 123, 'partial/', 16),
(102, 'newproduct', '1223', 123, 123, 'partial/', 16),
(103, 'newproduct', '1223', 123, 123, 'partial/', 16),
(104, 'newproduct', '1223', 123, 123, 'partial/', 16),
(105, 'newproduct', '1223', 123, 123, 'partial/', 16);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `itemname`, `description`, `quantity`, `price`, `image`) VALUES
(28, 'newproduct', '1223', 123, 123, 'partial/123.jpg'),
(42, '123', '123', 123, 132, 'partial/11.jpg'),
(57, 'pakistan1', 'pakistan1', 26, 26, 'partial/4af0469fc3e99652f9662cea93607c73.jpg'),
(102, 'pakistan', 'Karachi', 147, 147, 'partial/be fitted.jfif'),
(103, 'pakistan', 'Karachi', 147, 147, 'partial/be fitted.jfif'),
(104, 'lahore', 'nhi', 58, 500, 'partial/desktop-wallpaper-amoled-miles-morales.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_img`
--

CREATE TABLE `tbl_img` (
  `img_id` int(11) NOT NULL,
  `img_source` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_img`
--

INSERT INTO `tbl_img` (`img_id`, `img_source`) VALUES
(1, 'partial/'),
(2, 'partial/Poster.jpeg'),
(3, 'partial/'),
(4, 'partial/'),
(5, 'partial/Poster.jpeg'),
(6, 'partial/Poster.jpeg'),
(7, 'partial/Poster.jpeg'),
(8, 'partial/'),
(9, 'partial/'),
(10, 'partial/'),
(11, 'partial/'),
(12, 'partial/'),
(13, 'partial/'),
(14, 'partial/'),
(15, 'partial/'),
(16, 'partial/'),
(17, 'partial/'),
(18, 'partial/'),
(19, 'partial/123.jpg'),
(20, 'partial/Wallpaper 1.jpg'),
(21, 'partial/'),
(22, 'partial/'),
(23, 'partial/'),
(24, 'partial/'),
(25, 'partial/'),
(26, 'partial/'),
(27, 'partial/'),
(28, 'partial/'),
(29, 'partial/'),
(30, 'partial/'),
(31, 'partial/'),
(32, 'partial/'),
(33, 'partial/'),
(34, 'partial/'),
(35, 'partial/'),
(36, 'partial/'),
(37, 'partial/'),
(38, 'partial/'),
(39, 'partial/'),
(40, 'partial/'),
(41, 'partial/'),
(42, 'partial/'),
(43, 'partial/'),
(44, 'partial/'),
(45, 'partial/'),
(46, 'partial/'),
(47, 'partial/'),
(48, 'partial/'),
(49, 'partial/'),
(50, 'partial/'),
(51, 'partial/'),
(52, 'partial/'),
(53, 'partial/'),
(54, 'partial/'),
(55, 'partial/'),
(56, 'partial/'),
(57, 'partial/'),
(58, 'partial/'),
(59, 'partial/'),
(60, 'partial/'),
(61, 'partial/'),
(62, 'partial/'),
(63, 'partial/'),
(64, 'partial/'),
(65, 'partial/'),
(66, 'partial/'),
(67, 'partial/'),
(68, 'partial/'),
(69, 'partial/'),
(70, 'partial/'),
(71, 'partial/'),
(72, 'partial/'),
(73, 'partial/'),
(74, 'partial/'),
(75, 'partial/'),
(76, 'partial/'),
(77, 'partial/'),
(78, 'partial/'),
(79, 'partial/'),
(80, 'partial/'),
(81, 'partial/'),
(82, 'partial/'),
(83, 'partial/'),
(84, 'partial/'),
(85, 'partial/'),
(86, 'partial/'),
(87, 'partial/'),
(88, 'partial/'),
(89, 'partial/'),
(90, 'partial/'),
(91, 'partial/'),
(92, 'partial/'),
(93, 'partial/'),
(94, 'partial/'),
(95, 'partial/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(23) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES
(1, 'zeal', '123', '2024-02-02 17:26:58'),
(8, 'abd', '123', '2024-02-02 17:58:55'),
(10, 'Feroz', '147', '2024-02-02 18:05:03'),
(12, 'pak', '145', '2024-02-02 21:32:37'),
(16, 'user', '123', '2024-02-02 21:42:34'),
(22, 'hello', '123', '2024-02-02 21:46:49'),
(25, 'hello1', '12', '2024-02-05 21:12:25'),
(26, 'hello12', '123', '2024-02-08 20:40:52'),
(27, '', '', '2024-02-10 12:35:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_img`
--
ALTER TABLE `tbl_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_img`
--
ALTER TABLE `tbl_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`sno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
