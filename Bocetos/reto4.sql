-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2019 a las 14:52:18
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spEquipos` ()  NO SQL
SELECT equipos.idEquipo,equipos.nombreEquipo, equipos.imagenEquipo FROM equipos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsert` (IN `pNombre` VARCHAR(50), IN `pApellido` VARCHAR(50), IN `pNickname` VARCHAR(50), IN `pFechaNacimiento` DATE, IN `pDni` VARCHAR(12), IN `pNumTel` VARCHAR(12), IN `pRol` VARCHAR(50), IN `pEquipo` INT, IN `pDireccion` VARCHAR(50), IN `pActivo` TINYINT(1), IN `pImagen` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO jugadores(jugadores.nombre, jugadores.apellido, jugadores.nickname, jugadores.fechaNacimiento, jugadores.dni, jugadores.numeroTelefono, jugadores.rol, jugadores.idEquipo, jugadores.direccion, jugadores.activo, jugadores.img)
VALUES (pNombre, pApellido, pNickname, pFechaNacimiento, pDni, pNumTel, pRol, pEquipo, pDireccion,pActivo,pImagen);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertUser` (IN `pUser` VARCHAR(50), IN `pName` VARCHAR(50), IN `pPassw` VARCHAR(50), IN `pEmail` VARCHAR(50), IN `pApellido` VARCHAR(50), IN `pTipo` INT(1))  NO SQL
INSERT INTO usuarios (usuarios.usuario, usuarios.nombre, usuarios.contrasenia, usuarios.email,  usuarios.apellido,usuarios.tipo)
VALUES(pUser, pName, pPassw, pEmail, pApellido, pTipo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUsuarios` ()  NO SQL
SELECT * FROM usuarios$$

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
(6, 'LVP', 'Liga de Videojuegos Profesional'),
(7, 'NGE', 'National Gaming Events ');

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
(5, 'Francisco', 'Fran', 'Entrenador', 1, '0000-00-00', '', '', '', '');

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
(2, 'Paradox Strike', 'img/paradoxStrike.png', 6),
(3, 'Paradox Siege', 'img/paradoxSiege.png', 7);

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
(1, 'Rekkles', 'Martin', 'Larsson', '1996-09-20', '123456789A', 656111111, 'Bot Laner', 1, 'Avenida del backdoor', 'mLarsson@gmail.com', 1, '../view/img/recless.png'),
(2, 'Razork', 'Ivan', 'Martin', '2000-10-07', '64987321A', 656222222, 'Jungler', 1, 'Calle del Baron', 'iMartin@gmail.com', 1, '../view/img/razork.png'),
(3, 'Deadly', 'Matthew', 'Smith', '1999-08-28', '654258951E', 656333333, 'Bot Lane', 1, 'Calle del Blue', 'mSmith@gmail.com', 0, '../view/img/deadly.png'),
(4, 'Denyk', 'Petr', 'Haramach', '1995-04-30', '753651489P', 656444444, 'Bot Lane', 1, 'Plaza del teamfight', 'pHaramach@gmail.com', 1, '../view/img/denyk.png'),
(5, 'Miniduke', 'Ismael', 'Martinez', '1997-06-11', '795365142G', 656555555, 'Mid Lane', 1, 'Calle del Red', 'iMartinez', 1, '../view/img/miniduke.png'),
(6, 'Th3Antonio', 'Antonio', 'Espinosa', '1999-04-12', '985125354O', 656666666, 'Top Lane', 1, 'Plaza de la Torre', 'aEspinosa', 1, '../view/img/Th3Antonio.png'),
(7, 'Milicua', 'Aitor', 'Fernandez', '1992-11-12', '758695152E', 656777777, 'Rifle', 2, 'Calle del Terrorismo', 'aFernandez@gmail.com', 1, '../view/img/mili.jpg'),
(8, 'bysTaXx', 'Frank', 'Garnes', '1992-08-18', '985475632P', 656888888, 'AWPer', 2, 'Calle del Sniper', 'fGarnes@gmail.com', 1, '../view/img/empty.jpg'),
(9, 'S1mple', 'Oleksandr', 'Kostyliev', '1997-10-02', '125647895E', 656999999, 'Rifle', 2, 'Plaza Molotov', 'oKostyliev@gmail.com', 1, '../view/img/symple.jpg'),
(10, 'Guardian', 'Ladislav', 'Kovacs', '1991-07-09', '658748985T', 656111222, 'Rifle', 2, 'Plaza Kalasnikov', 'lKovacs@gmail.com', 1, '../view/img/guardian.jpg'),
(11, 'Glalve', 'Lukas', 'Rossander', '1995-06-07', '987548621I', 656111333, 'Rifle', 2, 'Calle Gaben', 'gLukas@gmail.com', 1, '../view/img/glaive.jpg'),
(12, 'Xyp9x', 'Andreas', 'Hojsleth', '1995-09-11', '125478695T', 656111444, 'Rifle', 2, 'Avenida Steam', 'aHojsleth', 0, '../view/img/xyp9x.jpg'),
(13, 'Virtue', 'Jake', 'Grannan', '1994-10-29', '95846235V', 645855765, 'Anchor', 3, 'Cobadonga', 'Virtue94@gmail.com', 1, '../view/img/virtue.jpg'),
(14, 'RIZRAZ', 'ETHAN ', 'WOMBWELL', '1999-07-28', '84956532V', 664555765, 'Roamer', 3, 'Australia', 'Rizraz99@gmail.com', 1, '../view/img/frizraz.jpg'),
(15, 'SPECA', 'RYAN ', 'AUSDEN', '1997-05-02', '89453214J', 694852775, 'Support', 3, 'Australia', 'speca97@gmail.com', 1, '../view/img/empty.jpg'),
(16, 'LUSTY', 'JASON ', 'CHEN', '1997-12-03', '84571266C', 651243657, 'Flex', 3, 'AUSTRALIA', 'lusty97@gmail.com', 1, '../view/img/speca.jpg'),
(17, 'ACEZ', 'MATTHEW ', 'MC HENRY', '1997-06-24', '78965421K', 651478525, 'Roamer', 3, 'Australia', 'acez97@gmail.com', 1, './view/img/acez.jpg'),
(18, 'MAGNET', 'ETIENNE ', 'ROUSSEAU', '1998-06-24', '57483365G', 654321987, 'IGL', 3, 'Australia', 'magnet98@gmail.com', 0, './view/img/speca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `asunto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `tipo`) VALUES
(1, 'normal'),
(2, 'admin'),
(3, 'cuerpoTec'),
(4, 'jugador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contrasenia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contrasenia`, `tipo`, `email`) VALUES
(1, 'Adrian', 'Lopez', 'aLopez', '123', 2, 'alopez@gmail.com'),
(2, 'Ibai', 'Acha', 'iAcha', '123', 2, 'iacha@gmail.com'),
(3, 'Ekaitz', 'Gomez', 'eGomez', '123', 2, 'egomez@gmail.com'),
(7, 'Markel', 'Rodriguez', 'mRodriguez', '123', 3, 'mRodri97@gmail.com'),
(8, 'Bogdan', 'Bergie', 'bBergie', '123', 1, 'bergie@gmail.com'),
(25, 'markel', 'Jodri', 'mRodri', '123', 1, 'aa@aa.ee');

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
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cuerpostecnicos`
--
ALTER TABLE `cuerpostecnicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipousuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
