-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2024 at 03:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `id` int NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `vai_tro` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`id`, `ten`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `hinh_anh`, `ngay_sinh`, `gioi_tinh`, `trang_thai`, `vai_tro`) VALUES
(1, 'Nguyễn Văn A', 'admin@fpt.edu.vn', '$2y$10$EhuCndgth67sLqG09gz7e.lM89aBt4Q3wNBnyuj4m/Q7KZh26pC92', '0355011558', 'Hà Nội', './uploads/images/avatarUser.jpg', '2024-11-13', 1, 1, 1),
(49, 'Phạm Phú Trung', 'admin@gmail.com', '$2y$10$KSqjyVpUIx8.YGFutbLLsu2zSVSr4lPv1e3YJy99N7L2G7CqC08Km', '03245567', '321423', './uploads/images/67332c0d5b83f3_l.png', '2001-03-23', 1, 1, 2),
(51, 'Phạm Phú Trung', 'admin@gmail.com', '$2y$10$zsnUcejmBTxp7MddaU9jkO7b6KlwARBO5MwK7qEi7BccoLExHtBoC', '0355011558', 'Hải Dương', './uploads/images/67363cfe13befNew-York-Yankees.png', '2005-10-11', 1, 2, 1),
(53, 'Nguyễn Văn C', 'admin@fpt.edu.vn', '$2y$10$R6V8BfULMszIO4PE4JGExO60alAuOwmevO6jLz3lfx/7bWRCjmXGW', '1234567890', 'Hà Nội', './uploads/images/67380c73d942bẢnh chụp màn hình 2024-10-17 214152.png', '2024-11-17', 1, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
