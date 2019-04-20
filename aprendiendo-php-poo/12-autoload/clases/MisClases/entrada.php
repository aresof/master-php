<?php

namespace MisClases;

class Entrada{

    public $name;
    public $descripcion;

    public function __construct()
    {
        $this->name = "Los mejores jugadores";
        $this->descripcion = "Listado de los mejores jugadores actualmente";
    }

}