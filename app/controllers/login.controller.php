<?php

require_once './app/models/login.model.php';
require_once './app/views/login.view.php';

class LoginController {
   private $model;
   private $view;

   public function __construct(){
    
    $this->model = new LoginModel();
    $this->view = new LoginView();

   }

   public function showLogin(){
    
    $this->view->showLogin();
   }
}