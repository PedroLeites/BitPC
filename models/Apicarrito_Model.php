<?php
require_once 'entidades/articulo.php';
class Apicarrito_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function completarCarrito($lista, $personas)
    {
        $salida = new StdClass;
        $pdo = $this->db->connect();
        $pdo->beginTransaction();
        try {
            $total = 0;
            $fecha = date('Y-m-d H:i:s', time());
            $query = $pdo->prepare('insert into pedido (ID, FechaNac) VALUES (:ID, :FechaNac)');
            $query->bindParam(':ID', $personas);
            $query->bindParam(':FechaNac', $fechaNac);
            $lastInsertID = 0;

            if ($query->execute()) {
                $lastInsertID = $pdo->lastInsertId();
            } else {
                //por si hay errores
                $lastInsertID = -1;
            }
            // inserto en la base de datos
            $query = $pdo->prepare('insert into item (IDProd, NomProd,Descripcion,Precio, Stock, Estado, Categoria, IDPedidos, URL_Foto) VALUES (:IDProd, :NomProd, :Descripcion, :Precio, :Stock, :Estado, :Categoria, :URL_Foto, :IDPedidos)');
            // le paso los parámetros a lista
            foreach ($lista as $key => $articulo) {
                $query->bindParam(':articulo_id', $articulo->id);
                $query->bindParam(':cantidad', $articulo->cantidad);
                $query->bindParam(':precio', $articulo->precio);
                $query->bindParam(':pedido_id', $lastInsertId);
                $cantidadFloat = floatval($articulo->cantidad);
                $precioFloat = floatval($articulo->precio);
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
            $salida->res = true;
            return $salida;
            // Si hay una exception, vuelve a insertar
        } catch (PDOException $e) {
            $pdo->rollBack();
            $salida->pedidoId = -1;
            $salida->res = false;
            return $salida;
            // finally para liberar espacio
        } finally {
            $pdo = null;
        }
    }

}
