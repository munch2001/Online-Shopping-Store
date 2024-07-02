-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 05:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_store`
--
CREATE DATABASE IF NOT EXISTS `fashion_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fashion_store`;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `adminid` varchar(10) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adminid`, `adminName`, `password`, `email`) VALUES
('01', 'Dulanji', 'admin', 'dulanji@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `ItemID` varchar(10) NOT NULL,
  `Colour` varchar(20) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `ItemID`, `Colour`, `Size`, `Quantity`) VALUES
(1, 'A001', 'black', 'S', 1),
(2, 'W001', 'blue', 'L', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `feedback_id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `submitted_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_name`, `user_email`, `comment`, `submitted_date`) VALUES
(1, 'Malithi Bambarandage', 'malithi@gmail.com', 'Your website is so user-friendly and easy to navigate.					', '2023-06-11 17:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `Item_id` varchar(5) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_id`, `Item_name`, `Category`, `Price`, `Quantity`, `Description`, `Image`) VALUES
('A001', 'Tiara', 'Accessories', 500, 20, 'Floral tiara', '6485e32129fe4.jpeg'),
('K001', 'Sun suit', 'Kids', 1500, 30, 'Floral print sun suit', '6485e2cc1ad24.jpeg'),
('M001', 'Striped Shirt', 'Men', 2500, 25, 'Men striped shirt waist shorts', '6485e2a63f110.jpeg'),
('U001', 'Hoddie', 'Unisex', 3000, 20, 'Blue hoddie', '6485e2fc5dd8f.jpeg'),
('W001', 'Dress', 'Women', 1500, 30, 'Rose knot front dress', '6485e26349589.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `item_discount`
--

DROP TABLE IF EXISTS `item_discount`;
CREATE TABLE `item_discount` (
  `itemID` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `OldPrice` float(10,2) NOT NULL,
  `NewPrice` float(10,2) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_discount`
--

INSERT INTO `item_discount` (`itemID`, `name`, `OldPrice`, `NewPrice`, `image`) VALUES
('D0001', 'Crop Top', 3500.00, 2500.00, '6485e1e56a142.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userId` int(6) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `addressNo` varchar(10) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `postalCode` int(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstName`, `lastName`, `dob`, `email`, `phoneNo`, `userName`, `password`, `addressNo`, `street`, `city`, `district`, `postalCode`, `country`, `image`) VALUES
(1, 'Malithi', 'Bambarandage', '2004-02-11', 'malithi@gmail.com', 714425663, 'Malithi123', '$2y$10$wSrDLUlK677.kMRB6wL0Nu47aIYJoW34nYf0sYnQA2yau0kb0o/2W', '123', 'main Road', 'Malabe', 'Colombo', 10831, 'SL', '');

-- --------------------------------------------------------

--
-- Table structure for table `userconcern`
--

DROP TABLE IF EXISTS `userconcern`;
CREATE TABLE `userconcern` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(300) NOT NULL,
  `submitted_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `item_discount`
--
ALTER TABLE `item_discount`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `userconcern`
--
ALTER TABLE `userconcern`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userconcern`
--
ALTER TABLE `userconcern`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
