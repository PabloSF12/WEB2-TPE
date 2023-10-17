<?php

require_once './app/models/model.php';

class NoticiaModel extends Model{


  function getNoticia($id){
    $query = $this->db->prepare('SELECT * FROM noticias WHERE IDNoticia = ?');
    $query->execute($id);

    $noticia = $query->fetchAll(PDO::FETCH_OBJ);

    return $noticia;

  }

}