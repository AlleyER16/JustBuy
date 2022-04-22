-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 12:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justbuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `AddressID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `AddressType` varchar(30) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(60) NOT NULL,
  `State` varchar(60) NOT NULL,
  `ZipCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`AddressID`, `UserID`, `AddressType`, `Address`, `City`, `State`, `ZipCode`) VALUES
(1, 1, 'Home', 'No , Bot street', 'Ikeja', 'Lagos', 23402);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `CartID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `BillAmount` float NOT NULL,
  `DateTimeAdded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`CartID`, `ProductID`, `Price`, `Quantity`, `BillAmount`, `DateTimeAdded`) VALUES
(1, 1, 50, 3, 150, 1650664937),
(1, 3, 150, 1, 150, 1650664925),
(1, 5, 250, 1, 250, 1650664931),
(2, 1, 50, 1, 50, 1650665059);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`BrandID`, `BrandName`) VALUES
(1, 'Gucci'),
(2, 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CartID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IsOrder` enum('0','1') DEFAULT NULL,
  `Address` int(11) DEFAULT NULL,
  `Paid` enum('0','1') NOT NULL,
  `PurchaseDate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`CartID`, `UserID`, `IsOrder`, `Address`, `Paid`, `PurchaseDate`) VALUES
(1, 1, NULL, 1, '1', 1650664990),
(2, 1, NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(2, 'Bags'),
(3, 'Shirts'),
(1, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `FeedbackID` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Price` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `Brand` int(11) NOT NULL,
  `Image` text DEFAULT NULL,
  `Category` int(11) NOT NULL,
  `LaunchDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Price`, `Stock`, `Brand`, `Image`, `Category`, `LaunchDate`) VALUES
(1, 'Dope kicks', 'These are nice product', 50, 10, 2, 'dc/products/1/99c10d6e5643821d4f9991a797050ce6.jpg', 1, 1649973600),
(2, 'Women\'s shirt', 'Nice product', 100, 20, 1, 'dc/products/2/product-1.jpg', 3, 1650060000),
(3, 'Lit bag', 'Nice', 150, 12, 1, 'dc/products/3/f1e8406b7eeea2bd2f8d444215882fc4.jpg', 2, 1649800800),
(4, 'Ladies handbag', 'This is a cool handbag', 80, 50, 2, 'dc/products/4/a7b8527b7d4011ee18702059a855b4b0.jpg', 2, 1649973600),
(5, 'Lit Kicks', 'Hmm', 250, 5, 1, 'dc/products/5/product-9.jpg', 1, 1649628000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(60) NOT NULL,
  `LastName` varchar(60) NOT NULL,
  `ProfilePicture` text DEFAULT NULL,
  `EmailAddress` varchar(100) DEFAULT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `ProfilePicture`, `EmailAddress`, `Password`) VALUES
(1, 'Rehoboth', 'Micah-Daniels', 'dc/users/1/49285bf3d01a2c4b9e85ae7baa58fae46.jpg', 'rehobothmicahdaniels@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `DateTimeAdded` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`UserID`, `ProductID`, `DateTimeAdded`) VALUES
(1, 1, 1650665052);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`UserID`,`AddressType`),
  ADD UNIQUE KEY `AddressID` (`AddressID`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`CartID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandID`),
  ADD UNIQUE KEY `BrandName` (`BrandName`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Address` (`Address`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Brand` (`Brand`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `EmailAddress` (`EmailAddress`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`UserID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`CartID`) REFERENCES `carts` (`CartID`),
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`Address`) REFERENCES `addresses` (`AddressID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Brand`) REFERENCES `brands` (`BrandID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`Category`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
