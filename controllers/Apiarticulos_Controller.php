<?php
require_once 'entidades/articulo.php';

class Api260260articulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    //localahost/prophp3bj/proyectoPHPComun/Api260260articulos
    public function render()
    {

        $listaArticulos = $this->model->listar();
        $respuesta = [
            "datos" => $listaArticulos,
            "totalResultados" => count($listaArticulos),
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api260260/articulos/listar');
        //var_dump($this);
        //var_dump($this->view);
        //$this->view->render('apilea/articulos/index');
        //var_dump($this);
        //var_dump($this->view);
    }

    public function listar()
    {

        $listaArticulos = $this->model->listar();
        $respuesta = [
            "datos" => $listaArticulos,
            "totalResultados" => count($listaArticulos),
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api260260/articulos/listar');
        //var_dump($this);
        //var_dump($this->view);
        //$this->view->render('apilea/articulos/index');
        //var_dump($this);
        //var_dump($this->view);
    }

    public function crear()
    {
        //obtengo los datos de la peticion http, post body
        $json = file_get_contents('php://input');
        //convierto en un array asociativo de php
        $obj = json_decode($json);

        $articulo = new Articulo();
        $articulo->codigo = $obj->codigo;
        $articulo->descripcion = $obj->descripcion;
        $articulo->precio = $obj->precio;
        $articulo->fecha = $obj->fecha;
        //array_push($listaArticulos, $articulo);
        //$items[] = $item;

        $resultado = $this->model->crear($articulo);
        //$articulo->id = $obj->id;
        //$articulo->nombre = $obj->nombre;
        //$articulos = $this->model->get();
        //$this->view->articulos = json_encode($articulos);
        //$listaObjetos = json_encode($listaArticulos);

        $respuesta = [
            "ArituloId" => $resultado,
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api260260/articulos/crearm');
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
            $articulo->codigo = $obj->codigo;
            $articulo->descripcion = $obj->descripcion;
            $articulo->precio = $obj->precio;
            $articulo->fecha = $obj->fecha;
            //$lista[] = $articulo;
            array_push($lista, $articulo);
        }

        $resultado = $this->model->crearm($lista);

        $respuesta = [
            "ArituloId" => $resultado,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api260260/articulos/crearm');

    }

    public function borrar($param)
    {
        $id = $param[0];
        $resultado = $this->model->borrar($id);
        $verboHTTP = $_SERVER['REQUEST_METHOD'];
        $respuesta = [
            "ArituloId" => $id,
            "resultado" => $resultado,
            "verboHTTP" => $verboHTTP,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api260260/articulos/borrar');
    } //end borrar

    public function actualizar()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $articulo = new Articulo();
        $articulo->id = $obj->id;
        $articulo->codigo = $obj->codigo;
        $articulo->descripcion = $obj->descripcion;
        $articulo->precio = $obj->precio;
        $articulo->fecha = $obj->fecha;
        $resultado = $this->model->actualizar($articulo);
        $verboHTTP = $_SERVER['REQUEST_METHOD'];
        $respuesta = [
            "ArituloId" => $articulo->id,
            "resultado" => $resultado,
            "verboHTTP" => $verboHTTP,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api260260/articulos/crearm');
    } //end update

    public function ver($param)
    {
        $id = $param[0];
        $articulo = $this->model->ver($id);
        $verboHTTP = $_SERVER['REQUEST_METHOD'];
        $respuesta = [
            "ArituloId" => $articulo->id,
            "datos" => $articulo,
            "verboHTTP" => $verboHTTP,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api260260/articulos/ver');
    } // end ver
}
