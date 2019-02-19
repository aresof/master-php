<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

    <!-- PRINCIPAL-->
    <div id="principal">
        <h1>Todas las entradas</h1>
        <?php $entradas = conseguirEntradas($db);
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