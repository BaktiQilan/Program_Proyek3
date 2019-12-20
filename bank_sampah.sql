-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 04:40 AM
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
  `petugas` varchar(128) NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `req_id`, `petugas`, `petugas_id`) VALUES
(10, 4, 'Petugas tiga', 42);

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
(4, '34', 'jl. sarimanah 45', '2019-12-28', 'Belum diambil'),
(5, '39', 'Jl. cijerokaso 50', '2019-12-31', 'Belum diambil'),
(6, '39', 'Jl. cijerokaso 50', '2019-12-26', 'Belum diambil');

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
(1, 'Besi', 23000),
(2, 'Botol Plastik', 6000),
(4, 'Kertas', 5500),
(5, 'Gelas Plastik', 5000),
(6, 'Ban Luar ', 15000),
(7, 'Kardus', 7500),
(8, 'Karung', 4500),
(9, 'Botol Kaca', 8000),
(10, 'Alumunium', 6000),
(11, 'Kaleng', 5500);

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
(42, 'Petugas tiga', 'petugas3@banksampah.com', 'default.jpg', '$2y$10$5ZYSkSNsWQLyFJQOkx5bIeqPfwdSLuZ7zIVwsXbJnsLrCHAghxA5W', 3, 1, 1576810619);

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
(8, 1, 14),
(9, 3, 14),
(10, 3, 2),
(12, 2, 15),
(14, 3, 15),
(16, 1, 13),
(19, 1, 15),
(20, 1, 32),
(21, 2, 33);

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
(22, '0', 'Petugas tiga', 'jl. sariasih', 'default.png', 'default.png', 42, 3);

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
(33, 'Request');

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
(2, 'Member'),
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
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt'),
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
(23, 14, 'Input Data Sampah Nasabah', 'petugas/input', 'fas fa-fw fa-keyboard'),
(24, 1, 'Input Sampah', 'admin/sampah', 'fas fa-fw fa-keyboard'),
(25, 2, 'Data Detail', 'user/data', 'fas fa-fw fa-user-tie'),
(26, 33, 'Meminta Jemput Sampah', 'request', 'fas fa-fw fa-pen-alt'),
(27, 1, 'Jemput Sampah', 'admin/jemput', 'fas fa-fw fa-pen-alt');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `req`
--
ALTER TABLE `req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
