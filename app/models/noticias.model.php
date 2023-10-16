<?php

require_once './app/models/model.php';

class NoticiasModel extends Model{


  function getNoticias(){
    $query = $this->db->prepare('SELECT * FROM noticias');
    $query->execute();

    $noticias = $query->fetchAll(PDO::FETCH_OBJ);

    return $noticias;

  }

}

class NoticiaModel extends Model{


  function getNoticia(){
    $query = $this->db->prepare('SELECT * FROM noticias');
    $query->execute();

    $noticia = $query->fetchAll(PDO::FETCH_OBJ);

    return $noticia;

  }

}