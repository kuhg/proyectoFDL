-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2025 a las 22:28:02
-- Versión del servidor: 10.4.32-MariaDB-log
-- Versión de PHP: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jardinfdl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `textoComentario` varchar(255) NOT NULL,
  `fechaComentario` date NOT NULL,
  `estadoComentario` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `idPublicacion`, `idUsuario`, `textoComentario`, `fechaComentario`, `estadoComentario`) VALUES
(2, 12, 5, 'Este es un comentario de ejemplo\r\n', '2025-10-21', 0),
(3, 2, 5, 'Este es un comentario de ejemplo', '2025-10-24', 0),
(4, 13, 5, 'Este es un comentario de ejemplo', '2025-10-24', 0),
(5, 13, 5, 'comentario ejemplo 1', '2025-10-25', 0),
(6, 13, 5, 'comentario ejemplo 2\r\n', '2025-10-25', 0),
(7, 13, 5, 'comentario de ejemplo 3', '2025-10-25', 1),
(8, 13, 5, 'comentario de ejemplo 5', '2025-10-25', 1),
(9, 13, 5, 'comentario de ejemplo 3', '2025-10-25', 1),
(10, 13, 5, 'comentario de ejemplo 3', '2025-10-25', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrasenia_reset`
--

CREATE TABLE `contrasenia_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `creado` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idImagen` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL,
  `nombreImagen` varchar(255) NOT NULL,
  `rutaImagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idImagen`, `idPublicacion`, `nombreImagen`, `rutaImagen`) VALUES
(1, 12, '1760827151_a5fc1b3ccca64d1e4ccb.jpg', 'uploads/1760827151_a5fc1b3ccca64d1e4ccb.jpg'),
(2, 12, '1760827151_e348c5920a1779e13d5d.jpg', 'uploads/1760827151_e348c5920a1779e13d5d.jpg'),
(3, 13, '1761330325_8364af4000e82988a1cd.jpeg', 'uploads/1761330325_8364af4000e82988a1cd.jpeg'),
(4, 13, '1761330325_518362d3a15974fe6238.jpeg', 'uploads/1761330325_518362d3a15974fe6238.jpeg'),
(5, 13, '1761330325_75c91040f8f369c1730a.jpeg', 'uploads/1761330325_75c91040f8f369c1730a.jpeg'),
(6, 13, '1761330325_f9ec2f3474dbfc2fffa1.jpeg', 'uploads/1761330325_f9ec2f3474dbfc2fffa1.jpeg'),
(7, 14, '1761776793_db0c8720d4e5525aa594.jpg', 'uploads/1761776793_db0c8720d4e5525aa594.jpg'),
(8, 14, '1761776793_09f8b94b4496587e5706.jpg', 'uploads/1761776793_09f8b94b4496587e5706.jpg'),
(9, 14, '1761776793_51d5e4078f4884a98837.jpg', 'uploads/1761776793_51d5e4078f4884a98837.jpg'),
(10, 14, '1761776793_14800f3e9f221969f567.jpg', 'uploads/1761776793_14800f3e9f221969f567.jpg'),
(11, 14, '1761776793_2de1e29613518c458a0d.jpg', 'uploads/1761776793_2de1e29613518c458a0d.jpg'),
(12, 14, '1761776793_659a9572393ebc0af40f.jpg', 'uploads/1761776793_659a9572393ebc0af40f.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_frecuentes`
--

CREATE TABLE `preguntas_frecuentes` (
  `idFaq` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta` text NOT NULL,
  `estadoFaq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas_frecuentes`
--

INSERT INTO `preguntas_frecuentes` (`idFaq`, `pregunta`, `respuesta`, `estadoFaq`) VALUES
(1, '¿Cuando son las inscripciones al nivel?', 'Las fechas de inscripción las establece el gobierno provincial.', 0),
(2, '¿Cuándo son las inscripciones al nivel?', 'Las fechas de inscripción las establece el gobierno provincial.', 1),
(3, '¿Cómo se inscribe a los y las estudiantes?', 'Se inscriben por CIDI. Debe tenerlo a cargo en la cuenta el padre, madre o tutor.', 1),
(4, '¿Qué paso debo seguir?', '1)-Ingresar al CIDI.\r\n2)-Acceder al FUP (FORMULARIO UNICO DE POSTULANTES): Bajo el nombre inscripciones escolares 2026.\r\n3)- Completar datos del estudiante.\r\n4)- Seleccionar entre 2 y 4 escuelas cercanas al domicilio, y elegir turno.\r\n5)- Confirmar postulación. Se recibe constancia de la inscripción por mail.', 1),
(5, '¿Necesito presentar documentación en la institución?', 'Si, pero la documentación se solicita y recibe una vez comenzado el ciclo lectivo al que se inscribió al estudiante.', 1),
(6, '¿Qué documentación debo presentar?', 'Fotocopia del Dni de grupo familiar, partida de nacimiento, carnet de vacunas completo, CUS (CERTIFICADO UNICO DE SALUD), e ISA (INFORME ANUA)\r\nAutorizaciones para el retiro de estudiantes, autorizaciones para el uso de la voz y de imagen.', 1),
(7, '¿Utilizan delantal o uniforme?', 'Tiene ambas opciones, y es a criterio de la familia si va a usar uno u otro, o ambos durante el ciclo lectivo.', 1),
(8, '', '', 0),
(9, '¿Qué lleva la mochila de un estudiante de nivel inicial?', 'Necesita una taza, plato, cucharita, mantel, servilleta y toalla.', 1),
(10, '¿Hay que pagar la inscripción?', 'No, la educación es pública y gratuita. Durante los primeros meses se establece una colaboración de las familias para la compra de material y la cooperadora hace\r\neventos para recaudar fondos para el jardin.', 1),
(11, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `idPublicacion` int(11) NOT NULL,
  `tituloPublicacion` varchar(150) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `resumenPublicacion` text NOT NULL,
  `objetivosPublicacion` text NOT NULL,
  `conclucionPublicacion` text NOT NULL,
  `estadoPublicacion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idPublicacion`, `tituloPublicacion`, `fechaPublicacion`, `resumenPublicacion`, `objetivosPublicacion`, `conclucionPublicacion`, `estadoPublicacion`) VALUES
(2, 'Asda', '2025-10-18', 'asdasdas', 'objetivoa.objetivob', 'asdasdasd', 0),
(4, 'Quiero llevar un paquete', '2025-10-18', 'asdasdasdasd', 'asdasd', 'asdasdasd', 0),
(8, 'Asda asdad', '2025-10-18', 'lore ipsum', 'lore ipsum', 'lore ipsum', 0),
(10, 'Asda asdad', '2025-10-18', 'ipsum', 'asdasdasd', 'ipsum', 0),
(11, 'Asda asdad', '2025-10-18', 'ipsum', 'asdasdasd', 'ipsum', 0),
(12, 'Asda asdad', '2025-10-18', 'ipsum', 'asdasdasd', 'ipsum', 1),
(13, 'PLAN DE MEJORA EN ORALIDAD, LECTURA Y ESCRITURA:  “CONOCEMOS NUESTROS GUSTOS LITERARIOS”', '2025-10-24', 'El paulatino acercamiento del niño a los libros le  brindará no solamente un cabal conocimiento del mundo nuevo que lo rodea, a través de situaciones reales, personajes cotidianos, lugares habitados por él y su familia, sino también le permitirá gozar de la fantasía ampliando su universo creativo. A partir de esta premisa y la necesidad de vincular a los y las estudiantes de la institución con los libros; y partiendo de la evaluación inicial para determinar el punto de arranque en los proyectos, es que se considera necesario estimular y desarrollar tanto el lenguaje escrito, como el oral. Es por este motivo que se diseñó un plan de acción que involucra ambos lenguajes con la literatura.\r\n\r\nSe plantearon las líneas de acción a partir de la selección de 3 itinerarios de lectura, uno para cada sala, y 3 libros de cada tema que serán abordados de tal manera, que los productos de dicho plan serán desarrollados y presentados en el “Festival de la Palabra 2025”.  \r\n\r\n            Se dará importancia a:\r\n\r\n- El fortalecimiento de la oralidad, la propia escucha, el sentido de lo transmitido.\r\n\r\n- La lectura en voz alta, preparada, ensayada, apropiada. Que de seguridad y fortalezca identidades lectoras.\r\n\r\n- El despliegue de las capacidades de escritura, en procesos de borradores, correcciones, ediciones finales.', 'Apropiarse progresivamente de la palabra, desarrollar y fortalecer la confianza para tomarla, verbalizar ideas cada vez más completas y coherentes, escuchar y hacerse escuchar.\r\nIniciarse en el desarrollo de prácticas de escucha activa y construcción de sentido a partir de los mensajes con los que interactúa.\r\nInteractuar con diversidad de materiales escritos, desarrollando estrategias de construcción de sentido.  \r\nIniciarse en prácticas de escritura exploratoria, con diferentes propósitos, de palabras significativas y de textos breves del ámbito personal y social.', 'Conclucion de ejemplo', 1),
(14, 'Editado: Proyecto crayones', '2025-10-29', 'Editado: Este proyecto STEAM busca resolver la escasez de marcadores en la sala a través de la creación de eco-crayones caseros utilizando cera de abeja y pigmentos naturales, así como colorantes en pasta comestibles.\r\n      A lo largo de la experiencia, los niños y niñas de 3, 4 y 5 años explorarán conceptos de ciencia (propiedades de materiales, cambios de estado), tecnología (proceso de fabricación simple), ingeniería (diseño de moldes), arte (creación de colores y uso de crayones) y matemáticas (medición, clasificación).\r\n      El proyecto fomenta el consumo responsable y el cuidado del medio ambiente, alineándose con los Objetivos de Desarrollo Sostenible (ODS) y los lineamientos del diseño curricular de nivel inicial de Córdoba, promoviendo el desarrollo de capacidades a través del aprendizaje basado en problemas y la indagación.', 'Editado: Fomentar la curiosidad y la indagación científica en relación con los materiales y sus transformaciones. Desarrollar habilidades de pensamiento crítico y resolución creativa de problemas a través de una situación real.Promover el trabajo colaborativo y la comunicación oral en las diferentes etapas del proyecto.Sensibilizar sobre la importancia del consumo responsable, la reutilización y el cuidado del medio ambiente.Explorar conceptos matemáticos básicos a través de la experimentación y la producción.Estimular la expresión creativa a través de las artes visuales utilizando materiales no convencionales.Valorar los recursos naturales y comprender el origen de algunos materiales (cera de abeja).', 'Editado: El proyecto “Nuestros colores con conciencia” permitió a los niños y niñas no solo resolver una necesidad práctica en la sala —la falta de crayones—, sino también sumergirse en una experiencia de aprendizaje profundamente significativa. \r\n      Al crear sus propios útiles, desarrollaron habilidades científicas, tecnológicas, artísticas y matemáticas de manera integrada, fomentando la creatividad y el pensamiento crítico.\r\n      La inclusión de los principios Waldorf enriqueció la experiencia sensorial y la conexión con la naturaleza, mientras que el enfoque en los ODS los inició en la conciencia ambiental desde una edad temprana.\r\n      Este proyecto culminó con la valoración de los objetos hechos a mano, el respeto por los recursos naturales y la alegría de utilizar sus propios colores en sus creaciones artísticas.\r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `idReporte` int(11) NOT NULL,
  `idComentario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `comentarioReporte` varchar(255) NOT NULL,
  `motivoReporte` varchar(50) NOT NULL,
  `estadoReporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`idReporte`, `idComentario`, `idUsuario`, `comentarioReporte`, `motivoReporte`, `estadoReporte`) VALUES
(1, 2, 5, 'Esto es un reporte de ejemplo', 'spam', 0),
(2, 2, 5, 'comentario de ejemplo 1', 'spam', 0),
(3, 2, 5, 'comentario de ejemplo 2', 'spam', 0),
(4, 4, 5, 'ejemplo de reporte para este comentario de ejemplo', 'spam', 0),
(5, 6, 5, 'asdads', 'informacion_falsa', 0),
(6, 10, 5, 'reporte de comentario', 'spam', 0),
(7, 7, 5, 'reporte 3\r\n', 'spam', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_respuestas`
--

CREATE TABLE `reportes_respuestas` (
  `idReporteRespuesta` int(11) NOT NULL,
  `idRespuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `comentarioReporte` varchar(255) NOT NULL,
  `motivoReporte` varchar(55) NOT NULL,
  `estadoReporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes_respuestas`
--

INSERT INTO `reportes_respuestas` (`idReporteRespuesta`, `idRespuesta`, `idUsuario`, `comentarioReporte`, `motivoReporte`, `estadoReporte`) VALUES
(4, 4, 5, 'otro intento de reporte a comentario de ejemplo 3', 'spam', 0),
(5, 1, 5, 'reporte a respuesta a comentario 1', 'abuso', 0),
(6, 4, 5, 'reporte 1', 'spam', 0),
(7, 4, 5, 'reporte 2', 'spam', 0),
(8, 4, 5, 'reporte 3', 'spam', 0),
(9, 4, 5, 'reporte 4', 'spam', 0),
(10, 6, 5, 'reporte respuesta', 'spam', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_comentarios`
--

CREATE TABLE `respuestas_comentarios` (
  `idRespuesta` int(11) NOT NULL,
  `idComentario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `textoRespuesta` varchar(255) NOT NULL,
  `fechaRespuesta` date NOT NULL,
  `estadoRespuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuestas_comentarios`
--

INSERT INTO `respuestas_comentarios` (`idRespuesta`, `idComentario`, `idUsuario`, `textoRespuesta`, `fechaRespuesta`, `estadoRespuesta`) VALUES
(1, 10, 5, 'respuesta a comentario 1 de ejemplo', '0000-00-00', 0),
(2, 10, 5, 'respuesta 2 para el comentario 1 de ejemplo', '0000-00-00', 1),
(3, 10, 5, 'dije comentario 1 porque es el primero que sale, capaz tengo que poner DESC', '0000-00-00', 1),
(4, 9, 5, 'Respuesta a comentario de ejemplo 3 para ejemplo', '0000-00-00', 0),
(5, 8, 5, 'comentario de respuesta de ejemplo', '0000-00-00', 0),
(6, 8, 5, 'ejemplo', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `docUsuario` int(11) NOT NULL,
  `nomUsuario` varchar(15) NOT NULL,
  `apeUsuario` varchar(15) NOT NULL,
  `correoUsuario` varchar(50) NOT NULL,
  `contactoUsuario` varchar(15) NOT NULL,
  `contactoUrgenciaUsuario` varchar(15) NOT NULL,
  `direccionUsuario` varchar(255) NOT NULL,
  `contraseniaUsuario` varchar(255) NOT NULL,
  `fotoUsuario` varchar(250) NOT NULL,
  `permisosUsuario` int(11) NOT NULL,
  `estadoUsuario` int(11) NOT NULL,
  `creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `docUsuario`, `nomUsuario`, `apeUsuario`, `correoUsuario`, `contactoUsuario`, `contactoUrgenciaUsuario`, `direccionUsuario`, `contraseniaUsuario`, `fotoUsuario`, `permisosUsuario`, `estadoUsuario`, `creacion`) VALUES
(5, 40801522, 'Gabriel', 'Villalobo', 'gabvilla32@gmail.com', '3544541334', '3544541334', 'italia 851', '$2y$10$Wgbaf6h6J7a7HHhGUWfDH.BtdubzsTKZJ3JG9ZgC8YqbCNgCpIIWa', 'fotosPerfil/1761238154_a6816bd806eedf72144d.jpeg', 1, 1, '2025-10-02'),
(6, 40801523, 'Johana', 'Gomez', 'asdadasd@gmail.com', '0', '0', 'nose', '$2y$10$y62SJ5e4PMrtrTJ7h0bpDO2ZFZJPz3F7O2j/1u2u4GCKyXjb09jvO', 'img/icono-anonimo.webp', 3, 1, '2025-10-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPublicacion` (`idPublicacion`);

--
-- Indices de la tabla `contrasenia_reset`
--
ALTER TABLE `contrasenia_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idPublicacion` (`idPublicacion`);

--
-- Indices de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  ADD PRIMARY KEY (`idFaq`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`idPublicacion`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `fk_reporte_comentario` (`idComentario`),
  ADD KEY `fk_reporte_usuario` (`idUsuario`);

--
-- Indices de la tabla `reportes_respuestas`
--
ALTER TABLE `reportes_respuestas`
  ADD PRIMARY KEY (`idReporteRespuesta`),
  ADD KEY `fk_reporte_respuesta` (`idRespuesta`),
  ADD KEY `fk_reporte_respuesta_usuario` (`idUsuario`);

--
-- Indices de la tabla `respuestas_comentarios`
--
ALTER TABLE `respuestas_comentarios`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `fk_respuesta_comentario` (`idComentario`),
  ADD KEY `fk_respuesta_usuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `docUsuario` (`docUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contrasenia_reset`
--
ALTER TABLE `contrasenia_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `idPublicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reportes_respuestas`
--
ALTER TABLE `reportes_respuestas`
  MODIFY `idReporteRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `respuestas_comentarios`
--
ALTER TABLE `respuestas_comentarios`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comentario_publicacion` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`idPublicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comentario_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_imagen_publicacion` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`idPublicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`idPublicacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `fk_reporte_comentario` FOREIGN KEY (`idComentario`) REFERENCES `comentarios` (`idComentario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reporte_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reportes_respuestas`
--
ALTER TABLE `reportes_respuestas`
  ADD CONSTRAINT `fk_reporte_respuesta` FOREIGN KEY (`idRespuesta`) REFERENCES `respuestas_comentarios` (`idRespuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reporte_respuesta_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas_comentarios`
--
ALTER TABLE `respuestas_comentarios`
  ADD CONSTRAINT `fk_respuesta_comentario` FOREIGN KEY (`idComentario`) REFERENCES `comentarios` (`idComentario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_respuesta_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
