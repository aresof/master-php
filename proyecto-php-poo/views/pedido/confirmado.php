<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'Completed') : ?>

    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido ha sido guardado con éxito, una vez realice la transferencia bancaria con el coste del pedido, será
        procesado.
    </p>
    <br/>

    <?php if (isset($last_pedido)): ?>
        <h3>Datos del pedido</h3>

        <?php $prod = $last_pedido->fetch_object(); ?>

        Número de pedido: <?= $prod->pedido_id ?>
        Estado de pedido: <?= $prod->estado ?>
        Total a pagar: <?= $prod->coste ?>
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
                <th>Total</th>
                <th>-</th>
            </tr>
            <?php while ($prod): ?>
                <tr>
                    <?php if ($prod->imagen == null): ?>
                        <td><img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" width="50"></td>
                    <?php else : ?>
                        <td><img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" class="img_carrito"
                                 width="50"></td>
                    <?php endif; ?>
                    <td><a href="<?= base_url ?>Producto/ver&id=<?= $prod->id ?>"> <?= $prod->nombre ?></a></td>
                    <td><?= Utils::NumberFormat($prod->precio) ?></td>
                    <td><?= $prod->unidades ?></td>
                    <td><?= Utils::NumberFormat($prod->precio * $prod->unidades) ?></td>
                    <td> - </td>
                </tr>
                <?php $prod = $last_pedido->fetch_object() ?>
            <?php endwhile; ?>
        </table>
    <?php endif ?>
<?php else: ?>
    <h1>Error al confirmar tu pedido</h1>
    <p>
        Tu pedido no ha podido ser confirmado.
    </p>

<?php endif; ?>


