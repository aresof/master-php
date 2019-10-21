<h1>LISTADO DE FRUTAS</h1>

@if(session('status'))
    <p style="background: green; color: white;">{{ session('status') }}</p>
@endif

<ul>
@foreach($frutas as $fruta)
    <li>
        <a href="{{ action('FrutaController@detail', ['id' => $fruta->id]) }}">
        {{ $fruta->nombre }}
        </a>
    </li>
@endforeach
</ul>

<p><a href="{{ action('FrutaController@create') }}">Añadir Fruta</a> </p>