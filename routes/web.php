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

/* * *****COMANDOS RUTAS****** */
Route::get('/crearComando', [
    'middleware' => 'auth',
    'uses' => 'comandos@crearComando',
    'as' => 'comando.crearComando'
]);
Route::get('/verComandos/{mensaje?}', 'comandos@verComandos')->name('show');

Route::get('/modificarComandos/{id}', [
    'middleware' => 'auth',
    'uses' => 'comandos@updateComandos',
    'as' => 'comando.modificarComando'
]);
Route::get('/EliminarComando/{id}', [
    'middleware' => 'auth',
    'uses' => 'comandos@delete',
    'as' => 'comando.eliminar'
]);


/* * ****FIN COMANDOS RUTAS ******** */

/***SOBRE MI****/
Route::get('/cv',[
       "uses" => 'proyectosController@cv',
    'as' => 'proyecto.cv'
]);
Route::get('/about', [
       "uses" => 'proyectosController@about',
    'as' => 'proyecto.sobreMi'
]);

/* * ****PROYECTOS RUTAS*********** */
Route::get('/verProyectos','proyectosController@verProyectos')->name('proyectos.verProyectos');
Route::get('/verProyecto/{id}','proyectosController@verProyecto')->name('proyectos.verProyecto');


Route::get('/crearProyecto', [
    "middleware" => 'auth',
    "uses" => 'proyectosController@crearProyecto',
    'as' => 'proyecto.crear'
]);

Route::get('/modificarProyecto/{id}', [
    "middleware" => 'auth',
    "uses" => 'proyectosController@modificarProyecto',
    'as' => 'proyecto.modificar'
]);

Route::get('/eliminarImagen/{id}',[
    "middleware" => 'auth',
    "uses" => 'proyectosController@elimianarImagen',
    'as' => 'proyecto.eliminarImagen'
]);



Route::post('/proyecto/{id}/imagenes', 'proyectosController@uploadImage');
Route::post('/actualizar', 'proyectosController@update')->name('actualizarProyecto');
Route::post('/guardarProyecto', 'proyectosController@guardarProyecto')->name('guardarProyecto');




/* * ******FIN PROYECTOS RUTAS ***** */


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
