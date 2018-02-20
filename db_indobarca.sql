-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2017 at 07:09 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_indobarca`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id` int(11) NOT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `ket_gambar` text,
  `foto` text
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `ket_gambar`, `foto`) VALUES
(1, 'Jersey 2014/2015', 80000, 'Jersey Home 2014/2015', '19077_fc-barcelona-ucl-home-jersey-2016-17-full-version_09_s.png'),
(4, 'Jersey 2015/2016', 200000, 'Jersey Home', 'barcelona-16-17-home-kit-3.jpg'),
(5, 'Syal', 50000, 'Syal Barca 2015/2016', '34460.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE IF NOT EXISTS `cabang` (
`id` int(11) NOT NULL,
  `nama_cabang` varchar(50) DEFAULT NULL,
  `nama_atasan` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `nama_cabang`, `nama_atasan`, `telepon`, `alamat`) VALUES
(1, 'INDOBARCA_Tambun', 'Aditria', '085781476040', 'Papan Mas, Tambun Selatan'),
(2, 'INDOBARCA_Bekasi', 'Alvian', '089678654653', 'Margahayu, Bekasi Timur'),
(4, 'INDOBARCA_Cibitung', 'Syifa Awlia', '085678654611', 'Rasuna Said, Cibitung');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jk` varchar(7) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `alamat` text,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `jk`, `tgl_lahir`, `telepon`, `email`, `password`, `alamat`, `foto`) VALUES
(1, 'Aditria Pardana', 'P', '1996-06-20', '085781476040', 'aditria.pardana@yahoo.co.id', '123457', 'Papan Mas, Tambun Selatan', 'CtlXZ9VVYAA-upo.jpg'),
(2, 'Alfian', 'P', '1993-03-18', '087812653135', 'alfian.fitra@gmail.com', '123456', 'Margahayu, Bekasi Timur', '01_warteg.jpeg'),
(3, 'Ari Febria', 'W', '1994-02-11', '089823567254', 'arifebria@gmail.com', '987165', 'Rangasdeklok, Solo', 'beng.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
