<?php
require_once 'entidades/articulo.php';

class Apiarticulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //localahost/proyectofinal3bj/BitPC/apiarticulos/
    public function render()
    {

        $listaArticulos = $this->model->listar();
        $respuesta = [
            "datos" => $listaArticulos,
            "totalResultados" => count($listaArticulos),
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/articulos/listar');
    }

    public function listar()
    {

        $listaArticulos = $this->model->listar();
        $respuesta = [
            "articulosDisponibles" => $listaArticulos,
            "totalResultados" => count($listaArticulos),
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api/articulos/listar');
    }

    public function crear()
    {

        //obtengo los datos de la peticion http, post body
        $json = file_get_contents('php://input');
        //convierto en un array asociativo de php
        $obj = json_decode($json);

        $articulo = new Articulo();
        $articulo->nombre = $obj->nombre;
        $articulo->descripcion = $obj->descripcion;
        $articulo->precio = $obj->precio;
        $articulo->estado = $obj->estado;
        //$articulo->fecha = $obj->fecha;
        //array_push($listaArticulos, $articulo);
        //$items[] = $item;

        $resultado = $this->model->crear($articulos);
        //$articulo->id = $obj->id;
        //$articulo->nombre = $obj->nombre;
        //$articulos = $this->model->get();
        //$this->view->articulos = json_encode($articulos);
        //$listaObjetos = json_encode($listaArticulos);

        $respuesta = [
            "IDProd" => $resultado,
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api/articulos/crear');
        //var_dump($this);
        //var_dump($this->view);
    } //end crear

    public function crearm()
    {
        //obtengo los datos de la peticion http, post body
        $json = file_get_contents('php://input');
        //convierto en un array asociativo de php
        $listaArticulos = json_decode($json);
        $lista = [];
        foreach ($listaArticulos as $key => $obj) {
            $articulo = new Articulo();
            $articulo->nombre = $obj->nombre;
            $articulo->descripcion = $obj->descripcion;
            $articulo->precio = $obj->precio;
            //$lista[] = $articulo;
            array_push($lista, $articulos);
        }

        $resultado = $this->model->crearm($lista);

        $respuesta = [
            "IDProd" => $resultado,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/articulos/crearm');

    }

    public function borrar($param)
    {
        $id = $param[0];
        $resultado = $this->model->borrar($id);
        $verboHTTP = $_SERVER['REQUEST_METHOD'];
        $respuesta = [
            "IDProd" => $IDProd,
            "resultado" => $resultado,
            "verboHTTP" => $verboHTTP,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/articulos/borrar');
    } //end borrar

    public function actualizar()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $articulo = new Articulo();
        $articulo->id = $obj->id;
        $articulo->nombre = $obj->nombre;
        $articulo->descripcion = $obj->descripcion;
        $articulo->precio = $obj->precio;
        $resultado = $this->model->actualizar($articulo);
        $verboHTTP = $_SERVER['REQUEST_METHOD'];
        $respuesta = [
            "ArituloId" => $articulo->id,
            "resultado" => $resultado,
            "verboHTTP" => $verboHTTP,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/articulos/crearm');
    } //end update

    public function ver($param)
    {
        $id = $param[0];
        $articulo = $this->model->ver($id);
        $verboHTTP = $_SERVER['REQUEST_METHOD'];
        $respuesta = [
            "IDProd" => $articulos->IDProd,
            "datos" => $articulos,
            "verboHTTP" => $verboHTTP,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/articulos/ver');
    } // end ver
}
