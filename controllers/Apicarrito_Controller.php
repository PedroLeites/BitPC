<?php
require_once 'entidades/carrito.php';
class Apicarrito_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //localhost/proyectofinal3bj/BitPC/Apicarrito/completarCarrito
    public function completarCarrito()
    {
        $json = file_get_contents('php://input');
        //convierto el json en un array asociativo de php
        $datos = json_decode($json);
        $listaArticulos = $datos->lista;
        $personas = $datos->ID;
        //lista = array();
        $lista = [];
        //Crea el objeto carrito con la lista de articulos
        foreach ($listaArticulos as $key => $obj) {
            $articulos = new Carrito();
            $articulos->ID = $obj->ID;
            $articulos->NomProd = $obj->NomProd;
            $articulos->Descripcion = $obj->Descripcion;
            $articulos->Precio = $obj->Precio;
            $articulos->Stock = $obj->Stock;
            $articulos->Estado = $obj->Estado;
            $articulos->Categoria = $obj->Categoria;
            $articulos->URL_Foto = $obj->URL_Foto;
            $lista[] = $articulos;
            //array_push($lista, $articulo);
        }
        //Defino los resultados de las request
        $respuesta = [];
        $resultado = $this->model->completarCarrito($lista, $personas);
        if ($resultado->res) {
            http_response_code(201);
            $respuesta = [
                "datos" => $lista,
                "IDPedidos" => $resultado->IDPedidos,
                "Personas" => $personas,
                "pedRes" => $resultado->res,
                "respuesta" => "Pedido Completado con Éxito",
            ];
            $this->view->respuesta = $respuesta;
        } else {
            http_response_code(400);
            $respuesta = json_encode([
                "resultado" => $resultado,
                "respuesta" => "Error al completar el pedido",
            ]);

        }
        //convierto la respuesta a json
        $this->view->respuesta = json_encode($respuesta);
        //llamo al método render
        $this->view->render('api/carrito/completarcarrito');
    }

}
