-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 04:21 PM
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
-- Database: `db_inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `product_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`product_id`, `name`, `price`, `category`, `quantity`, `size`) VALUES
(1001, 'Tubular1', '100\r\n', 'Tubular', '40', '1x1'),
(1002, 'Tubular2', '110', 'Tubular', '30', '1x2'),
(1003, 'Tubular3', '120', 'Tubular', '50', '2x2'),
(1004, 'Tubular4', '130', 'Tubular', '50', '2x3'),
(1005, 'Tubular5', '140', 'Tubular', '29\r\n', '2x4'),
(1006, 'Tubular6', '150', 'Tubular', '40', '4x4\r\n'),
(2001, 'C-purlins1', '160', 'C-Purlins', '45', '2x3'),
(2002, 'C-purlins2', '170', 'C-Purlins', '16', '2x4\r\n'),
(2003, 'C-Purlins3', '150', 'C-Purlins', '20', '2x2'),
(3001, 'Wall Angles1', '180', 'Angle Bars', '15', '10MM x 20MM'),
(3002, 'Angle Bar1', '190', 'Angle Bars', '14', '40x40'),
(3003, 'Angle bar2', '200', 'Angle Bars', '10\r\n', '50x50'),
(3004, 'Angle bar3', '210', 'Angle Bars', '70', '60x60'),
(3005, 'Angle bar4', '220', 'Angle Bars', '55', '65x65'),
(4001, 'Gi-Pipes1', '230', 'Pipes', '41', '1/2\"-12\" (21.3-323.9mm)'),
(5001, 'Galvanized Steel 1', '240', 'Steel Sheet', '99', '26 inches wide / 8 feet long'),
(5002, 'Galvanized Steel 2', '250', 'Steel Sheet', '20', '26 inches wide / 10 feet long');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10043;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
