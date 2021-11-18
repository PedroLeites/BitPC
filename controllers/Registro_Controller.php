<?php

class Registro_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->resultadoRegistro = "";
    }

    public function render()
    {
        $this->view->render('registro/index');
    }

    public function registrarse()
    {
        try {
            if (!isset($_POST['registrarse'])) {
                throw new Exception("no se ha registrado");
            }
            if (!isset($_POST['correo'])) {
                throw new Exception("no se ha registrado");
            }
            if (!isset($_POST['nombre'])) {
                throw new Exception("no se ha registrado");
            }
            if (!isset($_POST['apellido'])) {
                throw new Exception("no se ha registrado");
            }
            if (!isset($_POST['fechanac'])) {
                throw new Exception("no se ha registrado");
            }
            if (!isset($_POST['direccion'])) {
                throw new Exception("no se ha registrado");
            }
            if (!isset($_POST['telefono'])) {
                throw new Exception("no se ha registrado");
            }
            if (!isset($_POST['password'])) {
                throw new Exception("no se ha registrado");
            }
            $correo    = $_POST['correo'];
            $nombre    = $_POST['nombre'];
            $apellido  = $_POST['apellido'];
            $fechanac  = $_POST['fechanac'];
            $direccion = $_POST['direccion'];
            $telefono  = $_POST['telefono'];
            $password  = $_POST['password'];
            $resultado = $this->model->registrarse($correo, $nombre, $apellido, $fechanac, $direccion, $telefono, $password);
            if ($resultado->resultado) {
                $this->view->nombre = $nombre;
                $this->view->render('registro/registrado');
            } else {

                $this->view->resultadoRegistro = "Debe compretar todos los campos del formulario";
                $this->view->render('registro/index');
            }
        } catch (Exception $ex) {
            //throw $th;
            $this->view->error = $ex->getMessage();
        }
        // compruebo si se apretó el botón
    }
}