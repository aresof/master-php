<h1>Carrito de la compra</h1>
<?php if(isset($_SESSION['carrito'])): ?>
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
            <td>
                <?= $item['unidades'] ?>
                <div class="updown-unidades">
                    <a href="<?= base_url ?>Carrito/up&indice=<?= $indice ?>" class="button">+</a>
                    <a href="<?= base_url ?>Carrito/down&indice=<?= $indice ?>" class="button">-</a>
                </div>
            </td>
            <td><?= Utils::NumberFormat($prod->precio * $item['unidades']) ?></td>
            <td>
                <a href="<?= base_url ?>Carrito/delete&indice=<?= $indice ?>" class="button button-carrito button-red">Borrar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</br>
<div class="delete-carrito">
    <a href="<?= base_url ?>Carrito/delete_all" class="button button-delete button-red">Vaciar Carrito</a>
</div>

<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Precio Total: <?= $stats['total'] ?> €</h3>
    <a href="<?= base_url ?>Pedido/hacer" class="button button-pedido">Hacer Pedido</a>
</div>

<?php else: ?>
<h3>El carrito está vacío</h3>
<?php endif; ?>
