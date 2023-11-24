-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 11:27:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `bibliografia` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `nombre`, `bibliografia`, `foto`) VALUES
(1, 'Stephen King', 'Stephen Edwin King, más conocido como Stephen King y ocasionalmente por su pseudónimo Richard Bachman, es un escritor estadounidense de novelas de terror, ficción sobrenatural, misterio, ciencia ficción y literatura fantástica.', 'Vistas/img/Autores/A-524.png'),
(2, 'Paulo Coelho', 'Paulo Coelho de Souza es un novelista, dramaturgo y letrista brasileño después de varios años dedicado a la poesía. Es uno de los escritores y novelistas más leídos del mundo, con más de 320 millones de libros vendidos en más de 170 países, traducidos a 88 lenguas', 'Vistas/img/Autores/A-83.jpg'),
(3, 'Jane Austen', 'Jane Austen (Steventon, 16 de diciembre de 1775-Winchester, 18 de julio de 1817) fue una novelista británica que vivió durante la época georgiana. La ironía que empleaba para dotar de comicidad a sus novelas hace que Jane Austen sea considerada entre los clásicos de la novela inglesa,​ a la vez que su recepción va, incluso en la actualidad, más allá del interés académico, siendo sus obras leídas por un público más amplio', 'Vistas/img/Autores/A-701.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `documento` text NOT NULL,
  `fecha_nac` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `documento`, `fecha_nac`, `direccion`, `telefono`) VALUES
(1, 'Leo Daniel', 'Flores', '552244', '05/11/2001', 'Los Olivos, 24', '+(01) 969-696-123'),
(2, 'Juan Pablo', 'Dias', '663255', '24/03/1995', 'Surco 184', '+(98) 989-832-123'),
(5, 'Jeanpiere', 'Garibay', '98988776', '15/08/2001', 'Cercado', '+(01) 955-566-523'),
(6, 'Jhon', 'Carhuas Romero', '12561976', '15/05/1998', 'Tomas Valle', '+(01) 998-877-654'),
(7, 'Miguel', 'Hilacondo Gutierrez', '72727215', '15/09/1958', 'Arequipa', '+(01) 989-898-123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(1, 'Novela'),
(2, 'Fantasía'),
(4, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `sinopsis` text NOT NULL,
  `portada` text NOT NULL,
  `idioma` text NOT NULL,
  `fecha_publicacion` text NOT NULL,
  `precio` text NOT NULL,
  `stock` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `id_genero`, `id_autor`, `sinopsis`, `portada`, `idioma`, `fecha_publicacion`, `precio`, `stock`) VALUES
(2, 'IT', 4, 1, 'Varios niños de una pequeña ciudad del estado de Maine se alían para combatir a una entidad diabólica que adopta la forma de un payaso y desde hace mucho tiempo emerge cada 27 años para saciarse de sangre infantil.', 'Vistas/img/Libros/Portada-771.jpg', 'Español', '11/05/1982', '500', '11'),
(3, 'El Alquimista', 1, 2, 'El Alquimista, de Paulo Coelho, sigue cambiando la vida de sus lectores para siempre. Con más de dos millones de copias vendidas alrededor del mundo, El Alquimista se ha establecido como un clásico moderno, admirado universalmente.', 'Vistas/img/Libros/Portada-73.jpg', 'Español', '02/07/1990', '700', '8'),
(4, 'El Resplandor', 1, 1, 'Al escritor Jack Torrance le es ofrecido un empleo como cuidador del hotel Overlook durante el invierno junto a su familia. Este trabajo parece ser una oportunidad perfecta para demostrar que está totalmente curado de su alcoholismo. El hotel está situado en lo alto de las montañas de Colorado y el pueblo más cercano es Sidewinder, aproximadamente a 65 kilómetros del lugar. Los caminos son intransitables por el invierno, por lo que el lugar está prácticamente aislado del mundo, especialmente durante las fuertes tormentas.', 'Vistas/img/Libros/Portada-518.jpg', 'Español', '28/01/1977', '400', '5'),
(5, 'Orgullo y Prejuicio', 1, 3, 'Orgullo y prejuicio, publicada por primera vez el 28 de enero de 1813 como una obra anónima, es la más famosa de las novelas de Jane Austen y una de las primeras comedias románticas en la historia de la novela', 'Vistas/img/Libros/Portada-227.jpg', 'Español', '28/01/1913', '800', '9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cantidad` text NOT NULL,
  `fecha_envio` text NOT NULL,
  `fecha_entrega` text NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cantidad`, `fecha_envio`, `fecha_entrega`, `estado`) VALUES
(5, '10', '11/05/2023', '11/09/2023', 'Entregado'),
(6, '8', '11/02/2023', '11/07/2023', 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `documento` text NOT NULL,
  `foto` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `documento`, `foto`, `rol`) VALUES
(1, 'vendedor1', '123456', 'Daniel Juan', 'Torres ', '332244', '', 'Vendedor'),
(2, 'admin1', '112233', 'Christian Joel', 'Casas', '443255', '', 'Administrador'),
(5, 'admin2', '171819', 'Mario Alcides', 'Chirinos', '73572618', '', 'Administrador'),
(6, 'vendedor3', '789456', 'Pepe James', 'Romero', '111133', '', 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `precio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `id_venta`, `id_libro`, `precio`) VALUES
(9, 1, 2, '500'),
(11, 1, 3, '700'),
(12, 3, 2, '500'),
(13, 2, 2, '500'),
(14, 2, 3, '700'),
(15, 1, 4, '400'),
(16, 3, 3, '700'),
(17, 3, 4, '400'),
(18, 6, 3, '700'),
(19, 6, 4, '400'),
(20, 9, 3, '700'),
(21, 9, 4, '400'),
(22, 10, 2, '500'),
(23, 11, 4, '400'),
(24, 7, 3, '700'),
(25, 7, 4, '400'),
(26, 7, 2, '500'),
(27, 7, 3, '700'),
(28, 8, 3, '700'),
(29, 12, 4, '400'),
(30, 12, 5, '800');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `estado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_vendedor`, `id_cliente`, `estado`, `fecha`) VALUES
(1, 1, 1, 'Finalizado', '2023-11-22 05:36:06'),
(2, 1, 5, 'Finalizado', '2023-11-22 08:28:27'),
(3, 1, 2, 'Finalizado', '2023-11-22 05:45:30'),
(6, 6, 5, 'Finalizado', '2023-11-23 03:49:38'),
(7, 6, 1, 'Finalizado', '2023-11-23 03:50:07'),
(8, 6, 2, 'Finalizado', '2023-11-23 03:50:16'),
(9, 1, 1, 'Finalizado', '2023-11-23 04:42:29'),
(10, 1, 5, 'Finalizado', '2023-11-23 05:01:06'),
(11, 1, 1, 'Finalizado', '2023-11-23 05:06:41'),
(12, 1, 7, 'Finalizado', '2023-11-24 09:12:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
