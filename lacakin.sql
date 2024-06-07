-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 08:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lacakin`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kehilangan`
--

CREATE TABLE `data_kehilangan` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('belum_diklaim','diklaim') NOT NULL DEFAULT 'belum_diklaim',
  `klaim_info` text DEFAULT NULL,
  `tanggal_klaim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kehilangan`
--

INSERT INTO `data_kehilangan` (`id`, `full_name`, `npm`, `phone_number`, `nama_barang`, `lokasi`, `tanggal`, `waktu`, `deskripsi`, `foto`, `status`, `klaim_info`, `tanggal_klaim`) VALUES
(1, 'user2', '9876543210', '0123456789', 'Jam Tangan', 'Toilet', '2024-06-06', '11:30:00', 'jam tangan warna hitam', '', 'diklaim', 'kK3CH7', '2024-06-06'),
(2, 'user2', '9876543210', '0123456789', 'Dompet', 'Perpustakaan', '2024-06-07', '09:30:00', 'warna coklat', '20240605_112047.jpg', 'belum_diklaim', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_temuan`
--

CREATE TABLE `data_temuan` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status_klaim` enum('belum_diklaim','diklaim') DEFAULT 'belum_diklaim',
  `klaim_info` text DEFAULT NULL,
  `tanggal_klaim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_temuan`
--

INSERT INTO `data_temuan` (`id`, `full_name`, `npm`, `phone_number`, `nama_barang`, `lokasi`, `tanggal`, `waktu`, `deskripsi`, `foto`, `status_klaim`, `klaim_info`, `tanggal_klaim`) VALUES
(1, 'user1', '0123456789', '9876543210', 'Jam Tangan', 'Toilet', '2024-06-06', '12:00:00', 'warna hitam', '20240605_180752.jpg', 'diklaim', 'kK3CH7', '2024-06-06'),
(2, 'user1', '0123456789', '9876543210', 'TWS', 'Kantin', '2024-06-06', '15:30:00', 'tws merk anker warna hitam', '20240605_180712.jpg', 'belum_diklaim', NULL, NULL),
(3, 'user1', '0123456789', '9876543210', 'Dompet', 'Perpustakaan', '2024-06-07', '13:30:00', 'warna coklat', '20240605_112047.jpg', 'belum_diklaim', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `npm`, `phone_number`, `email`, `password`) VALUES
(1, 'user1', '0123456789', '9876543210', 'user1@gmail.com', '$2y$10$u1dqvRfbUvFg6nXZzC/PUeB0tK5LlPTWA8FWcu29EmZRyn6JTMgrW'),
(2, 'user2', '9876543210', '0123456789', 'user2@gmail.com', '$2y$10$dJxrwBcuRlMtoehqZHDZSO5LYrl6fhs/9CK0wOVVgMnIyN.m7z3qW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kehilangan`
--
ALTER TABLE `data_kehilangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_temuan`
--
ALTER TABLE `data_temuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kehilangan`
--
ALTER TABLE `data_kehilangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_temuan`
--
ALTER TABLE `data_temuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
