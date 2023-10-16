<?php

require_once './app/models/model.php';

class LoginModel extends Model{


  function getLogin(){
    $query = $this->db->prepare('SELECT * FROM usuarios');
    $query->execute();

    $usuarios = $query->fetchAll(PDO::FETCH_OBJ);

    return $usuarios;

  }

}