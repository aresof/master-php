<?php

abstract class Ordenador{
    public $encendido;

    abstract public function encender();

    public function apagar(){
        $this->encendido = false;
    }
}

class PCAsus extends Ordenador{

    public function encender()
    {
        $this->encendido = true;
    }
}


$pc = new PCAsus();
$pc->encender();
$pc->apagar();

var_dump($pc);