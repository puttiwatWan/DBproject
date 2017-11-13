-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 08:35 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bg_store`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `decrease_quantity` (IN `cartid` INT, IN `pid` INT, OUT `op` VARCHAR(2))  MODIFIES SQL DATA
BEGIN
DECLARE q INT;
DECLARE cprice INT;
DECLARE pprice INT;
SELECT cartdetail.quantity, cartdetail.total_price into q,cprice FROM cartdetail WHERE cart_id=cartid AND product_id=pid;
SELECT product.product_price into pprice FROM product WHERE product.product_id=pid;
IF q>0 then
	SET q=q-1;
	SET cprice=cprice-pprice;
	UPDATE cartdetail SET cartdetail.quantity=q, cartdetail.total_price=cprice WHERE cart_id=cartid AND product_id=pid;
    UPDATE cart SET cart.total_amount=cart.total_amount-pprice WHERE cart.cart_id=cartid;
    SET op = 'ok';
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `increase_quantity` (IN `cartid` INT, IN `pid` INT, OUT `op` VARCHAR(2))  MODIFIES SQL DATA
BEGIN
DECLARE q INT;
DECLARE cprice INT;
DECLARE pprice INT;
SELECT cartdetail.quantity, cartdetail.total_price into q,cprice FROM cartdetail WHERE cart_id=cartid AND product_id=pid;
SELECT product.product_price into pprice FROM product WHERE product.product_id=pid;
SET q=q+1;
SET cprice=cprice+pprice;
UPDATE cartdetail SET cartdetail.quantity=q, cartdetail.total_price=cprice WHERE cart_id=cartid AND product_id=pid;
UPDATE cart SET cart.total_amount=cart.total_amount+pprice WHERE cart.cart_id=cartid;
SET op = 'ok';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `total_amount`) VALUES
(1, 2, 1840);

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE `cartdetail` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `total_price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartdetail`
--

INSERT INTO `cartdetail` (`cart_id`, `product_id`, `quantity`, `total_price`) VALUES
(1, 1, 1, 750),
(1, 6, 1, 1090);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `show_price` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `show_price`, `product_type`, `product_pic`) VALUES
(1, 'Avalon (ENG)', '750.00', '750', 'Bluff,Party', 'avalon_en.jpg'),
(2, 'Bears VS Babies', '1550.00', '1,550', 'Bluff,Party', 'bears_vs_babies.jpg'),
(3, 'Deception: Murder in Hong Kong', '1650.00', '1,650', 'Bluff,Case-solving', 'deception.jpg'),
(4, 'Dominion Intrigue', '1850.00', '1,850', 'Deck Building', 'dominion_intrigue.jpg'),
(5, 'Exploding Kittens (1st Edition)', '1290.00', '1,290', 'Bluff,Party', 'ex_kittens_1ed.png'),
(6, 'Exploding Kittens (Black Box)', '1090.00', '1,090', 'Bluff,Party', 'ex_kittens_black.jpg'),
(7, 'Exploding Kittens (Red Box)', '990.00', '990', 'Bluff,Party', 'ex_kittens_red.png'),
(8, 'Imploding Kittens (Expansion of Exploding Kittens)', '950.00', '950', 'Bluff,Party', 'im_kittens.png'),
(9, 'Game of Throne: The Board Game (2nd Edition)', '2350.00', '2,350', 'Strategic', 'GoT_BG.jpg'),
(10, 'House of Madness (2nd Edition)', '3800.00', '3,800', '', 'house_of_madness.jpg'),
(11, 'Love Letter (Box Edition)', '500.00', '500', '', 'love_letter.jpg'),
(12, 'T.I.M.E. Stories', '2650.00', '2,650', 'Thematic', 'time_stories.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(20) NOT NULL,
  `USER_PASSWORD` varchar(20) NOT NULL,
  `USER_TYPE` int(11) NOT NULL,
  `USER_FNAME` varchar(40) NOT NULL,
  `USER_LNAME` varchar(40) NOT NULL,
  `USER_EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NAME`, `USER_PASSWORD`, `USER_TYPE`, `USER_FNAME`, `USER_LNAME`, `USER_EMAIL`) VALUES
(1, 'admin', 'admin', 1, 'me', 'me', 'me@mail.com'),
(2, 'aa', 'bb', 2, 'a', 'b', 'ab@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`TYPE_ID`, `TYPE_NAME`) VALUES
(1, 'Admin'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`cart_id`,`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
