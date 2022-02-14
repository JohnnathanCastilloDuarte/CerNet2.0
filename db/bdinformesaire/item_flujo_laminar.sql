-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 19:39:16
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
-- Estructura de tabla para la tabla `item_flujo_laminar`
--

CREATE TABLE `item_flujo_laminar` (
  `id` int(11) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `cantidad_filtro` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL COMMENT 'direccion',
  `ubicacion_interna` varchar(100) DEFAULT NULL COMMENT 'ubicación interna',
  `area_interna` varchar(100) DEFAULT NULL COMMENT 'área interna',
  `tipo_cabina` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `tipo_dimenciones` varchar(100) DEFAULT NULL,
  `limite_penetracion` varchar(100) DEFAULT NULL,
  `eficiencia` varchar(100) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `item_flujo_laminar`
--

INSERT INTO `item_flujo_laminar` (`id`, `id_item`, `cantidad_filtro`, `direccion`, `ubicacion_interna`, `area_interna`, `tipo_cabina`, `marca`, `modelo`, `serie`, `codigo`, `tipo_dimenciones`, `limite_penetracion`, `eficiencia`, `fecha_registro`) VALUES
(1, 30, 12, 'Sin regi12strar12', '12', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-17 16:33:25'),
(2, 5, 2, 'Sin registrar12', 'sala', 'salon', 'tipocabina', 'marca', 'modelo', 'nsrie', 'codigo12', 'tipodimencion', '12', '12', '2022-02-01 09:27:14'),
(6, 13, 12, 'Sin registrarce', '12', '12', '11', '12', '13', '14', '15', '16', '17', '18', '2022-02-02 16:07:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_flujo_laminar`
--
ALTER TABLE `item_flujo_laminar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_flujo_laminar`
--
ALTER TABLE `item_flujo_laminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
