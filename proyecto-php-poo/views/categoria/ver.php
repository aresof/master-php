<?php if(isset($cat)) : ?>
    <h1><?= $cat->nombre ?></h1>
    <?php if($productos->num_rows == 0): ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>
        <?php while($prod =  $productos->fetch_object()) : ?>
            <div class="product">
                <a href="<?= base_url ?>producto/ver&id=<?= $prod->id ?>">
                <?php if(!empty($prod->imagen)): ?>
                    <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>">
                <?php else: ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png">
                <?php endif; ?>
                <h2><?= $prod->nombre ?></h2>
                </a>
                <p><?= $prod->precio ?> euros</p>
                <a href="" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php endif; ?>