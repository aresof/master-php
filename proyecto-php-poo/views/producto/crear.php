<?php if(isset($edit) && isset($prod) && is_object($prod)): ?>
    <h1>Editar Producto <?= $prod->nombre ?></h1>
    <?php $url_action = base_url."producto/save&id=".$prod->id ?>
<?php else: ?>
    <h1>Nuevo Producto</h1>
    <?php $url_action = base_url."producto/save" ?>
<?php endif; ?>

<?php if(isset($_SESSION['registro'])): ?>
    <strong class="alert_green"><?=$_SESSION['registro']?></strong>
<?php endif; ?>

<div class="form_container">
<form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= isset($prod->nombre) ? $prod->nombre : '' ?>" required>

    <label for="categoria">Categoria</label>
    <select name="categoria" required>
    <?php
        $categorias = Utils::showCategorias();
        while($cat = $categorias->fetch_object()):
    ?>
        <option value="<?= $cat->id ?>"<?= (isset($prod->categoria_id) && $prod->categoria_id == $cat->id) ? " selected" : ""; ?>>
            <?= $cat->nombre ?>
        </option>
    <?php endwhile; ?>
    </select>

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" required><?= isset($prod->descripcion) ? $prod->descripcion : '' ?></textarea>

    <label for="nombre">Precio</label>
    <input type="text" name="precio" value="<?= isset($prod->precio) ? $prod->precio : '' ?>" required>

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?= isset($prod->stock) ? $prod->stock : '' ?>" required>

    <label for="oferta">Oferta</label>
    <input type="text" name="oferta" value="<?= isset($prod->oferta) ? $prod->oferta : '' ?>" required>

    <label for="imagen">Imagen</label>
    <img class="thumb" src="<?= !empty($prod->imagen) ? base_url.'uploads/images/'.$prod->imagen : "" ?>">
    <input type="file" name="imagen" value="<?= !empty($prod->imagen) ? base_url.'uploads/images/'.$prod->imagen : "" ?>">

    <input type="submit" value="Guardar Producto">
</form>
</div>
<?php
Utils::deleteSession('registro');