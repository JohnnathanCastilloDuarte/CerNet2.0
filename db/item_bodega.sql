-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2022 a las 16:59:25
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
-- Estructura de tabla para la tabla `item_bodega`
--

CREATE TABLE `item_bodega` (
  `id_bodega` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_item` int(11) NOT NULL COMMENT 'id principal de la tabla item',
  `direccion` varchar(100) DEFAULT NULL COMMENT 'ubicación de la bodega',
  `codigo_interno` varchar(20) DEFAULT NULL COMMENT 'Codigo interno asignado a la bodega',
  `productos_almacena` text DEFAULT NULL COMMENT 'Productos que se almacenan en esta bodega',
  `largo` varchar(100) DEFAULT NULL COMMENT 'medida largo de la bodega',
  `ancho` varchar(100) DEFAULT NULL COMMENT 'altura de la bodega',
  `superficie` varchar(100) DEFAULT NULL COMMENT 'superficie  de la bodega',
  `volumen` varchar(100) DEFAULT NULL COMMENT 'volumen de la bodega',
  `altura` varchar(100) DEFAULT NULL COMMENT 'altura de la bodega',
  `tipo_muro` varchar(50) DEFAULT NULL COMMENT 'Tipo de muro de la bodega',
  `tipo_cielo` varchar(50) DEFAULT NULL COMMENT 'tipo de cielo de la bodega',
  `s_climatizacion` varchar(150) DEFAULT NULL COMMENT 'Sistema de climatizacion de la bodega',
  `s_monitoreo` varchar(2) DEFAULT NULL COMMENT 'Sistema de monitoreo de la temperatura',
  `s_alarma` varchar(2) DEFAULT NULL COMMENT 'Sistema de monitoreo de temperatura alarmas',
  `planos` varchar(150) DEFAULT NULL COMMENT 'Planos de la bodega',
  `analisis_riesgo` varchar(2) DEFAULT NULL COMMENT 'Analisis de riesgos',
  `ficha_estabilidad` varchar(2) DEFAULT NULL COMMENT 'Fichas de estabilidad de la bodega',
  `id_usuario` int(10) DEFAULT NULL COMMENT 'id_usuario que registra la bodega',
  `marca_bodega` varchar(100) DEFAULT 'NA',
  `modelo_bodega` varchar(100) DEFAULT 'NA',
  `orientacion_principal` varchar(100) DEFAULT 'NA',
  `orientacion_recepcion` varchar(100) DEFAULT 'NA',
  `orientacion_despacho` varchar(100) DEFAULT 'NA',
  `num_puertas` varchar(100) DEFAULT 'NA',
  `salida_emergencia` varchar(100) DEFAULT 'NA',
  `cantidad_rack` varchar(100) DEFAULT 'NA',
  `num_estantes` varchar(100) DEFAULT 'NA',
  `altura_max_rack` varchar(100) DEFAULT 'NA',
  `sistema_extraccion` varchar(100) DEFAULT 'NA',
  `cielo_lus` varchar(100) DEFAULT 'NA',
  `temp_max` varchar(100) DEFAULT 'NA',
  `temp_min` varchar(100) DEFAULT 'NA',
  `cantidad_iluminarias` varchar(100) DEFAULT 'NA',
  `hr_max` varchar(100) DEFAULT 'NA',
  `hr_min` varchar(100) DEFAULT 'NA',
  `valor_seteado_temp` varchar(100) DEFAULT 'NA',
  `valor_seteado_hum` varchar(100) DEFAULT 'NA',
  `cantidad_ventana` varchar(100) DEFAULT 'NA',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de registro de la bodega'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `item_bodega`
--

INSERT INTO `item_bodega` (`id_bodega`, `id_item`, `direccion`, `codigo_interno`, `productos_almacena`, `largo`, `ancho`, `superficie`, `volumen`, `altura`, `tipo_muro`, `tipo_cielo`, `s_climatizacion`, `s_monitoreo`, `s_alarma`, `planos`, `analisis_riesgo`, `ficha_estabilidad`, `id_usuario`, `marca_bodega`, `modelo_bodega`, `orientacion_principal`, `orientacion_recepcion`, `orientacion_despacho`, `num_puertas`, `salida_emergencia`, `cantidad_rack`, `num_estantes`, `altura_max_rack`, `sistema_extraccion`, `cielo_lus`, `temp_max`, `temp_min`, `cantidad_iluminarias`, `hr_max`, `hr_min`, `valor_seteado_temp`, `valor_seteado_hum`, `cantidad_ventana`, `fecha_registro`) VALUES
(1, 1, 'Av. los leones, 382', 'Cod45', 'Productos que almacena', '12', '12', '12', '12', '12', 'Muro de hormigón', 'Cielo de hormigón', 'Mezclador de aire', 'Si', 'Si', 'Arquitectura', 'Si', 'Si', 2, '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '2022-02-09 15:08:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_bodega`
--
ALTER TABLE `item_bodega`
  ADD PRIMARY KEY (`id_bodega`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_bodega`
--
ALTER TABLE `item_bodega`
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
