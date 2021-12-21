-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2021 a las 16:56:36
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
-- Estructura de tabla para la tabla `servicio_tipo`
--

CREATE TABLE `servicio_tipo` (
  `id_servicio_tipo` int(10) NOT NULL COMMENT 'id autoincrementable del servicio_tipo',
  `servicio` varchar(50) DEFAULT NULL COMMENT 'Tipo de servicio',
  `id_modulo` int(10) DEFAULT NULL COMMENT 'id referencia a  los modulos de operaciones de la tabla modulo',
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() COMMENT 'Fecha de la creación del registro',
  `id_usuario` int(10) DEFAULT NULL COMMENT 'Usuario que registra',
  `id_tipo_item` int(11) DEFAULT NULL COMMENT 'Campo que nos permite relacionar el tipo de item'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio_tipo`
--

INSERT INTO `servicio_tipo` (`id_servicio_tipo`, `servicio`, `id_modulo`, `fecha_registro`, `id_usuario`, `id_tipo_item`) VALUES
(1, 'Distribución termica de camara congelada', 8, '2021-12-17 14:24:07', 2, 14),
(2, 'Mapeo termico de refrigeradores', 8, '2021-12-17 15:01:36', 2, 2),
(3, 'Distribución termica de freezer', 8, '2021-12-17 17:18:50', 2, 3),
(4, 'Distribución termica de ultrafreezer', 8, '2021-12-17 22:26:05', 2, 4),
(5, 'Distribucion termica estufa', 8, '2021-12-20 13:43:50', 2, 5),
(6, 'Distribución termica de automovil', 8, '2021-12-20 13:59:54', 2, 7),
(7, 'Inspección de integridad de filtros', 8, '2021-12-20 14:10:40', 2, 11),
(8, 'Inspección en campana de extracción', 8, '2021-12-20 14:15:16', 2, 12),
(9, 'Protocolo', 8, '2021-12-20 14:19:48', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servicio_tipo`
--
ALTER TABLE `servicio_tipo`
  ADD PRIMARY KEY (`id_servicio_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicio_tipo`
--
ALTER TABLE `servicio_tipo`
  MODIFY `id_servicio_tipo` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id autoincrementable del servicio_tipo', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
