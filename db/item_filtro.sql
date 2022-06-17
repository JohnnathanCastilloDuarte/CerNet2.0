-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2021 a las 18:54:15
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
-- Estructura de tabla para la tabla `item_filtro`
--

CREATE TABLE `item_filtro` (
  `id_filtro` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_item` int(11) NOT NULL COMMENT 'id de la tabla item',
  `marca` varchar(250) DEFAULT NULL COMMENT 'Marca del filtro',
  `modelo` varchar(250) DEFAULT NULL COMMENT 'Modelo del filtro',
  `serie` varchar(250) DEFAULT NULL COMMENT 'Serie del filtro',
  `cantidad_filtro` int(11) DEFAULT NULL COMMENT 'cantidad de filltros',
  `ubicacion` varchar(300) DEFAULT NULL COMMENT 'Ubicacion del filtro',
  `ubicado_en` varchar(300) DEFAULT NULL COMMENT 'Ubicación interna del filtro',
  `lugar_filtro` varchar(100) DEFAULT NULL COMMENT 'lugar del filtro',
  `filtro_dimension` varchar(300) DEFAULT NULL COMMENT 'filtro dimensiones',
  `limite_penetracion` varchar(100) DEFAULT NULL COMMENT 'limite de la penetración',
  `tipo_filtro` varchar(50) DEFAULT NULL COMMENT 'Tipo Filtro',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creacion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `item_filtro`
--

INSERT INTO `item_filtro` (`id_filtro`, `id_item`, `marca`, `modelo`, `serie`, `cantidad_filtro`, `ubicacion`, `ubicado_en`, `lugar_filtro`, `filtro_dimension`, `limite_penetracion`, `tipo_filtro`, `fecha_registro`) VALUES
(1, 1, 'Ultimaaa', 'o', 'u', 44, 'u', 'UMA', 'u', 'o', '11', 'OQ ', '2021-10-27 15:38:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_filtro`
--
ALTER TABLE `item_filtro`
  ADD PRIMARY KEY (`id_filtro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_filtro`
--
ALTER TABLE `item_filtro`
  MODIFY `id_filtro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
