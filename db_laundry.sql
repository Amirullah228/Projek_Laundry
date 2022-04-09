-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 12:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_laundry`
--

CREATE TABLE `tb_laundry` (
  `id_laundry` int(11) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_pga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laundry`
--

INSERT INTO `tb_laundry` (`id_laundry`, `id_pelanggan`, `tanggal_terima`, `tanggal_selesai`, `jumlah`, `nominal`, `catatan`, `status`, `id_pga`) VALUES
(20, 'PLG-0004', '2022-04-11', '2022-04-13', 2, 16000, 'lunaskan11', 'Lunas', 10),
(27, 'PLG-0003', '2022-04-04', '2022-04-15', 6, 48000, 'aji lunaskan', 'Lunas', 10),
(28, 'PLG-0001', '2022-04-04', '2022-04-08', 3, 24000, 'asasasasa111', 'Lunas', 10),
(29, 'PLG-0002', '2022-04-12', '2022-04-15', 1, 8000, 'lunaskanlah bg', 'Belum Lunas', 10),
(30, 'PLG-0003', '2022-04-11', '2022-04-13', 2, 16000, 'belajar php', 'Belum Lunas', 10),
(31, 'PLG-0005', '2022-04-06', '2022-04-08', 2, 16000, 'masuk ngak ?', 'Lunas', 10),
(32, 'PLG-0003', '2022-04-04', '2022-04-07', 1, 8000, 'masih masuk?', 'Belum Lunas', 10),
(33, 'PLG-0005', '2022-04-07', '2022-04-09', 1, 8000, 'masuk transaksi laundry', 'Lunas', 10),
(34, 'PLG-0004', '2022-04-11', '2022-04-13', 1, 8000, 'masih masuk?', 'Lunas', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(50) NOT NULL,
  `kode_pelanggan` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `kode_pelanggan`, `no_hp`, `alamat`) VALUES
('PLG-0001', 'amirul', '082284207229', 'mesim'),
('PLG-0002', 'nurul', '081338094958', 'jl.cinta damai'),
('PLG-0003', 'aji', '082284207229', 'jl.tembaau'),
('PLG-0004', 'Fitri', '081384389078', 'Jl,sukaramai dumai riau'),
('PLG-0005', 'ajis', '082284207228', 'Jl.tambusai dumai riau');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_trans` int(11) NOT NULL,
  `tgl_trans` date NOT NULL,
  `pemasukan` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `id_pga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_trans`, `tgl_trans`, `pemasukan`, `catatan`, `keterangan`, `pengeluaran`, `id_pga`) VALUES
(21, '2022-04-11', '16000', 'asasasas', 'pemasukan', 0, 10),
(22, '2022-04-11', '16000', 'lunas cok', 'pemasukan', 0, 10),
(23, '2022-04-11', '16000', 'lunalah1', 'pemasukan', 0, 10),
(26, '2022-04-06', '0', 'pewangi baju dan rinso', 'pengeluaran', 10000, 10),
(27, '2022-04-11', '16000', 'masuk ngak ?', 'pemasukan', 0, 10),
(28, '2022-04-11', '16000', 'lunaskan11', 'pemasukan', 0, 10),
(29, '2022-04-11', '16000', 'masuk transaksi laundry', 'pemasukan', 0, 10),
(30, '2022-04-11', '8000', 'masih masuk?', 'pemasukan', 0, 10),
(31, '2022-04-13', '0', 'beli pewangi baju', 'pengeluaran', 10000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_pga` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama_pga` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_pga`, `foto`, `nama_pga`, `level`, `password`) VALUES
(10, '1022975335-avatar5.png', 'abangAdmin', 'Admin', 'admin123'),
(11, '2057247625-avatar3.png', 'Nurul', 'Kasir', 'admin333'),
(13, '1128864686-avatar4.png', 'admin123', 'Admin', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_laundry`
--
ALTER TABLE `tb_laundry`
  ADD PRIMARY KEY (`id_laundry`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_pga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_laundry`
--
ALTER TABLE `tb_laundry`
  MODIFY `id_laundry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_pga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
