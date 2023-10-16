<?php
    require_once './app/models/model.php';

    class UserModel extends Model{

    public function getByUsuario($usuario) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$usuario]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
