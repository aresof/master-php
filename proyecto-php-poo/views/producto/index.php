<h1>Gestionar Productos</h1>

<a href="<?= base_url ?>producto/crear" class="button button-small">Crear Producto</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>CATEGORIA</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>OFERTA</th>
        <th>STOCK</th>
        <th>FECHA</th>
        <th>IMAGEN</th>
    </tr>
    <?php while($prod = $productos->fetch_object()): ?>
        <tr>
            <td><?= $prod->id ?></td>
            <td><?= $prod->nombre ?></td>
            <td><?= $prod->CatNombre ?></td>
            <td><?= $prod->descripcion ?></td>
            <td><?= Utils::NumberFormat($prod->precio) ?></td>
            <td><?= $prod->oferta ?></td>
            <td><?= $prod->stock ?></td>
            <td><?= $prod->Fec ?></td>
            <td><?= $prod->imagen ?></td>
        </tr>
    <?php endwhile; ?>
</table>