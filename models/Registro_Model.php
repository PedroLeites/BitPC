<?php

class Registro_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrarse()
    {
        $query = $this->db->connect()->prepare('INSERT INTO usuarios (email, nombre, apellido, fechanac, direccion, password) VALUES (:correo, :nombre, :apellido, :fechanac, :direccion, :password)');
        $query->bindValue(':correo', $correo);
        $query->bindValue(':nombre', $nombre);
        $query->bindValue(':apellido', $apellido);
        $query->bindValue(':fechanac', $fechanac);
        $query->bindValue(':direccion', $direccion);
        $query->bindValue(':password', $password);
        $query->execute();
    }

}