<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

    <!-- PRINCIPAL-->
    <div id="principal">
        <h1>Crear Categorías</h1>

        <form action="guardar-categoria.php" method="post">
            <label>Nombre de la categoría</label>
            <input type="text" name="nombre"/>

            <input type="submit" value="Guardar"/>
         </form>

    </div>

<?php require_once 'includes/pie.php';