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



/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Todas las funciones que deberia tener esta ruta estan en el controlador de esta ruta, porque la hemos conectado a un controlador UsuarioController
Route::get('usuario/{nombre?}', 'UsuarioController@usuariounparametro')->name('usuarionombre');

//Acceder por la url a /usuario con su id y su nombre
Route::get('usuario/{id}/{nombre}', function($id, $nombre){
    return 'Usuario '.$id. ' y el nombre es '.$nombre;
})->where(
    [
        'id' => '[0-9]+',
        'nombre'=> '[A-Za-z]+'
    ]
);

Route::get('prueba', function(){
    return 'Pagina de prueba';
})->name('pruebaroute');

//Prueba de redireccionamiento de rutas
Route::get('redirigirprueba', function(){
    return redirect()->route('pruebaroute');
});

Route::get('/prueba2', function(){
    return 'Esto es la prueba de una nueva ruta';
});

// Otra forma de redirecionar rutas enrte si Route::redirect('/prueba', '/home');

//con el comando make:controller "..." invokable estas creando un controlador que solo tendra una funcion por lo tanto no es necesario añadir 
//@nombre de la funcion en el controlador, simplemente con nombrar el controlador funcionara

//Para crear una carpeta de controladores y agruparlos comando: php artisan make:controller nombreCarpeta/nombreControlador

Route::resource('varios', 'variosmetodosrecursos');

//Ruta para que solo muestre alguna funciones de todas las disponibles
Route::resource('varios1', 'variosmetodosrecursos')->only([
    'index', 'create']);

//Ruta para ocultar algunas funciones de todas las disponibles
Route::resource('varios2', 'variosmetodosrecursos')->except([
    'create', 'store', 'update', 'destroy']);

*/

Route::resource('varios', 'variosmetodosrecursos');

Route::resource('aeropuertos', 'gestionaeropuerto');