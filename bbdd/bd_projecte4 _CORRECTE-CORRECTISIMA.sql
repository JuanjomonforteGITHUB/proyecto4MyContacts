-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 08:56 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_projecte4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactes`
--

CREATE TABLE `tbl_contactes` (
  `idContacte` int(11) NOT NULL,
  `idUsuariContacte` varchar(10000) NOT NULL,
  `nomContacte` varchar(20) NOT NULL,
  `cognomsContacte` varchar(50) NOT NULL,
  `emailContacte` varchar(60) DEFAULT NULL,
  `telefonContacte` varchar(9) NOT NULL,
  `imatgeContacte` varchar(50) NOT NULL,
  `tipusUbicacio1` varchar(15) DEFAULT NULL,
  `direccioContacte1` varchar(150) NOT NULL,
  `poblacioContacte1` varchar(100) NOT NULL,
  `provinciaContacte1` varchar(100) NOT NULL,
  `cpContacte1` varchar(10) NOT NULL,
  `paisContacte1` varchar(30) NOT NULL,
  `tipusUbicacio2` varchar(15) DEFAULT NULL,
  `direccioContacte2` varchar(150) NOT NULL,
  `provinciaContacte2` varchar(100) NOT NULL,
  `poblacioContacte2` varchar(100) NOT NULL,
  `cpContacte2` varchar(10) NOT NULL,
  `paisContacte2` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contactes`
--

INSERT INTO `tbl_contactes` (`idContacte`, `idUsuariContacte`, `nomContacte`, `cognomsContacte`, `emailContacte`, `telefonContacte`, `imatgeContacte`, `tipusUbicacio1`, `direccioContacte1`, `poblacioContacte1`, `provinciaContacte1`, `cpContacte1`, `paisContacte1`, `tipusUbicacio2`, `direccioContacte2`, `provinciaContacte2`, `poblacioContacte2`, `cpContacte2`, `paisContacte2`) VALUES
(3, '', 'david', 'aznar', '', '654789654', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '', 'David', 'Aznar', '', '54554555', '', '', 'rambla just oliveras', 'hospitalet de llobregat', 'barcelona', '08901', 'españa', '', '', '', '', '', ''),
(9, '', 'juanjo', 'm', '', '454445454', '', '', 'plaça mare de deu de montserrat, 9', 'hospitalet de llobregat', 'barcelona', '08901', 'españa', '', '', '', '', '', ''),
(10, '', 'sergio', 'jimenez', '', '54544545', '', '', 'avenida vilanova, 20', 'hospitalet de llobregat', 'barcelona', '08901', 'españa', '', '', '', '', '', ''),
(11, '', 'sddas', 'hgfhf', '', 'hfhgf', '', '', 'rambla marina, 247', 'hospitalet de llobregat', 'barcelona', '08901', 'españa', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuari`
--

CREATE TABLE `tbl_usuari` (
  `idUsuari` int(11) NOT NULL,
  `usernameUsuari` varchar(25) NOT NULL,
  `nomUsuari` varchar(25) NOT NULL,
  `cognomsUsuari` varchar(50) NOT NULL,
  `emailUsuari` varchar(100) NOT NULL,
  `contraUsuari` varchar(50) NOT NULL,
  `imatgeUsuari` varchar(100) DEFAULT 'perfildefecto.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usuari`
--

INSERT INTO `tbl_usuari` (`idUsuari`, `usernameUsuari`, `nomUsuari`, `cognomsUsuari`, `emailUsuari`, `contraUsuari`, `imatgeUsuari`) VALUES
(1, 'jmonforte', 'Juanjo', 'Monforte', 'juanjomonforte@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '5a6fa2547ccc2-fotodni.jpg'),
(6, 'davidAznar', 'David', '', '', '81dc9bdb52d04dc20036dbd8313ed055', 'perfildefecto.jpg'),
(7, 'daznar2', 'david', 'aznar dalmau', 'dabsvxjagj@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'perfildefecto.jpg'),
(9, 'ntapia', '', '', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'perfildefecto.jpg');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contactes`
--
ALTER TABLE `tbl_contactes`
  ADD PRIMARY KEY (`idContacte`);

--
-- Indexes for table `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  ADD PRIMARY KEY (`idUsuari`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contactes`
--
ALTER TABLE `tbl_contactes`
  MODIFY `idContacte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  MODIFY `idUsuari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
