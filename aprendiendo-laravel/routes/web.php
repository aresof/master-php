<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/peliculas/{pagina?}','PeliculaController@index');

Route::get('/detalle/{year?}',[
    'uses' => 'PeliculaController@detalle',
    'middleware' => 'testyear'
    ])->name('detalle.pelicula');

Route::resource('usuario','UsuarioController');

Route::get('/redirigir','PeliculaController@redirigir');

Route::get('/formulario','PeliculaController@formulario');
Route::post('/recibir','PeliculaController@recibir');

Route::group(['prefix'=>'frutas'], function (){
    Route::get('index','FrutaController@index');
    Route::get('detail/{id}','FrutaController@detail');
    Route::get('create','FrutaController@create');
    Route::post('save','FrutaController@save');
    Route::get('delete/{id}','FrutaController@delete');
    Route::get('edit/{id}','FrutaController@edit');
    Route::post('update','FrutaController@update');
});



/*
Route::get('peliculas', function () {

    $titulo = "Listado de películas";
    $listado = array('Batman', 'Spiderman', 'Gran Torino');
    $director = "";

    return view('peliculas.listado')
        ->with('titulo', $titulo)
        ->with('director', $director)
        ->with('listado', $listado);
});
*/