<?php

namespace MisClases;

class Usuario{

    public $name;
    public $email;

    public function __construct()
    {
        $this->name = "Arturo";
        $this->email = "arturo@arturo.es";
    }

}