<h1>Carrito de la compra</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Total</th>
        <th>-</th>
    </tr>
    <?php foreach ($_SESSION['carrito'] as $indice => $item) :
        $prod = $item['producto'];
    ?>
        <tr>
            <?php if ($prod->imagen == null): ?>
                <td><img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito" width="50"></td>
            <?php else : ?>
                <td><img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" class="img_carrito" width="50"></td>
            <?php endif; ?>
            <td><a href="<?=base_url?>Producto/ver&id=<?= $prod->id ?>"> <?= $prod->nombre ?></a></td>
            <td><?= Utils::NumberFormat($prod->precio) ?></td>
            <td><?= $item['unidades'] ?></td>
            <td><?= Utils::NumberFormat($prod->precio * $item['unidades']) ?></td>
            <td>
                <a href="<?= base_url ?>Producto/editar&id=<?= $prod->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>Producto/eliminar&id=<?= $prod->id ?>" class="button button-gestion button-red">Borrar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</br>

<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Precio Total: <?= $stats['total'] ?> €</h3>
    <a href="" class="button button-pedido">Hacer Pedido</a>
</div>