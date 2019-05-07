<?php if (isset($prod)) : ?>
    <h1><?= $prod->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if (!empty($prod->imagen)): ?>
                <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>">
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?= $prod->descripcion ?></p>
            <p class="price"><?= $prod->precio ?> euros</p>
            <a href="<?= base_url ?>carrito/add&id=<?= $prod->id ?>" class="button">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <p>El producto no existe</p>
<?php endif; ?>





