<?php

function controllers_autoload($clasename){
    include 'controllers/' . $clasename . '.php';
}

spl_autoload_register('controllers_autoload');