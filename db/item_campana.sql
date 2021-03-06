-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2022 a las 16:12:39
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
-- Estructura de tabla para la tabla `item_campana`
--

CREATE TABLE `item_campana` (
  `id_campana` int(11) NOT NULL COMMENT 'llave primera de la tabla',
  `id_item` int(11) NOT NULL COMMENT 'id de la tabla item',
  `tipo` varchar(250) DEFAULT NULL COMMENT 'tipo de campana',
  `marca` varchar(250) DEFAULT NULL COMMENT 'Marca de la campana',
  `modelo` varchar(250) DEFAULT NULL COMMENT 'Modelo de la campana',
  `serie` varchar(250) DEFAULT NULL COMMENT 'Serie de la campana',
  `codigo` varchar(250) DEFAULT NULL COMMENT 'codigo interno de la campana',
  `ubicacion_interna` varchar(300) DEFAULT NULL COMMENT 'Ubicacion interna de campana',
  `area_interna` varchar(100) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL COMMENT 'Ubicacion de la empresa donde se encuentra la camapana',
  `requisito_velocidad` varchar(15) DEFAULT NULL COMMENT 'Requisito de la velocidad de la campana',
  `fecha_fabricacion` varchar(50) DEFAULT 'Ninguno' COMMENT 'Fecha de fabricación',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_campana`
--
ALTER TABLE `item_campana`
  ADD PRIMARY KEY (`id_campana`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_campana`
--
ALTER TABLE `item_campana`
  MODIFY `id_campana` int(11) NOT NULL AUTO_INCREMENT COMMENT 'llave primera de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
