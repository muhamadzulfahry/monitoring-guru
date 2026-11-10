-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2026 at 04:35 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_guru`
--

CREATE TABLE `monitoring_guru` (
  `id` int NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `status_kehadiran` varchar(255) NOT NULL,
  `evaluasi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `monitoring_guru`
--

INSERT INTO `monitoring_guru` (`id`, `nip`, `nama_guru`, `mata_pelajaran`, `status_kehadiran`, `evaluasi`, `created_at`) VALUES
(1, 'I1Q4ImAxvuX+SZ0C29Yqmzo6S2QzcWRyYThrQ0p2eXc2NERTYVQyZz09', 'eTqqyvjfNZvLN5aWXG+hGTo6TlROSE9LWUlYcHUrRDFWWmR6a1FvUE5sZit2SHFzdGd6d0NMUDRWcG1Uaz0=', 'Vjrm+QfH1Gc4fBfaf74Dnjo6TEh6MzgvZ2pQa3ZDUWl0UlY2ajNqQT09', 'puuhJr2YqZh0GErccVlXIzo6Z2JXaUFqT0xGcnd3NXcrUjJMenVCQT09', 'yQ92VFGiQPmqams5MGHZtzo6aWowaitnVTdyRGlSQ3M5ekFtU083dz09', '2026-11-09 03:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `key_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `key_hash`) VALUES
(1, 'admin', '406138989dab58b764e73ba8032d13f6fcb15dad450f7f97b5bd7f2e075787b8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monitoring_guru`
--
ALTER TABLE `monitoring_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monitoring_guru`
--
ALTER TABLE `monitoring_guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
