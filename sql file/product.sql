-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2017 at 02:34 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `product_price(show)` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_price(show)`, `product_type`, `product_pic`) VALUES
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
