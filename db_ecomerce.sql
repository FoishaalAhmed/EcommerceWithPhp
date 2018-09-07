-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 12:36 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUserName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminImage` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `lavel` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUserName`, `adminEmail`, `adminImage`, `adminPassword`, `lavel`) VALUES
(1, 'Foisal Ahmed', 'Admin', 'foisal@gmail.com', 'upload/8c12b2ca9d.jpg', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'Acer'),
(4, 'Canonn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` float(10,2) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `productPrice`, `productQuantity`, `productImage`) VALUES
(3, 'bf59dlq3qf3a3ghk37433se8r4', 11, 'Lorem Ipsum is simply', 600.35, 0, 'upload/cf5ad8729a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Mobile Phones'),
(3, 'Laptop'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Sports &amp; Fitness'),
(7, 'Footwear'),
(8, 'Jewellery'),
(9, 'Clothing'),
(10, 'Home Decor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compaire`
--

CREATE TABLE `tbl_compaire` (
  `comId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` float(10,2) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_compaire`
--

INSERT INTO `tbl_compaire` (`comId`, `cusId`, `productId`, `productName`, `productPrice`, `productImage`) VALUES
(1, 2, 11, 'Lorem Ipsum is simply', 600.35, 'upload/cf5ad8729a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `phone`, `message`, `date`, `status`) VALUES
(1, 'Foisal Ahmed', 'Foishaal@gmail.com', '+8801738244627', 'gjgjgkshdhuiaiud', '2018-06-08 12:09:35', 1),
(3, 'Habiba Ahmed', 'Habiba@gmail.com', '01843828227', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '2018-06-08 20:59:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copyright`
--

CREATE TABLE `tbl_copyright` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_copyright`
--

INSERT INTO `tbl_copyright` (`id`, `text`) VALUES
(1, 'Foishaal Ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cusId` int(11) NOT NULL,
  `cusName` varchar(255) NOT NULL,
  `cusCity` varchar(30) NOT NULL,
  `cusZipCode` varchar(30) NOT NULL,
  `cusEmail` varchar(255) NOT NULL,
  `cusAddress` varchar(100) NOT NULL,
  `cusCountry` varchar(30) NOT NULL,
  `cusPhone` varchar(30) NOT NULL,
  `cusPassword` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cusId`, `cusName`, `cusCity`, `cusZipCode`, `cusEmail`, `cusAddress`, `cusCountry`, `cusPhone`, `cusPassword`) VALUES
(2, 'Foisal Ahmed', 'Rajshahi', '6230', 'Foisal@gmail.com', 'Madaripur,Tanore,Rajshahi-6230', 'Bangladesh', '+8801738244627', '86010b1f1b03e5aa56c5154b4a8ce845'),
(3, 'Habiba Ahmed', 'Dhaka', '1207', 'habiba@gmail.com', 'Kadirabad Housing, Katashur, Mohammadpur, Dhaka-1207', 'Bangladesh', '+8801843828227', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` float(10,2) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `cusId`, `productId`, `productName`, `productPrice`, `productQuantity`, `productImage`, `date`, `status`) VALUES
(1, 2, 11, 'Lorem Ipsum is simply', 600.35, 1, 'upload/cf5ad8729a.jpg', '2018-06-08 21:10:40', 2),
(2, 2, 11, 'Lorem Ipsum is simply', 600.35, 1, 'upload/cf5ad8729a.jpg', '2018-06-10 10:43:49', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `productDetails` text NOT NULL,
  `productPrice` float(10,2) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productType` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `productDetails`, `productPrice`, `productImage`, `productType`) VALUES
(1, 'Lorem Ipsum is simply', 4, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 505.22, 'upload/15b7f1d0c2.png', 1),
(2, 'Lorem Ipsum is simply', 8, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 500.30, 'upload/8037ff0289.jpg', 1),
(3, 'Lorem Ipsum is simply', 10, 4, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 500.33, 'upload/02b877e6b1.jpg', 1),
(8, 'Lorem Ipsum is simply', 3, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 505.22, 'upload/51cf6bf2ca.jpg', 1),
(9, '', 0, 0, '', 0.00, '', 0),
(11, 'Lorem Ipsum is simply', 2, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 600.35, 'upload/cf5ad8729a.jpg', 0),
(12, 'Lorem Ipsum is simply', 3, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1000.00, 'upload/b7a6b0e9cb.jpg', 0),
(13, 'Lorem Ipsum is simply', 4, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 100.00, 'upload/71bc2f2842.png', 0),
(14, 'Lorem Ipsum is simply', 4, 4, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 105.00, 'upload/7c924d7a0c.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `link`, `image`) VALUES
(12, 'http://localhost/ecomerce/preview.php?proid=11', 'upload/slider/18ef97a623.jpg'),
(13, 'http://localhost/ecomerce/preview.php?proid=12', 'upload/slider/6307a125bc.jpg'),
(14, 'http://localhost/ecomerce/preview.php?proid=3', 'upload/slider/e784790a99.jpg'),
(15, 'http://localhost/ecomerce/preview.php?proid=2', 'upload/slider/ca9356c2e7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `twtr` varchar(255) NOT NULL,
  `gplus` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `twtr`, `gplus`, `email`) VALUES
(1, 'http://facebook.com/Foishaal', 'http://twitter.com/Foishaal', 'http://googleplus.com/Foishaal', 'http://gmail.com/Foishaal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_titleslogan`
--

CREATE TABLE `tbl_titleslogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_titleslogan`
--

INSERT INTO `tbl_titleslogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Online StoreBD', 'Your Favorite Shoping Mall', 'upload/02b877e6b1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` float(10,2) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishId`, `cusId`, `productId`, `productName`, `productPrice`, `productImage`) VALUES
(1, 2, 11, 'Lorem Ipsum is simply', 600.35, 'upload/cf5ad8729a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compaire`
--
ALTER TABLE `tbl_compaire`
  ADD PRIMARY KEY (`comId`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cusId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_titleslogan`
--
ALTER TABLE `tbl_titleslogan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_compaire`
--
ALTER TABLE `tbl_compaire`
  MODIFY `comId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_titleslogan`
--
ALTER TABLE `tbl_titleslogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
