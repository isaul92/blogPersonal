<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/updateComandsAPI', 'comandos@update')->name('actualizar');
Route::post('/paginacion', 'comandos@paginacionComandos')->name('paginacion');
Route::post('/buscar', 'comandos@buscarComando')->name('buscar');
Route::post('/crearComandoAPI', 'comandos@saveComand')->name('crear');


