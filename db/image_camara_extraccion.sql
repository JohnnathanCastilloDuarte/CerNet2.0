-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2022 a las 18:17:33
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
(1, 2, 'imagenes/1/', 1, '1.png', '2022-01-04 03:45:00'),
(2, 6, 'imagenes/1/', 1, 'ubicación sensores.jpg', '2022-01-04 15:26:27'),
(3, 6, 'imagenes/1/', 1, '53142408-estrella-3d-resumen-plantilla-logotipo-de-identidad-de-la-empresa-estrella-3d-de-diseño-de-logotipo-.jpg', '2022-01-04 15:27:06');

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
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
