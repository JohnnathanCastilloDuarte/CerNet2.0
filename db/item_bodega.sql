-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2022 a las 18:14:11
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
  `marca_bodega` varchar(100) DEFAULT 'NA' COMMENT 'Marca bodega',
  `modelo_bodega` varchar(100) DEFAULT 'NA' COMMENT 'modelo bodega',
  `orientacion_principal` varchar(100) DEFAULT 'na' COMMENT 'oruientacion principal',
  `orientacion_recepcion` varchar(100) DEFAULT 'NA' COMMENT 'orientacion recepcion',
  `orientacion_despacho` varchar(100) DEFAULT 'NA' COMMENT 'orientacion despacho ',
  `num_puertas` varchar(100) DEFAULT 'NA' COMMENT 'numero de puertas',
  `salida_emergencia` varchar(100) DEFAULT 'NA' COMMENT 'salida de emergencia',
  `cantidad_rack` varchar(100) DEFAULT 'NA' COMMENT 'cantidad rack',
  `num_estantes` varchar(100) DEFAULT 'NA' COMMENT 'numero de estantes',
  `altura_max_rack` varchar(100) DEFAULT 'NA' COMMENT 'altura maxima  racks',
  `sistema_extraccion` varchar(100) DEFAULT 'NA' COMMENT 'sistema de extraccion ',
  `cielo_lus` varchar(100) DEFAULT 'NA' COMMENT 'acceso cielo a lus',
  `temp_max` varchar(100) DEFAULT 'NA' COMMENT 'temperatura maxima',
  `temp_min` varchar(100) DEFAULT 'NA' COMMENT 'temperatura minima',
  `cantidad_iluminarias` varchar(100) DEFAULT 'NA' COMMENT 'cantidad iluminarias ',
  `hr_max` varchar(100) DEFAULT 'NA' COMMENT 'humedad relativa maxima ',
  `hr_min` varchar(100) DEFAULT 'NA' COMMENT 'huimedad relativa minima ',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de registro de la bodega'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `item_bodega`
--

INSERT INTO `item_bodega` (`id_bodega`, `id_item`, `direccion`, `codigo_interno`, `productos_almacena`, `largo`, `ancho`, `superficie`, `volumen`, `altura`, `tipo_muro`, `tipo_cielo`, `s_climatizacion`, `s_monitoreo`, `s_alarma`, `planos`, `analisis_riesgo`, `ficha_estabilidad`, `id_usuario`, `marca_bodega`, `modelo_bodega`, `orientacion_principal`, `orientacion_recepcion`, `orientacion_despacho`, `num_puertas`, `salida_emergencia`, `cantidad_rack`, `num_estantes`, `altura_max_rack`, `sistema_extraccion`, `cielo_lus`, `temp_max`, `temp_min`, `cantidad_iluminarias`, `hr_max`, `hr_min`, `fecha_registro`) VALUES
(1, 7, '12', '12', 'Alimentos', '12', '12', '12', '12', '12', 'Muro de hormigón', 'Cielo de hormigón', 'Mezclador de aire', 'Si', 'Si', 'Arquitectura', 'Si', 'Si', 106, 'NA', 'NA', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', '2021-12-20 14:21:13'),
(2, 34, '12', '12', 'Alimentos', '12', '12', '12', '12', '12', 'Muro de hormigón', 'Cielo de hormigón', 'Mezclador de aire', 'Si', 'Si', 'Arquitectura', 'Si', 'Si', 106, '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '2022-01-24 16:25:45'),
(3, 35, 'direccion', 'ns200 codigo', 'Alimentos, ', '12', '12', '12', '122', '122', 'Muro de hormigón, ', 'Cielo de hormigón, ', 'Mezclador de aire', 'Si', 'Si', 'Arquitectura', 'Si', 'Si', 106, 'marca bodega 2', 'modelo 2', 'orientacion 2', 'Orientacion recepcion2', 'Orientavcion despachop2', 'Numero de puertas 2', 'salida emergencia2', 'cantidad rack 2', 'numero estantes2', 'Altura maxima rack 2', 'sistema extraccioon2', 'cielo pasa lus 2', 'temperatura maxima2', 'temperatura minima 2', 'cantidad iluminarias 2', 'humedad relativa maxima2', 'Humedad relativa minima 2', '2022-01-24 16:33:48');

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
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
