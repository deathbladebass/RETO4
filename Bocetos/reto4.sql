-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2019 a las 08:44:39
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reto4`
--
CREATE DATABASE IF NOT EXISTS `reto4` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `reto4`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `abreviatura` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `abreviatura`, `nombre`) VALUES
(1, 'LEC', 'League Of Legends European Championship'),
(2, 'SLO', 'Super Liga Orange'),
(3, 'EAS', 'E-Sports Amateur Series'),
(4, 'LCS', 'League Of Legends Championship Series'),
(5, 'LPL', 'League Of Legends Pro League'),
(6, 'LVP', 'Liga de Videojuegos Profesional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpostecnicos`
--

CREATE TABLE `cuerpostecnicos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuerpostecnicos`
--

INSERT INTO `cuerpostecnicos` (`id`, `Nombre`, `Apellido`, `Rol`) VALUES
(1, 'Pablo', 'Sobrado', 'Coach'),
(2, 'Paco', 'Rabaco', 'Analista'),
(3, 'Luigi', 'Mario', 'Coach'),
(4, 'Carlos', 'Islandia', 'Analista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `idEquipo` int(11) NOT NULL,
  `nombreEquipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idCuerpoTecnico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idEquipo`, `nombreEquipo`, `idCategoria`, `idCuerpoTecnico`) VALUES
(1, 'Paradox Nexus', 4, 4),
(2, 'Paradox Strike', 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `idJugador` int(11) NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `dni` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `numeroTelefono` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`idJugador`, `nickname`, `nombre`, `apellido`, `fechaNacimiento`, `dni`, `numeroTelefono`, `rol`, `idEquipo`, `direccion`, `email`, `activo`) VALUES
(1, 'Rekkles', 'Martin', 'Larsson', '1996-09-20', '123456789A', 656111111, 'Bot Laner', 1, 'Avenida del backdoor', 'mLarsson@gmail.com', 1),
(2, 'Razork', 'Ivan', 'Martin', '2000-10-07', '64987321A', 656222222, 'Jungler', 1, 'Calle del Baron', 'iMartin@gmail.com', 1),
(3, 'Deadly', 'Matthew', 'Smith', '1999-08-28', '654258951E', 656333333, 'Bot Lane', 1, 'Calle del Blue', 'mSmith@gmail.com', 0),
(4, 'Denyk', 'Petr', 'Haramach', '1995-04-30', '753651489P', 656444444, 'Bot Lane', 1, 'Plaza del teamfight', 'pHaramach@gmail.com', 1),
(5, 'Miniduke', 'Ismael', 'Martinez', '1997-06-11', '795365142G', 656555555, 'Mid Lane', 1, 'Calle del Red', 'iMartinez', 1),
(6, 'Th3Antonio', 'Antonio', 'Espinosa', '1999-04-12', '985125354O', 656666666, 'Top Lane', 1, 'Plaza de la Torre', 'aEspinosa', 1),
(7, 'Milicua', 'Aitor', 'Fernandez', '1992-11-12', '758695152E', 656777777, 'Rifle', 2, 'Calle del Terrorismo', 'aFernandez@gmail.com', 1),
(8, 'bysTaXx', 'Frank', 'Garnes', '1992-08-18', '985475632P', 656888888, 'AWPer', 2, 'Calle del Sniper', 'fGarnes@gmail.com', 1),
(9, 'S1mple', 'Oleksandr', 'Kostyliev', '1997-10-02', '125647895E', 656999999, 'Rifle', 2, 'Plaza Molotov', 'oKostyliev@gmail.com', 1),
(10, 'Guardian', 'Ladislav', 'Kovacs', '1991-07-09', '658748985T', 656111222, 'Rifle', 2, 'Plaza Kalasnikov', 'lKovacs@gmail.com', 1),
(11, 'Glalve', 'Lukas', 'Rossander', '1995-06-07', '987548621I', 656111333, 'Rifle', 2, 'Calle Gaben', 'gLukas@gmail.com', 1),
(12, 'Xyp9x', 'Andreas', 'Hojsleth', '1995-09-11', '125478695T', 656111444, 'Rifle', 2, 'Avenida Steam', 'aHojsleth', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contraseña` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contraseña`, `admin`, `email`) VALUES
(1, 'Adrian', 'Lopez', 'aLopez', '123', 1, 'alopez@gmail.com'),
(2, 'Ibai', 'Acha', 'iAcha', '123', 1, 'iacha@gmail.com'),
(3, 'Ekaitz', 'Gomez', 'eGomez', '123', 1, 'egomez@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cuerpostecnicos`
--
ALTER TABLE `cuerpostecnicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idCuerpoTecnico` (`idCuerpoTecnico`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`idJugador`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cuerpostecnicos`
--
ALTER TABLE `cuerpostecnicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`idCuerpoTecnico`) REFERENCES `cuerpostecnicos` (`id`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
