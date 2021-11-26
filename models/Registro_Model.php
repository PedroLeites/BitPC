<?php

class Registro_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrarse($correo, $nombre, $apellido, $fechanac, $direccion, $telefono, $password)
    {
        $salida = new StdClass;
        $salida->resultado = false;
//llega 0dia/1mes/2anio
        //formatear fecha anio-mes-dia, baseDatos
        $fechaAux = explode("-", $fechanac);
        $fechaF = $fechaAux[2] . '-' . $fechaAux[1] . '-' . $fechaAux[0];
        $query = $this->db->connect()->prepare('insert into usuarios (email, nombre, apellido, fechanac, direccion, telefono, pwd, rol) values (:email, :nombre, :apellido, :fechanac, :direccion, :telefono,:pwd, :rol)');
        /*$query    = $this->db->connect()->prepare('insert into usuarios ( email, nombre, apellido, fechanac, direccion, telefono, pwd, rol) VALUES (:email, :nombre, :apellido, :fechanac, :direccion, :telefono, :pwd, :rol');*/
        /*$query = $this->db->connect()->prepare('INSERT INTO usuarios (email, nombre, apellido, fechanac, direccion, telefono, password) VALUES (:correo, :nombre, :apellido, :fechanac, :direccion, :telefono, :password)');*/
        $query->bindParam(':email', $correo);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apellido', $apellido);
        $query->bindParam(':fechanac', $fechanac);
        $query->bindParam(':direccion', $direccion);
        $query->bindParam(':telefono', $telefono);
        $query->bindParam(':pwd', $password);
        $query->bindValue(':rol', "cliente");
        $query->execute();

        $salida->resultado = true;
        return $salida;
    }

}
