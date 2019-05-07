<h1>Gestionar Productos</h1>

<?php if(isset($_SESSION['registro'])): ?>
    <strong class="alert_green"><?=$_SESSION['registro']?></strong>
<?php endif; ?>

<a href="<?= base_url ?>producto/crear" class="button button-small">Crear Producto</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>CATEGORIA</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>OFERTA</th>
        <th>STOCK</th>
        <th>FECHA</th>
        <th>IMAGEN</th>
        <th>-</th>
    </tr>
    <?php while($prod = $productos->fetch_object()): ?>
        <tr>
            <td><?= $prod->id ?></td>
            <td><?= $prod->nombre ?></td>
            <td><?= $prod->CatNombre ?></td>
            <td><?= $prod->descripcion ?></td>
            <td><?= Utils::NumberFormat($prod->precio) ?></td>
            <td><?= $prod->oferta ?></td>
            <td><?= $prod->stock ?></td>
            <td><?= $prod->Fec ?></td>
            <td><img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" width="50"></td>
            <td>
                <a href="<?= base_url ?>Producto/editar&id=<?= $prod->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>Producto/eliminar&id=<?= $prod->id ?>" class="button button-gestion button-red">Borrar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<?php
Utils::deleteSession('registro');