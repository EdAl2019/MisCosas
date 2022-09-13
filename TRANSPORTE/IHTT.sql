-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql304.epizy.com
-- Tiempo de generación: 09-09-2022 a las 16:51:29
-- Versión del servidor: 10.3.27-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `epiz_32526219_IHTT`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_ENCUESTAS`
--

CREATE TABLE `TBL_ENCUESTAS` (
  `id_encuesta` bigint(20) NOT NULL,
  `id_persona` bigint(20) DEFAULT NULL,
  `fecha_inicial` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `direccion_ip` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `id_punto_control` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Almacena las encuestas en relacion a la persona.';

--
-- Volcado de datos para la tabla `TBL_ENCUESTAS`
--

INSERT INTO `TBL_ENCUESTAS` (`id_encuesta`, `id_persona`, `fecha_inicial`, `fecha_final`, `direccion_ip`, `id_usuario`, `id_punto_control`) VALUES
(30, 89, '2022-09-04 03:57:08', '2022-09-04 03:57:47', '192.168.1.2', 1, 27),
(31, 90, '2022-09-04 06:39:18', '2022-09-04 06:40:01', '192.168.1.2', 1, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_ENCUESTAS_MENORES_EDAD`
--

CREATE TABLE `TBL_ENCUESTAS_MENORES_EDAD` (
  `id_encuesta_menor` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_persona` bigint(20) NOT NULL,
  `fecha_inicial` datetime NOT NULL,
  `fecha_final` datetime NOT NULL,
  `id_punto_control` bigint(20) NOT NULL,
  `direccion_ip` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Almacena los datos de las encuestas de los estudiantes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_PERSONAS`
--

CREATE TABLE `TBL_PERSONAS` (
  `id_persona` bigint(20) NOT NULL,
  `nombres` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identidad` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla para registrar personas y sus datos';

--
-- Volcado de datos para la tabla `TBL_PERSONAS`
--

INSERT INTO `TBL_PERSONAS` (`id_persona`, `nombres`, `apellidos`, `identidad`, `edad`, `direccion`, `telefono`, `qr`) VALUES
(1, 'Edward', 'Alvarenga', '0801199808878', 24, 'col. 14 de marzo', '95421239', NULL),
(89, NULL, NULL, '0801199563212', NULL, NULL, '95421393', 'www.rnp.hn/valida/00003710790'),
(90, NULL, NULL, '0801199656635', NULL, NULL, '9542123', 'www.indicioseditores.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_PREGUNTAS`
--

CREATE TABLE `TBL_PREGUNTAS` (
  `id_pregunta` bigint(20) NOT NULL,
  `pregunta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Almacena las preguntas de las encuestas';

--
-- Volcado de datos para la tabla `TBL_PREGUNTAS`
--

INSERT INTO `TBL_PREGUNTAS` (`id_pregunta`, `pregunta`) VALUES
(1, '¿A DÓNDE SE DIRIGE?'),
(2, '¿CON QUÉ FRECUENCIA UTILIZA TRANSPORTE URBANO?'),
(3, '¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA LLEGAR A SU DESTINO?'),
(4, '¿CUÁNTAS PERSONAS UTILIZAN TRANSPORTE EN SU HOGAR?'),
(5, '¿QUÉ OTROS SERVICIOS DE TRANSPORTE UTILIZA FRECUENTEMENTE?'),
(6, '¿QUÉ ASPECTOS LE GUSTARÍA QUE MEJOREN EN EL SERVICIO DE TRANSPORTE?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_PREGUNTAS_MENORES`
--

CREATE TABLE `TBL_PREGUNTAS_MENORES` (
  `id_pregunta_menor` bigint(20) NOT NULL,
  `pregunta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_PUNTOS_DE_CONTROL`
--

CREATE TABLE `TBL_PUNTOS_DE_CONTROL` (
  `id_punto_control` bigint(20) NOT NULL,
  `punto_control` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `punto_encuestar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion_gps` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Almacena los puntos de control para las encuestas del sistema';

--
-- Volcado de datos para la tabla `TBL_PUNTOS_DE_CONTROL`
--

INSERT INTO `TBL_PUNTOS_DE_CONTROL` (`id_punto_control`, `punto_control`, `punto_encuestar`, `descripcion`, `ubicacion_gps`) VALUES
(25, 'Cerro Grande - Kennedy - El Tablon', 'Puente Carrizal', NULL, NULL),
(26, 'Carrizal - Miraflores', 'Zonal Belèn', NULL, NULL),
(27, 'Carrizal - Prado', 'Mamachepa', NULL, NULL),
(28, 'Ulloa - Mercado', 'Palo de Hule', NULL, NULL),
(29, 'Divino Paraiso - Mercado', 'Centro Parque La Merced', NULL, NULL),
(30, 'Cerro Grande - Villa Nueva', 'Villas del Sol', NULL, NULL),
(31, 'Guasculile - Centro', 'Metromall', NULL, NULL),
(32, 'La Cuesta - Mercado ', 'Los Bomberos', NULL, NULL),
(33, 'Avenida Centenario', 'Avenida Centenario', NULL, NULL),
(34, 'Las Torres - Centro', 'Citymall', NULL, NULL),
(35, 'La Peña - Res. Cañada - Centro', 'Metromall', NULL, NULL),
(36, 'Flor del Campo - Centro', 'Palo de Hule', NULL, NULL),
(37, 'Popular - Centro', 'Frente al Antiguo Banco Central', NULL, NULL),
(38, 'Antiguo Local Caprisa', 'Antiguo Local Caprisa', NULL, NULL),
(39, 'Pollo Chepita Los llanos', 'Pollo Chepita Los llanos', NULL, NULL),
(40, 'San Francisco - Centro', 'Zonal Belen', NULL, NULL),
(41, 'Quezada - centro', 'Plataforma Mercado La Isla', NULL, NULL),
(42, 'Res. Centro America - Centro', 'Frente al Antiguo Banco Central', NULL, NULL),
(43, 'Laureles - Mercado', 'Terminal Ruta Quezada en el centro', NULL, NULL),
(44, 'Cerro Grande -Mall Premier -UNAH - La Sosa', 'Mall Premier', NULL, NULL),
(45, 'Carrizal - Metromall -UNAH -Sosa', 'Puente Carrizal', NULL, NULL),
(46, 'Anillo Periferico Ulloa - La Sosa', 'Metromall', NULL, NULL),
(47, 'Universidad - kennedy', 'Villas del Sol', NULL, NULL),
(48, 'El Hato de en medio - Robles - Citymall - Pedregal', 'Universidad ', NULL, NULL),
(49, 'Puente desnivel anillo San Miguel', 'Puente desnivel anillo San Miguel', NULL, NULL),
(50, 'El Dollar', 'El Dollar', NULL, NULL),
(51, 'Hato - Centro - Los Robles', 'Metromall', NULL, NULL),
(52, 'Los Pinos - Mercado - El campo', 'Villas del Sol', NULL, NULL),
(53, 'Los Pinos - MercadO - La Honduras', 'Col. Honduras Unitec', NULL, NULL),
(54, 'Villa vieja - Mercado', 'Calle del comercio Kennedy', NULL, NULL),
(55, 'Rio Grande - Kennedy - El Tablon', 'Parque Central', NULL, NULL),
(56, 'Popular - Centro - El sitio', 'Mercado San Pablo', NULL, NULL),
(57, 'Centro America Oeste - Centro', 'Centro America Oeste - Centro', NULL, NULL),
(58, 'La Peña - Mercado (Bus Amarillo)', 'La Peña - Mercado (Bus Amarillo)', NULL, NULL),
(59, 'Nueva Suyapa - Mecado (Estadio)', 'Alonzo Suazo', NULL, NULL),
(60, 'Nueva Suyapa - Mecado (Por Prado)', 'Plaza Miraflores', NULL, NULL),
(61, 'Los Llanos - Aleman - Centro', 'Terminal Los Llanos, Aleman', NULL, NULL),
(62, 'Kennedy - Hato de en medio - La Isla', 'Centro ', NULL, NULL),
(63, 'UNAH - Centro', 'Palo de Hule', NULL, NULL),
(64, 'Aldea Suyapa - UNAH - Mercado', 'Frente al Congreso', NULL, NULL),
(65, 'El Lolo - Buenos Aires', 'Los Dolores', NULL, NULL),
(66, 'Maria Jose - Centro', 'Zonal Belen', NULL, NULL),
(67, 'Sagastume - Centro - El Pino - Villa Campesina', 'Avenida Centenario', NULL, NULL),
(68, 'Mamachepa', 'Mamachepa', NULL, NULL),
(69, 'Mall Premier', 'Mall Premier', NULL, NULL),
(70, 'Carrizal - La Sosa', 'Hospital San felipe', NULL, NULL),
(71, 'Tiloarque- Centro- La Esperanza', 'Diunsa', NULL, NULL),
(72, 'Tiloarque - La Sosa', 'Mercado San Miguel', NULL, NULL),
(73, 'Carrizal - El Sitio', 'Parque La Merced', NULL, NULL),
(74, 'Carrizal - Reparto', 'Mercado San Pablo', NULL, NULL),
(75, 'Rio Grande - San Felipe', 'Rio Grande - San Felipe', NULL, NULL),
(76, 'Carrizal - La Esperanza - 28 de marzo', 'Carrizal - La Esperanza - 28 de marzo', NULL, NULL),
(77, 'Profesores - Centro - Reparto por Bajo', 'Profesores - Centro - Reparto por Bajo', NULL, NULL),
(78, 'Profesores - Centro - Reparto por arriba', 'Profesores - Centro - Reparto por arriba', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_RESPUESTAS`
--

CREATE TABLE `TBL_RESPUESTAS` (
  `id_respuesta` bigint(20) NOT NULL,
  `respuesta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_encuesta` bigint(20) DEFAULT NULL,
  `id_pregunta` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Almacena las respuestas de las encuestas realizadas.';

--
-- Volcado de datos para la tabla `TBL_RESPUESTAS`
--

INSERT INTO `TBL_RESPUESTAS` (`id_respuesta`, `respuesta`, `id_encuesta`, `id_pregunta`) VALUES
(79, 'SUPERMERCADO', 30, 1),
(80, 'SEMANAL', 30, 2),
(81, '4', 30, 3),
(82, '6', 30, 4),
(83, ',COLECTIVOS,MOTO-TAXIS,MICRO-BUS \"BRUJITOS\"', 30, 5),
(84, ',ATENCIÓN DEL CONDUCTOR Y/O COBRADOR.,MÚSICA CON ALTO VOLUMEN.,TIEMPO DE ESPERA EN ESTACIONES.', 30, 6),
(85, 'SUPERMERCADO', 31, 1),
(86, 'DIARIO', 31, 2),
(87, '6', 31, 3),
(88, '8', 31, 4),
(89, ',COLECTIVOS,MOTO-TAXIS,MICRO-BUS \"BRUJITOS\"', 31, 5),
(90, ',ATENCIÓN DEL CONDUCTOR Y/O COBRADOR.,MÚSICA CON ALTO VOLUMEN.,TIEMPO DE ESPERA EN ESTACIONES.,CONDICIONES FÍSICAS Y MECÁNICAS DE LAS\r\n                      UNIDADES.,EXCESO DE PASAJEROS.,SEGURIDAD.', 31, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_RESPUESTAS_MENORES`
--

CREATE TABLE `TBL_RESPUESTAS_MENORES` (
  `id_respuesta_menor` bigint(20) NOT NULL,
  `respuesta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_encuesta_menor` bigint(20) NOT NULL,
  `id_pregunta_menor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Almacena las respuestas de los menores de edad';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_ROLES`
--

CREATE TABLE `TBL_ROLES` (
  `id_rol` bigint(20) NOT NULL,
  `rol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla para registrar los roles de los usuarios.';

--
-- Volcado de datos para la tabla `TBL_ROLES`
--

INSERT INTO `TBL_ROLES` (`id_rol`, `rol`, `descripcion`) VALUES
(1, 'Encuestador', 'Usuario que registra encuestas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBL_USUARIOS`
--

CREATE TABLE `TBL_USUARIOS` (
  `id_usuario` bigint(20) NOT NULL,
  `usuario` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contrasena` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rol` bigint(20) DEFAULT NULL,
  `id_persona` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla para registrar los usuarios';

--
-- Volcado de datos para la tabla `TBL_USUARIOS`
--

INSERT INTO `TBL_USUARIOS` (`id_usuario`, `usuario`, `contrasena`, `id_rol`, `id_persona`) VALUES
(1, 'edward.alvarenga', 'Hola*4321', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `TBL_ENCUESTAS`
--
ALTER TABLE `TBL_ENCUESTAS`
  ADD PRIMARY KEY (`id_encuesta`),
  ADD KEY `TBL_ENCUESTAS_TBL_PERSONAS_null_fk` (`id_persona`),
  ADD KEY `TBL_ENCUESTAS_TBL_PUNTO_CONTROL_FK` (`id_punto_control`),
  ADD KEY `TBL_ENCUESTAS_TBL_USUARIOS_null_fk` (`id_usuario`);

--
-- Indices de la tabla `TBL_ENCUESTAS_MENORES_EDAD`
--
ALTER TABLE `TBL_ENCUESTAS_MENORES_EDAD`
  ADD PRIMARY KEY (`id_encuesta_menor`),
  ADD KEY `TBL_ENCUESTAS_MENORES_EDAD_TBL_PERSONAS_null_fk` (`id_persona`),
  ADD KEY `TBL_ENCUESTAS_MENORES_EDAD_TBL_PUNTOS_DE_CONTROL_null_fk` (`id_punto_control`),
  ADD KEY `TBL_ENCUESTAS_MENORES_EDAD_TBL_USUARIOS_null_fk` (`id_usuario`);

--
-- Indices de la tabla `TBL_PERSONAS`
--
ALTER TABLE `TBL_PERSONAS`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `identidad` (`identidad`);

--
-- Indices de la tabla `TBL_PREGUNTAS`
--
ALTER TABLE `TBL_PREGUNTAS`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `TBL_PREGUNTAS_MENORES`
--
ALTER TABLE `TBL_PREGUNTAS_MENORES`
  ADD PRIMARY KEY (`id_pregunta_menor`);

--
-- Indices de la tabla `TBL_PUNTOS_DE_CONTROL`
--
ALTER TABLE `TBL_PUNTOS_DE_CONTROL`
  ADD PRIMARY KEY (`id_punto_control`);

--
-- Indices de la tabla `TBL_RESPUESTAS`
--
ALTER TABLE `TBL_RESPUESTAS`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `TBL_RESPUESTAS_TBL_ENCUESTAS_null_fk` (`id_encuesta`),
  ADD KEY `TBL_RESPUESTAS_TBL_PREGUNTAS_null_fk` (`id_pregunta`);

--
-- Indices de la tabla `TBL_RESPUESTAS_MENORES`
--
ALTER TABLE `TBL_RESPUESTAS_MENORES`
  ADD PRIMARY KEY (`id_respuesta_menor`),
  ADD KEY `TBL_RESPUESTAS_MENORES_TBL_ENCUESTAS_MENORES_EDAD_null_fk` (`id_encuesta_menor`),
  ADD KEY `TBL_RESPUESTAS_MENORES_TBL_PREGUNTAS_MENORES_null_fk` (`id_pregunta_menor`);

--
-- Indices de la tabla `TBL_ROLES`
--
ALTER TABLE `TBL_ROLES`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `TBL_USUARIOS`
--
ALTER TABLE `TBL_USUARIOS`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `TBL_USUARIOS_TBL_ROLES_null_fk` (`id_rol`),
  ADD KEY `TBL_USUARIOS_TBL_PERSONAS_null_fk` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `TBL_ENCUESTAS`
--
ALTER TABLE `TBL_ENCUESTAS`
  MODIFY `id_encuesta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `TBL_ENCUESTAS_MENORES_EDAD`
--
ALTER TABLE `TBL_ENCUESTAS_MENORES_EDAD`
  MODIFY `id_encuesta_menor` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TBL_PERSONAS`
--
ALTER TABLE `TBL_PERSONAS`
  MODIFY `id_persona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `TBL_PREGUNTAS`
--
ALTER TABLE `TBL_PREGUNTAS`
  MODIFY `id_pregunta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `TBL_PREGUNTAS_MENORES`
--
ALTER TABLE `TBL_PREGUNTAS_MENORES`
  MODIFY `id_pregunta_menor` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TBL_PUNTOS_DE_CONTROL`
--
ALTER TABLE `TBL_PUNTOS_DE_CONTROL`
  MODIFY `id_punto_control` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `TBL_RESPUESTAS`
--
ALTER TABLE `TBL_RESPUESTAS`
  MODIFY `id_respuesta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `TBL_RESPUESTAS_MENORES`
--
ALTER TABLE `TBL_RESPUESTAS_MENORES`
  MODIFY `id_respuesta_menor` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TBL_ROLES`
--
ALTER TABLE `TBL_ROLES`
  MODIFY `id_rol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `TBL_USUARIOS`
--
ALTER TABLE `TBL_USUARIOS`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `TBL_ENCUESTAS`
--
ALTER TABLE `TBL_ENCUESTAS`
  ADD CONSTRAINT `TBL_ENCUESTAS_TBL_PERSONAS_null_fk` FOREIGN KEY (`id_persona`) REFERENCES `TBL_PERSONAS` (`id_persona`),
  ADD CONSTRAINT `TBL_ENCUESTAS_TBL_PUNTO_CONTROL_FK` FOREIGN KEY (`id_punto_control`) REFERENCES `TBL_PUNTOS_DE_CONTROL` (`id_punto_control`),
  ADD CONSTRAINT `TBL_ENCUESTAS_TBL_USUARIOS_null_fk` FOREIGN KEY (`id_usuario`) REFERENCES `TBL_USUARIOS` (`id_usuario`);

--
-- Filtros para la tabla `TBL_ENCUESTAS_MENORES_EDAD`
--
ALTER TABLE `TBL_ENCUESTAS_MENORES_EDAD`
  ADD CONSTRAINT `TBL_ENCUESTAS_MENORES_EDAD_TBL_PERSONAS_null_fk` FOREIGN KEY (`id_persona`) REFERENCES `TBL_PERSONAS` (`id_persona`),
  ADD CONSTRAINT `TBL_ENCUESTAS_MENORES_EDAD_TBL_PUNTOS_DE_CONTROL_null_fk` FOREIGN KEY (`id_punto_control`) REFERENCES `TBL_PUNTOS_DE_CONTROL` (`id_punto_control`),
  ADD CONSTRAINT `TBL_ENCUESTAS_MENORES_EDAD_TBL_USUARIOS_null_fk` FOREIGN KEY (`id_usuario`) REFERENCES `TBL_USUARIOS` (`id_usuario`);

--
-- Filtros para la tabla `TBL_RESPUESTAS`
--
ALTER TABLE `TBL_RESPUESTAS`
  ADD CONSTRAINT `TBL_RESPUESTAS_TBL_ENCUESTAS_null_fk` FOREIGN KEY (`id_encuesta`) REFERENCES `TBL_ENCUESTAS` (`id_encuesta`),
  ADD CONSTRAINT `TBL_RESPUESTAS_TBL_PREGUNTAS_null_fk` FOREIGN KEY (`id_pregunta`) REFERENCES `TBL_PREGUNTAS` (`id_pregunta`);

--
-- Filtros para la tabla `TBL_RESPUESTAS_MENORES`
--
ALTER TABLE `TBL_RESPUESTAS_MENORES`
  ADD CONSTRAINT `TBL_RESPUESTAS_MENORES_TBL_ENCUESTAS_MENORES_EDAD_null_fk` FOREIGN KEY (`id_encuesta_menor`) REFERENCES `TBL_ENCUESTAS_MENORES_EDAD` (`id_encuesta_menor`),
  ADD CONSTRAINT `TBL_RESPUESTAS_MENORES_TBL_PREGUNTAS_MENORES_null_fk` FOREIGN KEY (`id_pregunta_menor`) REFERENCES `TBL_PREGUNTAS_MENORES` (`id_pregunta_menor`);

--
-- Filtros para la tabla `TBL_USUARIOS`
--
ALTER TABLE `TBL_USUARIOS`
  ADD CONSTRAINT `TBL_USUARIOS_TBL_PERSONAS_null_fk` FOREIGN KEY (`id_persona`) REFERENCES `TBL_PERSONAS` (`id_persona`),
  ADD CONSTRAINT `TBL_USUARIOS_TBL_ROLES_null_fk` FOREIGN KEY (`id_rol`) REFERENCES `TBL_ROLES` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
