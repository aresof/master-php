<h1>Nueva Producto</h1>

<?php if(isset($_SESSION['registro'])): ?>
    <strong class="alert_green"><?=$_SESSION['registro']?></strong>
<?php endif; ?>
<div class="form_container">
<form action="<?=base_url?>producto/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>

    <label for="categoria">Categoria</label>
    <select name="categoria" required>
    <?php
        $categorias = Utils::showCategorias();
        while($cat = $categorias->fetch_object()):
    ?>
        <option value="<?= $cat->id ?>"><?= $cat->nombre ?></option>
    <?php endwhile; ?>
    </select>

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" required></textarea>

    <label for="nombre">Precio</label>
    <input type="text" name="precio" required>

    <label for="stock">Stock</label>
    <input type="number" name="stock" required>

    <label for="oferta">Oferta</label>
    <input type="text" name="oferta" required>

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" required>

    <input type="submit" value="Crear Producto">
</form>
</div>
<?php
Utils::deleteSession('registro');