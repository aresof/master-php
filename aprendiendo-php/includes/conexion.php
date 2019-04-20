<?php
//Conexion
$server = 'localhost:8889';
$username = 'artu';
$password = 'artu';
$database = 'blog_php';
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");
