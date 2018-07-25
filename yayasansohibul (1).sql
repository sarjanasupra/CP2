-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 12:22 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yayasansohibul`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_pemasukan`
--

CREATE TABLE IF NOT EXISTS `detil_pemasukan` (
  `ID_JENISDONASI` varchar(5) DEFAULT NULL,
  `ID_TRANSMASUK` int(11) DEFAULT NULL,
  `NAMABARANG` varchar(255) DEFAULT NULL,
  `SATUAN` varchar(50) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `JENIS_PEMBAYARAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detil_pemasukan`
--

INSERT INTO `detil_pemasukan` (`ID_JENISDONASI`, `ID_TRANSMASUK`, `NAMABARANG`, `SATUAN`, `JUMLAH`, `JENIS_PEMBAYARAN`) VALUES
('DON01', 2, 'Uang', 'Rupiah', 80000, 'Tunai'),
('DON02', 2, 'Meja', 'Buah', 5, NULL),
('DON02', 3, 'baju', 'stel', 10, NULL),
('DON01', 4, 'Uang', 'Rupiah', 2000000, 'Tunai'),
('DON01', 5, 'Uang', 'Rupiah', 1000000, 'Tunai'),
('DON02', 5, 'susu kaleng', 'dus', 2, NULL),
('DON01', 6, 'Uang', 'Rupiah', 100000000, 'Tunai'),
('DON01', 7, 'Uang', 'Rupiah', 50000, 'Tunai'),
('DON02', 7, 'Susu', 'Dus', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detil_transkeluar`
--

CREATE TABLE IF NOT EXISTS `detil_transkeluar` (
  `ID_JENISPENGELUARAN` varchar(5) NOT NULL,
  `ID_TRANSKELUAR` int(11) NOT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `HARGA_DETIL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detil_transkeluar`
--

INSERT INTO `detil_transkeluar` (`ID_JENISPENGELUARAN`, `ID_TRANSKELUAR`, `KETERANGAN`, `HARGA_DETIL`) VALUES
('12', 2, 'pembayaran guru les', 500000),
('12', 3, 'pembayaran guru les', 800000),
('12', 4, 'sdds', 5000),
('12', 5, 'biaya guru', 500000),
('123', 1, 'pembelian kado', 300000),
('123', 3, 'pembelian alat tulis baru', 500000),
('123', 4, 'sds', 100000),
('123', 5, 'pembelian kue dan minuman, banner', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE IF NOT EXISTS `donatur` (
  `ID_DONATUR` varchar(5) NOT NULL,
  `USERNAME` varchar(5) DEFAULT NULL,
  `NAMA_DONATUR` varchar(255) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL,
  `TELEPON` varchar(50) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`ID_DONATUR`, `USERNAME`, `NAMA_DONATUR`, `JENIS_KELAMIN`, `ALAMAT`, `TELEPON`, `STATUS`) VALUES
('1', '1', 'dona', 'Laki-laki', 'kolo', '5689', 'Non Tetap'),
('2', '1', 'tur', 'Perempuan', 'ss', '48585', 'Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_donasi`
--

CREATE TABLE IF NOT EXISTS `jenis_donasi` (
  `ID_JENISDONASI` varchar(5) NOT NULL,
  `JENIS_DONASI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_donasi`
--

INSERT INTO `jenis_donasi` (`ID_JENISDONASI`, `JENIS_DONASI`) VALUES
('DON01', 'Uang'),
('DON02', 'Barang');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengeluaran`
--

CREATE TABLE IF NOT EXISTS `jenis_pengeluaran` (
  `ID_JENISPENGELUARAN` varchar(5) NOT NULL,
  `JENIS_PENGELUARAN` varchar(255) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`ID_JENISPENGELUARAN`, `JENIS_PENGELUARAN`, `KETERANGAN`) VALUES
('1', 'program 3', 'tabungan simpanan pelajar'),
('12', 'program 2', 'pembelajaran'),
('123', 'program 1', 'santunan dan reuni');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keluar`
--

CREATE TABLE IF NOT EXISTS `transaksi_keluar` (
  `ID_TRANSKELUAR` int(11) NOT NULL,
  `USERNAME` varchar(5) DEFAULT NULL,
  `TANGGAL_KELUAR` date DEFAULT NULL,
  `JUMLAH_KELUAR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi_keluar`
--

INSERT INTO `transaksi_keluar` (`ID_TRANSKELUAR`, `USERNAME`, `TANGGAL_KELUAR`, `JUMLAH_KELUAR`) VALUES
(1, 'ela', '2017-08-15', 300000),
(2, 'ela', '2017-08-21', 650000),
(3, 'ela', '2017-08-21', 1300000),
(4, '1', '2017-08-22', 105000),
(5, 'ela', '2017-08-23', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_masuk`
--

CREATE TABLE IF NOT EXISTS `transaksi_masuk` (
  `ID_TRANSMASUK` int(11) NOT NULL,
  `ID_DONATUR` varchar(5) DEFAULT NULL,
  `USERNAME` varchar(5) DEFAULT NULL,
  `TANGGAL_MASUK` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi_masuk`
--

INSERT INTO `transaksi_masuk` (`ID_TRANSMASUK`, `ID_DONATUR`, `USERNAME`, `TANGGAL_MASUK`) VALUES
(2, '2', '1', '2017-08-15'),
(3, '1', 'ela', '2015-08-15'),
(4, '2', 'ela', '2016-08-15'),
(5, '1', 'ela', '2017-08-15'),
(6, '1', '1', '2017-08-22'),
(7, '1', 'ela', '2017-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USERNAME` varchar(5) NOT NULL,
  `NAMA_USER` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `JABATAN` varchar(50) DEFAULT NULL,
  `TELEPON` varchar(50) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERNAME`, `NAMA_USER`, `PASSWORD`, `JABATAN`, `TELEPON`, `Deleted`) VALUES
('1', 'sa', '1', 'wed', '156', 1),
('123', 'sandra', '123', 'sekretaris', '089757546675', 0),
('124', 'qwer', '1', 'asf', '09876', 1),
('2', 'xsw', '2', 'GHTY', '157', 0),
('9', 'dkwl', '9', 'wknkwe', '52358', 0),
('Ela', 'Ela Cantik', '123', 'Admin', '08295574582', 0);

-- --------------------------------------------------------

--
-- Table structure for table `yatim`
--

CREATE TABLE IF NOT EXISTS `yatim` (
  `ID_YATIM` int(11) NOT NULL,
  `USERNAME` varchar(5) DEFAULT NULL,
  `NIK` int(11) DEFAULT NULL,
  `NAMA_YATIM` varchar(255) DEFAULT NULL,
  `JENIS_KELAMINYATIM` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(255) DEFAULT NULL,
  `TELEPON` varchar(50) DEFAULT NULL,
  `NAMA_AYAH` varchar(255) DEFAULT NULL,
  `NAMA_IBU` varchar(255) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yatim`
--

INSERT INTO `yatim` (`ID_YATIM`, `USERNAME`, `NIK`, `NAMA_YATIM`, `JENIS_KELAMINYATIM`, `ALAMAT`, `TANGGAL_LAHIR`, `TEMPAT_LAHIR`, `TELEPON`, `NAMA_AYAH`, `NAMA_IBU`, `STATUS`) VALUES
(12345, 'ela', 2147483647, 'siti', 'Perempuan', 'pradah jaya', '1997-08-15', 'kediri', '089745473547', 'bejo', 'sumi', 'Yatim'),
(34567, 'ela', 2147483647, 'dini', 'Perempuan', 'keputih', '1990-08-15', 'yogyakarta', '0897768675758', 'belian', 'mawar', 'Alumni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_pemasukan`
--
ALTER TABLE `detil_pemasukan`
  ADD KEY `FK_RELATIONSHIP_8` (`ID_TRANSMASUK`), ADD KEY `FK_RELATIONSHIP_9` (`ID_JENISDONASI`);

--
-- Indexes for table `detil_transkeluar`
--
ALTER TABLE `detil_transkeluar`
  ADD PRIMARY KEY (`ID_JENISPENGELUARAN`,`ID_TRANSKELUAR`), ADD KEY `FK_RELATIONSHIP_7` (`ID_TRANSKELUAR`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`ID_DONATUR`), ADD KEY `FK_MENGINPUT` (`USERNAME`);

--
-- Indexes for table `jenis_donasi`
--
ALTER TABLE `jenis_donasi`
  ADD PRIMARY KEY (`ID_JENISDONASI`);

--
-- Indexes for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`ID_JENISPENGELUARAN`);

--
-- Indexes for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD PRIMARY KEY (`ID_TRANSKELUAR`), ADD KEY `FK_MENGINPUTTRANSKELUAR` (`USERNAME`);

--
-- Indexes for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`ID_TRANSMASUK`), ADD KEY `FK_BERTRANSAKSI` (`ID_DONATUR`), ADD KEY `FK_MENGINPUTTRANSMASUK` (`USERNAME`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `yatim`
--
ALTER TABLE `yatim`
  ADD PRIMARY KEY (`ID_YATIM`), ADD KEY `FK_RELATIONSHIP_10` (`USERNAME`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_pemasukan`
--
ALTER TABLE `detil_pemasukan`
ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_TRANSMASUK`) REFERENCES `transaksi_masuk` (`ID_TRANSMASUK`),
ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_JENISDONASI`) REFERENCES `jenis_donasi` (`ID_JENISDONASI`);

--
-- Constraints for table `detil_transkeluar`
--
ALTER TABLE `detil_transkeluar`
ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_JENISPENGELUARAN`) REFERENCES `jenis_pengeluaran` (`ID_JENISPENGELUARAN`),
ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_TRANSKELUAR`) REFERENCES `transaksi_keluar` (`ID_TRANSKELUAR`);

--
-- Constraints for table `donatur`
--
ALTER TABLE `donatur`
ADD CONSTRAINT `FK_MENGINPUT` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Constraints for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
ADD CONSTRAINT `FK_MENGINPUTTRANSKELUAR` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Constraints for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
ADD CONSTRAINT `FK_BERTRANSAKSI` FOREIGN KEY (`ID_DONATUR`) REFERENCES `donatur` (`ID_DONATUR`),
ADD CONSTRAINT `FK_MENGINPUTTRANSMASUK` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Constraints for table `yatim`
--
ALTER TABLE `yatim`
ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
