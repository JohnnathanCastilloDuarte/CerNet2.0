-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 16:18:11
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
-- Estructura de tabla para la tabla `informe_filtro`
--

CREATE TABLE `informe_filtro` (
  `id_informe` int(11) NOT NULL COMMENT 'Id principal de esta tabla',
  `nombre_informe` varchar(100) DEFAULT NULL COMMENT 'Nombre del filtro',
  `concepto` text NOT NULL COMMENT 'concepto del informe',
  `conclusion` text NOT NULL COMMENT 'Conclusión del informe',
  `solicitante` varchar(100) DEFAULT NULL,
  `insp1` varchar(10) NOT NULL COMMENT 'Equipo en buenas condiciones de operación',
  `insp2` varchar(10) NOT NULL COMMENT 'Conexión eléctrica en buenas condiciones',
  `insp3` varchar(10) NOT NULL COMMENT 'Presenta todas sus partes y accesorios',
  `insp4` varchar(10) NOT NULL COMMENT 'EquipoLímpio y sin elementos externos:',
  `insp5` varchar(10) NOT NULL COMMENT 'Posee identificación',
  `insp6` varchar(10) NOT NULL,
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla item_asignado',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informe_filtro`
--

INSERT INTO `informe_filtro` (`id_informe`, `nombre_informe`, `concepto`, `conclusion`, `solicitante`, `insp1`, `insp2`, `insp3`, `insp4`, `insp5`, `insp6`, `id_asignado`, `fecha_registro`) VALUES
(2, 'INFO-C00-9898-1231', '', 'Con este procedimiento se buscan eventuales fugas de aire no filtrado que pueda ingresar al área de trabajo, hermeticidad y estanqueidad en marcos y junturas. Se\naplica a todas las unidades que dispongan de filtro terminal HEPA o ULPA, en este procedimiento se inyectan partículas de 0,3 a 5 micrones en forma de aerosol, con\nuna concentración de 22.9 mg/litro.', 'OSCAR', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 2, '2022-02-01 20:13:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informe_filtro`
--
ALTER TABLE `informe_filtro`
  ADD PRIMARY KEY (`id_informe`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informe_filtro`
--
ALTER TABLE `informe_filtro`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal de esta tabla', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
