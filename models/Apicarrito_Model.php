<?php
require_once 'entidades/articulo.php';
class Apicarrito_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function completarCarrito($lista, $usuario)
    {
        $salida = new StdClass;
        $pdo    = $this->db->connect();
        $pdo->beginTransaction();
        try {
            $total = 0;
            $fecha = date('Y-m-d H:i:s', time());
            $query = $pdo->prepare('insert into pedido (usuario_id, fecha) VALUES (:idUsuario, :fecha)');
            $query->bindParam(':idUsuario', $usuario);
            $query->bindParam(':fecha', $fecha);
            $lastInsertId = 0;
            if ($query->execute()) {
                $lastInsertId = $pdo->lastInsertId();
            } else {
                //por si hay errores
                $lastInsertId = -1;
            }
            // inserto en la base de datos
            $query = $pdo->prepare('insert into item (articulo_id, cantidad, precio, pedido_id) VALUES (:articulo_id, :cantidad, :precio, :pedido_id)');
            // le paso los parámetros a lista
            foreach ($lista as $key => $articulo) {
                $query->bindParam(':articulo_id', $articulo->id);
                $query->bindParam(':cantidad', $articulo->cantidad);
                $query->bindParam(':precio', $articulo->precio);
                $query->bindParam(':pedido_id', $lastInsertId);
                $cantidadFloat = floatval($articulo->cantidad);
                $precioFloat   = floatval($articulo->precio);
                $total += ($cantidadFloat * $precioFloat);
                $query->execute();
            }
            $pdo->commit();

            //con la otra consulta actualiza el total
            $query = $pdo->prepare('UPDATE pedido SET total=:total WHERE id= :id');
            $query->bindParam(':total', $total);
            $query->bindParam(':id', $lastInsertId);
            $query->execute();

            $salida->pedidoId = $lastInsertId;
            $salida->res      = true;
            return $salida;
            // Si hay una exception, vuelve a insertar
        } catch (PDOException $e) {
            $pdo->rollBack();
            $salida->pedidoId = -1;
            $salida->res      = false;
            return $salida;
            // finally para liberar espacio
        } finally {
            $pdo = null;
        }
    }

}