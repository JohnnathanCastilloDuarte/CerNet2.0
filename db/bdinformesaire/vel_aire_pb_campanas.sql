-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 17:15:03
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `god_cernet_2_0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vel_aire_pb_campanas`
--

CREATE TABLE `vel_aire_pb_campanas` (
  `id` int(11) NOT NULL COMMENT 'PK de esta tabla ',
  `Apertura` varchar(200) NOT NULL COMMENT 'Apertura de la prueba de medicion  en %\r\n',
  `Medicion_1` varchar(200) NOT NULL COMMENT 'Medición 1 (m/s)',
  `Medicion_2` varchar(200) NOT NULL COMMENT 'Medición 2 (m/s)',
  `Medicion_3` varchar(200) NOT NULL COMMENT 'Medición 3 (m/s)',
  `Medicion_4` varchar(200) NOT NULL COMMENT 'Medición 4 (m/s)',
  `Medicion_5` varchar(200) NOT NULL COMMENT 'Medición 5 (m/s)',
  `Medicion_6` varchar(200) NOT NULL COMMENT 'Medición 6 (m/s)',
  `id_informe` int(11) NOT NULL COMMENT 'FK de la tabla informe_pb_campanas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vel_aire_pb_campanas`
--
ALTER TABLE `vel_aire_pb_campanas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vel_aire_pb_campanas`
--
ALTER TABLE `vel_aire_pb_campanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK de esta tabla ';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
