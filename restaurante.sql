-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 06, 2020 at 07:42 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `restaurantes`
--

-- --------------------------------------------------------

--
-- Table structure for table `RESERVAS`
--

CREATE TABLE `RESERVAS` (
  `ID_RESERVA` int(11) NOT NULL,
  `MESA` int(11) NOT NULL,
  `FECHA_RESERVA` date NOT NULL,
  `NOMBRE_RESERVA` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `RESTAURANTES_ID_RESTAURANTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `RESERVAS`
--

INSERT INTO `RESERVAS` (`ID_RESERVA`, `MESA`, `FECHA_RESERVA`, `NOMBRE_RESERVA`, `RESTAURANTES_ID_RESTAURANTE`) VALUES
(2, 12, '2020-08-07', 'Stephanie Mesa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `RESTAURANTES`
--

CREATE TABLE `RESTAURANTES` (
  `ID_RESTAURANTE` int(11) NOT NULL,
  `NOMBRE` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPCION` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `CIUDAD` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `URL_FOTO` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `CANTIDAD_MESAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `RESTAURANTES`
--

INSERT INTO `RESTAURANTES` (`ID_RESTAURANTE`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `URL_FOTO`, `CANTIDAD_MESAS`) VALUES
(2, 'El Gloton', 'Restaurante de cahrcuteria', 'Cajica', 'https://static.wixstatic.com/media/eb5bda_739438afdfcc4cf1873b40d01b817808~mv2.png/v1/fit/w_2500,h_1330,al_c/eb5bda_739438afdfcc4cf1873b40d01b817808~mv2.png', 15),
(3, 'El Corral', 'Restaurante de comidas rapidas', 'Bogotá', 'https://static.ofertia.com.co/catalogos/53ec1990-fb97-4c72-bdda-a905850285e2/0/small.v1.jpg', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `RESERVAS`
--
ALTER TABLE `RESERVAS`
  ADD PRIMARY KEY (`ID_RESERVA`,`RESTAURANTES_ID_RESTAURANTE`),
  ADD UNIQUE KEY `ID_RESERVA_UNIQUE` (`ID_RESERVA`),
  ADD KEY `fk_RESERVAS_RESTAURANTES_idx` (`RESTAURANTES_ID_RESTAURANTE`);

--
-- Indexes for table `RESTAURANTES`
--
ALTER TABLE `RESTAURANTES`
  ADD PRIMARY KEY (`ID_RESTAURANTE`),
  ADD UNIQUE KEY `id_Restaurante_UNIQUE` (`ID_RESTAURANTE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `RESERVAS`
--
ALTER TABLE `RESERVAS`
  MODIFY `ID_RESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RESTAURANTES`
--
ALTER TABLE `RESTAURANTES`
  MODIFY `ID_RESTAURANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `RESERVAS`
--
ALTER TABLE `RESERVAS`
  ADD CONSTRAINT `fk_RESERVAS_RESTAURANTES` FOREIGN KEY (`RESTAURANTES_ID_RESTAURANTE`) REFERENCES `RESTAURANTES` (`ID_RESTAURANTE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

