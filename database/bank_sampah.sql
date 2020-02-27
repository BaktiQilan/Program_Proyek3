-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 01:28 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_sampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `req_id`, `petugas_id`) VALUES
(10, 4, 42),
(12, 5, 43),
(13, 6, 42),
(14, 5, 42),
(16, 8, 42),
(17, 9, 43),
(18, 10, 43),
(19, 11, 45),
(20, 13, 43),
(21, 14, 43),
(22, 15, 43);

-- --------------------------------------------------------

--
-- Table structure for table `req`
--

CREATE TABLE `req` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `tgl_jemput` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `req`
--

INSERT INTO `req` (`id`, `user_id`, `alamat`, `tgl_jemput`, `status`) VALUES
(4, '34', 'jl. sarimanah 45', '2019-12-28', 'diambil'),
(5, '39', 'Jl. cijerokaso 50', '2019-12-31', 'diambil'),
(6, '39', 'Jl. cijerokaso 50', '2019-12-26', 'diambil'),
(7, '34', 'jl. sarimanah 45', '2019-12-31', 'Belum diambil'),
(8, '34', 'jl. sarimanah 45', '2020-01-17', 'diambil'),
(9, '39', 'Jl. cijerokaso 50', '2020-01-31', 'diambil'),
(10, '34', 'jl. sarimanah 45', '2020-01-16', 'diambil'),
(11, '39', 'Jl. cijerokaso 50', '2020-02-01', 'diambil'),
(12, '39', 'Jl. cijerokaso 50', '2020-01-31', 'Belum diambil'),
(13, '39', 'Jl. cijerokaso 50', '2020-02-15', 'diambil'),
(14, '39', 'Jl. cijerokaso 50', '2020-02-16', 'diambil'),
(15, '39', 'Jl. cijerokaso 50', '2020-02-17', 'Belum diambil');

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `nama`, `harga`) VALUES
(1, 'Logam Besi', 23000),
(2, 'Botol Plastik', 6000),
(4, 'Kertas Koran', 5500),
(5, 'Gelas Plastik', 5000),
(6, 'Ban Bekas', 15000),
(7, 'Kertas Kardus', 7500),
(8, 'Karung', 4500),
(9, 'Botol Kaca', 8000),
(10, 'Logam Alumunium', 6000),
(11, 'Logam TImah', 5500);

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `setoran` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `penarikan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id`, `user_id`, `setoran`, `penarikan`, `tanggal`) VALUES
(1, 39, '23000', '', 1577496326),
(2, 39, '12000', '500', 1577496334),
(3, 34, '25000', '', 1577496348),
(4, 39, '', '5000', 1577496348),
(5, 34, '46000', '', 1577978814),
(10, 39, '', '2000', 1579018725),
(11, 34, '', '6000', 1579459274),
(12, 34, '', '5000', 1579463163),
(13, 39, '27500', '', 1580343406),
(14, 39, '', '50000', 1580343541),
(15, 34, '50000', '', 1580351618),
(16, 39, '10000', '', 1580351797),
(17, 39, '', '10000', 1580352012),
(18, 34, '12000', '', 1580689482),
(19, 39, '15500', '', 1580689929),
(20, 39, '23000', '', 1580689950);

-- --------------------------------------------------------

--
-- Table structure for table `tarik`
--

CREATE TABLE `tarik` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penarikan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarik`
--

INSERT INTO `tarik` (`id`, `user_id`, `penarikan`, `tanggal`, `status`) VALUES
(1, 39, '2000', 1579013097, 'disetujui'),
(5, 34, '6000', 1579459022, 'disetujui'),
(6, 34, '5000', 1579463143, 'disetujui'),
(7, 39, '50000', 1580343496, 'disetujui'),
(8, 39, '10000', 1580351963, 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(10, 'Bakti Qilan Mufid', 'bakti.qilan17@gmail.com', 'AMXU0T8.jpg', '$2y$10$snymZEtGQFixsxZtXepZJemFJp3Q3SKy.DBmYG.zXbWXNRGshNBAS', 1, 1, 1573351183),
(34, 'Nasabah pertama', 'nasabah1@banksampah.com', 'default.jpg', '$2y$10$I5JXHMPmO4P6DSWHxyttdehvE4YetiULMtzI2uVmp7SM79mf65iEO', 2, 1, 1576637204),
(39, 'Nasabah kedua', 'nasabah2@banksampah.com', 'default.jpg', '$2y$10$GsFX67IX7Dlax6GddamX/esRjYGTvlQonvTtB2cxxEgOATU.NeOym', 2, 1, 1576750009),
(42, 'Petugas tiga', 'petugas3@banksampah.com', 'default.jpg', '$2y$10$5ZYSkSNsWQLyFJQOkx5bIeqPfwdSLuZ7zIVwsXbJnsLrCHAghxA5W', 3, 1, 1576810619),
(43, 'Petugas satu', 'petugas1@banksampah.com', 'default.jpg', '$2y$10$JkJlDMjtkqEQgMAiXDS4dO2lbeIJ7Tzr0YNBKysraRFXrWATwOaUG', 3, 1, 1576814574),
(44, 'Nasabah ketiga', 'nasabah3@banksampah.com', 'default.jpg', '$2y$10$jT2OM1Su/K5Ox.BONVPHjuNM0OfXTQm1UR0DWdw9yGivQV5KfCIh6', 2, 1, 1578010958),
(45, 'Petugas dua', 'petugas2@banksampah.com', 'default.jpg', '$2y$10$H.8mDmLqO8KzpeZ7UnUigeMcnyHENB6kPDqu4pcMLTRaGRVjogZ0.', 3, 1, 1578013189),
(49, 'Nasabah keempat', 'nasabah4@banksampah.com', 'default.jpg', '$2y$10$2r3UOEQNLnGDCbFJvf7.VugfMkt9kFqa5umm45BNM4iXd3KTZX9Fa', 2, 1, 1579006885),
(50, 'Coba', 'Coba@gmail.com', 'default.jpg', '$2y$10$dEeMdsUJ0FpPzvpnvatvp.Qp57ERSuoTNpuNYzbblt5/hoAMMTOWK', 2, 1, 1580344099),
(51, 'nasabah5', 'nasabah5@gmail.com', 'default.jpg', '$2y$10$.vvXiBZowd34PNdBX3T2reEYvhkwSJHBiBJH72VD3NTkodZ/jEGzq', 2, 1, 1580351037);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(7, 2, 13),
(9, 3, 14),
(10, 3, 2),
(12, 2, 15),
(14, 3, 15),
(19, 1, 15),
(20, 1, 32),
(21, 2, 33),
(23, 2, 34);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `no_rek` varchar(20) DEFAULT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `scan_ktp` varchar(128) DEFAULT NULL,
  `scan_kk` varchar(128) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `no_rek`, `nama`, `alamat`, `scan_ktp`, `scan_kk`, `user_id`, `role_id`) VALUES
(15, 'BS0001', 'Nasabah pertama', 'jl. sarimanah 45', 'KTP.jpg', 'kartu-keluarga.jpg', 34, 2),
(20, 'BS0002', 'Nasabah kedua', 'Jl. cijerokaso 50', 'download.jpg', 'kk1.jpg', 39, 2),
(22, '0', 'Petugas tiga', 'jl. sariasih', 'default.png', 'default.png', 42, 3),
(23, '0', 'Petugas satu', '-', 'default.png', 'default.png', 43, 3),
(24, 'BS0003', 'Nasabah ketiga', 'Jl. Pasirhuni', 'ktp2.jpg', 'kk.png', 44, 2),
(25, '0', 'Petugas dua', 'Jl. cibogo', 'default.png', 'default.png', 45, 3),
(29, 'BS0004', 'Nasabah keempat', 'Jl. cijerokaso', 'download_(1).jpg', 'download.jpg', 49, 2),
(30, '0', 'Coba', 'Jl cobacoba', 'default.png', 'default.png', 50, 2),
(31, '0', 'nasabah5', 'bandung', 'default.png', 'download1.jpg', 51, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(13, 'Tabungan'),
(14, 'Petugas'),
(15, 'Info'),
(33, 'Request'),
(34, 'Data Detail User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Nasabah'),
(3, 'Petugas'),
(6, 'caa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user'),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit'),
(4, 3, 'Menu Management', 'menu/index', 'fas fa-fw fa-folder'),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open'),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie'),
(11, 11, 'Coba', 'coba/coba', 'fab fa-fw fa-youtube'),
(13, 2, 'Ubah Password', 'user/ubahpassword', 'fas fa-fw fa-key'),
(14, 1, 'Aktivasi Nasabah', 'admin/aktivasi', 'fas fa-fw fa-user-check'),
(15, 13, 'Cek Saldo', 'tabungan', 'fas fa-fw fa-money-check-alt'),
(16, 15, 'Harga Sampah', 'info', 'fas fa-fw fa-dollar-sign'),
(17, 14, 'Pengambilan Sampah', 'petugas', 'fas fa-fw fa-handshake'),
(20, 0, '', '', ''),
(24, 1, 'Input Sampah', 'admin/sampah', 'fas fa-fw fa-keyboard'),
(25, 34, 'Data Detail', 'data', 'fas fa-fw fa-user-tie'),
(26, 33, 'Meminta Jemput Sampah', 'request', 'fas fa-fw fa-pen-alt'),
(27, 1, 'Jemput Sampah', 'admin/jemput', 'fas fa-fw fa-pen-alt'),
(29, 14, 'Histori Pengambilan', 'petugas/histori', 'fas fa-fw fa-history'),
(30, 1, 'Histori Penjemputan', 'admin/histori', 'fas fa-fw fa-history'),
(31, 13, 'Request Penarikan Saldo', 'tabungan/tarik', 'fas fa-fw fa-money-bill-wave'),
(32, 1, 'Penarikan Saldo Nasabah', 'admin/tarik', 'fas fa-fw fa-dollar-sign');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req`
--
ALTER TABLE `req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarik`
--
ALTER TABLE `tarik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `req`
--
ALTER TABLE `req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tarik`
--
ALTER TABLE `tarik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
