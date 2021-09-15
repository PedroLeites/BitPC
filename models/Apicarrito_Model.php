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
        $pdo = $this->db->connect();
        $pdo->beginTransaction();
        try {
            $fecha = date('Y-m-d h:i:s', time());
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
                $query->execute();
            }
            $pdo->commit();
            return true;
            // Si hay una exception, vuelve a insertar
        } catch (PDOException $e) {
            $pdo->rollBack();
            return false;
            // finally para liberar espacio
        } finally {
            $pdo = null;
        }
    }

}
