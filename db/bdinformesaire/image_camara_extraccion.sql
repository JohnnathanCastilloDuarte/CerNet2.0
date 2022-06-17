-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 22:46:58
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
-- Estructura de tabla para la tabla `image_camara_extraccion`
--

CREATE TABLE `image_camara_extraccion` (
  `id_imagen` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla asignado',
  `url` varchar(500) DEFAULT NULL COMMENT 'url de la imagen',
  `tipo` int(11) DEFAULT NULL COMMENT 'Tipo de la imagen',
  `nombre` varchar(500) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de registro '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `image_camara_extraccion`
--

INSERT INTO `image_camara_extraccion` (`id_imagen`, `id_asignado`, `url`, `tipo`, `nombre`, `fecha_registro`) VALUES
(1, 1, 'imagenes/5/', 5, 'índice.jpg', '2022-02-01 13:11:08'),
(2, 1, 'imagenes/6/', 6, 'descarga.png', '2022-02-01 13:11:33'),
(3, 1, 'imagenes/7/', 7, 'Captura.PNG', '2022-02-01 13:12:14'),
(4, 4, 'imagenes/5/', 5, 'Autocad-wallpaper-escritorio-pc-arquitectos-2.jpg', '2022-02-14 20:55:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `image_camara_extraccion`
--
ALTER TABLE `image_camara_extraccion`
  ADD PRIMARY KEY (`id_imagen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `image_camara_extraccion`
--
ALTER TABLE `image_camara_extraccion`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
