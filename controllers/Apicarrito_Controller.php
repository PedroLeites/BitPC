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
        $usuario = $datos->usuario_id;
        //lista = array();
        $lista = [];
        foreach ($listaArticulos as $key => $obj) {
            $articulo = new Carrito();
            $articulo->id = $obj->id;
            $articulo->cantidad = $obj->cantidad;
            $articulo->precio = $obj->precio;
            $lista[] = $articulo;
            //array_push($lista, $articulo);
        }
        $resultado = $this->model->completarCarrito($lista, $usuario);

        $respuesta = [];
        if ($resultado == true) {
            http_response_code(200);
            $respuesta = [
                "datos" => $lista,
                "totalResultados" => count($lista),
                "usuario" => $usuario,
                "respuesta" => "pedido completado",
            ];
        } else {
            http_response_code(400);
            $respuesta = json_encode([
                "resultado" => $resultado,
                "respuesta" => "error al completar el pedido",
            ]);

        }
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/carrito/completarcarrito');
    }

}
