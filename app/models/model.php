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
                -- Tiempo de generación: 13-10-2023 a las 22:15:34
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
                  `Seccion` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `secciones`
                --

                CREATE TABLE `secciones` (
                  `IDSeccion` int(11) NOT NULL,
                  `Secciones` varchar(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
                  MODIFY `IDNoticia` int(11) NOT NULL AUTO_INCREMENT;

                --
                -- AUTO_INCREMENT de la tabla `secciones`
                --
                ALTER TABLE `secciones`
                  MODIFY `IDSeccion` int(11) NOT NULL AUTO_INCREMENT;

                --
                -- AUTO_INCREMENT de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
                COMMIT;

                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
                
                END;
                $this->db->query($sql);
            }
            
        }
    }