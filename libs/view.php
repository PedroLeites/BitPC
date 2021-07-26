<?php

class View
{

    public function __construct()
    {
        //$this->var = 123;
        //echo "<p>Vista principal</p>";
    }

    public function render($nombre)
    {
        require 'views/' . $nombre . '.php';
    }
}
