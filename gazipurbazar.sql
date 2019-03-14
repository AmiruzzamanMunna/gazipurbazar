-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 01:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `falcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `heading` varchar(1000) NOT NULL,
  `paragraph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`id`, `heading`, `paragraph`) VALUES
(1, 'About Us', 'This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.This is About us Paragraph.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.Everything related about us goes here.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `confirm_password` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `email`, `password`, `confirm_password`) VALUES
(1, 'Amiruzzaman', 'admin', 'munna.ak17@gmail.com', '$2y$10$EMnI9QhGRTpOFXqTe3TW4u6q9ZJbDklWOBS9EFPEU2g7gU5hLpDSK', '$2y$10$ObwpzTGQ8s6G3e0Q9XEogOdvBLq9YUljo3l7Cyn7CiQV8b./aASNK');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`id`, `heading1`, `paragraph`, `image1`, `image2`) VALUES
(1, 'Books & Magazine Shop', 'Paragraph Example', '1551260459bookindex-1.jpg', '1551260459bookindex-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `size` varchar(1000) DEFAULT NULL,
  `quantity` int(100) NOT NULL,
  `unit_price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`) VALUES
(1, 'ladies clothing'),
(2, 'ladies Juwellary'),
(3, 'ladies cosmatic'),
(4, 'ladies shoes'),
(5, 'gents clothing'),
(6, 'gents cosmatic'),
(7, 'gents shoes'),
(8, 'Computer & Accessories'),
(9, 'Electronics'),
(10, 'Security & Servillance'),
(11, 'Cushions'),
(12, 'Throws & Blankets'),
(13, 'Mirrors'),
(14, 'Curtains'),
(15, 'furniture-sofa'),
(16, 'furniture-Chairs'),
(17, 'furniture-Ottomans'),
(18, 'furniture-Tables'),
(19, 'furniture-Entertainment Center'),
(20, 'furniture-Bed Rooms'),
(21, 'toys'),
(22, 'show pieces'),
(23, 'leather-bag'),
(24, 'leather-belt'),
(25, 'leather-shoes'),
(26, 'gadget'),
(28, 'books'),
(29, 'magazine'),
(30, 'food-groceries'),
(31, 'food-bread&bakery'),
(32, 'food-fruits&vegitable'),
(33, 'food-meat&fish'),
(34, 'food-freshmilk'),
(35, 'nakshikatha'),
(36, 'Pottery and Terracotta'),
(37, 'Shital Pati'),
(38, 'bikes-parts'),
(39, 'cars-parts'),
(40, 'medicine'),
(41, 'fast aid'),
(42, 'gifts'),
(43, 'romance'),
(44, 'roses'),
(45, 'birthday'),
(46, 'anniversary'),
(47, 'thank you'),
(48, 'sympathy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `heading` varchar(1000) NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `heading`, `contact`) VALUES
(1, 'Contact Us', 'House 12, Road 12,Block F, Niketan, Gulshan 1,Dhaka - 1212, Bangladesh\r\nMobile No. 1212121212');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_electronics_index`
--

CREATE TABLE `tbl_electronics_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_electronics_index`
--

INSERT INTO `tbl_electronics_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`) VALUES
(1, 'Electrics & Electronics Shop', 'Paragraph Example', '1551272211electric-1.jpg', '1551272211electric-2.jpg', '1551272211electric-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eventbirthday`
--

CREATE TABLE `tbl_eventbirthday` (
  `id` int(11) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph1` varchar(1000) NOT NULL,
  `heading2` varchar(1000) NOT NULL,
  `paragraph2` varchar(1000) NOT NULL,
  `heading3` varchar(1000) NOT NULL,
  `paragraph3` varchar(1000) NOT NULL,
  `heading4` varchar(1000) DEFAULT NULL,
  `paragraph4` varchar(1000) DEFAULT NULL,
  `heading5` varchar(1000) DEFAULT NULL,
  `paragraph5` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_eventbirthday`
--

INSERT INTO `tbl_eventbirthday` (`id`, `image1`, `image2`, `image3`, `heading1`, `paragraph1`, `heading2`, `paragraph2`, `heading3`, `paragraph3`, `heading4`, `paragraph4`, `heading5`, `paragraph5`) VALUES
(1, '1550225935birthday-1.jpg', '1550225935birthday-2.jpg', '1550225935birthday-3.jpg', 'Birthday Example', 'Birthday Example', 'Birthday Example', 'Birthday Example', 'Birthday Example', 'Birthday Example', 'Birthday Example', 'Birthday Example', 'Birthday Example', 'Birthday Example');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eventwedding`
--

CREATE TABLE `tbl_eventwedding` (
  `id` int(11) NOT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `image3` varchar(100) DEFAULT NULL,
  `heading1` varchar(100) NOT NULL,
  `paragraph1` varchar(1000) NOT NULL,
  `heading2` varchar(100) NOT NULL,
  `paragraph2` varchar(1000) NOT NULL,
  `heading3` varchar(100) NOT NULL,
  `paragraph3` varchar(1000) NOT NULL,
  `heading4` varchar(100) DEFAULT NULL,
  `paragraph4` varchar(1000) DEFAULT NULL,
  `heading5` varchar(100) DEFAULT NULL,
  `paragraph5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_eventwedding`
--

INSERT INTO `tbl_eventwedding` (`id`, `image1`, `image2`, `image3`, `heading1`, `paragraph1`, `heading2`, `paragraph2`, `heading3`, `paragraph3`, `heading4`, `paragraph4`, `heading5`, `paragraph5`) VALUES
(1, '1550225033wedding-1.jpg', '1550225033wedding-2.jpg', '1550225033wedding-3.jpg', 'Wedding Example', 'Wedding Example', 'Wedding Example', 'Wedding Example', 'Wedding Example', 'Wedding Example', 'Wedding Example', 'Wedding Example', 'Wedding Example', 'Wedding Example');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_index`
--

CREATE TABLE `tbl_event_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) DEFAULT NULL,
  `paragraph` varchar(1000) DEFAULT NULL,
  `image1` varchar(1000) DEFAULT NULL,
  `image2` varchar(1000) DEFAULT NULL,
  `image3` varchar(1000) DEFAULT NULL,
  `image4` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event_index`
--

INSERT INTO `tbl_event_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`, `image4`) VALUES
(1, 'Event Management', 'Paragraph Example', '1550233893eventindex-1.jpg', '1550233893eventindex-2.jpg', '1550233893eventindex-3.jpg', '1550233893eventindex-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_famous&tradition_index`
--

CREATE TABLE `tbl_famous&tradition_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_famous&tradition_index`
--

INSERT INTO `tbl_famous&tradition_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`) VALUES
(1, 'Famous & Traditional items Shop', 'Paragraph Example', '1550324749famousindex-1.jpg', '1550324749famousindex-2.jpg', '1550325045famousindex-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flower_index`
--

CREATE TABLE `tbl_flower_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL,
  `image4` varchar(1000) NOT NULL,
  `image5` varchar(1000) NOT NULL,
  `image6` varchar(1000) NOT NULL,
  `image7` varchar(1000) NOT NULL,
  `image8` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_flower_index`
--

INSERT INTO `tbl_flower_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`) VALUES
(1, 'Flowers & Bouquets Shop', 'Paragraph Example', '1551266227flowerindex-1.jpg', '1551266227flowerindex-2.jpg', '1551266227flowerindex-3.jpg', '1551266227flowerindex-4.jpg', '1551266227flowerindex-5.jpg', '1551266227flowerindex-6.jpg', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_index`
--

CREATE TABLE `tbl_food_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL,
  `image4` varchar(1000) NOT NULL,
  `image5` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_food_index`
--

INSERT INTO `tbl_food_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES
(1, 'Food & Grocery Items Shop', 'Paragraph Example', '1551258878foodindex-1.jpg', '1551258878foodindex-2.jpg', '1551274014foodindex-3.jpg', '1551258878foodindex-4.jpg', '1551258878foodindex-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_furniture_index`
--

CREATE TABLE `tbl_furniture_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL,
  `image4` varchar(1000) NOT NULL,
  `image5` varchar(1000) NOT NULL,
  `image6` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_furniture_index`
--

INSERT INTO `tbl_furniture_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`) VALUES
(1, 'Furniture Shop', 'Paragraph Example', '1551268381flowerindex-1.jpg', '1551268381flowerindex-2.jpg', '1551268381flowerindex-3.jpg', '1551268381flowerindex-4.jpg', '1551268381flowerindex-5.jpg', '1551268381flowerindex-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gents_index`
--

CREATE TABLE `tbl_gents_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gents_index`
--

INSERT INTO `tbl_gents_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`) VALUES
(1, 'Gents Shop', 'Paragraph Example', '1551273029gents-1.jpg', '1551273029gents-2.jpg', '1551273029gents-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospitality`
--

CREATE TABLE `tbl_hospitality` (
  `id` int(11) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph1` varchar(1000) NOT NULL,
  `heading2` varchar(1000) NOT NULL,
  `paragraph2` varchar(1000) NOT NULL,
  `heading3` varchar(1000) NOT NULL,
  `paragraph3` varchar(1000) NOT NULL,
  `heading4` varchar(1000) DEFAULT NULL,
  `paragraph4` varchar(1000) DEFAULT NULL,
  `heading5` varchar(1000) DEFAULT NULL,
  `paragraph5` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hospitality`
--

INSERT INTO `tbl_hospitality` (`id`, `image1`, `image2`, `image3`, `heading1`, `paragraph1`, `heading2`, `paragraph2`, `heading3`, `paragraph3`, `heading4`, `paragraph4`, `heading5`, `paragraph5`) VALUES
(1, '1550228265hospitality-1.jpg', '1550228265hospitality-2.jpg', '1550228265hospitality-3.jpg', 'Hospitality Example', 'Hospitality Example', 'Hospitality Example', 'Hospitality Example', 'Hospitality Example', 'Hospitality Example', 'Hospitality Example', 'Hospitality Example', 'Hospitality Example', 'Hospitality Example');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_household_index`
--

CREATE TABLE `tbl_household_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL,
  `image4` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_household_index`
--

INSERT INTO `tbl_household_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`, `image4`) VALUES
(1, 'House Hold Accessories', 'Paragraph Example', '1551269927houseindex-1.jpg', '1551269927houseindex-2.jpg', '1551269927houseindex-3.jpg', '1551269927houseindex-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `user_id`, `Order_date`, `status`) VALUES
(1, 1, '2019-02-26 13:04:29', 3),
(2, 1, '2019-02-26 13:03:29', 2),
(3, 1, '2019-02-26 13:03:18', 2),
(4, 1, '2019-02-26 13:04:17', 3),
(5, 2, '2019-02-27 16:48:53', 2),
(6, 1, '2019-02-27 16:49:56', 3),
(7, 3, '2019-02-27 16:49:26', 3),
(8, 1, '2019-02-28 18:38:29', 2),
(9, 1, '2019-03-03 07:35:19', 2),
(10, 1, '2019-03-02 18:00:00', 1),
(11, 2, '2019-03-02 18:00:00', 1),
(12, 4, '2019-03-03 18:00:00', 1),
(13, 4, '2019-03-03 18:00:00', 1),
(14, 7, '2019-03-04 17:11:44', 2),
(15, 7, '2019-03-03 18:00:00', 1),
(16, 8, '2019-03-03 18:00:00', 1),
(17, 4, '2019-03-14 11:17:52', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ladies_index`
--

CREATE TABLE `tbl_ladies_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL,
  `image4` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ladies_index`
--

INSERT INTO `tbl_ladies_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`, `image4`) VALUES
(1, 'The ladies Shop', 'Paragraph Example', '1551273857ladies-1.jpg', '1551273857ladies-2.jpg', '1551273857ladies-3.jpg', '1551273857ladies-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leather_index`
--

CREATE TABLE `tbl_leather_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_leather_index`
--

INSERT INTO `tbl_leather_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`, `image3`) VALUES
(1, 'Leather Shop', 'Paragraph Example', '1551272252leather-1.jpg', '1551272252leather-2.jpg', '1551272252leather-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lighting`
--

CREATE TABLE `tbl_lighting` (
  `id` int(11) NOT NULL,
  `image1` varchar(1000) DEFAULT NULL,
  `image2` varchar(1000) DEFAULT NULL,
  `image3` varchar(1000) DEFAULT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph1` varchar(1000) NOT NULL,
  `heading2` varchar(1000) NOT NULL,
  `paragraph2` varchar(1000) NOT NULL,
  `heading3` varchar(1000) NOT NULL,
  `paragraph3` varchar(1000) NOT NULL,
  `heading4` varchar(1000) DEFAULT NULL,
  `paragraph4` varchar(1000) DEFAULT NULL,
  `heading5` varchar(1000) DEFAULT NULL,
  `paragraph5` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lighting`
--

INSERT INTO `tbl_lighting` (`id`, `image1`, `image2`, `image3`, `heading1`, `paragraph1`, `heading2`, `paragraph2`, `heading3`, `paragraph3`, `heading4`, `paragraph4`, `heading5`, `paragraph5`) VALUES
(1, '1550238677lighting-1.jpg', '1550238677lighting-2.jpg', '1550238677lighting-3.jpg', 'Lighting Example', 'Lighting Example', 'Lighting Example', 'Lighting Example', 'Lighting Example', 'Lighting Example', 'Lighting Example', 'Lighting Example', 'Lighting Example', 'Lighting Example');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine&emergency`
--

CREATE TABLE `tbl_medicine&emergency` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicine&emergency`
--

INSERT INTO `tbl_medicine&emergency` (`id`, `heading1`, `paragraph`, `image1`, `image2`) VALUES
(1, 'Medicine & Emergency items Shop', 'Paragraph Example', '1550330300medicineindex-1.jpg', '1550330300medicineindex-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile1` varchar(100) NOT NULL,
  `mobile2` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `cart_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `cart_product_id` int(255) NOT NULL,
  `cart_size` varchar(100) DEFAULT NULL,
  `cart_quantity` int(255) NOT NULL,
  `cart_totalprice` float NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `name`, `mobile1`, `mobile2`, `address`, `email`, `invoice_id`, `cart_id`, `user_id`, `cart_product_id`, `cart_size`, `cart_quantity`, `cart_totalprice`, `orderdate`) VALUES
(26, '1aa', '1111', '1111', 'aaaaa', 'aaa@sss.com', 10, 1, 5, 14, 'M', 3, 9000, '2019-02-23 18:00:00'),
(27, '1aa', '1111', '1111', 'aaaaa', 'aaa@sss.com', 10, 2, 5, 72, NULL, 2, 9000, '2019-02-23 18:00:00'),
(28, '1aa', '1111', '1111', 'aaaaa', 'aaa@sss.com', 10, 3, 5, 72, NULL, 2, 9000, '2019-02-23 18:00:00'),
(29, '1aa', '1111', '1111', 'aaaaa', 'aaa@sss.com', 10, 4, 5, 60, NULL, 1, 9000, '2019-02-23 18:00:00'),
(30, 'Munna', '01641064685', NULL, 'gazipur, joydevpur', 'munna.ak17@gmail.com', 12, 1, 1, 1, 'M', 10, 4750, '2019-02-24 18:00:00'),
(31, 'New User', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 13, 2, 4, 1, '12', 15, 7125, '2019-02-24 18:00:00'),
(32, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 14, 1, 1, 14, 'M', 10, 29000, '2019-02-24 18:00:00'),
(33, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 14, 2, 1, 1, 'M', 40, 29000, '2019-02-24 18:00:00'),
(34, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 15, 3, 1, 54, NULL, 10, 1343210, '2019-02-24 18:00:00'),
(35, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 15, 4, 1, 36, NULL, 10, 1343210, '2019-02-24 18:00:00'),
(36, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 15, 5, 1, 37, NULL, 10, 1343210, '2019-02-24 18:00:00'),
(37, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 1, 1, 1, 15, 'L', 10, 42020, '2019-02-25 18:00:00'),
(38, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 1, 2, 1, 35, NULL, 10, 42020, '2019-02-25 18:00:00'),
(39, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 1, 3, 1, 60, NULL, 10, 42020, '2019-02-25 18:00:00'),
(40, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 2, 4, 1, 25, NULL, 10, 59500, '2019-02-25 18:00:00'),
(41, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 2, 5, 1, 59, NULL, 10, 59500, '2019-02-25 18:00:00'),
(42, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 3, 6, 1, 15, 'M', 12, 15000, '2019-02-25 18:00:00'),
(43, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 3, 7, 1, 14, 'M', 1, 15000, '2019-02-25 18:00:00'),
(44, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 3, 8, 1, 14, 'M', 1, 15000, '2019-02-25 18:00:00'),
(45, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 3, 9, 1, 14, 'M', 1, 15000, '2019-02-25 18:00:00'),
(46, 'Munna', '01641064685', NULL, 'gazipur, joydevpur', 'munna.ak17@gmail.com', 4, 10, 1, 13, 'M', 11, 11880, '2019-02-25 18:00:00'),
(47, 'Istiak Ahmed', '01641064685', NULL, 'gazipur, joydevpur', 'munna.ak17@gmail.com', 5, 12, 2, 51, NULL, 20, 240000, '2019-02-25 18:00:00'),
(48, 'Istiak Ahmed', '01641064685', NULL, 'gazipur, joydevpur', 'munna.ak17@gmail.com', 5, 13, 2, 34, NULL, 10, 240000, '2019-02-25 18:00:00'),
(49, 'Md. Amiruzzaman Munna', '01641064685', NULL, 'gazipur, joydevpur', 'munna.ak17@gmail.com', 6, 14, 1, 72, NULL, 50, 660000, '2019-02-25 18:00:00'),
(50, 'Md. Amiruzzaman Munna', '01641064685', NULL, 'gazipur, joydevpur', 'munna.ak17@gmail.com', 6, 15, 1, 45, NULL, 50, 660000, '2019-02-25 18:00:00'),
(51, 'Shahriar Shovon', '234234234', NULL, 'Tongi', 'munna.ak17@gmail.com', 7, 1, 3, 15, 'M', 10, 130000, '2019-02-26 18:00:00'),
(52, 'Shahriar Shovon', '234234234', NULL, 'Tongi', 'munna.ak17@gmail.com', 7, 2, 3, 52, NULL, 10, 130000, '2019-02-26 18:00:00'),
(53, 'Md. Amiruzzaman Munna', '01641064685', NULL, 'gazipur, joydevpur', 'munna.ak17@gmail.com', 8, 1, 1, 13, 'M', 40, 43200, '2019-02-27 18:00:00'),
(54, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 9, 1, 1, 73, 'M', 40, 60480, '2019-03-02 18:00:00'),
(55, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 9, 2, 1, 60, NULL, 12, 60480, '2019-03-02 18:00:00'),
(56, 'Md. Amiruzzaman Munna', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@gmail.com', 10, 3, 1, 50, NULL, 55, 594000, '2019-03-02 18:00:00'),
(57, 'Istiak Ahmed', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@yahoo.com', 11, 1, 2, 14, 'XL', 10, 14750, '2019-03-02 18:00:00'),
(58, 'Istiak Ahmed', '01641064685', '01641064685', 'gazipur, joydevpur', 'munna.ak17@yahoo.com', 11, 2, 2, 1, 'L', 10, 14750, '2019-03-02 18:00:00'),
(59, 'Md Moniruzzaman', '01906464820', '01845609645', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 12, 3, 4, 14, 'M', 3, 31960.7, '2019-03-03 18:00:00'),
(60, 'Md Moniruzzaman', '01906464820', '01845609645', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 12, 4, 4, 15, 'XL', 3, 31960.7, '2019-03-03 18:00:00'),
(61, 'Md Moniruzzaman', '01906464820', '01845609645', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 12, 5, 4, 13, 'XXL', 2, 31960.7, '2019-03-03 18:00:00'),
(62, 'Md Moniruzzaman', '01906464820', '01845609645', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 12, 6, 4, 19, NULL, 1, 31960.7, '2019-03-03 18:00:00'),
(63, 'Md Moniruzzaman', '01906464820', '01845609645', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 12, 7, 4, 16, NULL, 1, 31960.7, '2019-03-03 18:00:00'),
(64, 'Md Moniruzzaman', '01906464820', '01845609645', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 12, 8, 4, 21, '9', 2, 31960.7, '2019-03-03 18:00:00'),
(65, 'Md Moniruzzaman', '01906464820', '01845609645', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 12, 9, 4, 22, '9', 2, 31960.7, '2019-03-03 18:00:00'),
(66, 'Md Moniruzzaman', '01906464820', '01845609645', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 12, 10, 4, 22, '9', 2, 31960.7, '2019-03-03 18:00:00'),
(67, 'Md Moniruzzaman', '01906464820', '01845609645', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 12, 12, 4, 74, NULL, 12, 31960.7, '2019-03-03 18:00:00'),
(68, 'Md.Moniruzzaman', '01906464820', '01906464820', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 13, 1, 4, 3, 'M', 1, 120810, '2019-03-03 18:00:00'),
(69, 'Md.Moniruzzaman', '01906464820', '01906464820', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 13, 2, 4, 3, 'M', 10, 120810, '2019-03-03 18:00:00'),
(70, 'Md.Moniruzzaman', '01906464820', '01906464820', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 13, 3, 4, 28, NULL, 10, 120810, '2019-03-03 18:00:00'),
(71, 'Md.Moniruzzaman', '01906464820', '01906464820', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 13, 4, 4, 53, NULL, 10, 120810, '2019-03-03 18:00:00'),
(72, 'Md.Moniruzzaman', '01906464820', '01906464820', 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 13, 5, 4, 1, 'XXL', 10, 120810, '2019-03-03 18:00:00'),
(73, 'Golam', '017', '0178', 'Dhaka', 'golam@gmail.com', 14, 6, 7, 37, NULL, 5, 560000, '2019-03-03 18:00:00'),
(74, 'Golam', '017', '017', 'Dhaka', 'golam@gmail.com', 15, 1, 7, 37, NULL, 5, 560000, '2019-03-03 18:00:00'),
(75, 'Testing', '01641064685', '01641064685', 'gazipur, joydevpur', 'Testing@gmail.com', 16, 2, 8, 37, NULL, 10, 1120000, '2019-03-03 18:00:00'),
(76, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 3, 4, 2, 'M', 1, 678567, '2019-03-03 18:00:00'),
(77, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 4, 4, 6, NULL, 1, 678567, '2019-03-03 18:00:00'),
(78, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 5, 4, 8, NULL, 1, 678567, '2019-03-03 18:00:00'),
(79, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 6, 4, 11, '20', 1, 678567, '2019-03-03 18:00:00'),
(80, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 7, 4, 13, 'M', 1, 678567, '2019-03-03 18:00:00'),
(81, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 8, 4, 15, 'M', 1, 678567, '2019-03-03 18:00:00'),
(82, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 9, 4, 16, NULL, 1, 678567, '2019-03-03 18:00:00'),
(83, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 10, 4, 17, NULL, 1, 678567, '2019-03-03 18:00:00'),
(84, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 11, 4, 18, NULL, 1, 678567, '2019-03-03 18:00:00'),
(85, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 12, 4, 19, NULL, 1, 678567, '2019-03-03 18:00:00'),
(86, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 13, 4, 20, '9', 1, 678567, '2019-03-03 18:00:00'),
(87, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 14, 4, 22, '9', 1, 678567, '2019-03-03 18:00:00'),
(88, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 15, 4, 25, NULL, 1, 678567, '2019-03-03 18:00:00'),
(89, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 16, 4, 26, 'M', 1, 678567, '2019-03-03 18:00:00'),
(90, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 17, 4, 27, 'M', 1, 678567, '2019-03-03 18:00:00'),
(91, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 18, 4, 29, NULL, 1, 678567, '2019-03-03 18:00:00'),
(92, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 19, 4, 31, NULL, 1, 678567, '2019-03-03 18:00:00'),
(93, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 20, 4, 23, '20', 1, 678567, '2019-03-03 18:00:00'),
(94, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 21, 4, 24, '20', 1, 678567, '2019-03-03 18:00:00'),
(95, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 22, 4, 35, NULL, 1, 678567, '2019-03-03 18:00:00'),
(96, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 23, 4, 35, NULL, 1, 678567, '2019-03-03 18:00:00'),
(97, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 24, 4, 32, NULL, 1, 678567, '2019-03-03 18:00:00'),
(98, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 25, 4, 33, NULL, 1, 678567, '2019-03-03 18:00:00'),
(99, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 26, 4, 34, NULL, 1, 678567, '2019-03-03 18:00:00'),
(100, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 27, 4, 79, NULL, 1, 678567, '2019-03-03 18:00:00'),
(101, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 28, 4, 37, NULL, 1, 678567, '2019-03-03 18:00:00'),
(102, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 29, 4, 37, NULL, 1, 678567, '2019-03-03 18:00:00'),
(103, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 30, 4, 44, NULL, 1, 678567, '2019-03-03 18:00:00'),
(104, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 31, 4, 80, NULL, 1, 678567, '2019-03-03 18:00:00'),
(105, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 32, 4, 45, NULL, 1, 678567, '2019-03-03 18:00:00'),
(106, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 33, 4, 47, NULL, 1, 678567, '2019-03-03 18:00:00'),
(107, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 34, 4, 47, NULL, 1, 678567, '2019-03-03 18:00:00'),
(108, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 35, 4, 76, NULL, 1, 678567, '2019-03-03 18:00:00'),
(109, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 36, 4, 48, NULL, 1, 678567, '2019-03-03 18:00:00'),
(110, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 37, 4, 39, NULL, 1, 678567, '2019-03-03 18:00:00'),
(111, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 38, 4, 38, NULL, 1, 678567, '2019-03-03 18:00:00'),
(112, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 39, 4, 40, NULL, 1, 678567, '2019-03-03 18:00:00'),
(113, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 40, 4, 39, NULL, 1, 678567, '2019-03-03 18:00:00'),
(114, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 41, 4, 41, NULL, 1, 678567, '2019-03-03 18:00:00'),
(115, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 42, 4, 42, NULL, 1, 678567, '2019-03-03 18:00:00'),
(116, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 43, 4, 43, NULL, 1, 678567, '2019-03-03 18:00:00'),
(117, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 44, 4, 49, NULL, 1, 678567, '2019-03-03 18:00:00'),
(118, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 45, 4, 50, NULL, 1, 678567, '2019-03-03 18:00:00'),
(119, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 46, 4, 51, NULL, 1, 678567, '2019-03-03 18:00:00'),
(120, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 47, 4, 53, NULL, 1, 678567, '2019-03-03 18:00:00'),
(121, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 48, 4, 54, NULL, 1, 678567, '2019-03-03 18:00:00'),
(122, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 49, 4, 55, NULL, 1, 678567, '2019-03-03 18:00:00'),
(123, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 50, 4, 55, NULL, 1, 678567, '2019-03-03 18:00:00'),
(124, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 51, 4, 56, NULL, 1, 678567, '2019-03-03 18:00:00'),
(125, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 52, 4, 57, NULL, 1, 678567, '2019-03-03 18:00:00'),
(126, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 53, 4, 58, NULL, 1, 678567, '2019-03-03 18:00:00'),
(127, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 54, 4, 58, NULL, 1, 678567, '2019-03-03 18:00:00'),
(128, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 55, 4, 59, NULL, 1, 678567, '2019-03-03 18:00:00'),
(129, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 56, 4, 60, NULL, 1, 678567, '2019-03-03 18:00:00'),
(130, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 57, 4, 62, NULL, 1, 678567, '2019-03-03 18:00:00'),
(131, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 58, 4, 63, NULL, 1, 678567, '2019-03-03 18:00:00'),
(132, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 59, 4, 63, NULL, 1, 678567, '2019-03-03 18:00:00'),
(133, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 60, 4, 64, NULL, 1, 678567, '2019-03-03 18:00:00'),
(134, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 61, 4, 65, NULL, 1, 678567, '2019-03-03 18:00:00'),
(135, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 62, 4, 66, NULL, 1, 678567, '2019-03-03 18:00:00'),
(136, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 63, 4, 68, NULL, 1, 678567, '2019-03-03 18:00:00'),
(137, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 64, 4, 67, NULL, 1, 678567, '2019-03-03 18:00:00'),
(138, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 65, 4, 70, NULL, 1, 678567, '2019-03-03 18:00:00'),
(139, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 66, 4, 69, NULL, 1, 678567, '2019-03-03 18:00:00'),
(140, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 67, 4, 72, NULL, 1, 678567, '2019-03-03 18:00:00'),
(141, 'Md Moniruzzaman', '01845609645', NULL, 'gazipur, joydevpur', 'mdmoniruzzamantheman@gmail.com', 17, 68, 4, 71, NULL, 1, 678567, '2019-03-03 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_others`
--

CREATE TABLE `tbl_others` (
  `id` int(11) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph1` varchar(1000) NOT NULL,
  `heading2` varchar(1000) NOT NULL,
  `paragraph2` varchar(1000) NOT NULL,
  `heading3` varchar(1000) NOT NULL,
  `paragraph3` varchar(1000) NOT NULL,
  `heading4` varchar(1000) DEFAULT NULL,
  `paragraph4` varchar(1000) DEFAULT NULL,
  `heading5` varchar(1000) DEFAULT NULL,
  `paragraph5` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_others`
--

INSERT INTO `tbl_others` (`id`, `image1`, `image2`, `image3`, `heading1`, `paragraph1`, `heading2`, `paragraph2`, `heading3`, `paragraph3`, `heading4`, `paragraph4`, `heading5`, `paragraph5`) VALUES
(1, '1550229361event-1.jpg', '1550229361event-2.jpg', '1550229361event-3.jpg', 'Other Event Example', 'Other Event Example', 'Other Event Example', 'Other Event Example', 'Other Event Example', 'Other Event Example', 'Other Event Example', 'Other Event Example', 'Other Event Example', 'Other Event Example');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parts&accessories`
--

CREATE TABLE `tbl_parts&accessories` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `heading2` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `heading3` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parts&accessories`
--

INSERT INTO `tbl_parts&accessories` (`id`, `heading1`, `paragraph`, `heading2`, `image1`, `heading3`, `image2`) VALUES
(1, 'Bikes&Cars Accessories items Shop', 'Paragraph Example', 'Bikes', '1550329254Bikescarsindex-1.jpg', 'Cars', '1550329254Bikescarsindex-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_resets`
--

CREATE TABLE `tbl_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_password_resets`
--

INSERT INTO `tbl_password_resets` (`email`, `token`, `role`) VALUES
('munna.ak17@gmail.com', '', 1),
('munna.ak17@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privacy_policy`
--

CREATE TABLE `tbl_privacy_policy` (
  `id` int(11) NOT NULL,
  `heading` varchar(1000) NOT NULL,
  `paragraph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_privacy_policy`
--

INSERT INTO `tbl_privacy_policy` (`id`, `heading`, `paragraph`) VALUES
(1, 'Policy', 'Policy elements goes here.Policy elements goes here.Policy elements goes here.Policy elements goes here.Policy elements goes here.Policy elements goes here.Policy elements goes here.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_fk` int(100) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `price` float NOT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `newarrival` tinyint(1) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL,
  `image3` varchar(1000) DEFAULT NULL,
  `specifications` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_code`, `product_name`, `category_fk`, `size`, `price`, `discount`, `quantity`, `newarrival`, `image1`, `image2`, `image3`, `specifications`) VALUES
(1, 'Ladies-1', 'Skirt', 1, '[\"M\",\"L\",\"XXL\"]', 500, '5', 5, 1, '1550511069product-1.jpg', '1550511069product-2.jpg', '1550511069product-3.jpg', 'Ladies'),
(2, 'Ladies-2', 'Sari', 1, '[\"M\",\"L\",\"XL\",\"XXL\"]', 500, NULL, 89, 1, '1550511098product-1.jpg', '1550511098product-2.jpg', '1550511098product-3.jpg', 'asdasd'),
(3, 'Ladies-3', '3 Pieces', 1, '[\"M\",\"L\",\"XL\",\"XXL\"]', 500, NULL, 89, 1, '1550511126product-1.jpg', '1550511126product-2.jpg', '1550511126product-3.jpg', 'asdasd'),
(4, 'Juwellay-1', 'Juwellay', 2, '[]', 10000, NULL, 100, 1, '1550581812product-1.jpg', '1550581812product-2.jpg', '1550581812product-3.jpg', 'Why SO Serious?????????.\r\nWhy SO Serious?????????.\r\nWhy SO Serious?????????'),
(5, 'Juwellay-2', 'Ornaments', 2, '[]', 10000, NULL, 100, 1, '1550581993product-1.gif', '1550581993product-2.gif', '1550581993product-3.gif', 'Why SO Serious?????????.\r\nWhy SO Serious?????????.\r\nWhy SO Serious?????????'),
(6, 'Juwellay-1', 'Diamond', 2, '[]', 200000, '10', 99, 1, '1550582078product-1.gif', '1550582078product-2.gif', '1550582079product-3.gif', 'Why SO Serious?????????.\r\nWhy SO Serious?????????.\r\nWhy SO Serious?????????'),
(7, 'Cosmatic-1', 'Cosmatic', 3, '[]', 600, '10', 100, 1, '1550583670product-1.jpg', '1550583670product-2.jpg', '1550583670product-3.jpg', 'Cosmatic'),
(8, 'Lipstick-1', 'Lipstick', 3, '[]', 600, '', 99, 1, '1550583750product-1.jpg', '1550583750product-2.jpg', '1550583750product-3.jpg', 'Lipstick'),
(9, 'cosmatic-2', 'cosmatic', 3, '[]', 600, '7', 100, 1, '1550583840product-1.jpg', '1550583840product-2.jpg', '1550583840product-3.jpg', 'cosmatic'),
(10, 'Shoes-1', 'Shoes', 4, '[\"20\",\"12\",\"14\",\"8\"]', 1000, NULL, 100, 1, '1550584488product-1.jpg', '1550584488product-2.jpg', '1550584488product-3.jpg', 'Shoes'),
(11, 'Shoes-2', 'Shoes', 4, '[\"20\",\"12\",\"14\",\"8\"]', 1000, '10', 99, 1, '1550584513product-1.jpg', '1550584513product-2.jpg', '1550584513product-3.jpg', 'Shoes'),
(12, 'Shoes-3', 'Shoes', 4, '[\"20\",\"12\",\"14\",\"8\"]', 1000, '10', 100, 1, '1550584536product-1.jpg', '1550584536product-2.jpg', '1550584536product-3.jpg', 'Shoes'),
(13, 'Gents-1', 'T-Shirts', 5, '[\"M\",\"L\",\"XL\",\"XXL\"]', 1200, '10', 16, 0, '1550585785product-1.jpg', '1550585785product-2.jpg', '1550585785product-3.jpg', 'Testing'),
(14, 'Gents-2', 'Shirts', 5, '[\"M\",\"L\",\"XL\",\"XXL\"]', 1000, NULL, 31, 0, '1550585840product-1.jpg', '1550585840product-2.jpg', '1550585840product-2.jpg', 'Testing'),
(15, 'Gents-3', 'Pants', 5, '[\"M\",\"L\",\"XL\",\"XXL\"]', 1000, NULL, 64, 0, '1550585870product-1.jpg', '1550585870product-2.jpg', '1550585870product-3.jpg', 'Testing'),
(16, 'Cosmatic-3', 'Gellete Shaving Creame', 6, '[]', 320, NULL, 98, 1, '1550723990product-1.jpg', '1550723990product-2.jpg', '1550723990product-2.jpg', 'Shaving Creame.'),
(17, 'Cosmatic-4', 'Gellete Razor Blade', 6, '[]', 120, '3', 99, 1, '1550724108product-1.jpg', '1550724109product-2.jpg', '1550724109product-2.jpg', 'Awesome Bladeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee'),
(18, 'Cosmatic-5', 'Gellete Blade', 6, '[]', 119, NULL, 89, 1, '1550724393product-1.jpg', '1550724393product-2.jpg', '1550724393product-2.jpg', 'asdasdasd'),
(19, 'Cosmatic-6', 'Axe-Body Spray', 6, '[]', 360, NULL, 88, 1, '1550725146product-1.jpg', '1550725146product-2.jpg', '1550725146product-2.jpg', 'asdasdasdasd'),
(20, 'shoes-4', 'Addidas Prime 101', 7, '[\"9\",\"8\",\"7\",null]', 1290, '10', 99, 1, '1550736259product-1.jpg', '1550736259product-2.jpg', '1550736259product-3.jpg', 'Addias Prime 101 With boost Power.'),
(21, 'shoes-5', 'Addidas Prime 110', 7, '[\"9\",\"8\",\"7\",null]', 1290, '10', 98, 1, '1550736328product-1.png', '1550736328product-2.jpg', '1550736328product-3.jpg', 'Addias Prime 110 With boost Power.'),
(22, 'shoes-56', 'Addidas Lofer', 7, '[\"9\",\"8\",\"7\",null]', 2000, NULL, 95, 0, '1550736430product-1.jpg', '1550736430product-2.jpg', '1550736430product-3.jpg', 'Addias Loffer for Ultimate satisfaction.'),
(23, 'Shoes-leather-1', 'Shoes leather 1', 25, '[\"20\",\"25\",\"22\",\"21\"]', 1232, '21', 99, 1, '1550736805product-1.jpg', '1550736805product-2.jpg', '1550736805product-3.jpg', 'Abcdef'),
(24, 'Shoes-leather-2', 'Shoes leather 2', 25, '[\"20\",\"25\",\"22\",\"21\"]', 3250, '50', 99, 1, '1550736872product-1.jpg', '1550736872product-2.jpg', '1550736872product-3.jpg', 'Leather Shoes'),
(25, 'Leather-bag-1', 'Luddo Bag', 23, '[]', 5000, '5', 89, 1, '1550737224product-1.jpg', '1550737224product-2.jpg', '1550737224product-3.jpg', 'Leather Bag Luddo'),
(26, 'Leather-bag-2', 'Luddo Bag Prime', 23, '[\"M\",\"S\",null,null]', 10001, '5', 69, 1, '1550737270product-1.jpg', '1550737270product-2.jpg', '1550737270product-3.jpg', 'Leather Bag Luddo Prime'),
(27, 'Leather-bag-3', 'Munna Bag', 23, '[\"M\",\"S\",null,null]', 20000, '20', 99, 1, '1550737353product-1.jpg', '1550737353product-2.jpg', '1550737353product-3.jpg', 'Munna Bag for Munnas GF.'),
(28, 'Leather Belt-1', 'Falcon Belt', 24, '[]', 10000, NULL, 90, 1, '1550737615product-1.jpg', '1550737615product-2.jpg', '1550737615product-3.jpg', 'Ultimate Leather Belt Built with pure Leather.'),
(29, 'Leather Belt-2', 'Falcon Belt XP', 24, '[]', 1000, NULL, 99, 1, '1550737654product-1.jpg', '1550737654product-2.jpg', '1550737654product-3.jpg', 'Ultimate Leather Belt XP Built with pure Leather.'),
(30, 'Leather Belt-2', 'Falcon Belt XP', 24, '[]', 1000, NULL, 100, 1, '1550737654product-1.jpg', '1550737654product-2.jpg', '1550737654product-3.jpg', 'Ultimate Leather Belt XP Built with pure Leather.'),
(31, 'Leather Belt-2', 'Falcon Belt XP XL', 24, '[]', 20012, NULL, 99, 1, '1550737700product-1.jpg', '1550737700product-2.jpg', '1550737700product-3.jpg', 'Ultimate Leather Belt XP Built with pure Leather.'),
(32, 'Electronics', 'Fan1', 9, '[]', 1234, NULL, 99, 1, '1550738399product-1.jpg', '1550738399product-2.jpg', '1550738399product-3.jpg', 'Ultimate fan Comes With power.'),
(33, 'Electronics-2', 'Fan XLK', 9, '[]', 1234, NULL, 99, 1, '1550738623product-1.jpg', '1550738623product-2.jpg', '1550738623product-3.jpg', 'Ultimate fan Comes With power.'),
(34, 'Electronics-3', 'Sample Product 1', 9, '[]', 1200, NULL, 89, 1, '1550738910product-1.png', '1550738910product-2.png', '1550738910product-3.jpg', 'Sample Product Description.'),
(35, 'Computer Accessories-2', 'RAM', 8, '[]', 2002, NULL, 88, 1, '1550739221product-1.png', '1550739221product-2.jpg', '1550739221product-3.jpg', 'zdfsdfsdf'),
(36, 'Gadget-1', 'Gadget Pro', 26, '[]', 10000, '10', 70, 1, '1550739534product-1.jpg', '1550739534product-2.png', '1550739534product-3.png', 'asdasdas'),
(37, 'Gadget-2', 'Gadget Pro', 26, '[]', 140000, '20', 68, 1, '1550739588product-1.png', '1550739588product-2.jpg', '1550739588product-3.jpg', 'asdasdas'),
(38, 'House Hold-2', 'House Hold', 16, '[]', 12000, NULL, 99, 1, '1550739690product-1.png', '1550739690product-2.jpg', '1550739690product-3.jpg', 'asdasdas'),
(39, 'House Hold-2', 'House Hold', 15, '[]', 12000, NULL, 98, 1, '1550739698product-1.png', '1550739698product-2.jpg', '1550739698product-3.jpg', 'asdasdas'),
(40, 'House Hold-2', 'House Hold', 17, '[]', 12000, NULL, 99, 1, '1550739708product-1.png', '1550739708product-2.jpg', '1550739708product-3.jpg', 'asdasdas'),
(41, 'House Hold-2', 'House Hold', 18, '[]', 12000, NULL, 99, 1, '1550739717product-1.png', '1550739717product-2.jpg', '1550739717product-3.jpg', 'asdasdas'),
(42, 'House Hold-2', 'House Hold', 19, '[]', 12000, NULL, 89, 1, '1550739728product-1.png', '1550739728product-2.jpg', '1550739728product-3.jpg', 'asdasdas'),
(43, 'House Hold-2', 'House Hold', 20, '[]', 12000, NULL, 99, 1, '1550739738product-1.png', '1550739738product-2.jpg', '1550739738product-3.jpg', 'asdasdas'),
(44, 'House Hold-2', 'House Hold', 11, '[]', 12000, NULL, 99, 1, '1550739940product-1.png', '1550739940product-2.jpg', '1550739940product-3.jpg', 'asdasdas'),
(45, 'House Hold-2', 'House Hold', 12, '[]', 12000, NULL, 49, 1, '1550739954product-1.png', '1550739954product-2.jpg', '1550739954product-3.jpg', 'asdasdas'),
(46, 'House Hold-2', 'House Hold', 13, '[]', 12000, NULL, 100, 1, '1550740133product-1.png', '1550740133product-2.jpg', '1550740133product-3.jpg', 'asdasdas'),
(47, 'House Hold-2', 'Curtains', 13, '[]', 12000, NULL, 98, 1, '1550740154product-1.png', '1550740154product-2.jpg', '1550740154product-3.jpg', 'asdasdas'),
(48, 'House Hold-2', 'Curtains', 14, '[]', 12000, NULL, 99, 1, '1550740211product-1.png', '1550740211product-2.jpg', '1550740211product-3.jpg', 'asdasdas'),
(49, 'Toys', 'Toys', 21, '[]', 12000, '10', 89, 1, '1550740269product-1.png', '1550740269product-2.jpg', '1550740269product-3.jpg', 'asdasdas'),
(50, 'Show Pieces', 'Show Pieces', 22, '[]', 12000, '10', 44, 1, '1550740285product-1.png', '1550740285product-2.jpg', '1550740285product-3.jpg', 'asdasdas'),
(51, 'Gift', 'Gift', 42, '[]', 12000, '5', 39, 1, '1550740336product-1.png', '1550740336product-2.jpg', '1550740336product-3.jpg', 'asdasdas'),
(52, 'Gift', 'Gift', 42, '[]', 12000, NULL, 80, 1, '1550740355product-1.png', '1550740355product-2.jpg', '1550740355product-3.jpg', 'asdasdas'),
(53, 'Flower', 'Flower', 43, '[]', 1200, '12', 89, 1, '1550740590product-1.jpg', '1550740590product-2.png', '1550740590product-3.jpg', 'asdasdasd'),
(54, 'Flower', 'Flower', 44, '[]', 1200, NULL, 89, 1, '1550740613product-1.jpg', '1550740613product-2.png', '1550740613product-3.jpg', 'asdasdasd'),
(55, 'Flower', 'Flower', 45, '[]', 1200, NULL, 98, 1, '1550740631product-1.jpg', '1550740631product-2.png', '1550740631product-3.jpg', 'asdasdasd'),
(56, 'Flower', 'Flower Anniversay', 46, '[]', 1200, NULL, 99, 1, '1550740655product-1.jpg', '1550740655product-2.png', '1550740655product-3.jpg', 'asdasdasd'),
(57, 'Flower', 'Flower Anniversay', 47, '[]', 1200, NULL, 99, 1, '1550740672product-1.jpg', '1550740672product-2.png', '1550740672product-3.jpg', 'asdasdasd'),
(58, 'Flower', 'Flower Anniversay', 48, '[]', 1200, NULL, 98, 1, '1550740733product-1.jpg', '1550740733product-2.png', '1550740733product-3.jpg', 'asdasdasd'),
(59, 'Books', 'Books', 28, '[]', 1200, NULL, 89, 1, '1550740760product-1.jpg', '1550740760product-2.png', '1550740760product-3.jpg', 'asdasdasd'),
(60, 'Magazine', 'Magazine', 29, '[]', 1200, NULL, 76, 1, '1550740774product-1.jpg', '1550740774product-2.png', '1550740774product-3.jpg', 'asdasdasd'),
(61, 'Sample', 'Sample Name', 30, '[]', 1200, NULL, 100, 1, '1550740806product-1.jpg', '1550740806product-2.png', '1550740806product-3.jpg', 'asdasdasd'),
(62, 'Sample', 'Sample Name', 31, '[]', 1200, NULL, 79, 1, '1550740818product-1.jpg', '1550740818product-2.png', '1550740818product-3.jpg', 'asdasdasd'),
(63, 'Sample', 'Sample Name', 32, '[]', 1200, NULL, 98, 1, '1550740833product-1.jpg', '1550740833product-2.png', '1550740833product-3.jpg', 'asdasdasd'),
(64, 'Sample', 'Sample Name', 33, '[]', 1200, NULL, 89, 1, '1550740958product-1.jpg', '1550740958product-2.png', '1550740958product-3.jpg', 'asdasdasd'),
(65, 'Sample', 'Sample Name', 34, '[]', 1200, NULL, 99, 1, '1550740974product-1.jpg', '1550740974product-2.png', '1550740974product-3.jpg', 'asdasdasd'),
(66, 'Sample', 'Sample Name', 35, '[]', 1200, NULL, 99, 1, '1550741077product-1.jpg', '1550741077product-2.png', '1550741077product-3.jpg', 'asdasdasd'),
(67, 'Sample', 'Sample Name', 36, '[]', 1200, NULL, 99, 1, '1550741093product-1.jpg', '1550741093product-2.png', '1550741093product-3.jpg', 'asdasdasd'),
(68, 'Sample', 'Sample Name', 37, '[]', 1200, NULL, 99, 1, '1550741110product-1.jpg', '1550741110product-2.png', '1550741110product-3.jpg', 'asdasdasd'),
(69, 'Sample', 'Sample Name', 38, '[]', 1200, NULL, 89, 1, '1550741127product-1.jpg', '1550741127product-2.png', '1550741127product-3.jpg', 'asdasdasd'),
(70, 'Sample', 'Sample Name', 39, '[]', 1200, NULL, 99, 1, '1550741137product-1.jpg', '1550741137product-2.png', '1550741137product-3.jpg', 'asdasdasd'),
(71, 'Sample', 'Sample Name', 40, '[]', 1200, NULL, 99, 1, '1550741162product-1.jpg', '1550741162product-2.png', '1550741162product-3.jpg', 'asdasdasd'),
(72, 'Sample', 'Sample Name', 41, '[]', 1200, NULL, 45, 1, '1550741169product-1.jpg', '1550741169product-2.png', '1550741169product-3.jpg', 'asdasdasd'),
(73, 'Testing', 'Testing', 1, '[\"M\",\"L\",\"XL\",\"XXL\"]', 1200, '4', 60, 1, '1550767490product-1.jpg', '1550767490product-2.jpg', '1550767490product-3.jpg', 'Messi.'),
(74, 'Testing2', 'Testing2', 2, '[]', 1111, '4', 88, 1, '1550767594product-1.jpg', '1550767594product-2.jpg', '1550767594product-3.jpg', 'Messi.'),
(75, 'Testing2', 'Testing2', 2, '[]', 1111, '4', 100, 1, '1550767684product-1.jpg', '1550767684product-2.jpg', '1550767684product-3.jpg', 'Messi.'),
(76, 'Ladies-1', 'asdasd', 14, '[]', 123, '10', 99, 1, '1550772192product-1.jpg', '1550772192product-2.jpg', '1550772192product-3.jpg', 'asdfasdasdasdas'),
(77, 'Testing3', 'Testing3', 3, '[]', 111, NULL, 90, 1, '1550772670product-1.jpg', '1550772670product-2.jpg', '1550772670product-3.jpg', 'sadasdasd'),
(78, 'Munna', 'Munna', 40, '[]', 123, '10', 89, 1, '1550774524product-1.jpg', '1550774524product-2.jpg', '1550774524product-3.jpg', 'Medicine'),
(79, 'Security', 'Security-1', 10, '[]', 1111, NULL, 99, 1, '1550921826product-1.jpg', '1550921826product-2.png', '1550921826product-3.jpg', 'asdasdasdasd'),
(80, 'House Hold-test', 'Munna Household', 11, '[]', 400, NULL, 99, 1, '1551431060product-1.jpg', '1551431060product-2.jpg', '1551431060product-3.jpg', 'Munna Testing'),
(81, 'House Hold-test', 'Munna Household', 43, '[]', 400, NULL, 100, 1, '1551431122product-1.jpg', '1551431122product-2.jpg', '1551431122product-3.jpg', 'Munna Testing'),
(82, 'House Hold-test', 'Munna Household', 44, '[]', 400, NULL, 100, 1, '1551431156product-1.jpg', '1551431156product-2.jpg', '1551431156product-3.jpg', 'Munna Testing'),
(83, 'MUNNA-test', 'Munna Household', 45, '[]', 400, NULL, 100, 1, '1551431177product-1.jpg', '1551431177product-2.jpg', '1551431177product-3.jpg', 'Munna Testing'),
(84, 'MUNNA-test', 'Munna Testing', 48, '[]', 400, NULL, 100, 1, '1551431203product-1.jpg', '1551431203product-2.jpg', '1551431203product-3.jpg', 'Munna Testing'),
(86, 'Testing', 'Testing Product', 1, '[]', 1200, '10', 100, 1, '1551797616product-1.jpg', '1551797616product-2.jpg', '1551797616product-3.jpg', 'Testing Specifications'),
(87, 'Testing', 'Testing Product', 1, '[]', 1200, NULL, 100, 1, '1551797754product-1.jpg', '1551797754product-2.jpg', NULL, 'Testing Specifications'),
(88, 'Testing', 'Testing Product', 1, '[]', 1200, NULL, 100, 1, '1551797785product-1.jpg', '1551797785product-2.jpg', NULL, 'Testing Specifications'),
(89, 'Testing', 'Testing Product', 2, '[]', 1200, NULL, 100, 1, '1551797841product-1.jpg', '1551797841product-2.jpg', '1551797841product-3.jpg', 'Testing Specifications'),
(90, 'Testing', 'Testing Product', 3, '[]', 1200, NULL, 100, 1, '1551797874product-1.jpg', '1551797874product-2.jpg', '1551797874product-3.jpg', 'Testing Specifications'),
(91, 'Testing', 'Testing Product', 4, '[]', 1200, NULL, 100, 1, '1551797895product-1.jpg', '1551797895product-2.jpg', NULL, 'Testing Specifications'),
(92, 'Testing', 'Testing Product', 5, '[]', 1200, NULL, 100, 1, '1551797951product-1.jpg', '1551797951product-2.jpg', '1551797951product-3.jpg', 'Testing Specifications'),
(93, 'Testing', 'Testing Product', 6, '[]', 1200, NULL, 100, 1, '1551797965product-1.jpg', '1551797965product-2.jpg', '1551797965product-3.jpg', 'Testing Specifications'),
(94, 'Testing', 'Testing Product', 4, '[]', 1200, '5', 100, 1, '1551797982product-1.jpg', '1551797982product-2.jpg', '1551797982product-3.jpg', 'Testing Specifications'),
(95, 'Testing', 'Testing Product', 7, '[]', 1200, '5', 100, 1, '1551798002product-1.jpg', '1551798002product-2.jpg', '1551798002product-3.jpg', 'Testing Specifications'),
(96, 'Testing', 'Testing Product', 23, '[]', 1200, '5', 100, 1, '1551798021product-1.jpg', '1551798021product-2.jpg', '1551798021product-3.jpg', 'Testing Specifications'),
(97, 'Testing', 'Testing Product', 24, '[]', 1200, '5', 100, 1, '1551798036product-1.jpg', '1551798036product-2.jpg', '1551798036product-3.jpg', 'Testing Specifications'),
(98, 'Testing', 'Testing Product', 25, '[]', 1200, NULL, 100, 1, '1551798055product-1.jpg', '1551798055product-2.jpg', '1551798055product-3.jpg', 'Testing Specifications'),
(99, 'Testing', 'Testing Product', 8, '[]', 1200, NULL, 100, 1, '1551798080product-1.jpg', '1551798080product-2.jpg', '1551798080product-3.jpg', 'Testing Specifications'),
(100, 'Testing', 'Testing Product', 9, '[]', 1200, NULL, 100, 1, '1551798092product-1.jpg', '1551798092product-2.jpg', '1551798092product-3.jpg', 'Testing Specifications'),
(101, 'Testing', 'Testing Product', 10, '[]', 1200, NULL, 100, 1, '1551798103product-1.jpg', '1551798103product-2.jpg', '1551798103product-3.jpg', 'Testing Specifications'),
(102, 'Testing', 'Testing Product', 26, '[]', 1200, NULL, 100, 1, '1551798132product-1.jpg', '1551798132product-2.jpg', '1551798132product-3.jpg', 'Testing Specifications'),
(103, 'Testing', 'Testing Product', 11, '[]', 1200, NULL, 100, 1, '1551798153product-1.jpg', '1551798153product-2.jpg', '1551798153product-3.jpg', 'Testing Specifications'),
(104, 'Testing', 'Testing Product', 12, '[]', 1200, NULL, 100, 1, '1551798159product-1.jpg', '1551798159product-2.jpg', '1551798159product-3.jpg', 'Testing Specifications'),
(105, 'Testing', 'Testing Product', 13, '[]', 1200, NULL, 100, 1, '1551798168product-1.jpg', '1551798168product-2.jpg', '1551798168product-3.jpg', 'Testing Specifications'),
(106, 'Testing', 'Testing Product', 14, '[]', 1200, NULL, 100, 1, '1551798178product-1.jpg', '1551798178product-2.jpg', '1551798178product-3.jpg', 'Testing Specifications'),
(107, 'Testing', 'Testing Product', 15, '[]', 1200, NULL, 100, 1, '1551798409product-1.jpg', '1551798409product-2.jpg', '1551798409product-3.jpg', 'Testing Specifications'),
(108, 'Testing', 'Testing Product', 16, '[]', 1200, NULL, 100, 1, '1551798419product-1.jpg', '1551798419product-2.jpg', '1551798419product-3.jpg', 'Testing Specifications'),
(109, 'Testing', 'Testing Product', 17, '[]', 1200, NULL, 100, 1, '1551798462product-1.jpg', '1551798462product-2.jpg', '1551798462product-3.jpg', 'Testing Specifications'),
(110, 'Testing', 'Testing Product', 18, '[]', 1200, NULL, 100, 1, '1551798472product-1.jpg', '1551798472product-2.jpg', '1551798472product-3.jpg', 'Testing Specifications'),
(111, 'Testing', 'Testing Product', 19, '[]', 1200, NULL, 100, 1, '1551798481product-1.jpg', '1551798481product-2.jpg', '1551798481product-3.jpg', 'Testing Specifications'),
(112, 'Testing', 'Testing Product', 20, '[]', 1200, NULL, 100, 1, '1551798492product-1.jpg', '1551798492product-2.jpg', '1551798492product-3.jpg', 'Testing Specifications'),
(113, 'Testing', 'Testing Product', 21, '[]', 1200, NULL, 100, 1, '1551798806product-1.jpg', '1551798806product-2.jpg', '1551798806product-3.jpg', 'Testing Specifications'),
(114, 'Testing', 'Testing Product', 22, '[]', 1200, NULL, 100, 1, '1551798814product-1.jpg', '1551798814product-2.jpg', '1551798814product-3.jpg', 'Testing Specifications'),
(115, 'Testing', 'Testing Product', 42, '[]', 1200, NULL, 100, 1, '1551798869product-1.jpg', '1551798869product-2.jpg', '1551798869product-3.jpg', 'Testing Specifications'),
(116, 'Testing', 'Testing Product', 43, '[]', 1200, NULL, 100, 1, '1551798920product-1.jpg', '1551798920product-2.jpg', '1551798920product-3.jpg', 'Testing Specifications'),
(117, 'Testing', 'Testing Product', 44, '[]', 1200, NULL, 100, 1, '1551798930product-1.jpg', '1551798930product-2.jpg', '1551798930product-3.jpg', 'Testing Specifications'),
(118, 'Testing', 'Testing Product', 45, '[]', 1200, NULL, 100, 1, '1551798948product-1.jpg', '1551798948product-2.jpg', '1551798948product-3.jpg', 'Testing Specifications'),
(119, 'Testing', 'Testing Product', 46, '[]', 1200, NULL, 100, 1, '1551798967product-1.jpg', '1551798967product-2.jpg', '1551798967product-3.jpg', 'Testing Specifications'),
(120, 'Testing', 'Testing Product', 47, '[]', 1200, NULL, 100, 1, '1551798974product-1.jpg', '1551798974product-2.jpg', '1551798974product-3.jpg', 'Testing Specifications'),
(121, 'Testing', 'Testing Product', 48, '[]', 1200, NULL, 100, 1, '1551798985product-1.jpg', '1551798985product-2.jpg', '1551798985product-3.jpg', 'Testing Specifications'),
(122, 'Testing', 'Testing Product', 28, '[]', 1200, NULL, 100, 1, '1551799246product-1.jpg', '1551799246product-2.jpg', '1551799247product-3.jpg', 'Testing Specifications'),
(123, 'Testing', 'Testing Product', 29, '[]', 1200, '10', 100, 1, '1551799257product-1.jpg', '1551799257product-2.jpg', '1551799257product-3.jpg', 'Testing Specifications'),
(124, 'Testing', 'Testing Product', 30, '[]', 1200, '10', 100, 1, '1551799302product-1.jpg', '1551799302product-2.jpg', '1551799302product-3.jpg', 'Testing Specifications'),
(125, 'Testing', 'Testing Product', 31, '[]', 1200, '10', 100, 1, '1551799314product-1.jpg', '1551799314product-2.jpg', '1551799314product-3.jpg', 'Testing Specifications'),
(126, 'Testing', 'Testing Product', 32, '[]', 1200, NULL, 100, 1, '1551799325product-1.jpg', '1551799325product-2.jpg', '1551799325product-3.jpg', 'Testing Specifications'),
(127, 'Testing', 'Testing Product', 33, '[]', 1200, NULL, 100, 1, '1551799334product-1.jpg', '1551799334product-2.jpg', '1551799334product-3.jpg', 'Testing Specifications'),
(128, 'Testing', 'Testing Product', 34, '[]', 1200, '10', 100, 1, '1551799345product-1.jpg', '1551799345product-2.jpg', '1551799345product-3.jpg', 'Testing Specifications'),
(129, 'Testing', 'Testing Product', 35, '[]', 1200, '10', 100, 1, '1551799388product-1.jpg', '1551799388product-2.jpg', '1551799389product-3.jpg', 'Testing Specifications'),
(130, 'Testing', 'Testing Product', 36, '[]', 1200, '10', 100, 1, '1551799396product-1.jpg', '1551799396product-2.jpg', '1551799396product-3.jpg', 'Testing Specifications'),
(131, 'Testing', 'Testing Product', 37, '[]', 1200, '10', 100, 1, '1551799409product-1.jpg', '1551799409product-2.jpg', '1551799409product-3.jpg', 'Testing Specifications'),
(132, 'Testing', 'Testing Product', 38, '[]', 1200, '10', 100, 1, '1551799440product-1.jpg', '1551799440product-2.jpg', '1551799440product-3.jpg', 'Testing Specifications'),
(133, 'Testing', 'Testing Product', 39, '[]', 1200, '10', 100, 1, '1551799448product-1.jpg', '1551799448product-2.jpg', '1551799448product-3.jpg', 'Testing Specifications'),
(134, 'Testing', 'Testing Product', 40, '[]', 1200, '10', 100, 1, '1551799456product-1.jpg', '1551799456product-2.jpg', '1551799456product-3.jpg', 'Testing Specifications'),
(135, 'Testing', 'Testing Product', 41, '[]', 1200, '10', 100, 1, '1551799463product-1.jpg', '1551799463product-2.jpg', '1551799463product-3.jpg', 'Testing Specifications');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Delivered'),
(3, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toys_index`
--

CREATE TABLE `tbl_toys_index` (
  `id` int(11) NOT NULL,
  `heading1` varchar(1000) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_toys_index`
--

INSERT INTO `tbl_toys_index` (`id`, `heading1`, `paragraph`, `image1`, `image2`) VALUES
(1, 'Toys & Show Pieces Shop', 'Paragraph Example', '1551267270toyindex-1.jpg', '1551267270toyindex-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `mobile` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `confirm_password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `email`, `mobile`, `address`, `password`, `confirm_password`) VALUES
(1, 'Amiruzzaman', 'Amir', 'munna.ak17@gmail.com', '1641064685', 'gazipur, joydevpur', '$2y$10$sZdlb773YIDVKlZ/..62YuZsM.FxynMUj1zWkRvDxJ7.w1H4Bz1Ca', '$2y$10$1RFoFheH/0OYfbpsLH02luxN2HmKwAC4kuXxyT5GrqcfvlXF2YaWq'),
(2, 'Istiak', 'Istiak', 'munna.ak17@yahoo.com', '1787284068', 'gazipur, joydevpur', '$2y$10$N0DfuubpZe5BF8t90fz/d.9yEdzDAh9a7Ysd.xwH8TKED8WkMsYba', '$2y$10$bis7PSnEY0L9MQ9YTAOaCOLhDKniLkZeK0KsURXv4WVo3qVJh.v72'),
(3, 'Shovon Shahriar', 'shovon', 'munna.ak17@gmail.com', '09232323232', 'Tongi', '$2y$10$sZdlb773YIDVKlZ/..62YuZsM.FxynMUj1zWkRvDxJ7.w1H4Bz1Ca', '$2y$10$Zt./pgIvMx4ywg7gagzIteMF74sw7iOirOWbsvZT/uxIzeamf/AIa'),
(4, 'Nd Moniruzzaman', 'Billal', 'mdmoniruzzamantheman@gmail.com', '01906464820', 'gazipur, joydevpur', '$2y$10$sDtoQtsql0BXrpyfdPY1MeqNIlFUOJrkb1qQlvNroL8CyxGiIAKj2', '$2y$10$tS1qEkMQTXkC2A3dGFJm3.xdDtADwhV1J.RLJ5LQO6tizNB9XTP/W'),
(5, 'rabbi', 'Admin', 'golam@gmail.com', '888888', 'gazipur, joydevpur', '$2y$10$myNAgnQGyoUidrwZBM/souvtqIeHKMdjFFiSz8cO47XbxgH5S.Iha', '$2y$10$7HW2YuYL8.Cx1rCeEDCPOOxXL6m/WBydRCVCTXQuvpz.iePf3si/u'),
(6, 'Abdul haque', 'Testing Username', 'munna.ak17@yahoo.com', '1787284068', 'gazipur, joydevpur', '$2y$10$PJFdyxIZ1NRv/5K/VP6gYOpgeRymTih6xrbAn/HU9ROPfiUZgst7G', '$2y$10$jJ6ohfOnD/tHlyrMkFtLq.xFhm1MUd0gepuhLTz87X9L3pqzOYC9q'),
(7, 'Golam', 'Golam', 'golam@gmail.com', '017', 'Dhaka', '$2y$10$2RNO//jGQ16L6YYyKZBtDOaTQUJrwGz.SGGeqfUqfzsX2bf970S4G', '$2y$10$S9Ec.f87/3tcn2Vioi4l1eVSkF871rLEM3/R1YWPJBX7U.JbNxHJi'),
(8, 'Testing', 'Testing', 'Testing@gmail.com', 'Testing', 'Testing', '$2y$10$1nMU4HhhbaqrBwr4IRoFreyx/pP4rV1xlULRCQwkFva5y43z2GtwO', '$2y$10$1f70fEXInuP0/Hlc2moLB.y49TAPXC.4yzoqkBrL1ieDTkQjvet7a'),
(9, 'Munna Amiruzzaman', 'Amir Munna', 'munna.ak17@gmail.com', '1641064685', 'gazipur, joydevpur', '$2y$10$wBKYuG.gNCXh3z1WrFpRcO1rmP3Ovucj0mhHilfMChrf07aolveui', '$2y$10$Kjc4PJoFNi2ybh1OrWbFmesbB3GpXj6HoWCS.7waZeMzSWcPZUgvW');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userpasswordreset`
--

CREATE TABLE `tbl_userpasswordreset` (
  `id` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `token` varchar(1000) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userpasswordreset`
--

INSERT INTO `tbl_userpasswordreset` (`id`, `email`, `token`, `role`) VALUES
(4, 'munna.ak17@yahoo.com', '', 2),
(5, 'munna.ak17@yahoo.com', '', 2),
(6, 'mdmoniruzzamantheman@gmail.com', '1ead57f28a568c62adb0a4f3eec79a1dbf9b57c0', 2),
(7, 'munna.ak17@gmail.com', '', 2),
(8, 'mdmoniruzzamantheman@gmail.com', 'b2aefd5c7c7b52c992eab1547fbc1b4cc7305129', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_invoice`
-- (See below for the actual view)
--
CREATE TABLE `view_invoice` (
`Username` varchar(1000)
,`email` varchar(1000)
,`mobile` varchar(1000)
,`address` varchar(1000)
,`id` int(11)
,`user_id` int(11)
,`Order_date` timestamp
,`name` varchar(1000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_order`
-- (See below for the actual view)
--
CREATE TABLE `view_order` (
`id` int(11)
,`name` varchar(100)
,`mobile1` varchar(100)
,`mobile2` varchar(100)
,`address` varchar(100)
,`email` varchar(1000)
,`invoice_id` int(11)
,`cart_id` int(255)
,`user_id` int(255)
,`cart_product_id` int(255)
,`cart_size` varchar(100)
,`cart_quantity` int(255)
,`cart_totalprice` float
,`orderdate` timestamp
,`image1` varchar(1000)
,`product_name` varchar(100)
,`category_fk` int(100)
,`category_name` varchar(10000)
,`status` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_product`
-- (See below for the actual view)
--
CREATE TABLE `view_product` (
`id` int(11)
,`product_code` varchar(100)
,`product_name` varchar(100)
,`category_fk` int(100)
,`category_name` varchar(10000)
,`size` varchar(100)
,`price` float
,`discount` varchar(100)
,`quantity` int(100)
,`newarrival` tinyint(1)
,`image1` varchar(1000)
,`image2` varchar(1000)
,`image3` varchar(1000)
,`specifications` text
);

-- --------------------------------------------------------

--
-- Structure for view `view_invoice`
--
DROP TABLE IF EXISTS `view_invoice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_invoice`  AS  select `tbl_user`.`name` AS `Username`,`tbl_user`.`email` AS `email`,`tbl_user`.`mobile` AS `mobile`,`tbl_user`.`address` AS `address`,`tbl_invoice`.`id` AS `id`,`tbl_invoice`.`user_id` AS `user_id`,`tbl_invoice`.`Order_date` AS `Order_date`,`tbl_status`.`name` AS `name` from ((`tbl_user` join `tbl_invoice` on((`tbl_user`.`id` = `tbl_invoice`.`user_id`))) join `tbl_status` on((`tbl_status`.`id` = `tbl_invoice`.`status`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_order`
--
DROP TABLE IF EXISTS `view_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order`  AS  select `tbl_order`.`id` AS `id`,`tbl_order`.`name` AS `name`,`tbl_order`.`mobile1` AS `mobile1`,`tbl_order`.`mobile2` AS `mobile2`,`tbl_order`.`address` AS `address`,`tbl_order`.`email` AS `email`,`tbl_order`.`invoice_id` AS `invoice_id`,`tbl_order`.`cart_id` AS `cart_id`,`tbl_order`.`user_id` AS `user_id`,`tbl_order`.`cart_product_id` AS `cart_product_id`,`tbl_order`.`cart_size` AS `cart_size`,`tbl_order`.`cart_quantity` AS `cart_quantity`,`tbl_order`.`cart_totalprice` AS `cart_totalprice`,`tbl_order`.`orderdate` AS `orderdate`,`tbl_product`.`image1` AS `image1`,`tbl_product`.`product_name` AS `product_name`,`tbl_product`.`category_fk` AS `category_fk`,`tbl_category`.`category_name` AS `category_name`,`tbl_invoice`.`status` AS `status` from (((`tbl_order` join `tbl_product` on((`tbl_order`.`cart_product_id` = `tbl_product`.`id`))) join `tbl_category` on((`tbl_category`.`id` = `tbl_product`.`category_fk`))) join `tbl_invoice` on((`tbl_invoice`.`id` = `tbl_order`.`invoice_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_product`
--
DROP TABLE IF EXISTS `view_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_product`  AS  select `tbl_product`.`id` AS `id`,`tbl_product`.`product_code` AS `product_code`,`tbl_product`.`product_name` AS `product_name`,`tbl_product`.`category_fk` AS `category_fk`,`tbl_category`.`category_name` AS `category_name`,`tbl_product`.`size` AS `size`,`tbl_product`.`price` AS `price`,`tbl_product`.`discount` AS `discount`,`tbl_product`.`quantity` AS `quantity`,`tbl_product`.`newarrival` AS `newarrival`,`tbl_product`.`image1` AS `image1`,`tbl_product`.`image2` AS `image2`,`tbl_product`.`image3` AS `image3`,`tbl_product`.`specifications` AS `specifications` from (`tbl_product` join `tbl_category`) where (`tbl_category`.`id` = `tbl_product`.`category_fk`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_electronics_index`
--
ALTER TABLE `tbl_electronics_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eventbirthday`
--
ALTER TABLE `tbl_eventbirthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eventwedding`
--
ALTER TABLE `tbl_eventwedding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event_index`
--
ALTER TABLE `tbl_event_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_famous&tradition_index`
--
ALTER TABLE `tbl_famous&tradition_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_flower_index`
--
ALTER TABLE `tbl_flower_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food_index`
--
ALTER TABLE `tbl_food_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_furniture_index`
--
ALTER TABLE `tbl_furniture_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gents_index`
--
ALTER TABLE `tbl_gents_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hospitality`
--
ALTER TABLE `tbl_hospitality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_household_index`
--
ALTER TABLE `tbl_household_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ladies_index`
--
ALTER TABLE `tbl_ladies_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leather_index`
--
ALTER TABLE `tbl_leather_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lighting`
--
ALTER TABLE `tbl_lighting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_medicine&emergency`
--
ALTER TABLE `tbl_medicine&emergency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_others`
--
ALTER TABLE `tbl_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_parts&accessories`
--
ALTER TABLE `tbl_parts&accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_password_resets`
--
ALTER TABLE `tbl_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_privacy_policy`
--
ALTER TABLE `tbl_privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_toys_index`
--
ALTER TABLE `tbl_toys_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userpasswordreset`
--
ALTER TABLE `tbl_userpasswordreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_electronics_index`
--
ALTER TABLE `tbl_electronics_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_eventbirthday`
--
ALTER TABLE `tbl_eventbirthday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_eventwedding`
--
ALTER TABLE `tbl_eventwedding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_event_index`
--
ALTER TABLE `tbl_event_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_famous&tradition_index`
--
ALTER TABLE `tbl_famous&tradition_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_flower_index`
--
ALTER TABLE `tbl_flower_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_food_index`
--
ALTER TABLE `tbl_food_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_furniture_index`
--
ALTER TABLE `tbl_furniture_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gents_index`
--
ALTER TABLE `tbl_gents_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_hospitality`
--
ALTER TABLE `tbl_hospitality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_household_index`
--
ALTER TABLE `tbl_household_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_ladies_index`
--
ALTER TABLE `tbl_ladies_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_leather_index`
--
ALTER TABLE `tbl_leather_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lighting`
--
ALTER TABLE `tbl_lighting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_medicine&emergency`
--
ALTER TABLE `tbl_medicine&emergency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `tbl_others`
--
ALTER TABLE `tbl_others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_parts&accessories`
--
ALTER TABLE `tbl_parts&accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_privacy_policy`
--
ALTER TABLE `tbl_privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_toys_index`
--
ALTER TABLE `tbl_toys_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_userpasswordreset`
--
ALTER TABLE `tbl_userpasswordreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
