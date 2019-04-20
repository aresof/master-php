<?php

trait Utilidades{
    public function mostrarNombre(){
        echo "<h1> El nombre es ". $this->nombre ."</h1>";
    }
}

class Coche{
    public $nombre;
    public $marca;

    use Utilidades; //TRAIT
}

class Persona{
    public $nombre;
    public $apellidos;
}

class VideoJuego{
    public $nombre;
    public $anio;
}


$coche = new Coche();
$coche->nombre = 'CLIO';
$persona = new Persona();
$videojuego = new VideoJuego();

$coche->mostrarNombre();
