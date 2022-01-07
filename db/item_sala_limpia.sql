-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2022 a las 17:05:28
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
-- Estructura de tabla para la tabla `item_sala_limpia`
--

CREATE TABLE `item_sala_limpia` (
  `id` int(11) NOT NULL COMMENT 'id primaria',
  `id_item` int(11) DEFAULT NULL COMMENT 'id del item al que se asigna',
  `Area_sala_limpia` varchar(100) DEFAULT NULL COMMENT 'Area de la sala limpia',
  `Codigo` varchar(100) DEFAULT NULL COMMENT 'Codigo de la sala limpia\r\n',
  `Area_m2` varchar(100) DEFAULT NULL COMMENT 'Area de la sala en metros cuadrados',
  `volumen_m3` varchar(100) DEFAULT NULL COMMENT 'Volumen de la sala en metros cubicos',
  `Estado_sala` varchar(100) DEFAULT NULL COMMENT 'Estado de la sala ',
  `fecha_registro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_sala_limpia`
--
ALTER TABLE `item_sala_limpia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_sala_limpia`
--
ALTER TABLE `item_sala_limpia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id primaria';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
