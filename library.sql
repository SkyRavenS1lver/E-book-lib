-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 07:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookdetails`
--

CREATE TABLE `bookdetails` (
  `Id` int(11) NOT NULL,
  `Judul` varchar(50) NOT NULL,
  `Penulis` varchar(100) NOT NULL,
  `Penerbit` varchar(100) NOT NULL,
  `TahunTerbit` int(11) NOT NULL,
  `JumlahHalaman` int(11) NOT NULL,
  `HargaBeli` int(11) NOT NULL,
  `Genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookdetails`
--

INSERT INTO `bookdetails` (`Id`, `Judul`, `Penulis`, `Penerbit`, `TahunTerbit`, `JumlahHalaman`, `HargaBeli`, `Genre`) VALUES
(1, 'Hujan', 'Tere Liye', 'Gramedia Pustaka Utama', 2016, 320, 33000, 'Fiksi'),
(3, 'Rembulan Tenggelam Di Wajahmu', 'Tere Liye', 'Republika', 2006, 426, 25000, 'Drama'),
(5, 'Ayahku Bukan Pembohong', 'Tere Liye', 'Republika', 2011, 299, 23000, 'Action'),
(23, 'Rindu', 'Tere Liye', 'Republika', 2014, 544, 50000, 'Sejarah'),
(25, 'Moga Bunda Disayang Allah', 'Tere Liye', 'Republika', 2006, 306, 40000, 'Sci-fi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`) VALUES
('user', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookdetails`
--
ALTER TABLE `bookdetails`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
