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
        // compruebo si se apretó el botón
        if (isset($_POST['registrarse'])) {
            // compruebo que los campos no estén vacíos
            if (strlen($_POST['correo']) >= 1 &&
                strlen($_POST['nombre']) >= 1 &&
                strlen($_POST['apellido']) >= 1 &&
                strlen($_POST['fechanac']) >= 1 &&
                strlen($_POST['direccion']) >= 1 &&
                strlen($_POST['password']) >= 1) {
                $correo    = $_POST['correo'];
                $nombre    = $_POST['nombre'];
                $apellido  = $_POST['apellido'];
                $fechanac  = $_POST['fechanac'];
                $direccion = $_POST['direccion'];
                $password  = $_POST['password'];
                // llamo al modelo
                $resultado = $this->model->registrarse($correo, $nombre, $apellido, $fechanac, $direccion, $password);
            } else {
                $this->view->resultadoRegistro = "Debe compretar todos los campos del formulario";
                $this->view->render('registro/index');
            }
        }
    }
}