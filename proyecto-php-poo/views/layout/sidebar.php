<div id="content">
    <!-- LATERAL -->
    <aside id="lateral">
        <div id="carrito" class="block_aside">
            <h3>Mi carrito</h3>
            <?php $stats = Utils::statsCarrito() ?>
            <ul>
                <li><a href="<?= base_url ?>Carrito/index">Productos (<?= $stats['count'] ?>)</a></li>
                <li><a href="<?= base_url ?>Carrito/index">Total € (<?= Utils::NumberFormat($stats['total']) ?>)</a></li>
                <li><a href="<?= base_url ?>Carrito/index">Ver Carrito</a></li>
            </ul>
        </div>

        <div id="login" class="block_aside">
        <?php if(!isset($_SESSION['identity'])): ?>

        <h3>Entrar a la web</h3>

            <form action="<?= base_url ?>Usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <input type="submit" value="Enviar">
            </form>
            <a href="<?= base_url ?>Usuario/registro">Registrarse</a>

        <?php else: ?>

            <h3><?= $_SESSION['identity']->nombre.' '.$_SESSION['identity']->apellidos ?></h3>
            <ul>
                <li><a href="<?= base_url ?>Pedido/index">Mis pedidos</a></li>
                <?php if(isset($_SESSION['admin'])): ?>
                    <li><a href="<?= base_url ?>Categoria/index">Categorías</a></li>
                    <li><a href="<?= base_url ?>Producto/index">Productos</a></li>
                <?php endif; ?>
                <li><a href="<?= base_url ?>Usuario/logout">Cerrar Sesión</a></li>
            </ul>

        <?php endif; ?>

        </div>
    </aside>

    <!-- CENTRAL -->
    <div id="central">


