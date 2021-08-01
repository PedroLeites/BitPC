<?php
class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar($nombre, $pass)
    {

        $tieneAcceso = false;
        try {
            $query = $this->db->connect()->prepare('SELECT password FROM usuarios WHERE nombre=:nombre');
            $query->bindValue(':nombre', $nombre);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            $paswordStr = "";
            while ($row = $query->fetch()) {
                $paswordStr = $row['password'];
            }
            if ($paswordStr == $pass) {
                $tieneAcceso = true;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $tieneAcceso;

    }
}
