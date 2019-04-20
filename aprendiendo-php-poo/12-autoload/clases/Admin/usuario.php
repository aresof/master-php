<?php

namespace Admin;

class Usuario{

    public $name;
    public $email;

    public function __construct()
    {
        $this->name = "Alex";
        $this->email = "alex@alex.es";
    }

}