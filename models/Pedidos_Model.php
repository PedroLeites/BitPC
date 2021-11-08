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
            $query = $this->db->connect()->query('SELECT p.id as id, nombre, fecha FROM pedido p INNER JOIN usuarios u on p.usuario_id=u.id');
            while ($row = $query->fetch()) {
                $item = new Pedido();
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                //$fecha = DateTime::createFromFormat('Y-m-d H:i:s', $row['fecha']);
                $stamp = $row['fecha']; // get unix timestamp
                //$time_in_ms = $stamp * 1000;
                $item->fecha = $stamp;

                //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;

                //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

}