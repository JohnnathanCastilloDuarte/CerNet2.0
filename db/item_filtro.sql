-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-10-2021 a las 13:52:48
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `god_cercal_prueba`
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
  `cantidad_filtro` int(5) DEFAULT NULL COMMENT 'cantidad de filltros',
  `ubicacion` varchar(300) DEFAULT NULL COMMENT 'Ubicacion del filtro',
  `ubicado_en` varchar(300) DEFAULT NULL COMMENT 'Ubicación interna del filtro',
  `filtro_dimension` varchar(300) DEFAULT NULL COMMENT 'filtro dimensiones',
  `tipo_filtro` varchar(50) DEFAULT NULL COMMENT 'Tipo Filtro',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id_filtro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
