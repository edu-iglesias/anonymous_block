-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2014 at 02:58 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `everlasting`
--
CREATE DATABASE IF NOT EXISTS `everlasting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `everlasting`;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
  `content` varchar(2000) NOT NULL,
  `about_id` int(1) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`content`, `about_id`) VALUES
('<h2>Welcome to Everlasting sew-n-wearhaus</h2>\r\n<p>Everlasting Sew-n-Wearhaus started in 1988 with a single Singer sewing Machine supplying uniforms and costumes for the Our Lord''s Grace Montessori School along Commonwealth Avenue in Quezon City. </p>\r\n<p>  In over 25 years in the industry, our workforce has grown, housed in a modest factory, providing jobs to highly skilled individuals. We supply the needs of top schools, including San Beda College, Reedley International School, Angelicum College, Divine Word College and other schools in Metro Manila and Central Luzon.</p>\r\n         ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_no` int(20) NOT NULL,
  `status` int(5) NOT NULL,
  `usertype` int(10) NOT NULL,
  `codenum` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `fname`, `lname`, `email`, `password`, `address`, `contact_no`, `status`, `usertype`, `codenum`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'dwadawdas', 0, 1, 0, ''),
(5, 'Lopezes', 'lopez', 'leolopez@yahoo.com', '12344', 'tatalonssessss', 1234562, 0, 2, ''),
(6, 'Justine', 'Ranches', 'justinejasonranches@gmail.com', 'lablab14', 'quezon city', 852456, 1, 1, ''),
(7, 'edu ded', 'iglesias', 'edu@yahoo.com', '123', 'edu', 123, 1, 2, 'a123'),
(8, 'cyrrile', 'francisco', 'cyrrilefrancisco@gmail.com', 'cyrrile', 'Recto', 2147483647, 0, 1, 'a123'),
(9, 'Jutah', 'Besande', 'jutahthebest@gmail.com ', 'jutahpogi', 'heaven', 0, 0, 2, 'a123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(15) NOT NULL AUTO_INCREMENT,
  `customer_num` int(15) NOT NULL,
  `product` int(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `tprice` float NOT NULL,
  `size` int(15) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `customer` text NOT NULL,
  `product_list` text NOT NULL,
  `tprice` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `other_sides`
--

CREATE TABLE IF NOT EXISTS `other_sides` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `prod_id` int(15) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `other_sides`
--

INSERT INTO `other_sides` (`id`, `prod_id`, `image`) VALUES
(1, 4, 'suit2.jpg'),
(2, 4, 'suit3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(15) NOT NULL,
  `category` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `category`) VALUES
(1, 'polo1.jpg', 'polo white', 'white polo', 500, 1),
(2, 'polo2.jpg', 'polo blue', 'green polo', 750, 1),
(3, 'polo3.jpg', 'polo green', 'a polo green', 500, 1),
(5, 'slacks1.jpg', 'slacks', '1980 vintag slacks', 500, 2),
(7, 'blouse1.jpg', 'blouse', 'short sleeve blouse', 250, 3),
(8, 'blouse2.jpg', 'long sleeve blouse', 'long sleeve blouse', 350, 3),
(9, 'polo.jpg', 'feu eac uniform', 'polo', 100000, 1),
(10, 'suit1.jpg', 'black suit', 'suit', 1200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE IF NOT EXISTS `product_orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `customer_num` text NOT NULL,
  `product` text NOT NULL,
  `tprice` float NOT NULL,
  `quantity` int(200) NOT NULL,
  `size` int(11) NOT NULL,
  `status` int(30) NOT NULL,
  `date` date NOT NULL,
  `trans_num` int(100) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`oid`, `customer_num`, `product`, `tprice`, `quantity`, `size`, `status`, `date`, `trans_num`, `image`) VALUES
(13, '7', '2', 750, 1, 1, 3, '2014-08-14', 444444, ''),
(14, '7', '1', 500, 1, 1, 3, '2014-08-14', 123222, ''),
(15, '7', '9', 200000, 2, 1, 1, '2014-08-14', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `size_id` int(255) NOT NULL AUTO_INCREMENT,
  `size` text NOT NULL,
  `category` int(15) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`, `category`) VALUES
(1, 'S (Body 27",chess width 18",sleeve 8 1/2)', 1),
(2, 'M (Body 28",chess width 19",sleeve 9 1/2)', 1),
(3, 'L (Body 29",chess width 20",sleeve 9 3/4 )', 1),
(4, 'XL (Body 30",chess width 23",sleeve 10 1/2)', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
