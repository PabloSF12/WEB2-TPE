<?php

require_once './app/models/noticia.model.php';
require_once './app/views/noticia.view.php';

class NoticiaController {
   private $model;
   private $view;

   public function __construct(){
    
    $this->model = new NoticiaModel();
    $this->view = new NoticiaView();

   }

   public function showNoticia(){
      $id = $_POST ['id'];
      $noticia = $this->model->getNoticia($id);
      $this->view->showNoticia($noticia);
   }
}