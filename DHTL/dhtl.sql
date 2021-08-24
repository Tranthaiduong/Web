-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 06:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhtl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'tranthaiduong', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `canbo`
--

CREATE TABLE `canbo` (
  `idcanbo` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_chucvu` int(11) DEFAULT NULL,
  `id_donvi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `canbo`
--

INSERT INTO `canbo` (`idcanbo`, `name`, `phone`, `email`, `id_chucvu`, `id_donvi`) VALUES
(1, 'canbo1', '01', '01@gmail.com', 1, 1),
(2, 'canbo2', '02', '02@gmail.com', 2, 4),
(3, 'canbo3', '03', '03@gmail.com', 3, 3),
(4, 'canbo4', '04', '04@gmail.com', 4, 5),
(5, '1231231', '123123123', '123131@xn--aa-qia', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `idchucvu` int(11) NOT NULL,
  `namechucvu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`idchucvu`, `namechucvu`) VALUES
(1, 'Trưởng Khoa'),
(2, 'Phó Khoa'),
(3, 'Hiệu Trưởng'),
(4, 'Phó Hội Đồng'),
(5, 'Giảng Viên'),
(6, 'Trợ lý');

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE `donvi` (
  `iddonvi` int(11) NOT NULL,
  `namedonvi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donvi`
--

INSERT INTO `donvi` (`iddonvi`, `namedonvi`, `id_parent`) VALUES
(1, 'Đơn vị 1', NULL),
(2, 'Đơn vị 2', NULL),
(3, 'Đơn vị 3', NULL),
(4, 'Đơn vị 4', 3),
(5, 'Đơn vị 5', NULL),
(6, 'Đơn vị 6', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canbo`
--
ALTER TABLE `canbo`
  ADD PRIMARY KEY (`idcanbo`),
  ADD KEY `id_chucvu` (`id_chucvu`),
  ADD KEY `id_donvi` (`id_donvi`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`idchucvu`);

--
-- Indexes for table `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`iddonvi`),
  ADD KEY `id_parent` (`id_parent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canbo`
--
ALTER TABLE `canbo`
  MODIFY `idcanbo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `idchucvu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donvi`
--
ALTER TABLE `donvi`
  MODIFY `iddonvi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `canbo`
--
ALTER TABLE `canbo`
  ADD CONSTRAINT `canbo_ibfk_1` FOREIGN KEY (`id_chucvu`) REFERENCES `chucvu` (`idchucvu`),
  ADD CONSTRAINT `canbo_ibfk_2` FOREIGN KEY (`id_donvi`) REFERENCES `donvi` (`iddonvi`);

--
-- Constraints for table `donvi`
--
ALTER TABLE `donvi`
  ADD CONSTRAINT `donvi_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `donvi` (`iddonvi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
