<?php
class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar($correo, $pass)
    {

        $salida      = new StdClass;
        $salida->res = false;
        try {
            $query = $this->db->connect()->prepare('SELECT id, email, nombre, pwd, rol FROM usuarios WHERE email=:correo');
            $query->bindValue(':correo', $correo);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            $paswordStr = "";
            while ($row = $query->fetch()) {
                $paswordStr  = $row['password'];
                $salida->id  = $row['id'];
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