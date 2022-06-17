-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2022 a las 14:44:37
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
-- Estructura de tabla para la tabla `salas_limpias_metodo_4`
--

CREATE TABLE `salas_limpias_metodo_4` (
  `id_ensayo` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL,
  `metodo_ensayo` varchar(400) NOT NULL DEFAULT 'metodo',
  `n_muestras` varchar(400) NOT NULL,
  `altura_muestra` varchar(400) NOT NULL,
  `categoria` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas_limpias_metodo_4`
--

INSERT INTO `salas_limpias_metodo_4` (`id_ensayo`, `id_asignado`, `metodo_ensayo`, `n_muestras`, `altura_muestra`, `categoria`, `fecha_registro`) VALUES
(1, 7, 'sfasf', '2', '1', 1, '2022-01-17 22:09:28'),
(2, 7, 'wqe', 'qq', 'ee', 2, '2022-01-17 22:09:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `salas_limpias_metodo_4`
--
ALTER TABLE `salas_limpias_metodo_4`
  ADD PRIMARY KEY (`id_ensayo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salas_limpias_metodo_4`
--
ALTER TABLE `salas_limpias_metodo_4`
  MODIFY `id_ensayo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
