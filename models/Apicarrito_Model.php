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
        $pdo = $this->db->connect();
        $pdo->beginTransaction();
        try {
            $fecha = date('Y-m-d h:i:s', time());
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
            $query = $pdo->prepare('insert into item (IDProd, NomProd,Descripcion,Precio, Stock, Estado, Categoria, IDPedidos) VALUES (:IDProd, :NomProd, :Descripcion, :Precio, :Stock, :Estado, :Categoria, :IDPedidos)');
            // le paso los parámetros a lista
            foreach ($lista as $key => $articulos) {
                $query->bindParam(':IDProd', $articulos->IDProd);
                $query->bindParam(':NomProd', $articulos->NomProd);
                $query->bindParam(':Descripcion', $articulos->Descripcion);
                $query->bindParam(':Precio', $articulos->Precio);
                $query->bindParam(':Stock', $articulos->Stock);
                $query->bindParam(':Estado', $articulos->Estado);
                $query->bindParam(':Categorias', $articulos->Categorias);
                $query->bindParam(':IDPedidos', $lastInsertIDPedidos);
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
