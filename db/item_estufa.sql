-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-11-2021 a las 18:29:41
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
-- Estructura de tabla para la tabla `item_estufa`
--

CREATE TABLE `item_estufa` (
  `id_estufa` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_item` int(11) NOT NULL COMMENT 'id relación con la tabla item',
  `fabricante` varchar(50) DEFAULT NULL COMMENT 'fabricante estufa',
  `modelo` varchar(50) DEFAULT NULL COMMENT 'modelo del estufa',
  `n_serie` varchar(20) DEFAULT NULL COMMENT 'numero de serie del estufa',
  `c_interno` varchar(20) DEFAULT NULL COMMENT 'codigo iterno del estufa',
  `fecha_fabricacion` date DEFAULT NULL COMMENT 'fecha de fabricación del estufa',
  `direccion` varchar(50) DEFAULT NULL COMMENT 'Dirección del estufa',
  `valor_seteado_hum` varchar(10) DEFAULT NULL COMMENT 'Valor setado humedad del equipo',
  `hum_min` varchar(10) DEFAULT NULL COMMENT 'Humedad miníma  del equipo',
  `hum_max` varchar(10) DEFAULT NULL COMMENT 'Humedad maxima del equipo',
  `valor_seteado_tem` varchar(10) DEFAULT NULL COMMENT 'Valor seteado temperatura ',
  `tem_min` varchar(10) DEFAULT NULL COMMENT 'Temperatura minima del equipo',
  `tem_max` varchar(10) DEFAULT NULL COMMENT 'Temperatura maxima del equipo',
  `ubicacion` varchar(50) DEFAULT NULL COMMENT 'Ubicación interna del estufa',
  `voltaje` varchar(5) DEFAULT NULL COMMENT 'Voltaje del estufa',
  `potencia` varchar(5) DEFAULT NULL COMMENT 'Potencia del estufa',
  `capacidad` varchar(5) DEFAULT NULL COMMENT 'capacidad del refigerador',
  `peso` varchar(5) DEFAULT NULL COMMENT 'Peso del estufa',
  `alto` varchar(5) DEFAULT NULL COMMENT 'Alto del estufa',
  `largo` varchar(5) DEFAULT NULL COMMENT 'Largo del estufa ',
  `ancho` varchar(5) DEFAULT NULL COMMENT 'Ancho del estufa',
  `id_usuario` int(11) DEFAULT NULL COMMENT 'id usuario que registra el estufa',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se registra el estufa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_estufa`
--
ALTER TABLE `item_estufa`
  ADD PRIMARY KEY (`id_estufa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_estufa`
--
ALTER TABLE `item_estufa`
  MODIFY `id_estufa` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
