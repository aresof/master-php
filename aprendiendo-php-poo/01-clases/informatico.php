<?php
/**
 * Created by PhpStorm.
 * User: artuof
 * Date: 04/04/2019
 * Time: 19:27
 */

class Informatico extends Persona
{
    public $lenguajes;

    public function __construct(){
        parent::__construct();
        $this->lenguajes = ['PHP','MySQL','JS','AJAX'];
    }
}