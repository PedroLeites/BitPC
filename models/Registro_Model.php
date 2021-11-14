<?php

class Registro_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrarse()
    {
        $query = $this->db->connect()->prepare('INSERT INTO usuarios (email, nombre, apellido, fechanac, direccion, password) VALUES ($correo, $nombre, $apellido, $fechanac, $direccion, $password)');
        $query->execute();
    }

}