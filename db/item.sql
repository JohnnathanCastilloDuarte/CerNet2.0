-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2022 a las 16:50:17
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
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id_item` int(10) NOT NULL COMMENT 'id autoincrementable de items',
  `id_empresa` int(10) DEFAULT NULL COMMENT 'id relacional con tabla empresa',
  `id_tipo` int(5) DEFAULT NULL COMMENT 'relaciona el id con el tipo de item',
  `clasificacion_item` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL COMMENT 'nombre del item',
  `descripcion` varchar(700) DEFAULT NULL COMMENT 'descripcion dle item',
  `codigo_interno` varchar(100) NOT NULL COMMENT 'Codigo interno',
  `direccion` varchar(500) NOT NULL COMMENT 'dirección de ubicación del item',
  `ubicacion_interna` varchar(500) NOT NULL COMMENT 'Ubicación interna del item',
  `funcion_item` text NOT NULL COMMENT 'función que desempeña el item en su proceso',
  `estado` int(1) DEFAULT 1 COMMENT '1 activo,0 inactivo',
  `id_usuario` int(10) DEFAULT NULL COMMENT 'id del usuario creador',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha en la que se creó el registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id_item`, `id_empresa`, `id_tipo`, `clasificacion_item`, `nombre`, `descripcion`, `codigo_interno`, `direccion`, `ubicacion_interna`, `funcion_item`, `estado`, `id_usuario`, `fecha_registro`) VALUES
(1, 73, 1, NULL, 'nombre bodega', 'Descripción ', 'CC-01', 'dirección', 'ubicación interna', 'Realizar la recepción de producto, tipo dispositivos médicos y reactivos de diagnóstico, los cuales van a estar en este almacenamiento de forma temporal y que requieran update update update', 1, 2, '2022-02-09 15:08:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id autoincrementable de items', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
