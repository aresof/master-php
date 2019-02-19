<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

    <!-- PRINCIPAL-->
    <div id="principal">
        <h1>Crear Entradas</h1>

        <form action="guardar-entrada.php" method="post">
            <label>Título</label>
            <input type="text" name="titulo"/>
            <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], 'titulo') : '' ?>


            <label>Descripción</label>
            <textarea name="descripcion"></textarea>
            <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], 'descripcion') : '' ?>

            <label>Categoría</label>
            <select name="categoria"/>
                <?php
                    $categorias = conseguirCategorias($db);
                    while($categoria = mysqli_fetch_assoc($categorias)):
                 ?>
                        <option value="<?= $categoria["id"]?>"><?= $categoria["nombre"] ?></option>
                    <?php endwhile;?>
            </select>
            <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], 'categoria') : '' ?>

            <input type="submit" value="Guardar"/>
         </form>
    <?php borrarErrores(); ?>
    </div>

<?php require_once 'includes/pie.php';