-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2023 a las 05:49:25
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `artedentaldbf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `CitCod` int(8) NOT NULL,
  `PacCod` int(8) DEFAULT NULL,
  `OdoCod` int(8) DEFAULT NULL,
  `CitFecHor` datetime DEFAULT NULL,
  `Duracion` enum('30 min','60 min') DEFAULT NULL,
  `CitEst` enum('Programada','En Progreso','Completada','Cancelada') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tratamiento`
--

CREATE TABLE `detalle_tratamiento` (
  `DetTraCod` int(8) NOT NULL,
  `TraCod` int(8) NOT NULL,
  `DetTraDes` char(120) DEFAULT NULL,
  `DetTraCosUni` int(8) DEFAULT NULL,
  `DetTraCan` int(8) DEFAULT NULL,
  `DetTraCosTot` int(8) DEFAULT NULL,
  `DetTraEst` char(20) DEFAULT NULL,
  `EstReg` char(1) DEFAULT NULL,
  `CarFlaAct` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_trabajo`
--

CREATE TABLE `historial_trabajo` (
  `HisTraCod` int(8) NOT NULL,
  `HisCliCod` int(8) NOT NULL,
  `HisTraFecAno` int(4) DEFAULT NULL,
  `HisTraFecMes` int(2) DEFAULT NULL,
  `HisTraFecDia` int(2) DEFAULT NULL,
  `HisTraLab` tinyint(1) DEFAULT NULL,
  `HisTraDocNom` char(100) DEFAULT NULL,
  `HisTraTra` char(255) DEFAULT NULL,
  `HisTraAcu` int(5) DEFAULT NULL,
  `HisTraSal` int(6) DEFAULT NULL,
  `HisTraFirPac` tinyint(1) DEFAULT NULL,
  `HisTraObs` char(120) DEFAULT NULL,
  `EstReg` char(1) DEFAULT NULL,
  `CarFlaAct` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `HisCliCod` int(8) NOT NULL,
  `PacCod` int(8) DEFAULT NULL,
  `OdoCod` int(8) DEFAULT NULL,
  `HisMedCod` int(8) DEFAULT NULL,
  `HisCliOdoAce` tinyint(1) DEFAULT NULL,
  `HisCliPacAce` tinyint(1) DEFAULT NULL,
  `HisCliAno` int(4) DEFAULT NULL,
  `HisCliMes` int(2) DEFAULT NULL,
  `HisCliDia` int(2) DEFAULT NULL,
  `EstReg` char(1) DEFAULT NULL,
  `CarFlaAct` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_medica`
--

CREATE TABLE `historia_medica` (
  `HisMedCod` int(8) NOT NULL,
  `HisMedProCar` tinyint(1) DEFAULT NULL,
  `HisMedEnfRen` tinyint(1) DEFAULT NULL,
  `HisMedDia` tinyint(1) DEFAULT NULL,
  `HisMedHip` tinyint(1) DEFAULT NULL,
  `HisMedEpi` tinyint(1) DEFAULT NULL,
  `HisMedVIH` tinyint(1) DEFAULT NULL,
  `HisMedHep` tinyint(1) DEFAULT NULL,
  `HisMedPro` tinyint(1) DEFAULT NULL,
  `HisMedAle` tinyint(1) DEFAULT NULL,
  `HisMedProCoa` tinyint(1) DEFAULT NULL,
  `HisMedTomMed` tinyint(1) DEFAULT NULL,
  `HisMedEmb` tinyint(1) DEFAULT NULL,
  `HisMedProTraDen` tinyint(1) DEFAULT NULL,
  `HisMedHab` tinyint(1) DEFAULT NULL,
  `HisMedEsp` tinyint(1) DEFAULT NULL,
  `EstReg` char(1) DEFAULT NULL,
  `CarFlaAct` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontograma`
--

CREATE TABLE `odontograma` (
  `OdxCod` int(8) NOT NULL,
  `HisCliCod` int(8) NOT NULL,
  `EstReg` char(1) DEFAULT NULL,
  `CarFlaAct` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontograma_detalle`
--

CREATE TABLE `odontograma_detalle` (
  `OdxDetCod` int(8) NOT NULL,
  `OdxCod` int(8) NOT NULL,
  `OdxDetNum` int(8) NOT NULL,
  `OdxDetNumDie` int(2) DEFAULT NULL,
  `OdxDetVes` tinyint(1) DEFAULT NULL,
  `OdxDetPal` tinyint(1) DEFAULT NULL,
  `OdxDetLin` tinyint(1) DEFAULT NULL,
  `OdxDetDer` tinyint(1) DEFAULT NULL,
  `OdxDetIzq` tinyint(1) DEFAULT NULL,
  `OdxDetDes` char(120) DEFAULT NULL,
  `EstReg` char(1) DEFAULT NULL,
  `CarFlaAct` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontologo`
--

CREATE TABLE `odontologo` (
  `OdoCod` int(8) NOT NULL,
  `OdoNom` char(100) DEFAULT NULL,
  `OdoFecIngAno` int(4) DEFAULT NULL,
  `OdoFecIngMes` int(2) DEFAULT NULL,
  `OdoFecIngDia` int(2) DEFAULT NULL,
  `EstReg` char(1) DEFAULT NULL,
  `CarFlaAct` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `PacCod` int(8) NOT NULL,
  `PacDir` char(100) DEFAULT NULL,
  `PacAnoNac` int(4) DEFAULT NULL,
  `PacCel` int(9) DEFAULT NULL,
  `PacEma` char(100) DEFAULT NULL,
  `PacDni` int(8) DEFAULT NULL,
  `PacNom` char(60) DEFAULT NULL,
  `PacOcu` char(60) DEFAULT NULL,
  `PacRef` char(60) DEFAULT NULL,
  `PacEstReg` char(1) DEFAULT NULL,
  `PacCarFlaAct` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `TraCod` int(8) NOT NULL,
  `HisCliCod` int(8) NOT NULL,
  `TraDes` char(50) DEFAULT NULL,
  `EstReg` char(1) DEFAULT NULL,
  `CarFlaAct` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`) VALUES
(4, 'daniel.789.ldag@gmail.com', '$2y$10$2gJA9bhYg0oKv4Mj0llXXunDmDr/AZoXzNRmVOL5BuiToNhD1kPEi', '2023-08-29 05:21:02', '2023-09-09 04:11:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`CitCod`),
  ADD KEY `IX_Relationship35` (`PacCod`),
  ADD KEY `IX_Relationship36` (`OdoCod`);

--
-- Indices de la tabla `detalle_tratamiento`
--
ALTER TABLE `detalle_tratamiento`
  ADD PRIMARY KEY (`DetTraCod`),
  ADD KEY `IX_Relationship22` (`TraCod`);

--
-- Indices de la tabla `historial_trabajo`
--
ALTER TABLE `historial_trabajo`
  ADD PRIMARY KEY (`HisTraCod`),
  ADD KEY `IX_Relationship32` (`HisCliCod`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`HisCliCod`),
  ADD KEY `IX_Relationship5` (`OdoCod`),
  ADD KEY `IX_Relationship15` (`HisMedCod`),
  ADD KEY `IX_Relationship34` (`PacCod`);

--
-- Indices de la tabla `historia_medica`
--
ALTER TABLE `historia_medica`
  ADD PRIMARY KEY (`HisMedCod`);

--
-- Indices de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD PRIMARY KEY (`OdxCod`),
  ADD KEY `IX_Relationship29` (`HisCliCod`);

--
-- Indices de la tabla `odontograma_detalle`
--
ALTER TABLE `odontograma_detalle`
  ADD PRIMARY KEY (`OdxDetCod`),
  ADD KEY `IX_Relationship23` (`OdxCod`);

--
-- Indices de la tabla `odontologo`
--
ALTER TABLE `odontologo`
  ADD PRIMARY KEY (`OdoCod`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`PacCod`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`TraCod`),
  ADD KEY `IX_Relationship30` (`HisCliCod`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `Relationship35` FOREIGN KEY (`PacCod`) REFERENCES `paciente` (`PacCod`),
  ADD CONSTRAINT `Relationship36` FOREIGN KEY (`OdoCod`) REFERENCES `odontologo` (`OdoCod`);

--
-- Filtros para la tabla `detalle_tratamiento`
--
ALTER TABLE `detalle_tratamiento`
  ADD CONSTRAINT `Relationship22` FOREIGN KEY (`TraCod`) REFERENCES `tratamiento` (`TraCod`);

--
-- Filtros para la tabla `historial_trabajo`
--
ALTER TABLE `historial_trabajo`
  ADD CONSTRAINT `Relationship32` FOREIGN KEY (`HisCliCod`) REFERENCES `historia_clinica` (`HisCliCod`);

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `Relationship15` FOREIGN KEY (`HisMedCod`) REFERENCES `historia_medica` (`HisMedCod`),
  ADD CONSTRAINT `Relationship34` FOREIGN KEY (`PacCod`) REFERENCES `paciente` (`PacCod`),
  ADD CONSTRAINT `Relationship5` FOREIGN KEY (`OdoCod`) REFERENCES `odontologo` (`OdoCod`);

--
-- Filtros para la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD CONSTRAINT `Relationship29` FOREIGN KEY (`HisCliCod`) REFERENCES `historia_clinica` (`HisCliCod`);

--
-- Filtros para la tabla `odontograma_detalle`
--
ALTER TABLE `odontograma_detalle`
  ADD CONSTRAINT `Relationship23` FOREIGN KEY (`OdxCod`) REFERENCES `odontograma` (`OdxCod`);

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `Relationship30` FOREIGN KEY (`HisCliCod`) REFERENCES `historia_clinica` (`HisCliCod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
