<?php

require_once 'entidades/articulo.php';

class Apiarticulos_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        //define un arreglo en php
        //$items = array();
        $items = [];
        try {
            //$urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            $urlDefecto = constant('URL') . '/public/imagenes/articulos/imagenDefecto.svg';
            $query = $this->db->connect()->query('SELECT IDProd,NomProd,Descripcion,Precio,Stock,Estado,Categoria FROM articulos');
            while ($row = $query->fetch()) {
                $item = new Articulos();
                $item->IDProd = $row['IDProd'];
                $item->NomProd = $row['NomProd'];
                $item->Descripcion = $row['Descripcion'];
                $item->Precio = $row['Precio'];
                $item->Stock = $row['Stock'];
                $item->Estado = $row['Estado'];
                $item->Categoria = $row['Categoria'];

                $item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    } //end listar

    public function crear($articulos)
    {

        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('insert into articulos (NomProd, Descripcion,Precio, Stock, Estado, Categoria) values (:NomProd, :Descripcion, :Precio, :Stock, :Estado, :Categoria)');
            $query->bindParam(':NomProd', $articulos->nombre);
            $query->bindParam(':Descripcion', $articulos->Descripcion);
            $query->bindParam(':Precio', $articulos->Precio);
            $query->bindParam(':Stock', $articulos->Stock);
            $query->bindParam(':Estado', $articulos->Estado);
            $query->bindParam(':Categoria', $articulos->Categoria);
            $lastInsertId = 0;
            if ($query->execute()) {
                $lastInsertIDProd = $pdo->lastInsertIdProd();
            } else {
                //Pueden haber errores, como clave duplicada
                $lastInsertIDProd = -1;
                //echo $consulta->errorInfo()[2];
            }
            //$query->close();
            return $lastInsertIDProd;
        } catch (PDOException $e) {
            return -1;
        } finally {
            $pdo = null;
        }
    } //end crear
    public function crearm($lista)
    {

        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('insert into productos (NomProd, Descripcion,Precio,Stock, Estado, Categoria) values (:NomProd, :Descripcion, :Precio, :Stock, :Estado, :Categoria)');
            foreach ($lista as $key => $articulos) {
                $query->bindParam(':NomProd', $articulos->NomProd);
                $query->bindParam(':Descripcion', $articulos->Descripcion);
                $query->bindParam('Precio', $articulos->Precio);
                $query->bindParam(':Stock', $articulos->Stock);
                $query->bindParam(':Estado', $articulos->Estado);
                $query->bindParam(':Categoria', $articulos->Categoria);
                $query->execute();
            }
            //$query->close();
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            $pdo = null;
        }
    } //end crearm
    //create insert
    //read select
    //update update
    //delete delete
    public function borrar($IDProd)
    {
        $resultado = false;
        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('delete from articulos where IDProd=:IDProd');
            $query->bindParam(':IDProd', $IDProd);
            if ($query->execute()) {
                $resultado = true;
            }
            //$query->close();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        } finally {
            $pdo = null;
        }
    } //end crearm

    public function actualizar($articulos)
    {

        $resultado = false;
        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('UPDATE articulos SET NomProd=:NomProd, Descripcion=:Descripcion, Precio= :Precio, Stock= :Stock, Estado= :Estado, Categoria= :Categoria WHERE IDProd = :IDProd');
            $query->bindParam(':NomProd', $articulos->NomProd);
            $query->bindParam(':Descripcion', $articulos->Descripcion);
            $query->bindParam(':Precio', $articulos->Precio);
            $query->bindParam(':Stock', $articulos->Stock);
            $query->bindParam(':Estado', $articulos->Estado);
            $query->bindParam(':Categoria', $articulos->Categoria);
            $query->bindParam(':IDProd', $articulos->IDProd);
            $lastInsertId = 0;
            $resultado = $query->execute();
            //$query->close();
            return $resultado;
        } catch (PDOException $e) {
            return -1;
        } finally {
            $pdo = null;
        }
    } //end actualizar

    public function ver($IDProd)
    {
        $articulo = null;
        try {
<<<<<<< HEAD
            $urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            $query = $this->db->connect()->query('SELECT id, nombre, descripcion, precio, url_foto FROM productos');
            while ($row = $query->fetch()) {
                $item = new Articulo();
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->descripcion = $row['descripcion'];
                $item->precio = $row['precio'];
                $item->url = !isset($row['url_foto']) ? (constant('URL') . $row['url_foto']) : $urlDefecto;
                //$item->url = constant('URL') . $row['url_foto'] ?? $urlDefecto;
=======
            $query = $this->db->connect()->prepare('SELECT IDProd, NomProd, Descripcion, Precio, Stock, Estado, Categoria FROM articulos WHERE id=:nnn');
            $query->bindValue(':nnn', $IDProd);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            while ($row = $query->fetch()) {
                $articulos = new Articulos();
                $articulos->idprod = $row['IDProd'];
                $articulos->NomProd = $row['NomProd'];
                $articulos->Descripcion = $row['Descripcion'];
                $articulos->Precio = $row['Precio'];
                $articulos->Stock = $row['Stock'];
                $articulos->Estado = $row['Estado'];
                $articulos->Categoria = $row['Categoria'];
>>>>>>> axel
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $articulos;
    } //end ver

} //end Model