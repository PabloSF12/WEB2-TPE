<?php

require_once './app/models/noticias.model.php';
require_once './app/views/noticias.view.php';
require_once './app/models/noticia.model.php';
require_once './app/views/noticia.view.php';

class NoticiasController {
   private $model;
   private $view;

   public function __construct(){
    
    $this->model = new NoticiasModel();
    $this->view = new NoticiasView();

   }

   public function showNoticias(){
      $noticia = $this->model->getNoticias();
      $this->view->showNoticias($noticia);
   }
}