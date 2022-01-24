-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2022 a las 14:13:28
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
-- Estructura de tabla para la tabla `images_informe_filtro`
--

CREATE TABLE `images_informe_filtro` (
  `id_imagen` int(11) NOT NULL COMMENT 'id principal de esta tabla',
  `id_informe` int(11) NOT NULL COMMENT 'id del informe de la tabla informe_filtro',
  `url` varchar(500) DEFAULT NULL COMMENT 'url de la ubicación de la imagen',
  `tipo_imagen` int(11) DEFAULT NULL COMMENT 'Tipo de la imagen, se determina para saber donde se tendra que mostrar',
  `enunciado` varchar(500) NOT NULL COMMENT 'Enunciado de la imagen que deberia acompañar la imagen',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de registro de cada campo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `images_informe_filtro`
--

INSERT INTO `images_informe_filtro` (`id_imagen`, `id_informe`, `url`, `tipo_imagen`, `enunciado`, `fecha_registro`) VALUES
(6, 5, 'imagenes/5/6enunciado_imagen.jpg', NULL, 'enunciado imagen', '2022-01-04 14:17:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `images_informe_filtro`
--
ALTER TABLE `images_informe_filtro`
  ADD PRIMARY KEY (`id_imagen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `images_informe_filtro`
--
ALTER TABLE `images_informe_filtro`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de esta tabla', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
