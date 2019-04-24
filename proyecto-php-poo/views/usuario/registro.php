<h1>Registrarse</h1>

<?php if(isset($_SESSION['registro'])): ?>
        <strong class="alert_green"><?=$_SESSION['registro']?></strong>
<?php endif; ?>

<form action="<?=base_url?>usuario/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>

    <label for="nombre">Apellidos</label>
    <input type="text" name="apellidos" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <input type="submit" value="Registrarse">

</form>

<?php
Utils::deleteSession('registro');
