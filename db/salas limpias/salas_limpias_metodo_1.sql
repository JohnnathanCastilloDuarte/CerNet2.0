-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2022 a las 14:44:16
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
-- Estructura de tabla para la tabla `salas_limpias_metodo_1`
--

CREATE TABLE `salas_limpias_metodo_1` (
  `id_ensayo` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL,
  `metodo_ensayo` varchar(500) NOT NULL DEFAULT 'metodo ensayo',
  `puntos_x_medicion` varchar(400) NOT NULL DEFAULT 'Puntos medicion',
  `muestra_x_punto` varchar(400) NOT NULL DEFAULT 'Muestra punto',
  `volumen_muestra` varchar(400) NOT NULL DEFAULT 'Volumen',
  `altura_muestra` varchar(400) NOT NULL DEFAULT 'altura',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas_limpias_metodo_1`
--

INSERT INTO `salas_limpias_metodo_1` (`id_ensayo`, `id_asignado`, `metodo_ensayo`, `puntos_x_medicion`, `muestra_x_punto`, `volumen_muestra`, `altura_muestra`, `fecha_registro`) VALUES
(1, 7, 'dsadsa', 'sadas', 'safas', 'safas', 'dsad', '2022-01-17 22:09:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `salas_limpias_metodo_1`
--
ALTER TABLE `salas_limpias_metodo_1`
  ADD PRIMARY KEY (`id_ensayo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salas_limpias_metodo_1`
--
ALTER TABLE `salas_limpias_metodo_1`
  MODIFY `id_ensayo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
