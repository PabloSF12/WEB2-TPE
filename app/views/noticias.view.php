<?php

class NoticiasView{
  public function showNoticias($noticias){
    require './templates/noticias.phtml';
  }
}

class NoticiaView{
  public function showNoticia(){
    require './templates/noticia.phtml';
  }
}