-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 10:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `id`, `name`) VALUES
('adminahmad0@gmail.com', '0123456789', 1, 'Admin Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(2, 'craft', '5.jpg'),
(3, 'sweet', '2.jpg'),
(6, 'food', '3.jpg'),
(7, 'art', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `report` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment`, `userid`, `id`, `name`, `image`, `report`) VALUES
('Ya rab', 2, 10, 'ruya', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/ff319ab6-5c2b-4591-acde-0f145c284d98.jpg', 0),
('test if still not work, ihope if it work if not god give me patient', 7, 12, 'Ruya atatreh', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/1ed17b8b-79ef-40a5-8415-4f47192d0270.jpg', 0),
('you can do it just try and start🥰', 7, 13, 'Ruya atatreh', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/1ed17b8b-79ef-40a5-8415-4f47192d0270.jpg', 0),
('Dfggvvbngdudhgssfhhggggggfdssfggdsdfggfsdghhhhgggggggfddfggghggfddddfffffgggggggggggggffggfghgggdfhhbbvcxxxccvbbbvvvvbbbvvvgffffgghbgvvvvvccccccggggggvvvvvvvvvvgvvvfxzxcvcxzxzxcbcxzddffg', 7, 14, 'Ruya atatreh', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252FApp-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/411c2b16-a5e9-4e29-9910-fd01cb51616b.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `sid` int(10) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `simage` varchar(255) NOT NULL,
  `bid` int(10) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`sid`, `sname`, `simage`, `bid`, `bname`, `text`, `productname`, `status`) VALUES
(0, '', '', 0, '', '', '', ''),
(0, '', '', 0, '', '', '', ''),
(0, '', '', 0, '', '', '', ''),
(7, 'Ruya atatreh', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252FApp-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/411c2b16-a5e9-4e29-9910-fd01cb51616b.jpg', 7, 'Ruya atatreh', 'Food', 'Book', 'decline');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `userid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `bio` varchar(200) DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`userid`, `id`, `name`, `image`, `type`, `price`, `bio`, `rate`, `state`) VALUES
(7, 8, 'table', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/1ed17b8b-79ef-40a5-8415-4f47192d0270.jpg', 'Craft', 350, '300m*300m', 3, 1),
(7, 9, 'poster', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/1ed17b8b-79ef-40a5-8415-4f47192d0270.jpg', 'Craft', 170, 'brown.300cm2', 2, 0),
(8, 26, 'cake', '1.PNG', 'food', 25, 'sweet', 0, 0),
(8, 27, 'cookies', '1.PNG', 'food', 5, 'sweet', 0, 0),
(8, 28, 'sweet', '2.jpg', 'food', 5, 'sweet', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(20) NOT NULL,
  `itemno` int(11) NOT NULL,
  `itemprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`bid`, `pid`, `sid`, `name`, `image`, `bio`, `rate`, `price`, `type`, `itemno`, `itemprice`) VALUES
(7, 14, 7, 'Book', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/05bad1ec-1de0-4000-8ba6-824275f8060d.jpg', 'Note Book', 2, 10, 'Craft', 1, 10),
(8, 26, 8, 'cake', '3.jpg', 'sweet', 3, 25, 'food', 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `Text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `Text`) VALUES
(1, 'Set goals and get Super Focused!'),
(2, 'build your inventory and stock those shelves!'),
(3, 'Automate as much of your shop as possible!'),
(4, 'it\'s good  to choose aproduct name '),
(5, 'open your store it\'s not scary!'),
(6, 'create your logos!'),
(7, 'in store page write what you\'re about and what you\'re sealing.'),
(8, 'give people as much information as you can'),
(9, 'product photography is really important'),
(10, 'your product photos are essentially what people are going to be buying'),
(11, 'descriptions and the tags which are going to be what your item to show up when people search!'),
(12, 'you can include lots of keywords and key phrases for people to search and find your products'),
(13, 'description is really important'),
(14, 'picture & descriptions are what sell your products!'),
(15, 'picture & descriptions are what sell your products!'),
(16, 'product shipping & packaging is important!'),
(17, 'order shipping materials before you make your first sale'),
(18, 'maybe you need to have way to send out your product'),
(19, 'start with a few product in your shop!'),
(20, 'Take advantage of app tools and guidance'),
(21, 'Release new product regularly!');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `noteid` int(11) NOT NULL,
  `text` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`noteid`, `text`, `userid`, `color`) VALUES
(1, 'Tist', 7, 'true'),
(2, 'Tist1', 7, 'true'),
(1, 'Tfgt', 7, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `itemno` int(11) NOT NULL,
  `total` double NOT NULL,
  `likeuser` int(10) NOT NULL,
  `dislike` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `email`, `bio`, `address`, `password`, `phonenumber`, `image`, `cost`, `profit`, `itemno`, `total`, `likeuser`, `dislike`) VALUES
(7, 'Ruya atatreh', 'ruyaatatreh99@gmail.com', 'computer engineering. Food .sweet', 'jenin-Yabad', '0123456789', '0599553939', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252FApp-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/411c2b16-a5e9-4e29-9910-fd01cb51616b.jpg', 0, 0, 0, 10, 3, 2),
(8, 'zain', 'zainatatre@gmail.com', '', 'jenin', '0123456789', '0599553939', '1.png', 0, 0, 0, 0, 5, 4),
(9, 'Admin Ahmad', 'adminahmad0@gmail.com', '', '', '123456789', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userordder`
--

CREATE TABLE `userordder` (
  `bid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `itemno` int(11) NOT NULL,
  `itemprice` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userordder`
--

INSERT INTO `userordder` (`bid`, `sid`, `pid`, `itemno`, `itemprice`, `name`, `image`, `username`, `address`, `phone`, `status`) VALUES
(7, 7, 8, 1, 350, 'table', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/1ed17b8b-79ef-40a5-8415-4f47192d0270.jpg', 'Ruya atatreh', 'jenin-Yabad', '0599553939', ''),
(7, 7, 9, 1, 170, 'poster', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/1ed17b8b-79ef-40a5-8415-4f47192d0270.jpg', 'Ruya atatreh', 'jenin-Yabad', '0599553939', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`bid`, `pid`, `sid`, `name`, `image`, `bio`, `rate`, `price`, `type`) VALUES
(2, 1, 2, 'vanilia cake', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/aebb9fb5-079f-4565-bd5b-9c9451f61a5f.jpg', 'big size', 4, 50, 'food'),
(7, 9, 7, 'poster', 'file:/data/user/0/host.exp.exponent/cache/ExperienceData/%2540anonymous%252Fmyproject1-fa1dc586-87c1-4218-b0b2-9fbb7c369ea7/ImagePicker/1ed17b8b-79ef-40a5-8415-4f47192d0270.jpg', 'brown.300cm2', 2, 170, 'Craft'),
(7, 0, 0, '', '', '', 0, 0, ''),
(8, 26, 8, 'cake', '1.png', 'sweet', 4, 25, 'food');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
