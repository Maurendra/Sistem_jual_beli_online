-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 02:31 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `id_member` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `komen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`id_member`, `id_produk`, `komen`) VALUES
(1, 16, 'lala'),
(1, 16, 'yo');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `ttl` varchar(17) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `nama`, `ttl`, `no_hp`, `email`, `password`) VALUES
(1, 'Maurendra', 'Maurendra Retawan Waluyo', '16 July 1997', '087757408931', 'mrendra25@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Ijul', 'Aizul', '15 Maret 2001', '086890654345', 'ijul@ymail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'wahyu', 'I Gede Wahyu', '16 April 1996', '087097432123', 'wahyu@ymail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `orderproduk`
--

CREATE TABLE `orderproduk` (
  `id_member` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `status_read` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanmember`
--

CREATE TABLE `pesanmember` (
  `id_member` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `status_read` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_member` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `status_laku` varchar(1) DEFAULT '0',
  `status_konfirm` varchar(1) DEFAULT '0',
  `status_komen` varchar(1) DEFAULT '0',
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_member`, `id_produk`, `judul`, `harga`, `kategori`, `deskripsi`, `status_laku`, `status_konfirm`, `status_komen`, `gambar`) VALUES
(1, 1, 'Pakaian - 1', 25000, 'Pakaian', 'Pakaian - 1', '0', '0', '0', 'pakaian-1.png'),
(2, 2, 'Mainan - 1', 30000, 'Mainan', 'Mainan - 1 ', '0', '0', '0', 'mainan-1.jpg'),
(3, 3, 'Pakaian - 2', 60000, 'Pakaian', 'Pakaian - 2', '0', '0', '0', 'pakaian-2.jpg'),
(2, 4, 'Aksesoris - 1', 40000, 'Aksesoris', 'Aksesoris - 1', '0', '0', '0', 'aksesoris-1.jpg'),
(3, 5, 'Sepatu - 1', 100000, 'Sepatu', 'Sepatu - 1', '0', '0', '0', 'sepatu-1.jpg'),
(1, 6, 'Sepatu - 2', 200000, 'Sepatu', 'Sepatu - 2', '0', '0', '0', 'sepatu-2.jpg'),
(1, 16, 'Elektronik - 1', 50000, 'Elektronik', 'Elektronik - 1', '0', '0', '0', 'elektronik-1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orderproduk`
--
ALTER TABLE `orderproduk`
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pesanmember`
--
ALTER TABLE `pesanmember`
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_member` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komen`
--
ALTER TABLE `komen`
  ADD CONSTRAINT `komen_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `komen_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `orderproduk`
--
ALTER TABLE `orderproduk`
  ADD CONSTRAINT `orderproduk_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `orderproduk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pesanmember`
--
ALTER TABLE `pesanmember`
  ADD CONSTRAINT `pesanmember_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `pesanmember_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
