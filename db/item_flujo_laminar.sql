-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2022 a las 04:55:58
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
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `item_flujo_laminar`
--

INSERT INTO `item_flujo_laminar` (`id`, `id_item`, `cantidad_filtro`, `fecha_registro`) VALUES
(1, 27, 12, '2022-01-03 22:55:34'),
(2, 28, 12, '2022-01-03 22:55:34'),
(3, 29, 12, '2022-01-03 22:55:34');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
