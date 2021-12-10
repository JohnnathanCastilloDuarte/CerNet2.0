-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2021 a las 15:06:55
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
-- Estructura de tabla para la tabla `item_camara_congelada`
--

CREATE TABLE `item_camara_congelada` (
  `id_item_camara_congelada` int(11) NOT NULL COMMENT 'Id principal de esta tabla',
  `id_item` int(11) NOT NULL COMMENT 'id de la tabla item',
  `marca` varchar(150) DEFAULT NULL COMMENT 'Marca de la camara congelada',
  `modelo` varchar(150) DEFAULT NULL COMMENT 'Modelo de la camara congelado',
  `ubicacion` varchar(200) DEFAULT NULL COMMENT 'Ubicación de la camara congelada',
  `valor_seteado` varchar(10) DEFAULT NULL COMMENT 'valor setado camara congelada',
  `valor_maximo` varchar(10) DEFAULT NULL COMMENT 'valor maximo camara congelada',
  `valor_minimo` varchar(10) DEFAULT NULL COMMENT 'valor minimo camara congelada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_camara_congelada`
--
ALTER TABLE `item_camara_congelada`
  ADD PRIMARY KEY (`id_item_camara_congelada`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_camara_congelada`
--
ALTER TABLE `item_camara_congelada`
  MODIFY `id_item_camara_congelada` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal de esta tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
