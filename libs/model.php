<?php

class Model
{
    public $db;

    public function __construct()
    {
        //echo "<p>Modelo principal</p>";
        $this->db = new Database();
    }
}
