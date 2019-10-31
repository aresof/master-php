{{$titulo}}

@if(isset($pagina))
    <h3>Página {{$pagina}}</h3>
@endif

<a href="{{ action('PeliculaController@detalle') }}">Ir al detalle</a>
<a href="{{ route('detalle.pelicula') }}">Ir al detalle</a>
<a href="{{ url('/detalle') }}">Ir al detalle</a>