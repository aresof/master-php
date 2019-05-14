<h1>Detalle del Pedido <?=$_GET['id']?></h1>

<?php if (isset($last_pedido)): ?>
    <?php $prod = $last_pedido->fetch_object(); ?>

    <?php if(isset($_SESSION['admin'])): ?>
    <h3>Cambiar estado del pedido</h3>
    <form action="<?= base_url ?>Pedido/estado" method="post">
        <input type="hidden" name="pedido_id" value="<?= $prod->id_pedido ?>">
        <select name="estado">
            <option value="Confirmado" <?= ($prod->estado == "Confirmado") ? "selected" : "" ?>>Pendiente</option>
            <option value="Preparation" <?= ($prod->estado == "Preparation") ? "selected" : "" ?>>En preparación</option>
            <option value="Ready" <?= ($prod->estado == "Ready") ? "selected" : "" ?>>Preparado</option>
            <option value="Send" <?= ($prod->estado == "Send") ? "selected" : "" ?>>Enviado</option>
        </select>
        <input type="submit" value="Cambiar Estado">
    </form>
    <br/>
    <?php endif; ?>
    <br/>
    <pre>
    <h3>Dirección de envío</h3>
    Provincia: <?= $prod->provincia ?>
    Ciudad: <?= $prod->localidad ?>
    Dirección: <?= $prod->direccion ?>
    <br/>
    </pre>
    <pre>
    <h3>Datos del pedido</h3>
    Número de pedido: <?= $prod->pedido_id ?>
    Estado de pedido: <?= $prod->estado ?>
    Total a pagar: <?= $prod->coste ?>
    Estado: <?= $prod->estado ?>
    <br/>
    </pre>
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