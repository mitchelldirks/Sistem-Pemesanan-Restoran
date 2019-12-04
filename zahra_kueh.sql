-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 11:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zahra_kueh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `alamat_karyawan` varchar(30) NOT NULL,
  `pekerjaan_karyawan` varchar(30) NOT NULL,
  `tlp_karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `pekerjaan_karyawan`, `tlp_karyawan`) VALUES
('AD001', 'adm', 'adm', 'Admin', '0010'),
('AD002', 'asd', 'asd', 'Admin', '0212'),
('KA001', 'Mawar', 'Jakarta', 'Kasir', '812812099'),
('KA002', 'Melati', 'Depok', 'Kasir', '812812092'),
('KO001', 'Ahmad', 'Jakarta', 'Koki', '812812121'),
('KO002', 'Agung', 'Jakarta', 'Koki', '812912931');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_makanan`
--

CREATE TABLE `tbl_makanan` (
  `id_makanan` varchar(10) NOT NULL,
  `stok_makanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_makanan`
--

INSERT INTO `tbl_makanan` (`id_makanan`, `stok_makanan`) VALUES
('F01', 80),
('F02', 40),
('F03', 55),
('F04', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `foto_menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `harga_menu`, `foto_menu`) VALUES
('D01', 'Fanta', 9000, 'fanta.png'),
('D02', 'Coca Cola', 9000, 'cocacola.png'),
('D03', 'Pepsi', 9000, 'pepsi.png'),
('D04', 'Ice Cream', 8000, 'icecream.png'),
('D05', 'Pepsi Blue', 10000, 'pepsi.png'),
('F01', 'Fried Chicken', 16500, 'friedchicken.png'),
('F02', 'Burger', 10000, 'burger.png'),
('F03', 'French Fries', 13000, 'frenchfries.png'),
('F04', 'Spaghetti', 14000, 'spaghetti.png'),
('P01', 'Paket Ayam Geprek + Nasi + Teh', 16000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_minuman`
--

CREATE TABLE `tbl_minuman` (
  `id_minuman` varchar(10) NOT NULL,
  `stok_minuman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_minuman`
--

INSERT INTO `tbl_minuman` (`id_minuman`, `stok_minuman`) VALUES
('D01', 22),
('D02', 9),
('D03', 75),
('D04', 34);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_transaksi`, `id_menu`, `qty`, `total`) VALUES
(9, 'TR00004', 'D01', 4, 36000),
(10, 'TR00004', 'F02', 2, 20000),
(11, 'TR00004', 'P01', 2, 32000),
(12, 'TR00005', 'F01', 1, 16500),
(13, 'TR00005', 'P01', 1, 16000),
(14, 'TR00006', 'D01', 3, 27000),
(15, 'TR00006', 'F04', 2, 28000),
(16, 'TR00007', 'F04', 2, 28000),
(17, 'TR00008', 'D04', 1, 8000),
(18, 'TR00008', 'F01', 1, 16500),
(19, 'TR00008', 'F02', 1, 10000),
(20, 'TR00008', 'F04', 1, 14000),
(21, 'TR00008', 'P01', 2, 32000),
(22, 'TR00009', 'P01', 1, 16000),
(23, 'TR00010', 'D03', 1, 9000),
(24, 'TR00010', 'D04', 1, 8000),
(25, 'TR00010', 'F02', 1, 10000),
(26, 'TR00011', 'D02', 1, 9000),
(27, 'TR00011', 'F03', 2, 26000),
(28, 'TR00011', 'P01', 1, 16000),
(29, 'TR00012', 'D02', 1, 9000),
(30, 'TR00012', 'F02', 1, 10000),
(31, 'TR00013', 'D04', 1, 8000),
(32, 'TR00013', 'F01', 1, 16500),
(33, 'TR00013', 'F02', 4, 40000),
(34, 'TR00013', 'F03', 1, 13000),
(35, 'TR00013', 'F04', 4, 56000),
(36, 'TR00013', 'P01', 1, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `status`, `total`, `tanggal_transaksi`) VALUES
('TR00004', 'WAITING', 88000, '2019-11-04 08:39:17'),
('TR00005', 'Selesai', 32500, '2019-11-04 08:43:09'),
('TR00006', 'WAITING', 55000, '2019-11-09 09:14:30'),
('TR00007', 'Selesai', 28000, '2019-11-09 09:23:30'),
('TR00008', 'WAITING', 80500, '2019-11-13 03:33:16'),
('TR00009', 'Selesai', 16000, '2019-11-13 03:45:31'),
('TR00010', 'WAITING', 27000, '2019-11-13 07:44:40'),
('TR00011', 'WAITING', 51000, '2019-11-20 02:08:36'),
('TR00012', 'Selesai', 19000, '2019-11-20 03:20:12'),
('TR00013', 'WAITING', 149500, '2019-11-20 22:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `level`) VALUES
('AD002', '6c6ef6c679378acbf3922f84adfb8032', 0),
('edwahi', '015f97edcdb3845a60f0dd41b4e15e72', 2),
('insya', '4e6c39d033427f54e954367ae96b9e51', 0),
('KA001', 'c7911af3adbd12a035b289556d96470a', 1),
('KA002', 'c7911af3adbd12a035b289556d96470a', 1),
('KO001', 'c38be0f1f87d0e77a0cd2fe6941253eb', 2),
('KO002', 'c38be0f1f87d0e77a0cd2fe6941253eb', 2),
('pottsed', 'ffb67a1048194d980a572919667a8d18', 1),
('zahra', '68e931a0d96611ccee1f82f5e4318469', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_makanan`
--
ALTER TABLE `tbl_makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_minuman`
--
ALTER TABLE `tbl_minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
