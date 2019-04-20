<?php

namespace MisClases;

class Categoria{

    public $name;
    public $descripcion;

    public function __construct()
    {
        $this->name = "Deportes";
        $this->descripcion = "Juegos dedicados a actividades deportivas";
    }

}