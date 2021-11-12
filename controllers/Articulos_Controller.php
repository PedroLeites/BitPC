<?php
require_once 'entidades/articulos.php';

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
        $IDProd = $param[0];
        $articulos = $this->model->verArticulo($IDProd);

        $_SESSION["IDProd"] = $IDProd;

        $this->view->articulos = $articulos;
        $this->view->render('articulos/verArticulo');
    }

    public function actualizar($param = null)
    {
        //var_dump($_POST);
        $resultado = true;
        try {
            $articulos = new Articulos();
            $articulos->IDProd = $_POST['IDProd'];
            $articulos->Nombre = $_POST['Nombre'];
            $articulos->Descripcion = $_POST['Descripcion'];
            $articulos->Precio = $_POST['Precio'];
            $articulos->Stock = $_POST['Stock'];
            $articulos->Estado = $_POST['Estado'];
            $articulos->Categoria = $_POST['Categoria'];
            $articulos->URL_Foto = $_POST['URL_Foto'];
            $precioSF = $_POST['Precio'];
            $precio = floatval($precioSF);
            $articulos->Precio = number_format((float) $Precio, 2, '.', '');
            $pathImg = $_FILES['img']['tmp_name'];
            $tmpName = $_FILES['img']['name'];
            $array = explode(".", $tmpName);
            $ext = $array[count($array) - 1];
            $ruta = 'public/img/articulos/' . $articulos->IDProd . "." . $ext;
            $articulos->url = $ruta;
            $resultado = $this->model->actualizar($articulos);
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

}
