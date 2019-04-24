<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<?php

if(!isset($_POST['busqueda'])){
    header('Location: index_maqueta.php');
}

?>

    <!-- PRINCIPAL-->
    <div id="principal">

        <h1>Busqueda de: <?= $_POST["busqueda"] ?></h1>
        <?php
        $entradas = conseguirEntradas($db,null, null, $_POST["busqueda"]);
        if(mysqli_num_rows($entradas)):
            while ($entrada = mysqli_fetch_assoc($entradas)):
                ?>
                <article class="entrada">
                    <a href="entrada.php?id=<?=$entrada["id"]?>">
                        <h2><?= $entrada["titulo"]?></h2>
                        <span class="fecha"><?= $entrada["categoria"] ?> | <?= $entrada["fecha"] ?></span>
                        <p><?= substr($entrada["descripcion"],0,200) ?>...</p>
                    </a>
                </article>
            <?php
            endwhile;
        else:
            ?>
            <div class="alerta">No existe entradas para: <?= $_POST["busqueda"] ?></div>
        <?php
        endif;
        ?>

    </div>

<?php require_once 'includes/pie.php';