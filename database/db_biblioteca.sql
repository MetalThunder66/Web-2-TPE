-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 10:22:06
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre_autor` varchar(100) NOT NULL,
  `ciudad_autor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre_autor`, `ciudad_autor`) VALUES
(1, 'agustin sau', 'olavarria'),
(2, 'semi muñoz', 'buenos aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` tinytext NOT NULL,
  `valoracion` int(11) NOT NULL,
  `libro_fk` int(11) NOT NULL,
  `usuario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `valoracion`, `libro_fk`, `usuario_fk`) VALUES
(1, 'best book ever', 5, 6, 3),
(3, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 4, 6, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `id_editorial` int(11) NOT NULL,
  `nombre_editorial` varchar(100) NOT NULL,
  `ciudad_editorial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id_editorial`, `nombre_editorial`, `ciudad_editorial`) VALUES
(1, 'Las Toninas', 'Buenos Aires'),
(2, 'La Pagina', 'Olavarria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nombre_gen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `nombre_gen`) VALUES
(1, 'terror'),
(2, 'suspenso'),
(3, 'ficcion'),
(5, 'accion'),
(32, 'dfd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `nombre_libro` varchar(100) NOT NULL,
  `anio` smallint(5) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `autor_fk` int(100) NOT NULL,
  `genero_fk` int(100) NOT NULL,
  `editorial_fk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre_libro`, `anio`, `descripcion`, `autor_fk`, `genero_fk`, `editorial_fk`) VALUES
(3, 'El hombre que rie', 2010, 'sasdasdasd', 1, 1, 1),
(5, 'la soledad', 2010, '', 1, 1, 2),
(6, 'Luna Llena', 2003, '', 2, 1, 2),
(9, 'erer', 444, 'fsdfsdfsdsfd', 1, 1, 1),
(10, 'adasda', 909, 'fgfgfg', 1, 1, 1),
(13, 'prueba prueba', 2222, 'sdfsfsdfsds', 2, 2, 1),
(14, 'El hombre que rie', 2002, 'ssssssssssss', 2, 2, 2),
(16, 'El uno', 2010, 'El uno', 1, 2, 1),
(18, 'el aether', 2020, 'aaaaaaaaaaaaaaaa', 1, 1, 2),
(22, 'fsdf', 444, '66666', 1, 1, 1),
(23, '45454', 5555, '54545', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`) VALUES
(2, 'Semiramis Muñoz', 'semi@demo.com.ar', '$2y$10$EUjb3iq2hK3HJ2ZWDWlaw.bfPpsp5zUAX4sTAbAhpJzNC/QPFJ/PG', 1),
(3, 'pepe', 'pepito@hotmail.com', '$2y$10$UDoPf1Y7sRln8pgwFln9qO75JSmZJrW2w6RfAt8JvQQ/T.Lb2ziLW', 0),
(7, 'sarasa', 'sarasa@demo.com', '$2y$10$.iPhG3MQurFz8gxHHnosi.LWXNLqEXwZXfpZlxsx/yPenlRyQg9oe', 0),
(8, 'sarasa', 'sarasa@demo.com', '$2y$10$JzW2A44frmToMDoSB6l/OeJhzJiZPqBe5UCJfH/ve1YqAp2XmM5cG', 0),
(9, 'nuevoR', 'new@demo.com', '$2y$10$Yj.G5bO8Wzp05V1itkbQKOthgQnqe2T6STMgkh1pweHeTEpgTRJz6', 0),
(10, 'Ciro', 'admin@demo.com', '$2y$10$gOqExXEXTq4ursn6LdiEFOo76N21yCzQ2bPBwxgQ9B6RhASWHKZ/i', 1),
(11, 'comun', 'noadmin@demo.com', '$2y$10$rJt9/TpJJIw7D1zVpQyeV.Axu32KgqQU.1XefGVHBCxXaObroir/O', 0),
(12, 'bastapls', 'admin2@demo.com', '$2y$10$YsFsaBnask6tVSGda7ZFdOOae53y.ma7rJaYMdlvlImQzy24HEn1i', 0),
(13, 'comunt', 'noadmin2@demo.com', '$2y$10$1ibnmC5tHp2Qbp7NprYC4eKBb/L94N6aPvzk1/b0IsBD16yXWGS9a', 0),
(14, 'nana', 'nani@demo.com', '$2y$10$32hBINl4K5sDR6a5vyKh3OVaujj9Kh6vUlpWsTOVZnAnQBPUCA6O.', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libro_fk` (`libro_fk`),
  ADD KEY `usuario_fk` (`usuario_fk`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `autor_fk` (`autor_fk`),
  ADD KEY `genero` (`genero_fk`),
  ADD KEY `editorial_fk` (`editorial_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`libro_fk`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`usuario_fk`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`autor_fk`) REFERENCES `autores` (`id_autor`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`genero_fk`) REFERENCES `generos` (`id_genero`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`editorial_fk`) REFERENCES `editoriales` (`id_editorial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
