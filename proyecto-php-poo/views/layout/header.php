<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/css/styles.css" />
</head>
<body>
<div id="container">

    <!-- CABECERA -->
    <header id="header">
        <div id="logo">
            <img src="<?= base_url ?>assets/img/camiseta.png">
            <a href="<?= base_url ?>">Tienda de Camisetas</a>
        </div>
    </header>

    <!-- MENU -->
    <nav id="menu">
        <ul>
            <li>
                <a href="<?=base_url?>">Inicio</a>
            </li>
            <?php
                  $categorias = Utils::showCategorias();
                  while($cat = $categorias->fetch_object()):
            ?>
                    <li>
                        <a href="<?= base_url ?>categoria/ver&id=<?= $cat->id ?>"><?=$cat->nombre?></a>
                    </li>
            <?php endwhile; ?>
        </ul>
    </nav>