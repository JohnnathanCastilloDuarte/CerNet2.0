-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2021 a las 15:26:43
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

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
-- Estructura de tabla para la tabla `tipo_item`
--

CREATE TABLE `tipo_item` (
  `id_item` int(10) NOT NULL COMMENT 'id principal de la tabla tipo_item',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'nombre del tipo_item',
  `id_usuario` int(10) DEFAULT NULL COMMENT 'id_usuario creador del registro',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de creación del registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_item`
--

INSERT INTO `tipo_item` (`id_item`, `nombre`, `id_usuario`, `fecha_registro`) VALUES
(1, 'Bodega', 1, '2020-07-23 02:57:59'),
(2, 'Refrigerador', 2, '2020-08-17 23:29:34'),
(3, 'Freezer', 2, '2020-12-18 21:03:53'),
(4, 'UltraFreezer', 2, '2020-12-18 21:03:53'),
(5, 'Estufa', 2, '2021-03-01 16:41:04'),
(6, 'Incubadora', 2, '2021-03-01 16:41:04'),
(7, 'Automovil', 2, '2021-03-23 18:27:31'),
(8, 'Sala Limpia', 2, '2021-03-23 18:27:31'),
(10, 'HVAC', 2, '2021-03-23 18:27:31'),
(11, 'Filtro', 2, '2021-03-23 18:27:31'),
(12, 'Campana de Extracción', 2, '2021-03-23 18:27:31'),
(13, 'Flujo Laminar', 2, '2021-03-23 18:27:31'),
(14, 'Camara Congelada', 2, '2021-12-09 12:20:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipo_item`
--
ALTER TABLE `tipo_item`
  ADD PRIMARY KEY (`id_item`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipo_item`
--
ALTER TABLE `tipo_item`
  MODIFY `id_item` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla tipo_item', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
