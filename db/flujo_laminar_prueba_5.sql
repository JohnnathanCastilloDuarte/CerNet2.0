-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2022 a las 17:02:07
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
-- Estructura de tabla para la tabla `flujo_laminar_prueba_5`
--

CREATE TABLE `flujo_laminar_prueba_5` (
  `id_prueba` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla item asignado',
  `resultado` varchar(500) NOT NULL DEFAULT 'Ingresar',
  `cumple` varchar(50) NOT NULL DEFAULT 'NA',
  `categoria` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `flujo_laminar_prueba_5`
--
ALTER TABLE `flujo_laminar_prueba_5`
  ADD PRIMARY KEY (`id_prueba`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `flujo_laminar_prueba_5`
--
ALTER TABLE `flujo_laminar_prueba_5`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
