<?php
require_once 'libs/model.php';
class Stock_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function calcularStock($id)
    {

        //SELECT stock FROM `productos`WHERE id=3
        //SELECT SUM(cantidad)as totVentas FROM `item` WHERE articulo_id=3
        $totalVentas = 0;
        $pdo         = $this->db->connect();
        try {
            $query = $pdo->prepare('SELECT SUM(cantidad) as totVentas FROM item WHERE articulo_id=:id');
            //$query->bindParam(':total', $total);
            $query->bindParam(':id', $id);
            $query->execute();
            $totalVentas = $query->fetchColumn();

            return $totalVentas;
        } catch (PDOException $e) {
            return $totalVentas;
        }

    }

}