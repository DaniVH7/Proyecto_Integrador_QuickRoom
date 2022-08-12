-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2022 a las 14:26:45
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quickroom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--
drop table if exists administradores;
CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidop` varchar(250) DEFAULT NULL,
  `apellidom` varchar(250) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `contra` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuartos`
--
drop table if exists cuartos;
CREATE TABLE `cuartos` (
  `id_cuarto` int(11) NOT NULL,
  `precio` varchar(12) DEFAULT NULL,
  `amueblado` varchar(10) DEFAULT NULL CHECK (`amueblado` = 'si' or `amueblado` = 'no'),
  `agua` varchar(250) DEFAULT NULL CHECK (`agua` = 'si' or `agua` = 'no'),
  `luz` varchar(250) DEFAULT NULL CHECK (`luz` = 'si' or `luz` = 'no'),
  `internet` varchar(250) DEFAULT NULL CHECK (`internet` = 'si' or `internet` = 'no'),
  `vigilancia` varchar(250) DEFAULT NULL CHECK (`vigilancia` = 'si' or `vigilancia` = 'no'),
  `cocina` varchar(250) DEFAULT NULL CHECK (`cocina` = 'si' or `cocina` = 'no'),
  `baño_compartido` varchar(250) DEFAULT NULL CHECK (`baño_compartido` = 'si' or `baño_compartido` = 'no'),
  `cuarto_compartido` varchar(10) DEFAULT NULL CHECK (`cuarto_compartido` = 'si' or `cuarto_compartido` = 'no'),
  `tiempo_renta` varchar(50) DEFAULT NULL,
  `tipo_condominio` varchar(250) DEFAULT NULL CHECK (`tipo_condominio` = 'casa' or `tipo_condominio` = 'edificio'),
  `calle` varchar(250) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `municipio` varchar(250) DEFAULT NULL,
  `disponibilidad` varchar(250) DEFAULT NULL CHECK(`disponibilidad` = 'Disponible' or `disponibilidad` = 'Ocupado'),
  `fotografias` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuartos`
--

INSERT INTO `cuartos` (`id_cuarto`, `precio`, `amueblado`, `agua`, `luz`, `internet`, `vigilancia`, `cocina`, `baño_compartido`, `cuarto_compartido`, `tiempo_renta`, `tipo_condominio`, `calle`, `estado`, `municipio`,`disponibilidad`, `fotografias`) VALUES
(1, '1300', 'si', 'si', 'si', 'si', 'no', 'no', 'si', 'no', '4 Meses', 'Edificio', 'Avenida Universidad', 'Hidalgo', 'Tulancingo','Disponible', ''),
(2, '1600', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', '1 Mes', 'Casa', 'Avenida Universidad', 'Hidalgo', 'Tulancingo','Disponible',  ''),
(3, '1500', 'si', 'si', 'si', 'si', 'si', 'no', 'no', 'no', '5 Mes', 'Casa', 'Avenida Universidad', 'Hidalgo', 'Tulancingo','Disponible', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--
drop table if exists estudiantes;
CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidop` varchar(250) DEFAULT NULL,
  `apellidom` varchar(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `contra` varchar(250) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `estatus` varchar(250) DEFAULT NULL CHECK (`estatus` = 'Activo' or `estatus` = 'Inactivo'),
  `id_padre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--
drop table if exists padres;
CREATE TABLE `padres` (
  `id_padre` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidop` varchar(250) DEFAULT NULL,
  `apellidom` varchar(250) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `contra` varchar(32) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `alumno` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--
drop table if exists registros;
CREATE TABLE `registros` (
  `id_registro` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidop` varchar(250) DEFAULT NULL,
  `apellidom` varchar(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `contra` varchar(250) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentas`
--
drop table if exists rentas;
CREATE TABLE `rentas` (
  `id_renta` int(11) NOT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_cuarto` int(11) DEFAULT NULL,
  `fecha` date DEFAULT current_timestamp,
  `tiempo_de_renta` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `cuartos`
--
ALTER TABLE `cuartos`
  ADD PRIMARY KEY (`id_cuarto`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD UNIQUE KEY `index_estudiantes` (`correo`,`telefono`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id_padre`),
  ADD UNIQUE KEY `index_padres` (`correo`,`telefono`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_registro`),
  ADD UNIQUE KEY `index_registros` (`correo`,`telefono`);

--
-- Indices de la tabla `rentas`
--
ALTER TABLE `rentas`
  ADD PRIMARY KEY (`id_renta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `cuartos`
--
ALTER TABLE `cuartos`
  MODIFY `id_cuarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `id_padre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rentas`
--
ALTER TABLE `rentas`
  MODIFY `id_renta` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
