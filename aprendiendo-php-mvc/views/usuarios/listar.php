<h1>Listado de usuarios</h1>
<?php while ($usuario = $usuarios->fetch_object()): ?>
    <?= $usuario->nombre ?> <?= $usuario->apellidos ?> <br/>
<?php endwhile; ?>