-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 11:42 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belibooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_penjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `harga`, `stok`, `kategori`, `gambar`, `id_penjual`) VALUES
(1, 'Draft Diktat Stuktur Data', 'Inggriani Liem', 'Institut Teknologi Bandung', 2008, 35000, 2, 'Informatika', '1.jpg', 1),
(2, 'Draft Diktat Kuliah Dasar Pemrograman(Bagian Pemrograman Prosedural)', 'Inggriani Liem', 'Institut Teknologi Bandung', 2007, 35000, 4, 'Informatika', '2.jpg', 1),
(3, 'Kimia Anorganik \'Struktur dan ikatan\'', 'Nuryono', 'a', 9999, 500, 3, 'kimia', 'k-1.jpg', 1),
(4, 'Kimia Terapan', 'nat', 'nat', 9999, 50000, 3, 'kimia', 'k-2.jpg', 1),
(6, 'Kimia Dasar', 'Yayan Sunaryo', 'nat', 9999, 78000, 3, 'kimia', 'k-3.jpg', 1),
(7, 'Kimia Organik Fisik', 'nat', 'nat', 9999, 60000, 3, 'kimia', 'k-4.jpg', 1),
(8, 'Kimia Medisinal Anorganik', 'Ibnu Gholib Gandjar', 'nat', 9999, 80000, 3, 'kimia', 'k-5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `username`, `email`, `nama`, `no_hp`, `alamat`, `password`, `status`) VALUES
(1, 'DodolBooku', 'antonisinisukaginting@students.undip.ac.id', 'Antoni Sinisuka Ginting', '085207690871', 'Jalan Timoho Timur No.2', 'antoni1919', 1),
(3, 'penjual', 'penjual@gmail.com', 'penjual', '083838612461', 'tembalang', 'Penjual123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
