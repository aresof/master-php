<h1>Hacer Pedido</h1>

<?php if(!isset($_SESSION['identity'])): ?>
Necesita identificarse para realizar el pedido.

<?php else: ?>

<br/>

<h1>Dirección para el envío</h1>

<form action="<?= base_url ?>Pedido/add" method="post">
    <label for="direccion">Dirección</label>
    <input type="text" name="direccion" required>
    <label for="localidad">Localidad</label>
    <input type="text" name="localidad" required>
    <label for="provincia">Provincia</label>
    <input type="text" name="provincia" required>


    <input type="submit" value="Confirmar Pedido">
</form>

<?php endif; ?>
