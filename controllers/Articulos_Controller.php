<?php
require_once 'entidades/articulo.php';
require_once 'utils/Utils.php';
require_once 'vendor/autoload.php';
require_once 'auth/Auth.php';

class Articulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //http://localhost/proyectofinal3bj/BitPC/articulos
    public function render()
    {
        //$articulos             = $this->model->get();
        //$this->view->articulos = $articulos;
        //$this->view->render('articulos/index');
        try {
            //code...
            $token = $_SESSION["token"];
            //$token    = substr($tokenAux, 7, strlen($tokenAux));
            Auth::Check($token);
            $role = Auth::GetData($token)->rol;
            if ($role != 'admin') {
                throw new Exception("no tiene autorizacion");
            }
            $articulos             = $this->model->get();
            $this->view->articulos = $articulos;
            $this->view->render('articulos/index');
        } catch (Exception $th) {
            $this->view->mensaje = "no autorizado";
            $this->view->render('errores/index');
        }
    }

    public function verArticulo($param = null)
    {
        $idArticulo = $param[0];
        $articulo   = $this->model->verArticulo($idArticulo);

        $_SESSION["id_articulo"] = $idArticulo;

        $this->view->articulo = $articulo;
        $this->view->render('articulos/verArticulo');
    }

    public function actualizar($param = null)
    {
        //var_dump($_POST);
        $resultado = true;
        try {
            $articulo              = new Articulo();
            $articulo->id          = $_POST['articuloId'];
            $articulo->nombre      = $_POST['nombre'];
            $articulo->descripcion = $_POST['descripcion'];
            $precioSF              = $_POST['precio'];
            $precio                = floatval($precioSF);
            $articulo->precio      = number_format((float) $precio, 2, '.', '');
            $articulo->estado      = $_POST['estado'];
            $pathImg               = $_FILES['img']['tmp_name'];
            $tmpName               = $_FILES['img']['name'];
            $array                 = explode(".", $tmpName);
            $ext                   = $array[count($array) - 1];
            $ruta                  = 'public/img/articulos/' . $articulo->id . "." . $ext;
            $articulo->url         = $ruta;
            $resultado             = $this->model->actualizar($articulo);
            move_uploaded_file($pathImg, $ruta);
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

    public function crear()
    {
        # code...
        $articulo = new Articulo();
    }

}