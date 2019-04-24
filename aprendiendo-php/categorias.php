<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<?php
    $categoria = conseguirCategoria($db,$_GET["id"]);
    $cat = mysqli_fetch_assoc($categoria);

    if(mysqli_num_rows($categoria) < 1)
        header('Location: index_maqueta.php');
?>

    <!-- PRINCIPAL-->
    <div id="principal">

        <h1>Entradas de <?= $cat["nombre"]?></h1>
        <?php
            $entradas = conseguirEntradas($db,null, $_GET['id']);
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
            <div class="alerta">No existe entradas en esta categoría</div>
                <?php
            endif;
            ?>

    </div>

<?php require_once 'includes/pie.php';