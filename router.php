<?php

require_once './app/controllers/noticias.controller.php';
require_once './app/controllers/secciones.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/login.controller.php';
require_once './app/controllers/noticia.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new NoticiasController();
        $controller->showNoticias();
        break;
    
    case 'login':
        $controller = new LoginController();
        $controller->showLogin();
        break;

    case 'noticia':
        $controller = new NoticiaController();
        $controller->showNoticia();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->showLogin(); 
        break;

    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'view':
        $a = 'noticia';
        if (empty($params[1])) {
            $a = $params[1];
        }
        $controller;
        switch ($a) {
            case 'noticia':
                $controller = new NoticiaController();
                $controller -> showNoticia($params[2]);
                break;
            
            default:
                echo 'Error 404 not found';
                break;
        }
        
    default:
        echo 'Error 404 not found';
    break;
}