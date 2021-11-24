<?php

require_once 'entidades/pedido.php';

class Pedidos_Model extends Model
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
            $query = $this->db->connect()->query('SELECT DISTINCT (p.id) as id,  u.email, concat(u.nombre, " ", u.apellido) as "usuario", u.direccion, p.fecha, p.estado FROM pedido p INNER JOIN usuarios u on p.usuario_id= u.id');
            //$query = $this->db->connect()->query('SELECT p.id as id, email, concat(nombre, " ", apellido) as "usuario", direccion, fecha, estado, articulo_id, cantidad FROM pedido p, usuarios u, item i WHERE p.usuario_id = u.id AND p.id = i.pedido_id');
            while ($row = $query->fetch()) {
                $item            = new Pedido();
                $item->id        = $row['id'];
                $item->email     = $row['email'];
                $item->usuario   = $row['usuario'];
                $item->direccion = $row['direccion'];
                //$fecha = DateTime::createFromFormat('Y-m-d H:i:s', $row['fecha']);
                $stamp = $row['fecha']; // get unix timestamp
                //$time_in_ms = $stamp * 1000;
                $item->fecha  = $stamp;
                $item->estado = $row['estado'];

                //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;

                //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function cambiarEstado($idPedido, $estado)
    {
        $resultado = false;
        $pdo       = $this->db->connect();
        try {
            $query = $pdo->prepare('UPDATE pedido SET estado=:estado WHERE id= :id');
            $query->bindParam(':estado', $estado);
            $query->bindParam(':id', $idPedido);
            $resultado = $query->execute();
            $filasAf   = $query->rowCount();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        } finally {
            $pdo = null;
        }
    } //end ver

    public function verDetalle($idPedido)
    {

    }

    public function historial($idUser)
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT p.id as id, a.nombre as nombre, cantidad, direccion, fecha, p.estado as estado FROM pedido p, usuarios u, item i, productos a WHERE p.usuario_id = u.id AND p.id = i.pedido_id AND i.articulo_id = a.id AND u.id = 2 AND p.estado = "entregado"');
            while ($row = $query->fetch()) {
                $item               = new Pedido();
                $item->id           = $row['id'];
                $item->nombreProd   = $row['nombre'];
                $item->cantidadProd = $row['cantidad'];
                $item->direccion    = $row['direccion'];
                $stamp              = $row['fecha'];
                $item->fecha        = $stamp;
                $item->estado       = $row['estado'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

}