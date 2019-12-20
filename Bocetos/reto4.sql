-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2019 a las 08:38:20
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteCategoria` (IN `pId` INT)  NO SQL
DELETE FROM categorias WHERE idCategoria=pId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteCuerpoTecnico` (IN `pId` INT)  NO SQL
DELETE FROM `cuerpostecnicos` WHERE id=pId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteEquipo` (IN `p_id` INT)  NO SQL
delete from `equipos` where idEquipo=p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteJugador` (IN `p_id` INT)  NO SQL
DELETE FROM `jugadores` WHERE idJugador=p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteMensaje` (IN `pId` INT)  NO SQL
DELETE FROM mensajes WHERE idMensaje=pId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertJugador` (IN `p_nombre` VARCHAR(40), IN `p_apellido` VARCHAR(40), IN `p_nickname` VARCHAR(40), IN `p_fechaNacimiento` DATE, IN `p_dni` VARCHAR(9), IN `p_numTel` INT(9), IN `p_rol` VARCHAR(40), IN `p_direccion` VARCHAR(40), IN `p_email` VARCHAR(40), IN `p_activo` TINYINT, IN `p_idEquipo` INT)  NO SQL
insert into jugadores( nickname, nombre, apellido, fechaNacimiento, dni, numeroTelefono, rol, idEquipo, direccion, email, activo) values ( p_nickname, p_nombre, p_apellido, p_fechaNacimiento, p_dni, p_numTel, p_rol, p_idEquipo, p_direccion, p_email, p_activo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarCategoria` (IN `pId` INT, IN `pNombre` VARCHAR(40), IN `pAbreviatura` VARCHAR(10))  NO SQL
UPDATE `categorias` SET`abreviatura`=pAbreviatura,`nombre`=pNombre WHERE categorias.idCategoria=pId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarCuerpoTecnico` (IN `pId` INT, IN `pNombre` VARCHAR(40), IN `pApellido` VARCHAR(40), IN `pDni` VARCHAR(9), IN `pFechaNacimiento` DATE, IN `pNumTel` INT, IN `pRol` VARCHAR(40), IN `pDireccion` VARCHAR(40), IN `pEmail` VARCHAR(40))  NO SQL
UPDATE `cuerpostecnicos` SET `Nombre`=pNombre,`Apellido`=pApellido,`Rol`=pRol,`fechaNacimiento`=pFechaNacimiento,`direccion`=pDireccion,`email`=pEmail,`numTel`=pNumTel,`dni`=pDni WHERE cuerpostecnicos.id=pId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarEquipo` (IN `pIdEquipo` INT, IN `pNombre` VARCHAR(40), IN `pIdCategoria` INT)  NO SQL
UPDATE `equipos` SET nombreEquipo=pNombre,`idCategoria`=pIdCategoria WHERE equipos.idEquipo=pIdEquipo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarJugador` (IN `pnombre` VARCHAR(40), IN `papellido` VARCHAR(40), IN `pnickname` VARCHAR(40), IN `pemail` VARCHAR(40), IN `pnumTel` INT, IN `pdni` VARCHAR(40), IN `pfechaNacimiento` DATE, IN `prol` VARCHAR(40), IN `pdireccion` VARCHAR(40), IN `pid` INT, IN `pidEquipo` INT, IN `pactivo` TINYINT)  NO SQL
UPDATE jugadores SET nickname=pnickname,nombre=pnombre,apellido=papellido,fechaNacimiento=pfechaNacimiento,dni=pdni,numeroTelefono=pnumTel,rol=prol,idEquipo=pidEquipo,direccion=pdireccion,email=pemail,activo=pactivo WHERE jugadores.idJugador=pid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarMensaje` (IN `pId` INT, IN `pTipo` VARCHAR(40), IN `pNombre` VARCHAR(40), IN `pMensaje` VARCHAR(200), IN `pEmail` VARCHAR(40), IN `pFecha` DATE, IN `pAsunto` VARCHAR(40))  NO SQL
UPDATE `mensajes` SET `tipo`=pTipo,`nombre`=pNombre,`mensaje`=pMensaje,`email`=pEmail,`fecha`=pFecha WHERE mensajes.idMensaje=pId$$

DELIMITER ;

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
  `Rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numTel` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuerpostecnicos`
--

INSERT INTO `cuerpostecnicos` (`id`, `Nombre`, `Apellido`, `Rol`, `idEquipo`, `fechaNacimiento`, `direccion`, `email`, `numTel`, `dni`) VALUES
(5, 'Francisco', 'Fran', 'Entrenador', 1, '1982-12-13', 'fdsa', 'fdsa', '12', 'fdsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `idEquipo` int(11) NOT NULL,
  `nombreEquipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagenEquipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idEquipo`, `nombreEquipo`, `imagenEquipo`, `idCategoria`) VALUES
(1, 'Paradox Nexus', 'img/paradoxNexus.png', 4),
(2, 'Paradox Strike', 'img/paradoxStrike.png', 6);

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
  `activo` tinyint(1) NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`idJugador`, `nickname`, `nombre`, `apellido`, `fechaNacimiento`, `dni`, `numeroTelefono`, `rol`, `idEquipo`, `direccion`, `email`, `activo`, `img`) VALUES
(1, 'Rekkles', 'Martin', 'Larsson', '1996-09-20', '123456789A', 656111111, 'Bot Laner', 1, 'Avenida del backdoor', 'mLarsson@gmail.com', 1, ''),
(2, 'Razork', 'Ivan', 'Martin', '2000-10-07', '64987321A', 656222222, 'Jungler', 1, 'Calle del Baron', 'iMartin@gmail.com', 1, ''),
(3, 'Deadly', 'Matthew', 'Smith', '1999-08-28', '654258951E', 656333333, 'Bot Lane', 1, 'Calle del Blue', 'mSmith@gmail.com', 0, ''),
(4, 'Denyk', 'Petr', 'Haramach', '1995-04-30', '753651489P', 656444444, 'Bot Lane', 1, 'Plaza del teamfight', 'pHaramach@gmail.com', 1, ''),
(5, 'Miniduke', 'Ismael', 'Martinez', '1997-06-11', '795365142G', 656555555, 'Mid Lane', 1, 'Calle del Red', 'iMartinez', 1, ''),
(6, 'Th3Antonio', 'Antonio', 'Espinosa', '1999-04-12', '985125354O', 656666666, 'Top Lane', 1, 'Plaza de la Torre', 'aEspinosa', 1, ''),
(7, 'Milicua', 'Aitor', 'Fernandez', '1992-11-12', '758695152E', 656777777, 'Rifle', 2, 'Calle del Terrorismo', 'aFernandez@gmail.com', 1, ''),
(8, 'bysTaXx', 'Frank', 'Garnes', '1992-08-18', '985475632P', 656888888, 'AWPer', 2, 'Calle del Sniper', 'fGarnes@gmail.com', 1, ''),
(9, 'S1mple', 'Oleksandr', 'Kostyliev', '1997-10-02', '125647895E', 656999999, 'Rifle', 2, 'Plaza Molotov', 'oKostyliev@gmail.com', 1, ''),
(10, 'Guardian', 'Ladislav', 'Kovacs', '1991-07-09', '658748985T', 656111222, 'Rifle', 2, 'Plaza Kalasnikov', 'lKovacs@gmail.com', 1, ''),
(11, 'Glalve', 'Lukas', 'Rossander', '1995-06-07', '987548621I', 656111333, 'Rifle', 2, 'Calle Gaben', 'gLukas@gmail.com', 1, ''),
(56, 'a', 'f', 's', '1965-12-13', 's', 1, 'Top laner', 1, 'a', 's', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`idJugador`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMensaje`);

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
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cuerpostecnicos`
--
ALTER TABLE `cuerpostecnicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuerpostecnicos`
--
ALTER TABLE `cuerpostecnicos`
  ADD CONSTRAINT `cuerpostecnicos_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
