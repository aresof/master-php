<h1>Formulario en Laravel</h1>
<form action="{{ action('PeliculaController@recibir') }}" method="post">
    {{ csrf_field() }}
    <label for="name">Nombre</label>
    <input type="text" name="name">
    <label for="email">Email</label>
    <input type="text" name="email">

    <input type="submit" value="Enviar">
</form>
