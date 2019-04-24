<h1>Nueva Categoría</h1>

<?php if(isset($_SESSION['registro'])): ?>
    <strong class="alert_green"><?=$_SESSION['registro']?></strong>
<?php endif; ?>

<form action="<?=base_url?>categoria/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>
    <input type="submit" value="Crear Categoría">
</form>

<?php
Utils::deleteSession('registro');