-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2018 a las 18:21:15
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_projecte4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contactes`
--

CREATE TABLE `tbl_contactes` (
  `idContacte` int(11) NOT NULL,
  `nomContacte` varchar(20) NOT NULL,
  `cognomsContacte` varchar(50) NOT NULL,
  `emailContacte` varchar(60) NOT NULL,
  `telefonContacte` varchar(9) NOT NULL,
  `tipusUbicacio1` varchar(15) NOT NULL,
  `ubicacio1Contacte` varchar(150) NOT NULL,
  `tipusUbicacio2` varchar(15) NOT NULL,
  `ubicacio2Contacte` varchar(150) NOT NULL,
  `imatgeContacte` varchar(50) NOT NULL,
  `direccioContacte` varchar(50) NOT NULL,
  `poblacioContacte` varchar(25) NOT NULL,
  `provinciaContacte` varchar(25) NOT NULL,
  `cpContacte` varchar(10) NOT NULL,
  `paisContacte` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuari`
--

CREATE TABLE `tbl_usuari` (
  `idUsuari` int(11) NOT NULL,
  `usernameUsuari` varchar(25) NOT NULL,
  `nomUsuari` varchar(25) NOT NULL,
  `cognomsUsuari` varchar(50) NOT NULL,
  `emailUsuari` varchar(100) NOT NULL,
  `contraUsuari` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contactes`
--
ALTER TABLE `tbl_contactes`
  ADD PRIMARY KEY (`idContacte`);

--
-- Indices de la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  ADD PRIMARY KEY (`idUsuari`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contactes`
--
ALTER TABLE `tbl_contactes`
  MODIFY `idContacte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  MODIFY `idUsuari` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
