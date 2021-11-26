<?php
require_once 'entidades/articulo.php';
require_once 'models/Stock_Model.php';

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
            //$urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            $urlDefecto = constant('URL') . 'public/img/articulos/imgDefecto.svg';
            $query      = $this->db->connect()->query('SELECT id, nombre, descripcion, precio, estado, stock, categoria, url_foto FROM productos');
            while ($row = $query->fetch()) {
                $item              = new Articulo();
                $item->id          = $row['id'];
                $item->nombre      = $row['nombre'];
                $item->descripcion = $row['descripcion'];
                $item->precio      = $row['precio'];
                $item->estado      = $row['estado'];
                $stock             = $row['stock'];
                $modeloStock       = new Stock_Model();
                $totalVentas       = $modeloStock->calcularStock($item->id);
                $item->stock       = floatval($stock) - floatval($totalVentas);
                $item->categoria   = $row['categoria'];
                $item->url         = isset($row['url_foto']) ? constant('URL') . $row['url_foto'] : $urlDefecto;
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function listar()
    {
        //define un arreglo en php
        //$items = array();
        $items = [];
        try {
            //$urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            $urlDefecto = constant('URL') . 'public/img/articulos/imgDefecto.svg';
            $query      = $this->db->connect()->query('SELECT id, nombre, descripcion, precio, estado, stock, categoria, url_foto FROM productos WHERE estado LIKE "activo"');
            while ($row = $query->fetch()) {
                $item              = new Articulo();
                $item->id          = $row['id'];
                $item->nombre      = $row['nombre'];
                $item->descripcion = $row['descripcion'];
                $item->precio      = $row['precio'];
                $item->estado      = $row['estado'];
                $item->stock       = $row['stock'];
                $item->categoria   = $row['categoria'];
                $item->url         = isset($row['url_foto']) ? constant('URL') . $row['url_foto'] : $urlDefecto;
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function verArticulo($id)
    {
        $articulo = null;
        try {
            $query = $this->db->connect()->prepare('SELECT id, nombre, descripcion, precio, estado, stock, categoria FROM productos WHERE id=:id');
            $query->bindValue(':id', $id);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            while ($row = $query->fetch()) {
                $articulo              = new Articulo();
                $articulo->id          = $row['id'];
                $articulo->nombre      = $row['nombre'];
                $articulo->descripcion = $row['descripcion'];
                $articulo->precio      = $row['precio'];
                $articulo->estado      = $row['estado'];
                $articulo->stock       = $row['stock'];
                $articulo->categoria   = $row['categoria'];
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $articulo;
    } //end ver

    public function actualizar($articulo)
    {
        $resultado = false;
        $pdo       = $query       = $this->db->connect();
        try {
            $query = $pdo->prepare('UPDATE productos SET nombre=:nombre, descripcion=:descripcion, precio= :precio, estado=:estado, stock=:stock, categoria=:categoria, url_foto=:url_foto WHERE id= :id');
            $query->bindParam(':nombre', $articulo->nombre);
            $query->bindParam(':descripcion', $articulo->descripcion);
            $query->bindParam(':precio', $articulo->precio);
            $query->bindParam(':estado', $articulo->estado);
            $query->bindParam(':stock', $articulo->stock);
            $query->bindParam(':stock', $articulo->stock);
            $query->bindParam(':categoria', $articulo->categoria);
            $query->bindParam(':url_foto', $articulo->url);
            $query->bindParam(':id', $articulo->id);
            $resultado = $query->execute();
            $filasAf   = $query->rowCount();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        } finally {
            $pdo = null;
        }
    } //end actualizar

    public function creado($articulo, $llegoImg)
    {

        $urlDefecto = constant('URL') . 'public/img/articulos/imgDefecto.svg';
        //$urlDefecto = constant('URL') . 'public/img/articulos/imgDefecto.svg';
        $pdo = $this->db->connect();
        try {
            $query = $pdo->prepare('insert into productos (nombre, descripcion, precio, estado, stock, categoria, url_foto) values (:nombre, :descripcion, :precio, :estado, :stock, :categoria, :url_foto)');
            $query->bindParam(':nombre', $articulo->nombre);
            $query->bindParam(':descripcion', $articulo->descripcion);
            $query->bindParam(':precio', $articulo->precio);
            $query->bindParam(':estado', $articulo->estado);
            $query->bindParam(':stock', $articulo->stock);
            $query->bindParam(':categoria', $articulo->categoria);
            $query->bindParam(':url_foto', $articulo->url);
            $lastInsertId = 0;
            if ($query->execute()) {
                $lastInsertId = $pdo->lastInsertId();
                if ($llegoImg) {
                    $query   = $pdo->prepare('UPDATE productos SET url_foto=:url_foto WHERE id= :id');
                    $fotoUrl = $articulo->urlBase . $lastInsertId . "." . $articulo->ext;
                    $query->bindParam(':url_foto', $fotoUrl);
                    $query->bindParam(':id', $lastInsertId);
                    $query->execute();
                }

            } else {
                //porque pueden haber errores, como clave duplicada
                $lastInsertId = -1;
            }
            return $lastInsertId;
        } catch (PDOException $e) {
            return -1;
        } finally {
            $pdo = null;
        }
    }

    public function buscar($texto)
    {
        $articulos = [];
        try {
            //$urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            $urlDefecto = constant('URL') . 'public/img/articulos/imgDefecto.svg';
            $query      = $this->db->connect()->prepare('SELECT id, nombre, descripcion, precio, estado, url_foto FROM productos WHERE nombre LIKE :e1 or descripcion LIKE :e2 or id LIKE :e3 or categoria LIKE :e4');
            $txt01      = "%" . $texto . "%";
            $query->bindParam(':e1', $txt01);
            $query->bindParam(':e2', $txt01);
            $query->bindParam(':e3', $txt01);
            $query->bindParam(':e4', $txt01);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            while ($row = $query->fetch()) {
                $articulo              = new Articulo();
                $articulo->id          = $row['id'];
                $articulo->nombre      = $row['nombre'];
                $articulo->descripcion = $row['descripcion'];
                $articulo->precio      = $row['precio'];
                $articulo->estado      = $row['estado'];
                $articulo->url         = isset($row['url_foto']) ? constant('URL') . $row['url_foto'] : $urlDefecto;
                $articulos[]           = $articulo;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $articulos;

    }

    public function verInfo($id)
    {
        $articulo = null;
        try {
            $query = $this->db->connect()->prepare('SELECT id, nombre, descripcion, precio, estado, url_foto FROM productos WHERE id=:id');
            $query->bindValue(':id', $id);
            $query->execute();
            while ($row = $query->fetch()) {
                $articulo              = new Articulo();
                $articulo->id          = $row['id'];
                $articulo->nombre      = $row['nombre'];
                $articulo->descripcion = $row['descripcion'];
                $articulo->precio      = $row['precio'];
                $articulo->precio      = $row['precio'];
                $articulo->url         = isset($row['url_foto']) ? constant('URL') . $row['url_foto'] : $urlDefecto;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $articulo;
    }

}