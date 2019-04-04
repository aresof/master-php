<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
<?php
    $entrada = conseguirEntrada($db,$_GET['id']);
    $ent = mysqli_fetch_assoc($entrada);
?>
    <!-- PRINCIPAL-->
    <div id="principal">
        <h1>Editar Entrada</h1>

        <form action="guardar-entrada.php?editar=<?= $ent['id'] ?>" method="post">
            <label>Título</label>
            <input type="text" name="titulo" value="<?= $ent['titulo'] ?>"/>
            <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], 'titulo') : '' ?>


            <label>Descripción</label>
            <textarea name="descripcion" rows="10" cols="80"><?= $ent['descripcion'] ?></textarea>
            <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], 'descripcion') : '' ?>

            <label>Categoría</label>
            <select name="categoria"/>
            <?php
            $categorias = conseguirCategorias($db);
            while($categoria = mysqli_fetch_assoc($categorias)):
                ?>
                <option value="<?= $categoria["id"]?>" <?= ($categoria['id'] == $ent['categoria_id']) ? 'selected="selected"' : '' ?>><?= $categoria["nombre"] ?></option>
            <?php endwhile;?>
            </select>
            <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], 'categoria') : '' ?>

            <input type="submit" value="Guardar"/>
        </form>
        <?php borrarErrores(); ?>
    </div>

<?php require_once 'includes/pie.php';