<?php
require_once 'entidades/articulo.php';

class Articulos_Controller extends Controller
{
    public function __construct()
    {

        $cambio = "a eliminar";
        parent::__construct();
        $this->view->mensaje = "";
    }

    //http://localhost/proyectofinal3bj/BitPC/articulos
    public function render()
    {
        $articulos = $this->model->get();
        $this->view->articulos = $articulos;
        $this->view->render('articulos/index');
    }

    public function verArticulo($param = null)
    {
        $idArticulo = $param[0];
        $articulo = $this->model->verArticulo($idArticulo);

        $_SESSION["id_articulo"] = $idArticulo;

        $this->view->articulo = $articulo;
        $this->view->render('articulos/verArticulo');
    }

    public function actualizar($param = null)
    {
        //var_dump($_POST);
        $resultado = false;
        try {
            $articulo = new Articulo();
            $articulo->id = $_POST['articuloId'];
            $articulo->nombre = $_POST['nombre'];
            $articulo->descripcion = $_POST['descripcion'];
            $precioSF = $_POST['precio'];
            $precio = floatval($precioSF);
            $articulo->precio = number_format((float) $precio, 2, '.', '');
            $resultado = $this->model->actualizar($articulo);
        } catch (\Throwable $th) {
            $resultado = false;
        }
        $this->view->respuesta = $resultado;
        $this->view->render('articulos/actualizar');
    }

    public function listar($param = null)
    {

        //obtiene todos los articulos
        $articulos = $this->model->get();
        //lo asigna a la varible articulos
        $this->view->articulos = $articulos;
        //lista los articulos
        $this->view->render('articulos/listar');
    }

}