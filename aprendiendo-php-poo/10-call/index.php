<?php

class Persona{

    private $name;
    private $age;
    private $city;

    public function __construct($name, $age, $city)
    {
        $this->name = $name;
        $this->age = $age;
        $this->city = $city;
    }

    public function __call($name, $arguments)
    {
        if(substr($name,0,3)=='get'){
            $metodo = (substr(strtolower($name),3));

            if(isset($this->$metodo))
                return $this->$metodo;
            else return "El método no existe";
        }
    }

}

$person= new Persona('Arturo', '10', 'Granada');

echo $person->getName();
echo $person->getAge();
echo $person->getCity();
echo $person->getVillage();