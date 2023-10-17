<?php

require_once 'config.php';

abstract class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL['HOST']  .';dbname='. MYSQL['DB'] .';charset=utf8', MYSQL['USER'], MYSQL['PASS']);
            $this->deploy();
        }

        function deploy() {
            // Chequear si hay tablas
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
            if(count($tables)==0) {
                // Si no hay crearlas
                $sql =<<<END

                -- phpMyAdmin SQL Dump
                -- version 5.2.1
                -- https://www.phpmyadmin.net/
                --
                -- Servidor: 127.0.0.1
                -- Tiempo de generación: 17-10-2023 a las 22:48:51
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
                -- Base de datos: `noticias_del_ermitano`
                --

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `noticias`
                --

                CREATE TABLE `noticias` (
                  `IDNoticia` int(11) NOT NULL,
                  `Titulo` tinytext NOT NULL,
                  `Descripcion` text NOT NULL,
                  `Fuente` char(255) NOT NULL,
                  `AutorNoticia` char(255) NOT NULL,
                  `Foto` tinytext NOT NULL,
                  `Seccion` int(11) NOT NULL,
                  `Noticia` longtext NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `noticias`
                --

                INSERT INTO `noticias` (`IDNoticia`, `Titulo`, `Descripcion`, `Fuente`, `AutorNoticia`, `Foto`, `Seccion`, `Noticia`) VALUES
                (3, 'Nueva serie de la famosa franquicia Dragon Ball: \"Dragon Ball Daima\".', 'Mientras seguimos esperando el regreso de \'Dragon Ball Super\', Akira Toriyama ha llegado con un sorpresote inesperado: un nuevo anime llamado \'Dragon Ball Daima\' que promete ser un regreso a los inicios del manga para celebrar el 40 aniversario de la franquicia.\r\n\r\nToei Animation todavía se está guardando muchos detalles del nuevo anime de \'Dragon Ball\', pero esto es lo que sabemos por el momento de la próxima aventura de Goku y compañía.', 'Fuente: Toei Animation', 'Pablo Salas Ferrari', 'https://www.mundodeportivo.com/alfabeta/hero/2023/10/dragon-ball-daima-el-nuevo-anime-de-la-franquicia-de-akira-toriyama.jpg?width=768&aspect_ratio=16:9&format=nowebp', 3, 'Nueva serie de la famosa franquicia Dragon Ball: \"Dragon Ball Daima\".\r\n\r\nMientras seguimos esperando el regreso de \'Dragon Ball Super\', Akira Toriyama ha llegado con un sorpresote inesperado: un nuevo anime llamado \'Dragon Ball Daima\' que promete ser un regreso a los inicios del manga para celebrar el 40 aniversario de la franquicia.\r\n\r\nToei Animation todavía se está guardando muchos detalles del nuevo anime de \'Dragon Ball\', pero esto es lo que sabemos por el momento de la próxima aventura de Goku y compañía.\r\n\r\nMientras seguimos esperando el regreso de \'Dragon Ball Super\', Akira Toriyama ha llegado con un sorpresote inesperado: un nuevo anime llamado \'Dragon Ball Daima\' que promete ser un regreso a los inicios del manga para celebrar el 40 aniversario de la franquicia.\r\n\r\nToei Animation todavía se está guardando muchos detalles del nuevo anime de \'Dragon Ball\', pero esto es lo que sabemos por el momento de la próxima aventura de Goku y compañía.'),
                (4, 'El nuevo videojuego de la saga \"Budokai Tenkaichi\" de DB esta mas cerca que nunca.', 'La secuela del legendario título de lucha se ha anunciado por sorpresa. 16 años después del 3, volverá \'Budokai Tenkaichi\'.', 'Bandai Namco', 'Franco Suarez Barraza', 'https://hips.hearstapps.com/hmg-prod/images/dragon-ball-budokai-tenkaichi-4-640708a8289de.jpeg?resize=1200:*', 4, '');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `secciones`
                --

                CREATE TABLE `secciones` (
                  `IDSeccion` int(11) NOT NULL,
                  `Secciones` varchar(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `secciones`
                --

                INSERT INTO `secciones` (`IDSeccion`, `Secciones`) VALUES
                (1, 'Anime'),
                (2, 'Manga'),
                (3, 'Peliculas'),
                (4, 'Videojuegos');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `usuarios`
                --

                CREATE TABLE `usuarios` (
                  `Id` int(11) NOT NULL,
                  `Usuario` varchar(255) NOT NULL,
                  `Contraseña` varchar(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `usuarios`
                --

                INSERT INTO `usuarios` (`Id`, `Usuario`, `Contraseña`) VALUES
                (1, 'webadmin', '$2y$10$6IKNCHJLC31dCre0FxKvTunXJpi8tblDaelSt4ug67OAXWbfQfHra');

                --
                -- Índices para tablas volcadas
                --

                --
                -- Indices de la tabla `noticias`
                --
                ALTER TABLE `noticias`
                  ADD PRIMARY KEY (`IDNoticia`);

                --
                -- Indices de la tabla `secciones`
                --
                ALTER TABLE `secciones`
                  ADD PRIMARY KEY (`IDSeccion`);

                --
                -- Indices de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                  ADD PRIMARY KEY (`Id`);

                --
                -- AUTO_INCREMENT de las tablas volcadas
                --

                --
                -- AUTO_INCREMENT de la tabla `noticias`
                --
                ALTER TABLE `noticias`
                  MODIFY `IDNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

                --
                -- AUTO_INCREMENT de la tabla `secciones`
                --
                ALTER TABLE `secciones`
                  MODIFY `IDSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

                --
                -- AUTO_INCREMENT de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
                COMMIT;

                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

                END;
                $this->db->query($sql);
            }
            
        }
    }