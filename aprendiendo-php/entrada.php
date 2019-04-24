<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<?php
$entrada = conseguirEntrada($db,$_GET["id"]);

$ent = mysqli_fetch_assoc($entrada);

if(mysqli_num_rows($entrada) < 1)
    header('Location: index_maqueta.php');
?>

    <!-- PRINCIPAL-->
    <div id="principal">
        <h1>Detalle entrada <?= $ent["titulo"]?>
            <a href="categorias.php?id=<?= $ent["categoria_id"] ?>">
                <h2><?= $ent["categoria"]?></h2>
            </a>
        <h4><?= $ent["fecha"]?> | <?= $ent["usuario"] ?></h4>
        <p><?= $ent["descripcion"]?></p>


    <?php if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $ent["usuario_id"]): ?>
    <br/>
        <a href="editar-entrada.php?id=<?= $_GET['id'] ?>" class="boton boton-verde">Editar Entrada</a>
        <a href="borrar-entrada.php?id=<?= $_GET['id'] ?>" class="boton boton-rojo">Eliminar Entrada</a>
    <?php endif; ?>

    </div>

<?php require_once 'includes/pie.php';