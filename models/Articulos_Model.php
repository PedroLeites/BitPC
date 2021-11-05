<?php
require_once 'entidades/articulo.php';
class Articulos_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        //define un arreglo en php
        //$items = array();
        $items = [];
        try {
            //Pendiente, agregar imágenes
            //$urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            //$urlDefecto = constant('URL') . '/public/imagenes/articulos/imagenDefecto.svg';
            $query = $this->db->connect()->query('SELECT IDProd, NomProd, Descripcion, Precio, Stock, Estado, Categoria FROM articulos');
            while ($row = $query->fetch()) {
                $item = new Articulos();
                $item->IDProd = $row['IDProd'];
                $item->NomProd = $row['NomProd'];
                $item->Descripcion = $row['Descripcion'];
                $item->Precio = $row['Precio'];
                $item->Stock = $row['Stock'];
                $item->Estado = $row['Estado'];
                $item->Categoria = $row['Categoria'];
                //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
                /*if (isset($row['url'])) {
                $item->url = $row['url'];
                } else {
                $item->url = $urlDefecto;
                }*/// Pendiente publicar articulos con imagenes
                //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function verArticulo($IDProd)
    {
        $articulo = null;
        try {
            $query = $this->db->connect()->prepare('SELECT IDProd, NomProd, Descripcion, Precio, Stock, Estado, Categoria FROM articulos WHERE id=:IDProd');
            $query->bindValue(':IDProd', $IDProd);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            while ($row = $query->fetch()) {
                $articulos = new Articulos();
                $articulos->IDProd = $row['IDProd'];
                $articulos->NomProd = $row['NomProd'];
                $articulos->Descripcion = $row['Descripcion'];
                $articulos->Precio = $row['Precio'];
                $articulos->Stock = $row['Stock'];
                $articulos->Estado = $row['Estado'];
                $articulos->Categoria = $row['Categoria'];
            }

        } catch (PDOException $e) {
            var_dump($e);
        }
        return $articulos;
    } //end ver

    public function actualizar($articulos)
    {

        $resultado = false;
        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('UPDATE articulos SET NomProd=:NomProd, Descripcion=:Descripcion, Precio= :Precio, Stock=:Stock, Estado= :Estado, Categoria= :Categoria WHERE IDProd= :IDProd');
            $query->bindParam(':NomProd', $articulos->NomProd);
            $query->bindParam(':Descripcion', $articulos->Descripcion);
            $query->bindParam(':Precio', $articulos->Precio);
            $query->bindParam(':Stock', $articulos->Stock);
            $query->bindParam(':Estado', $articulos->Estado);
            $query->bindParam(':Categoria', $articulos->Categoria);
            $query->bindParam(':IDProd', $articulos->IDProd);
            $resultado = $query->execute();
            $filasAf = $query->rowCount();
            if ($filasAf == 0) {
                $resultado = false;
            }
            //$str = "valor";
            //$resultado = $query->fetch(); // return (PDOStatement) or false on failure
            //$query->close();
            return $resultado;
        } catch (PDOException $e) {
            return var_dump($e);
        } finally {
            $pdo = null;
        }
    } //end actualizar
}
