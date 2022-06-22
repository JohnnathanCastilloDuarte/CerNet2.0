-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2021 a las 19:39:20
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
-- Estructura de tabla para la tabla `item_automovil`
--

CREATE TABLE `item_automovil` (
  `id_automovil` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_item` int(11) NOT NULL COMMENT 'id relación con la tabla item',
  `fabricante` varchar(50) DEFAULT NULL COMMENT 'fabricante automovil',
  `modelo` varchar(50) DEFAULT NULL COMMENT 'modelo del automovil',
  `n_serie` varchar(20) DEFAULT NULL COMMENT 'numero de serie del automovil',
  `c_interno` varchar(20) DEFAULT NULL COMMENT 'codigo iterno del automovil',
  `placa` varchar(50) DEFAULT NULL COMMENT 'Placa del vehiculo',
  `fecha_fabricacion` date DEFAULT NULL COMMENT 'fecha de fabricación del automovil',
  `direccion` varchar(50) DEFAULT NULL COMMENT 'Dirección del automovil',
  `valor_seteado_hum` varchar(10) DEFAULT NULL COMMENT 'Valor setado humedad del equipo',
  `hum_min` varchar(10) DEFAULT NULL COMMENT 'Humedad miníma  del equipo',
  `hum_max` varchar(10) DEFAULT NULL COMMENT 'Humedad maxima del equipo',
  `valor_seteado_tem` varchar(10) DEFAULT NULL COMMENT 'Valor seteado temperatura ',
  `tem_min` varchar(10) DEFAULT NULL COMMENT 'Temperatura minima del equipo',
  `tem_max` varchar(10) DEFAULT NULL COMMENT 'Temperatura maxima del equipo',
  `ubicacion` varchar(50) DEFAULT NULL COMMENT 'Ubicación interna del automovil',
  `voltaje` varchar(5) DEFAULT NULL COMMENT 'Voltaje del automovil',
  `potencia` varchar(5) DEFAULT NULL COMMENT 'Potencia del automovil',
  `capacidad` varchar(5) DEFAULT NULL COMMENT 'capacidad del refigerador',
  `peso` varchar(5) DEFAULT NULL COMMENT 'Peso del automovil',
  `alto` varchar(5) DEFAULT NULL COMMENT 'Alto del automovil',
  `largo` varchar(5) DEFAULT NULL COMMENT 'Largo del automovil ',
  `ancho` varchar(5) DEFAULT NULL COMMENT 'Ancho del automovil',
  `id_usuario` int(11) DEFAULT NULL COMMENT 'id usuario que registra el automovil',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha en que se registra el automovil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_automovil`
--
ALTER TABLE `item_automovil`
  ADD PRIMARY KEY (`id_automovil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_automovil`
--
ALTER TABLE `item_automovil`
  MODIFY `id_automovil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
