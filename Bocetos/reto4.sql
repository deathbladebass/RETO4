-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2020 a las 10:16:14
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `spCategorias` ()  NO SQL
select * from categorias$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteCategoria` (IN `pId` INT)  NO SQL
DELETE FROM categorias WHERE idCategoria=pId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteEquipo` (IN `p_id` INT)  NO SQL
delete from `equipos` where idEquipo=p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteJugador` (IN `p_id` INT)  NO SQL
DELETE FROM `jugadores` WHERE idJugador=p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteMensaje` (IN `pId` INT)  NO SQL
DELETE FROM mensajes WHERE idMensaje=pId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spEquipos` ()  NO SQL
SELECT equipos.idEquipo,equipos.nombreEquipo, equipos.imagenEquipo FROM equipos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spFindUser` (IN `pname` VARCHAR(40))  NO SQL
select * from usuarios where usuarios.usuario=pname$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsert` (IN `pNombre` VARCHAR(50), IN `pApellido` VARCHAR(50), IN `pNickname` VARCHAR(50), IN `pFechaNacimiento` DATE, IN `pDni` VARCHAR(12), IN `pNumTel` VARCHAR(12), IN `pRol` VARCHAR(50), IN `pEquipo` INT, IN `pDireccion` VARCHAR(50), IN `pActivo` TINYINT(1), IN `pImagen` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO jugadores(jugadores.nombre, jugadores.apellido, jugadores.nickname, jugadores.fechaNacimiento, jugadores.dni, jugadores.numeroTelefono, jugadores.rol, jugadores.idEquipo, jugadores.direccion, jugadores.activo, jugadores.img)
VALUES (pNombre, pApellido, pNickname, pFechaNacimiento, pDni, pNumTel, pRol, pEquipo, pDireccion,pActivo,pImagen);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertJugador` (IN `p_nombre` VARCHAR(40), IN `p_apellido` VARCHAR(40), IN `p_nickname` VARCHAR(40), IN `p_fechaNacimiento` DATE, IN `p_dni` VARCHAR(9), IN `p_numTel` INT(9), IN `p_rol` VARCHAR(40), IN `p_direccion` VARCHAR(40), IN `p_email` VARCHAR(40), IN `p_activo` TINYINT, IN `p_idEquipo` INT)  NO SQL
insert into jugadores( nickname, nombre, apellido, fechaNacimiento, dni, numeroTelefono, rol, idEquipo, direccion, email, activo) values ( p_nickname, p_nombre, p_apellido, p_fechaNacimiento, p_dni, p_numTel, p_rol, p_idEquipo, p_direccion, p_email, p_activo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertMensaje` (IN `pTipo` VARCHAR(50), IN `pAsunto` VARCHAR(50), IN `pNombre` VARCHAR(50), IN `pMensaje` VARCHAR(200), IN `pEmail` VARCHAR(50))  NO SQL
INSERT INTO mensajes(mensajes.tipo, mensajes.asunto, mensajes.nombre, mensajes.mensaje, mensajes.email, mensajes.fecha)
VALUES(ptipo, pAsunto, pNombre, pMensaje, pEmail, CURRENT_TIMESTAMP())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertUser` (IN `pUser` VARCHAR(50), IN `pName` VARCHAR(50), IN `pPassw` VARCHAR(50), IN `pEmail` VARCHAR(50), IN `pApellido` VARCHAR(50), IN `pTipo` INT(1))  NO SQL
INSERT INTO usuarios (usuarios.usuario, usuarios.nombre, usuarios.contrasenia, usuarios.email,  usuarios.apellido,usuarios.tipo)
VALUES(pUser, pName, pPassw, pEmail, pApellido, pTipo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spMensajes` ()  NO SQL
SELECT * FROM `mensajes`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarJugador` (IN `pnombre` VARCHAR(40), IN `papellido` VARCHAR(40), IN `pnickname` VARCHAR(40), IN `pemail` VARCHAR(40), IN `pnumTel` INT, IN `pdni` VARCHAR(40), IN `pfechaNacimiento` DATE, IN `prol` VARCHAR(40), IN `pdireccion` VARCHAR(40), IN `pid` INT, IN `pidEquipo` INT, IN `pactivo` TINYINT)  NO SQL
UPDATE jugadores SET nickname=nickname,nombre=nombre,apellido=apellido,fechaNacimiento=fechaNacimiento,dni=dni,numeroTelefono=numTel,rol=rol,idEquipo=idEquipo,direccion=direccion,email=email,activo=activo WHERE idJugador=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spShowVotes` ()  NO SQL
SELECT clasificacion.idJugador, COUNT(clasificacion.idJugador)AS 'Puntuacion', jugadores.nickname, jugadores.nombre, jugadores.apellido, jugadores.rol, jugadores.img, equipos.nombreEquipo, equipos.imagenEquipo
FROM clasificacion 
INNER JOIN jugadores ON clasificacion.idJugador = jugadores.idJugador
INNER JOIN equipos ON jugadores.idEquipo=equipos.idEquipo
GROUP BY clasificacion.idJugador  
ORDER BY `Puntuacion`  DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateUsuario` (IN `pId` INT, IN `pNombre` VARCHAR(40), IN `pApellido` VARCHAR(40), IN `pNickname` VARCHAR(40))  NO SQL
UPDATE `usuarios` SET `nombre`=pNombre,`apellido`=pApellido,`usuario`=pNickname WHERE idUsuario=pId$$

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
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(600) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `abreviatura`, `nombre`, `direccion`, `descripcion`) VALUES
(1, 'LEC', 'League Of Legends European Championship', 'https://eu.lolesports.com/es/liga/lec', 'La League of Legends Championship Series Europe (LCS EU) es la liga profesional de League of Legends en Europa. En ella participan los diez mejores equipos europeos.\r\n'),
(2, 'SLO', 'Super Liga Orange', 'https://www.lvp.es/lol/iberiancup', 'LVP es especialista en la organización de competiciones nacionales. Cuenta con casi una década de experiencia en España, donde actualmente organiza la Superliga Orange de League of Legends.'),
(3, 'EAS', 'E-Sports Amateur Series', 'https://esportsamateurseries.com/en/', 'Con el objetivo de facilitar su participación en ligas equilibradas, de ofrecer a cualquier equipo un lugar donde empezar a competir, de estructurar las bases competitivas del panorama amateur en los eSports, y de facilitar a jugadores sin equipo encontrar a otros con los que puedan aliarse y formarlos, nace Esports Amateur Series.'),
(4, 'LCS', 'League Of Legends Championship Series', 'https://eu.lolesports.com/en/league/lcs', 'League of Legends Championship Series (LCS) es el nivel más alto de League of Legends profesional en Norteamérica (se refiere a Estados Unidos y Canadá). Cada temporada anual de juego se divide en dos divisiones, primavera y verano.\r\n\r\n'),
(5, 'LPL', 'League Of Legends Pro League', 'https://esportsamateurseries.com/en/', ' La primera temporada de LPL fue la primavera de 2013. Los tres primeros playoffs ganan automáticamente el Campeonato Mundial de League of Legends'),
(6, 'LVP', 'Liga de Videojuegos Profesional', 'https://lvp.global/competiciones/cs-go/', 'LVP es especialista en la organización de competiciones nacionales. Cuenta con casi una década de experiencia en España, donde actualmente organiza la Superliga Orange de Counter-Strike: Global Offensive'),
(7, 'NGE', 'National Gaming Events ', 'https://www.toornament.com/en_GB/tournaments/3069606542087823360/stages/3069608239584149504/', 'Somos un evento de lan y un albergue de liga / torneo en línea ubicado en Nueva Inglaterra que atiende a equipos, jugadores y organizaciones en todo EE. UU. Nos esforzamos por alentar, influir y apoyar a todos y cada uno de los jugadores a diario, mientras mantenemos una relación amistosa, por no mencionar competitiva, medio ambiente!\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `idVoto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idJugador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`idVoto`, `idUsuario`, `idJugador`) VALUES
(17, 1, 17),
(18, 8, 17),
(19, 3, 3),
(20, 2, 10),
(21, 7, 13),
(22, 25, 17);

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
(1, 'Rekkles', 'Martin', 'Larsson', '1996-09-20', '123456789A', 656111111, 'Bot Laner', 1, 'Avenida del backdoor', 'mLarsson@gmail.com', 1, '../view/img/recless.jpg'),
(2, 'Razork', 'Ivan', 'Martin', '2000-10-07', '64987321A', 656222222, 'Jungler', 1, 'Calle del Baron', 'iMartin@gmail.com', 1, '../view/img/razork.png'),
(3, 'Deadly', 'Matthew', 'Smith', '1999-08-28', '654258951E', 656333333, 'Bot Lane', 1, 'Calle del Blue', 'mSmith@gmail.com', 0, '../view/img/deadly.png'),
(4, 'Denyk', 'Petr', 'Haramach', '1995-04-30', '753651489P', 656444444, 'Bot Lane', 1, 'Plaza del teamfight', 'pHaramach@gmail.com', 1, '../view/img/denyk.png'),
(5, 'Miniduke', 'Ismael', 'Martinez', '1997-06-11', '795365142G', 656555555, 'Mid Lane', 1, 'Calle del Red', 'iMartinez', 1, '../view/img/miniduke.png'),
(6, 'Th3Antonio', 'Antonio', 'Espinosa', '1999-04-12', '985125354O', 656666666, 'Top Lane', 1, 'Plaza de la Torre', 'aEspinosa', 1, '../view/img/Th3Antonio.png'),
(7, 'Milicua', 'Aitor', 'Fernandez', '1992-11-12', '758695152E', 656777777, 'Rifle', 2, 'Calle del Terrorismo', 'aFernandez@gmail.com', 1, '../view/img/empty.jpg'),
(8, 'bysTaXx', 'Frank', 'Garnes', '1992-08-18', '985475632P', 656888888, 'AWPer', 2, 'Calle del Sniper', 'fGarnes@gmail.com', 1, '../view/img/empty.jpg'),
(9, 'S1mple', 'Oleksandr', 'Kostyliev', '1997-10-02', '125647895E', 656999999, 'Rifle', 2, 'Plaza Molotov', 'oKostyliev@gmail.com', 1, '../view/img/symple.jpg'),
(10, 'Guardian', 'Ladislav', 'Kovacs', '1991-07-09', '658748985T', 656111222, 'Rifle', 2, 'Plaza Kalasnikov', 'lKovacs@gmail.com', 1, '../view/img/guardian.jpg'),
(11, 'Glalve', 'Lukas', 'Rossander', '1995-06-07', '987548621I', 656111333, 'Rifle', 2, 'Calle Gaben', 'gLukas@gmail.com', 1, '../view/img/glaive.jpg'),
(12, 'Xyp9x', 'Andreas', 'Hojsleth', '1995-09-11', '125478695T', 656111444, 'Rifle', 2, 'Avenida Steam', 'aHojsleth', 0, '../view/img/xyp9x.jpg'),
(13, 'Virtue', 'Jake', 'Grannan', '1994-10-29', '95846235V', 645855765, 'Anchor', 3, 'Cobadonga', 'Virtue94@gmail.com', 1, '../view/img/virtue.jpg'),
(14, 'Rizraz', 'Ethan', 'Wombell', '1999-07-28', '84956532V', 664555765, 'Roamer', 3, 'Australia', 'Rizraz99@gmail.com', 1, '../view/img/frizraz.jpg'),
(15, 'Speca', 'Ryan', 'AUSDEN', '1997-05-02', '89453214J', 694852775, 'Support', 3, 'Australia', 'speca97@gmail.com', 1, '../view/img/empty.jpg'),
(16, 'Lusty', 'Jason', 'CHEN', '1997-12-03', '84571266C', 651243657, 'Flex', 3, 'AUSTRALIA', 'lusty97@gmail.com', 1, '../view/img/lusty.jpg'),
(17, 'Acez', 'Matthew', 'MC HENRY', '1997-06-24', '78965421K', 651478525, 'Roamer', 3, 'Australia', 'acez97@gmail.com', 1, '../view/img/acez.jpg');

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
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idMensaje`, `tipo`, `asunto`, `nombre`, `mensaje`, `email`, `fecha`) VALUES
(1, 'aa', 'aa', 'aa', 'aa', 'aa', '2019-12-19 00:00:00'),
(2, 'aaa', 'aaa', 'aa', 'aaaa', 'aa', '2019-12-19 00:00:00'),
(3, 'aa', 'a', 'aa', 'aa', 'a', '2019-12-19 00:00:00'),
(5, 'sugerencia', 'adr', 'sdfsdgg', 'dffd@dfgf.cdfg', 'sdfsd', '2019-12-20 09:19:27'),
(6, 'queja', 'sdfghjgfds', 'fsdafasd', 'fsfe@ds.com', 'fsda', '2019-12-20 09:28:18');

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
(3, 'cuerpoTec');

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
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`idVoto`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`),
  ADD KEY `idJugador` (`idJugador`);

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
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `idVoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Filtros para la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD CONSTRAINT `clasificacion_ibfk_1` FOREIGN KEY (`idJugador`) REFERENCES `jugadores` (`idJugador`),
  ADD CONSTRAINT `clasificacion_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

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
