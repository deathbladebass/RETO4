-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 11:11 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reto4`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `abreviatura` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorias`
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
-- Table structure for table `cuerpostecnicos`
--

CREATE TABLE `cuerpostecnicos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cuerpostecnicos`
--

INSERT INTO `cuerpostecnicos` (`id`, `Nombre`, `Apellido`, `Rol`) VALUES
(1, 'Pablo', 'Sobrado', 'Coach'),
(2, 'Paco', 'Rabaco', 'Analista'),
(3, 'Luigi', 'Mario', 'Coach'),
(4, 'Carlos', 'Islandia', 'Analista');

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `idEquipo` int(11) NOT NULL,
  `nombreEquipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idCuerpoTecnico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`idEquipo`, `nombreEquipo`, `idCategoria`, `idCuerpoTecnico`) VALUES
(1, 'Paradox Nexus', 4, 4),
(2, 'Paradox Strike', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jugadores`
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
-- Dumping data for table `jugadores`
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
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contraseña`, `admin`, `email`) VALUES
(1, 'Adrian', 'Lopez', 'aLopez', '123', 1, 'alopez@gmail.com'),
(2, 'Ibai', 'Acha', 'iAcha', '123', 1, 'iacha@gmail.com'),
(3, 'Ekaitz', 'Gomez', 'eGomez', '123', 1, 'egomez@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `cuerpostecnicos`
--
ALTER TABLE `cuerpostecnicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idCuerpoTecnico` (`idCuerpoTecnico`);

--
-- Indexes for table `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`idJugador`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cuerpostecnicos`
--
ALTER TABLE `cuerpostecnicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `idJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`idCuerpoTecnico`) REFERENCES `cuerpostecnicos` (`id`);

--
-- Constraints for table `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
