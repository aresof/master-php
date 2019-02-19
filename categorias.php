<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<?php
    if(!$categoria = conseguirCategoria($db,$_GET["id"]))
        header('Location: index.php');
?>

    <!-- PRINCIPAL-->
    <div id="principal">

        <h1>Entradas de <?= $categoria["nombre"]?></h1>
        <?php $entradas = conseguirCategoria($db,$id);
        while ($entrada = mysqli_fetch_assoc($entradas)): ?>
            <article class="entrada">
                <a href="">
                    <h2><?= $entrada["titulo"]?></h2>
                    <span class="fecha"><?= $entrada["categoria"] ?> | <?= $entrada["fecha"] ?></span>
                    <p><?= substr($entrada["descripcion"],0,200) ?>...</p>
                </a>
            </article>
        <?php endwhile; ?>

    </div>

<?php require_once 'includes/pie.php';