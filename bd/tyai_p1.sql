-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 05:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tyai_p1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(13) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_clien` int(13) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` varchar(25) NOT NULL,
  `rfc` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `id_inve` int(13) NOT NULL,
  `id_prod` int(13) NOT NULL,
  `id_cat` int(13) NOT NULL,
  `fech_entra` date NOT NULL,
  `fech_salid` date NOT NULL,
  `motivo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(13) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `id_cat` int(13) NOT NULL,
  `prec_vent` double NOT NULL,
  `prec_comp` double NOT NULL,
  `fech_comp` date NOT NULL,
  `color` varchar(25) NOT NULL,
  `descr_corta` varchar(25) NOT NULL,
  `descr_larga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `id_vent` int(13) NOT NULL,
  `id_prod` int(13) NOT NULL,
  `id_cat` int(13) NOT NULL,
  `id_clien` int(13) NOT NULL,
  `fech_venta` date NOT NULL,
  `subtotal` double NOT NULL,
  `iva` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_clien`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inve`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_vent`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_clien` (`id_clien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_clien` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inve` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `id_vent` int(13) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`);

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`id_clien`) REFERENCES `cliente` (`id_clien`),
  ADD CONSTRAINT `venta_ibfk_4` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),
  ADD CONSTRAINT `venta_ibfk_5` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`),
  ADD CONSTRAINT `venta_ibfk_6` FOREIGN KEY (`id_clien`) REFERENCES `cliente` (`id_clien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
