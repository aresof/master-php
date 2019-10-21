@if(isset($fruta))
    <h1>Editar fruta</h1>
@else
    <h1>Crear fruta</h1>
@endif

<form action="{{ isset($fruta) ? action('FrutaController@update', ['id' => $fruta->id]) : action('FrutaController@save') }}" method="post">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{ $fruta->id ?? '' }}">

    <label for="name">Nombre</label>
    <input type="text" name="name" value="{{ $fruta->nombre ?? '' }}">
    <label for="desc">Descripción</label>
    <input type="text" name="desc" value="{{ $fruta->descripcion ?? '' }}">
    <label for="precio">Precio</label>
    <input type="number" name="precio" value="{{ $fruta->precio ?? '' }}">

    <input type="submit" value="Enviar">
</form>