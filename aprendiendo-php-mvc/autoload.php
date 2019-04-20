<?php

function autocargar($clasename){
    include 'controllers/' . $clasename . '.php';
}

spl_autoload_register('autocargar');