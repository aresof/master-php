<h1>{{ $fruta->nombre }}</h1>
<p>
    {{ $fruta->descripcion }}
</p>
<p style="color: red"><a href="{{ action('FrutaController@delete', ['id' => $fruta->id]) }}">Eliminar Fruta</a> </p>
<p style="color: red"><a href="{{ action('FrutaController@edit', ['id' => $fruta->id]) }}">Editar Fruta</a> </p>


<p><a href="{{ action('FrutaController@index') }}">Volver al Listado</a> </p>