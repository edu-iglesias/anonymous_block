-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2014 at 07:05 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `fname`, `lname`, `email`, `password`, `address`, `contact_no`, `status`, `usertype`, `codenum`) VALUES
(10, 'hello', 'ranches', 'jus@gmail.com', '47595ca9517d695bfb20baed50ce536193b2285d', 'qc', 1212121, 1, 0, 'a123'),
(17, 'renan', 'placido', 'bim@xyz.com', 'ecad9a58403cec71cf8c042d4e4c82374c3bc3b9', 'daw', 12123131, 1, 2, 'a123'),
(22, 'gina', 'delumen', 'ghinszdelumen@yahoo.com', 'ecad9a58403cec71cf8c042d4e4c82374c3bc3b9', 'dawdwadwa', 2147483647, 1, 2, 'a123'),
(23, 're', 'caw', 're@yahoo.com', 'ecad9a58403cec71cf8c042d4e4c82374c3bc3b9', 'dwadwdwa', 2147483647, 0, 2, 'a123'),
(24, 'pauline', 'munoz', 'admin@yahoo.com', 'ecad9a58403cec71cf8c042d4e4c82374c3bc3b9', 'dawdwadwada', 2147483647, 1, 0, 'a123');

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
  `thru` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'Polo'),
(2, 'Slacks'),
(3, 'Blouse'),
(4, 'Skirt'),
(5, 'PE-Tshirt'),
(6, 'Long Sleeve');

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
-- Table structure for table `order_history`
--

CREATE TABLE IF NOT EXISTS `order_history` (
  `hid` int(15) NOT NULL AUTO_INCREMENT,
  `customer_num` int(15) NOT NULL,
  `product` text NOT NULL,
  `date_ordered` date NOT NULL,
  `date_finished` date NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`hid`, `customer_num`, `product`, `date_ordered`, `date_finished`, `price`) VALUES
(4, 7, '', '2014-08-25', '0000-00-00', 0),
(5, 10, 'Product Name: feu eac uniform <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 100000<br>', '2014-08-25', '0000-00-00', 100000),
(6, 0, '', '0000-00-00', '0000-00-00', 0),
(7, 0, '', '0000-00-00', '0000-00-00', 0),
(8, 10, 'Product Name: feu eac uniform <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 100000<br>', '2014-08-25', '0000-00-00', 100000),
(9, 10, 'Product Name: polo blue   <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 750<br>', '2014-08-25', '0000-00-00', 750),
(10, 10, 'Product Name: feu eac uniform <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 100000<br>', '2014-08-25', '0000-00-00', 100000),
(11, 10, 'Product Name: feu eac uniform <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 100000<br>', '2014-08-25', '0000-00-00', 100000),
(12, 10, 'Product Name: polo white    <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 400<br>', '2014-08-26', '0000-00-00', 400),
(13, 17, 'Product Name: polo white       <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 2 <br>Price: 800<br>Thru: pickup<br>Product Name: polo blue   <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 750<br>Thru: pickup<br>', '2014-09-06', '0000-00-00', 1550);

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
(1, 'polo1.jpg', 'polo white      ', ' dawdawdaw  ', 400, 1),
(2, 'polo2.jpg', 'polo blue  ', ' blue polo', 750, 1),
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
  `product` varchar(5000) NOT NULL,
  `tprice` float NOT NULL,
  `status` int(30) NOT NULL,
  `date` text NOT NULL,
  `release_date` date NOT NULL,
  `trans_num` int(100) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`oid`, `customer_num`, `product`, `tprice`, `status`, `date`, `release_date`, `trans_num`, `image`) VALUES
(69, '10', 'Product Name: polo green <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 500<br>Thru: pickup<br>', 500, 1, '2014-08-28 22:29:11', '0000-00-00', 32131, ''),
(77, '10', 'Product Name: feu eac uniform <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 100000<br>Thru: pickup<br>Product Name: polo green <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 500<br>Thru: delivery<br>', 100500, 0, '08/30/2014', '0000-00-00', 0, ''),
(78, '17', 'Product Name: polo white       <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 2 <br>Price: 800<br>Thru: pickup<br>Product Name: polo blue   <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 750<br>Thru: pickup<br>', 1550, 3, '2014-09-06 16:35:26', '0000-00-00', 123456789, ''),
(79, '17', 'Product Name: feu eac uniform <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 100000<br>Thru: pickup<br>', 100000, 0, '09/06/2014', '0000-00-00', 0, ''),
(81, '22', 'Product Name: feu eac uniform <br> Size: XS (Body 26",chess width 17",sleeve 8) <br> Quantity: 1 <br>Price: 100000<br>Thru: pickup<br>', 100000, 0, '09/06/2014', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `size_id` int(255) NOT NULL AUTO_INCREMENT,
  `size` text NOT NULL,
  `category` int(15) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`, `category`) VALUES
(5, 'XS (Body 26",chess width 17",sleeve 8)', 1),
(7, 'S  (Body 27",chess width 18",sleeve 8 1/2)', 1),
(8, 'M (Body 28",chess width 19",sleeve 9 1/2)', 1),
(10, 'L (Body 29",chess width 20",sleeve 9 3/4)', 1),
(11, 'XL (Body 30",chess width 22",sleeve 12 1/2)', 1),
(12, 'XXL (Body 31",chess width 23",sleeve 13 1/2)', 1),
(19, 'XS (Hips 24",Waist 30")', 2),
(20, 'S (Hips 26",Waist 31")', 2),
(21, 'M (Hips 28",Waist 32")', 2),
(22, 'L (Hips 30",Waist 33")', 2),
(23, 'XL (Hips 34",Waist 34")', 2),
(24, 'XXL (Hips 36",Waist 35")', 2),
(25, 'XS(Width 14 1/2",Neck 13 1/2",Bust 32")', 3),
(26, 'S(Width 15",Neck 14",Bust 34")', 3),
(27, 'M(Width 16 1/2",Neck 15 1/2",Bust 36")', 3),
(28, 'L(Width 17",Neck 15",Bust 38")', 3),
(29, 'XL(Width 18 1/2",Neck 16 1/2",Bust 40")', 3),
(30, 'XXL(Width 19",Neck 17",Bust 42")', 3),
(31, 'XS(Waist 26",Hip 36",Length 22")', 4),
(32, 'S(Waist 27",Hip 37",Length 23 1/2")', 4),
(33, 'M(Waist 28",Hip 38",Length 24")', 4),
(34, 'L(Waist 29",Hip 39",Length 24 1/2")', 4),
(35, 'XL(Waist 30",Hip 40",Length 25")', 4),
(36, 'XXL(Waist 31",Hip 40",Length 25 1/2")', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
