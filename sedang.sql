-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 01:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sedang`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `jawaban` varchar(1000) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_siswa`, `id_tugas`, `jawaban`, `nilai`) VALUES
(2, 6, 2, '62b749fbca3b6.sql', 80),
(3, 5, 1, '62b751338da16.sql', 90),
(4, 8, 2, '62b7985882bc0.xlsx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `namaGuru` varchar(60) NOT NULL,
  `namaKelas` varchar(60) NOT NULL,
  `namaMapel` varchar(60) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `kodeKelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `namaGuru`, `namaKelas`, `namaMapel`, `id_guru`, `kodeKelas`) VALUES
(2, 'Oktafiano Syah Pranata', 'X RPL C', 'PD', 6, 'hAkkE'),
(3, 'Oktafiano Syah Pranata', 'XIII RPL C', 'PD', 5, 'theBR'),
(4, 'Oktafiano Syah Pranata', 'X RPL C', 'BASDAT', 6, 'jACax'),
(5, 'Oktafiano Syah Pranata', 'XII RPL C', 'PBO', 6, 'BzRpb');

-- --------------------------------------------------------

--
-- Table structure for table `kelasdiikuti`
--

CREATE TABLE `kelasdiikuti` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kodeKelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelasdiikuti`
--

INSERT INTO `kelasdiikuti` (`id`, `id_siswa`, `kodeKelas`) VALUES
(1, 8, 'hAkkE'),
(2, 8, 'jACax'),
(3, 8, 'theBR'),
(4, 8, 'BzRpb');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `judulTugas` varchar(100) NOT NULL,
  `soal` varchar(100) NOT NULL,
  `tglpost` date NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `id_guru`, `id_kelas`, `judulTugas`, `soal`, `tglpost`, `deadline`) VALUES
(2, 6, 4, 'membuat website sederhana', 'buatlah sebuah website yang bertemakan pendidikan di era pandemi seperti sekarang ini', '2022-06-25', '2022-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','siswa','guru') NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`, `kelas`) VALUES
(6, 'Oktafiano Syah Pranata', 'okta@gmail.com', '$2y$10$lwKM.lFoGUTTDbXng4oacelc7Jmo9HFbRU7s1giCW4XJ7OFUTH3re', 'guru', ''),
(8, 'Marcelino Syah Pratama', 'marcell032017@gmail.com', '$2y$10$vqBqHnynmpPOK4Szix5hzetfsYP/plvhIr0s1pYFi3P2ur79mltfS', 'siswa', 'X RPL C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelasdiikuti`
--
ALTER TABLE `kelasdiikuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelasdiikuti`
--
ALTER TABLE `kelasdiikuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
