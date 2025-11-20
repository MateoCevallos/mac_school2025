-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2025 a las 01:49:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mac_school2025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac_alum`
--

CREATE TABLE `mac_alum` (
  `ALU_NMATRI` int(11) NOT NULL,
  `ALU_NOMBRES` varchar(100) NOT NULL,
  `ALU_CODCUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mac_alum`
--

INSERT INTO `mac_alum` (`ALU_NMATRI`, `ALU_NOMBRES`, `ALU_CODCUR`) VALUES
(1, 'JUAN', 1),
(2, 'PEDRO', 1),
(3, 'MARÍA', 2),
(4, 'VALENTINA', 2),
(5, 'MABEL', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac_asig`
--

CREATE TABLE `mac_asig` (
  `ASIG_CODIGO` int(11) NOT NULL,
  `ASIG_NOMBRE` varchar(200) NOT NULL,
  `ASIG_OBSERV` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mac_asig`
--

INSERT INTO `mac_asig` (`ASIG_CODIGO`, `ASIG_NOMBRE`, `ASIG_OBSERV`) VALUES
(1, 'LL', 'Lengua y Literatura'),
(2, 'MAT', 'Matemática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac_cicl`
--

CREATE TABLE `mac_cicl` (
  `CIC_CODI` int(11) NOT NULL,
  `CIC_NOMBRE` varchar(50) NOT NULL,
  `CIC_OBSERV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mac_cicl`
--

INSERT INTO `mac_cicl` (`CIC_CODI`, `CIC_NOMBRE`, `CIC_OBSERV`) VALUES
(1, 'EGBM', ''),
(2, 'BACHILLERATO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac_fcur`
--

CREATE TABLE `mac_fcur` (
  `FCU_COD` int(11) NOT NULL,
  `FCU_DESCRI` varchar(20) NOT NULL,
  `FCU_CIC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mac_fcur`
--

INSERT INTO `mac_fcur` (`FCU_COD`, `FCU_DESCRI`, `FCU_CIC`) VALUES
(1, '8AV', 1),
(2, '1ACCGG', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac_materias`
--

CREATE TABLE `mac_materias` (
  `MAT_CODIGO` int(11) NOT NULL,
  `MAT_CODCUR` int(11) NOT NULL,
  `MAT_CODASI` int(11) NOT NULL,
  `MAT_CODPER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mac_materias`
--

INSERT INTO `mac_materias` (`MAT_CODIGO`, `MAT_CODCUR`, `MAT_CODASI`, `MAT_CODPER`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac_pers`
--

CREATE TABLE `mac_pers` (
  `PER_CODIGO` int(11) NOT NULL,
  `PER_APENOM` varchar(80) NOT NULL,
  `PER_CEDULA` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mac_pers`
--

INSERT INTO `mac_pers` (`PER_CODIGO`, `PER_APENOM`, `PER_CEDULA`) VALUES
(1, 'Mateo Cevallos', 2047483647),
(2, 'John Ruano', 2132683492);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac_preguntas`
--

CREATE TABLE `mac_preguntas` (
  `PRE_ID` int(11) NOT NULL,
  `PRE_TRIMESTRE` int(11) NOT NULL,
  `PRE_CONTENIDO` varchar(200) NOT NULL,
  `PRE_CODCIC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mac_preguntas`
--

INSERT INTO `mac_preguntas` (`PRE_ID`, `PRE_TRIMESTRE`, `PRE_CONTENIDO`, `PRE_CODCIC`) VALUES
(1, 1, '¿El docente presenta retroalimentación con respecto a las tareas?', 1),
(2, 2, '¿El docente emplea las herramientas proporcionadas en la plataforma?', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mac_respuestas`
--

CREATE TABLE `mac_respuestas` (
  `RES_ID` int(11) NOT NULL,
  `RES_CODPRE` int(11) NOT NULL,
  `RES_CODMAT` int(11) NOT NULL,
  `RES_VALOR` int(11) NOT NULL,
  `RES_NMATRI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mac_respuestas`
--

INSERT INTO `mac_respuestas` (`RES_ID`, `RES_CODPRE`, `RES_CODMAT`, `RES_VALOR`, `RES_NMATRI`) VALUES
(1, 1, 1, 3, 1),
(2, 2, 1, 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mac_alum`
--
ALTER TABLE `mac_alum`
  ADD PRIMARY KEY (`ALU_NMATRI`),
  ADD KEY `ALU_CODCUR` (`ALU_CODCUR`);

--
-- Indices de la tabla `mac_asig`
--
ALTER TABLE `mac_asig`
  ADD PRIMARY KEY (`ASIG_CODIGO`),
  ADD KEY `ASIG_NOMBRE` (`ASIG_NOMBRE`);

--
-- Indices de la tabla `mac_cicl`
--
ALTER TABLE `mac_cicl`
  ADD PRIMARY KEY (`CIC_CODI`);

--
-- Indices de la tabla `mac_fcur`
--
ALTER TABLE `mac_fcur`
  ADD PRIMARY KEY (`FCU_COD`),
  ADD KEY `FCU_DESCRI` (`FCU_DESCRI`),
  ADD KEY `FCU_CIC` (`FCU_CIC`);

--
-- Indices de la tabla `mac_materias`
--
ALTER TABLE `mac_materias`
  ADD PRIMARY KEY (`MAT_CODIGO`),
  ADD KEY `MAT_CODCUR` (`MAT_CODCUR`),
  ADD KEY `MAT_CODASI` (`MAT_CODASI`),
  ADD KEY `MAT_CODPER` (`MAT_CODPER`);

--
-- Indices de la tabla `mac_pers`
--
ALTER TABLE `mac_pers`
  ADD PRIMARY KEY (`PER_CODIGO`);

--
-- Indices de la tabla `mac_preguntas`
--
ALTER TABLE `mac_preguntas`
  ADD PRIMARY KEY (`PRE_ID`),
  ADD KEY `PRE_CODCIC` (`PRE_CODCIC`);

--
-- Indices de la tabla `mac_respuestas`
--
ALTER TABLE `mac_respuestas`
  ADD PRIMARY KEY (`RES_ID`),
  ADD KEY `RES_CODPRE` (`RES_CODPRE`),
  ADD KEY `RES_CODMAT` (`RES_CODMAT`),
  ADD KEY `RES_NMATRI` (`RES_NMATRI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mac_alum`
--
ALTER TABLE `mac_alum`
  MODIFY `ALU_NMATRI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mac_asig`
--
ALTER TABLE `mac_asig`
  MODIFY `ASIG_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mac_cicl`
--
ALTER TABLE `mac_cicl`
  MODIFY `CIC_CODI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mac_fcur`
--
ALTER TABLE `mac_fcur`
  MODIFY `FCU_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mac_materias`
--
ALTER TABLE `mac_materias`
  MODIFY `MAT_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mac_pers`
--
ALTER TABLE `mac_pers`
  MODIFY `PER_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mac_preguntas`
--
ALTER TABLE `mac_preguntas`
  MODIFY `PRE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mac_respuestas`
--
ALTER TABLE `mac_respuestas`
  MODIFY `RES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mac_alum`
--
ALTER TABLE `mac_alum`
  ADD CONSTRAINT `mac_alum_ibfk_1` FOREIGN KEY (`ALU_CODCUR`) REFERENCES `mac_fcur` (`FCU_COD`);

--
-- Filtros para la tabla `mac_fcur`
--
ALTER TABLE `mac_fcur`
  ADD CONSTRAINT `mac_fcur_ibfk_1` FOREIGN KEY (`FCU_CIC`) REFERENCES `mac_cicl` (`CIC_CODI`);

--
-- Filtros para la tabla `mac_materias`
--
ALTER TABLE `mac_materias`
  ADD CONSTRAINT `mac_materias_ibfk_1` FOREIGN KEY (`MAT_CODASI`) REFERENCES `mac_asig` (`ASIG_CODIGO`),
  ADD CONSTRAINT `mac_materias_ibfk_2` FOREIGN KEY (`MAT_CODCUR`) REFERENCES `mac_fcur` (`FCU_COD`),
  ADD CONSTRAINT `mac_materias_ibfk_3` FOREIGN KEY (`MAT_CODPER`) REFERENCES `mac_pers` (`PER_CODIGO`);

--
-- Filtros para la tabla `mac_preguntas`
--
ALTER TABLE `mac_preguntas`
  ADD CONSTRAINT `mac_preguntas_ibfk_1` FOREIGN KEY (`PRE_CODCIC`) REFERENCES `mac_cicl` (`CIC_CODI`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mac_respuestas`
--
ALTER TABLE `mac_respuestas`
  ADD CONSTRAINT `mac_respuestas_ibfk_1` FOREIGN KEY (`RES_CODPRE`) REFERENCES `mac_preguntas` (`PRE_ID`),
  ADD CONSTRAINT `mac_respuestas_ibfk_2` FOREIGN KEY (`RES_CODMAT`) REFERENCES `mac_materias` (`MAT_CODIGO`),
  ADD CONSTRAINT `mac_respuestas_ibfk_3` FOREIGN KEY (`RES_NMATRI`) REFERENCES `mac_alum` (`ALU_NMATRI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
