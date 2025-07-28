-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 07:02 PM
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
-- Database: `clothrentaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--
DROP TABLE IF EXISTS `addresses`;

CREATE TABLE `addresses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `userId` INT(11) DEFAULT NULL,
  `billingAddress` VARCHAR(255) DEFAULT NULL,
  `billingCity` VARCHAR(150) DEFAULT NULL,
  `billingState` VARCHAR(100) DEFAULT NULL,
  `billingPincode` INT(11) DEFAULT NULL,
  `billingCountry` VARCHAR(100) DEFAULT NULL,
  `shippingAddress` VARCHAR(300) DEFAULT NULL,
  `shippingCity` VARCHAR(150) DEFAULT NULL,
  `shippingState` VARCHAR(100) DEFAULT NULL,
  `shippingPincode` INT(11) DEFAULT NULL,
  `shippingCountry` VARCHAR(100) DEFAULT NULL,
  `postingDate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `userId`, `billingAddress`, `billingCity`, `billingState`, `billingPincode`, `billingCountry`, `shippingAddress`, `shippingCity`, `shippingState`, `shippingPincode`, `shippingCountry`, `postingDate`) VALUES
(9, 1, 'O-908, GHU, Block-7', 'Ghaziabad', 'UP', 789456, 'India', 'O-908, GHU, Block-7', 'Ghaziabad', 'UP', 789456, 'India', '2024-03-15 07:08:27'),
(10, 1, 'O-908, GHU, Block-7', 'Ghaziabad', 'UP', 789456, 'India', 'O-908, GHU, Block-7', 'Ghaziabad', 'UP', 789456, 'India', '2024-03-20 06:15:31'),
(11, 2, 'A 123 XYZ Apartment', 'New Delhi', 'Delhi', 110092, 'India', 'A 123 XYZ Apartment', 'New Delhi', 'Delhi', 110092, 'India', '2024-04-04 01:44:23'),
(12, 3, 'G-890', 'Udaipur', 'Rajasthan ', 221005, 'India', 'G-890', 'Udaipur', 'Rajasthan ', 221005, 'India', '2024-04-08 11:46:15'),
(13, 4, 'A 1234 Xyz Apartment', 'New Delhi', 'Delhi', 110092, 'India', 'A 1234 Xyz Apartment', 'New Delhi', 'Delhi', 110092, 'India', '2024-04-11 12:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productQty` int(11) DEFAULT NULL,
  `BookingFromDate` varchar(250) DEFAULT NULL,
  `BookingToDate` varchar(250) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userID`, `productId`, `productQty`, `BookingFromDate`, `BookingToDate`, `postingDate`) VALUES
(10, 1, 2, 1, '2024-04-01', '2024-04-02', '2024-04-01 07:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`, `createdBy`) VALUES
(1, 'Ethnic', 'Ethnic wear refers to traditional clothing and attire that is deeply rooted in the cultural heritage of specific regions or communities', '2024-03-12 04:54:45', NULL, 1),
(2, 'Western', 'Western wear is a category of men\'s and women\'s clothing which derives its unique style from the clothes worn in the 19th century Wild West', '2024-03-12 04:55:15', NULL, 1),
(3, 'Party', 'Party wear dresses', '2024-03-12 04:55:40', NULL, 1),
(4, 'Casual', 'Casual Dresses', '2024-03-12 04:58:59', NULL, 1),
(5, 'Formal', 'Formal Dresses', '2024-03-12 04:59:16', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderNumber` bigint(12) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  `totalAmount` decimal(10,2) DEFAULT NULL,
  `txnType` varchar(200) DEFAULT NULL,
  `txnNumber` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(120) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderNumber`, `userId`, `addressId`, `totalAmount`, `txnType`, `txnNumber`, `orderStatus`, `orderDate`) VALUES
(14, 610214066, 1, 9, 10000.00, 'e-Wallet', '12456', 'Dispatched', '2024-03-15 07:21:53'),
(15, 656572498, 1, 10, 3000.00, 'Internet Banking', '12456', NULL, '2024-03-20 06:15:46'),
(16, 327827652, 1, 10, 5000.00, 'e-Wallet', '5623', NULL, '2024-03-20 13:13:36'),
(17, 300670107, 1, 2, 145000.00, 'Internet Banking', '12456', NULL, '2024-03-20 13:20:59'),
(18, 987780800, 1, 1, 70000.00, 'Internet Banking', '12456', NULL, '2024-03-20 13:29:50'),
(19, 525762589, 1, 2, 5000.00, 'e-Wallet', '12456', NULL, '2024-03-20 13:38:57'),
(20, 706921006, 1, 1, 6000.00, 'e-Wallet', '12456', NULL, '2024-03-20 13:40:49'),
(21, 722569117, 1, 1, 40000.00, 'e-Wallet', '', 'Return', '2024-03-20 13:56:22'),
(22, 459276097, 1, 2, 11000.00, 'Internet Banking', '5623', 'Cancelled', '2024-03-20 14:00:42'),
(23, 526523911, 2, 11, 55000.00, 'e-Wallet', 'HJJHY2423423423', 'Return', '2024-04-05 15:13:41'),
(24, 773240948, 3, 12, 70000.00, 'e-Wallet', '1234', 'Return', '2024-04-08 11:51:19'),
(25, 346538525, 4, 13, 55000.00, 'e-Wallet', 'JHHJH423423', 'Return', '2024-04-11 12:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `id` int(11) NOT NULL,
  `orderNumber` bigint(12) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `BookingFromDate` varchar(250) DEFAULT NULL,
  `BookingToDate` varchar(250) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordersdetails`
--

INSERT INTO `ordersdetails` (`id`, `orderNumber`, `userId`, `productId`, `quantity`, `BookingFromDate`, `BookingToDate`, `orderDate`, `orderStatus`) VALUES
(24, 610214066, 1, 8, 1, '2024-04-21', '2024-04-25', '2024-03-15 07:21:53', 'Dispatched'),
(25, 656572498, 1, 14, 1, '2024-05-21', '2024-05-25', '2024-03-20 06:15:46', NULL),
(26, 327827652, 1, 13, 1, '2024-04-25', '2024-05-27', '2024-03-20 13:13:36', NULL),
(27, 300670107, 1, 10, 1, '2024-05-10', '2024-05-12', '2024-03-20 13:20:59', NULL),
(28, 987780800, 1, 9, 1, '2024-06-01', '2024-06-03', '2024-03-20 13:29:50', NULL),
(29, 525762589, 1, 2, 2, '2024-03-21', '2024-03-22', '2024-03-20 13:38:57', NULL),
(30, 706921006, 1, 2, 1, '2024-03-20', '2024-03-23', '2024-03-20 13:40:49', NULL),
(31, 722569117, 1, 1, 1, '2024-03-21', '2024-03-22', '2024-03-20 13:56:22', 'Return'),
(32, 459276097, 1, 2, 1, '2024-03-21', '2024-03-29', '2024-03-20 14:00:42', 'Cancelled'),
(33, 526523911, 2, 10, 1, '2024-04-20', '2024-04-22', '2024-04-05 15:13:41', 'Return'),
(34, 773240948, 3, 10, 1, '2024-04-09', '2024-04-12', '2024-04-08 11:51:19', 'Return'),
(35, 346538525, 4, 14, 1, '2024-04-30', '2024-05-02', '2024-04-11 12:33:36', 'Return');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `actionBy` int(3) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `canceledBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `actionBy`, `postingDate`, `canceledBy`) VALUES
(23, 21, 'Packed', 'Packed', 1, '2024-03-21 06:54:13', NULL),
(24, 21, 'Dispatched', 'Dispatched', 1, '2024-03-21 06:57:18', NULL),
(25, 21, 'In Transit', 'In Transit', 1, '2024-03-21 06:58:15', NULL),
(26, 21, 'Out For Delivery', 'Out For Delivery', 1, '2024-03-21 06:58:54', NULL),
(27, 21, 'Delivered', 'Delivered', 1, '2024-03-21 07:00:10', NULL),
(28, 21, 'Return', 'Product Retuned', 1, '2024-03-21 07:10:24', NULL),
(29, 22, 'Cancelled', 'cancel it', NULL, '2024-03-26 03:49:25', 'User'),
(30, 23, 'Packed', 'Item Packed', 1, '2024-04-05 15:23:01', NULL),
(31, 23, 'Dispatched', 'Item Dispatchded', 1, '2024-04-06 02:04:19', NULL),
(32, 23, 'Out For Delivery', 'Item is out for delivery\r\n', 1, '2024-04-06 02:04:37', NULL),
(33, 23, 'Delivered', 'Item deliver to the customer', 1, '2024-04-06 02:04:54', NULL),
(34, 23, 'Return', 'Customer returned the item in a good condition', 1, '2024-04-06 02:05:36', NULL),
(35, 14, 'Packed', 'Packed', 1, '2024-04-06 02:37:54', NULL),
(36, 14, 'Dispatched', 'NA', 1, '2024-04-06 02:40:56', NULL),
(37, 24, 'Packed', 'Your order is packed ', 1, '2024-04-08 12:12:06', NULL),
(38, 24, 'Dispatched', 'Dispatched', 1, '2024-04-08 12:13:45', NULL),
(39, 24, 'In Transit', 'In Transit', 1, '2024-04-08 12:14:54', NULL),
(40, 24, 'Out For Delivery', 'Out For Delivery', 1, '2024-04-08 12:16:13', NULL),
(41, 24, 'Delivered', 'Delivered', 1, '2024-04-08 12:17:17', NULL),
(42, 24, 'Return', 'Colth return by user', 1, '2024-04-08 12:18:28', NULL),
(43, 25, 'Packed', 'Order is packed', 1, '2024-04-11 12:34:16', NULL),
(44, 25, 'Dispatched', 'Order is dispatched', 1, '2024-04-11 12:34:52', NULL),
(45, 25, 'In Transit', 'In transit', 1, '2024-04-11 12:35:10', NULL),
(46, 25, 'Out For Delivery', 'out for delivery', 1, '2024-04-11 12:35:28', NULL),
(47, 25, 'Delivered', 'Order is devlivered to the customer', 1, '2024-04-11 12:35:55', NULL),
(48, 25, 'Return', 'Product is returned from the user in good condidtion', 1, '2024-04-11 12:36:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategoryName` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategoryName`, `creationDate`, `updationDate`, `createdBy`) VALUES
(1, 1, 'Lehenga', '2024-03-12 04:59:36', NULL, 1),
(2, 1, 'Saree', '2024-03-12 04:59:44', NULL, 1),
(3, 1, 'Suit', '2024-03-12 04:59:53', NULL, 1),
(4, 2, 'Gown', '2024-03-12 05:00:31', NULL, 1),
(5, 3, 'Gents Suits', '2024-03-12 05:01:11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactNumber` bigint(12) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `contactNumber`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', 45231025890, '2022-01-24 16:21:18', '2024-04-11 17:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(5) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `dateofcontact` timestamp NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL,
  `ReadDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `Name`, `Email`, `Phone`, `Message`, `dateofcontact`, `IsRead`, `ReadDate`) VALUES
(2, 'Shanu Mishra', 'shanu@gmail.com', 78945641235, 'kjkhghh', '2024-03-21 13:07:19', 1, '2024-03-21 13:08:22'),
(3, 'Anuj', 'ak@gmail.com', 1414253652, 'I wan to rent some clothe for my marrigae', '2024-04-11 12:39:56', 1, '2024-04-11 12:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', 'Welcome to The Cloth Rental System, Rent An Attire offers premium fashion rental services at affordable prices, all while prioritizing sustainability. From Mehendi to Haldi to weddings, pre-wedding shoots to themed parties, our extensive collection of designer outfits caters to every occasion without compromising on style or the environment for both men and women. we decided to take the plunge and open our first shop on the 1st of June 2017.\r\n', NULL, NULL, '2024-04-08 11:32:46'),
(2, 'contactus', 'Contact Us', '#890 CFG Apartment, Mayur Vihar, Delhi-India.', 'info@test.com', 1234567890, '2024-03-12 13:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblrentalcloth`
--

CREATE TABLE `tblrentalcloth` (
  `ID` int(5) NOT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Category` int(5) DEFAULT NULL,
  `SubCategory` int(5) DEFAULT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `ProductCode` varchar(100) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `Materials` varchar(255) DEFAULT NULL,
  `Color` varchar(250) DEFAULT NULL,
  `ProductDescription` mediumtext DEFAULT NULL,
  `TermandCond` mediumtext DEFAULT NULL,
  `Priceperday` decimal(10,0) DEFAULT NULL,
  `SecurityAmount` decimal(10,0) DEFAULT NULL,
  `ShippingCharge` decimal(10,0) DEFAULT NULL,
  `Image1` varchar(250) DEFAULT NULL,
  `Image2` varchar(250) DEFAULT NULL,
  `Image3` varchar(250) DEFAULT NULL,
  `addedBy` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `lastUpdatedBy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrentalcloth`
--

INSERT INTO `tblrentalcloth` (`ID`, `Gender`, `Category`, `SubCategory`, `Title`, `ProductCode`, `Size`, `Materials`, `Color`, `ProductDescription`, `TermandCond`, `Priceperday`, `SecurityAmount`, `ShippingCharge`, `Image1`, `Image2`, `Image3`, `addedBy`, `CreationDate`, `updationDate`, `lastUpdatedBy`) VALUES
(1, 'Female', 1, 1, 'Bridal Lehenga', 'BLK123', 'XL', 'Rayon mixed with cotton', 'Green', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, '88b0a5afbf6cb41adabd44e999f333a5.jpg', '9bf1f318857cf67df4c6c734928d256c.jpg', 'f66006ef41a4b064ba0013210e336b53.jpg', '1', '2024-03-12 06:23:25', NULL, NULL),
(2, 'Female', 1, 2, 'Navy Blue Drape Saree', 'FM2958', 'M', 'Net', 'Navy Blue', 'Beige embroidered blouse. Comes with navy blue drape saree.', 'Security amount is not refundable if any damage seen on saree', 1000, 3000, 450, 'e877ee35df6815d5dbb93a95fe20f4da.jpg', '8bcd431958318b4c4541c20e12ce4eb1.jpg', '8df3fb73d7cfebe70a4845f65053c774.jpg', '1', '2024-03-12 06:39:38', '2024-03-12 13:43:05', '1'),
(4, 'Female', 2, 1, 'Bridal Lehenga', 'BLK123', 'Free Size', 'Rayon mixed with cotton', 'Black', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, 'aea91962a58178d38c9bdbc71a130101.jpg', '2e22f7834e26fca0b0fde67964f0ae1b.jpg', 'a24c32fc57276f8dc965154281a3bec4.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:20:44', '1'),
(5, 'Female', 1, 1, 'Bridal Lehenga', 'BLK123', '2XL', 'Rayon mixed with cotton', 'Green and Red', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, 'a87514a54dd7626b8783b565135007d4.jpg', 'f43b585b636d7737f3e7ef9a305a4aab.jpg', 'f9288035e0e60217428157e325b8cd27.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:12:39', '1'),
(6, 'Female', 1, 1, 'Bridal Lehenga', 'BLK123', 'XL', 'Rayon mixed with cotton', 'Blue', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, '79a87a431442105b1a811871d2596112.jpg', 'cf5cbfd87b3b504474b4ec6bdb0be56a.jpg', '635dc1407a9434553a3fb1e8dff62e5d.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:12:23', '1'),
(7, 'Female', 3, 1, 'Bridal Lehenga', 'BLK123', 'XS', 'Rayon mixed with cotton', 'Blue', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, '4f55976a3be56a5fa42f36c243d45bfb.jpg', '719b006e839c3289ae1c7527e98630ec.jpg', 'c0f5e8f4331cad5e9a53747c7ac2a189.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:20:51', '1'),
(8, 'Female', 1, 1, 'Bridal Lehenga', 'BLK123', 'S', 'Rayon mixed with cotton', 'Blue', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, 'd54f5a9929336cff540610e849b45383.jpg', 'e2a58bdabe0530c511baffab2eb6d46e.jpg', '0af59a4fb7f51129afa3b4c762fcd2bb.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:11:55', '1'),
(9, 'Female', 1, 1, 'Bridal Lehenga', 'BLK123', 'XL', 'Rayon mixed with cotton', 'White and Yellow', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, 'd872016a1267167cfa7a7bf665198cc6.jpg', '8e9e4041659769ad3ac7de303f3978de.jpg', '00c5d59617a02bdaa527a8206df5d14d.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:11:41', '1'),
(10, 'Female', 1, 1, 'Bridal Lehenga', 'BLK123', 'XL', 'Rayon mixed with cotton', 'Yellow', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, '3bfa1249ccf073e1796609d1cde7bdd6.jpg', '33c7d379d8b1401c58b288caec2fcc7e.jpg', '33cbca361b4eb96c7f214338fac13c2d.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:11:26', '1'),
(11, 'Female', 1, 1, 'Bridal Lehenga', 'BLK123', 'S', 'Rayon mixed with cotton', 'Light Purple', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, '9452efe8ebef600c889c3d6ca5e61504.jpg', 'f43202207cf049461387614db3f3e50d.jpg', '82cabb795ec6bb7d12715f84ef154d2b.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:11:15', '1'),
(12, 'Female', 1, 1, 'Bridal Lehenga', 'BLK123', 'S', 'Rayon mixed with cotton', 'Pink', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, 'efdabf3de906406049fcab434c1d5f71.jpg', '9c75894489b0b602d8c08d0f64481f8d.jpg', '264b2840b401b80f74b7bc42ceb5d965.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:10:49', '1'),
(13, 'Female', 1, 1, 'Bridal Lehenga', 'BLK123', 'L', 'Rayon mixed with cotton', 'Red', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, '0008d1ec9ad53efddb927ef1450d5165.jpg', '31c48ac18543c879f6effe1632b0f141.jpg', '4e2bc8469b00ce651cc8ce99e988cf7f.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:10:28', '1'),
(14, 'Female', 1, 1, 'Bridal Lehenga', 'BLK124', 'XL', 'Rayon mixed with cotton', 'Purple', 'Olive Green Bridal lehenga with fully embroidered and detailed work on it styled with double dupatta, embroidered blouse and belt.', 'Refundable Deposit Amount:\r\n1. Booking per product upto Rs. 2500 will be charged Rs.5000 refundable security deposit\r\n2. Bookings per product above Rs. 2500 upto Rs. 5000 will be charged Rs. 8000 refundable security deposit.\r\n3. Bookings per product above Rs. 5000 upto Rs. 10000 will be charged Rs. 10000 refundable security deposit\r\n4. Bookings per product above Rs. 10000 and above will be charged Rs. 15000 refundable security deposit\r\n5. Bookings per product above Rs. 15,000 and above will be charged Rs. 20,000 refundable security deposit.', 15000, 25000, 100, '0e67c3cda7eddd9fda8b7e8830555e3d.jpg', '8db07ea3d5bd5d8d0a392391e02de62a.jpg', '66db2f4c6aa5322ac77f23ae112464c1.jpg', '1', '2024-03-12 06:23:25', '2024-04-02 06:10:09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `ID` int(5) NOT NULL,
  `ProductID` int(5) DEFAULT NULL,
  `ReviewTitle` mediumtext DEFAULT NULL,
  `Review` longtext DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `DateofReview` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Remark` mediumtext DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreview`
--

INSERT INTO `tblreview` (`ID`, `ProductID`, `ReviewTitle`, `Review`, `Name`, `DateofReview`, `Remark`, `Status`, `UpdationDate`) VALUES
(10, 2, 'Good Material', ' fertg', 'Manav Kumar', '2024-03-14 07:19:18', NULL, 'Review Accept', '2024-03-14 07:19:18'),
(11, 2, 'Nice Saree', ' Nice SareeNice SareeNice SareeNice SareeNice SareeNice SareeNice SareeNice SareeNice SareeNice SareeNice SareeNice SareeNice Saree', 'Shanu Mishra', '2024-03-14 07:33:04', NULL, 'Review Accept', '2024-03-14 07:33:04'),
(12, 14, 'Best product', ' I used this product. It was amazing', 'Anuj', '2024-04-11 12:39:08', '', 'Review Accept', '2024-04-11 12:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscriber`
--

CREATE TABLE `tblsubscriber` (
  `id` int(5) NOT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `SubscriptionDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubscriber`
--

INSERT INTO `tblsubscriber` (`id`, `Email`, `SubscriptionDate`) VALUES
(3, 'sarita@gmail.com', '2024-03-21 12:49:50'),
(4, 'ak@gmail.com', '2024-04-11 12:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `contactno`, `password`, `regDate`, `updationDate`) VALUES
(1, 'Mohan Kumar', 'mohan@gmail.com', 'Male', 1234567891, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-14 06:50:16', '2024-04-02 04:24:44'),
(2, 'Amit', 'amit123@gmail.com', 'Male', 4563210236, 'f925916e2754e5e03f75dd58a5733251', '2024-04-04 01:33:47', NULL),
(3, 'Test Sample', 'test@gmail.com', 'Male', 7894561239, '202cb962ac59075b964b07152d234b70', '2024-04-08 11:38:49', NULL),
(4, 'Graim', 'garima@gmail.cpm', 'Female', 1425362541, 'f925916e2754e5e03f75dd58a5733251', '2024-04-11 12:32:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(1, 1, 2, '2024-04-02 04:51:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userrrid` (`userId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uiid` (`userID`),
  ADD KEY `piddd` (`productId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uidddd` (`userId`),
  ADD KEY `addressid` (`addressId`),
  ADD KEY `orderNumber` (`orderNumber`);

--
-- Indexes for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderidd` (`orderNumber`),
  ADD KEY `useridd` (`userId`),
  ADD KEY `productiddd` (`productId`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderidddddd` (`orderId`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catid` (`categoryid`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblrentalcloth`
--
ALTER TABLE `tblrentalcloth`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usseridddd` (`userId`),
  ADD KEY `ppiidd` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblrentalcloth`
--
ALTER TABLE `tblrentalcloth`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
