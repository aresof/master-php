<?php
 require 'configuracion.php';

 Configuracion::setColor('blue');
 Configuracion::setEntorno('localhost');
 Configuracion::setNewsletter('true');

 echo Configuracion::$color;
 echo '<br/>';
