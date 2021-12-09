-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-12-2021 a las 11:52:05
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `god_CerNet_2_0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_tipo`
--

CREATE TABLE `servicio_tipo` (
  `id_servicio_tipo` int(10) NOT NULL COMMENT 'id autoincrementable del servicio_tipo',
  `servicio` varchar(50) DEFAULT NULL COMMENT 'Tipo de servicio',
  `id_modulo` int(10) DEFAULT NULL COMMENT 'id referencia a  los modulos de operaciones de la tabla modulo',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de la creación del registro',
  `id_usuario` int(10) DEFAULT NULL COMMENT 'Usuario que registra',
  `id_tipo_item` int(11) DEFAULT NULL COMMENT 'Campo que nos permite relacionar el tipo de item'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio_tipo`
--

INSERT INTO `servicio_tipo` (`id_servicio_tipo`, `servicio`, `id_modulo`, `fecha_registro`, `id_usuario`, `id_tipo_item`) VALUES
(6, 'Mapeo termico de refrigeradores', 7, '2020-08-13 17:33:00', 2, 2),
(8, 'Mapeo termico de freezer ', 7, '2020-12-18 18:00:40', 2, 3),
(9, 'Mapeo termico de Ultrafreezer', 7, '2020-12-18 18:01:10', 2, 4),
(10, 'Inspección de integridad de filtros', 8, '2021-11-19 18:55:20', 1, 11),
(11, 'Inspección en campana de extracción', 8, '2021-11-19 18:55:20', 2, 12);

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
  MODIFY `id_servicio_tipo` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id autoincrementable del servicio_tipo', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
