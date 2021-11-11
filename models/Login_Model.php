<?php
class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar($nombre, $pass)
    {

        $salida      = new StdClass;
        $salida->res = false;
        try {
            $query = $this->db->connect()->prepare('SELECT id,password, rol FROM usuarios WHERE nombre=:nombre');
            $query->bindValue(':nombre', $nombre);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            $paswordStr = "";
            while ($row = $query->fetch()) {
                $paswordStr          = $row['password'];
                $salida->id          = $row['id'];
                $salida->rol = $row['rol'];
            }
            if ($paswordStr == $pass) {
                $salida->res = true;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $salida;

    }
}