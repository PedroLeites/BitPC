<?php
class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar($Nombre, $Contrasena)
    {

        $tieneAcceso = false;
        try {
            $query = $this->db->connect()->prepare('SELECT password FROM personas WHERE Nombre=:Nombre');
            $query->bindValue(':Nombre', $Nombre);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            $paswordStr = "";
            while ($row = $query->fetch()) {
                $paswordStr = $row['Contrasena'];
            }
            if ($paswordStr == $Contrasena) {
                $tieneAcceso = true;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $tieneAcceso;

    }
}
