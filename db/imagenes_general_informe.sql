-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2021 a las 17:04:22
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
-- Estructura de tabla para la tabla `imagenes_general_informe`
--

CREATE TABLE `imagenes_general_informe` (
  `id_imagen` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `tipo` int(11) NOT NULL COMMENT '1-ubicación sensores 2-Graficao de todos los sensores\r\n3-periodo representativo',
  `url` mediumtext NOT NULL COMMENT 'ubicación de la imagen',
  `id_informe` int(11) NOT NULL COMMENT 'id de la tabla informe',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha del registro de la información'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes_general_informe`
--
ALTER TABLE `imagenes_general_informe`
  ADD PRIMARY KEY (`id_imagen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes_general_informe`
--
ALTER TABLE `imagenes_general_informe`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
