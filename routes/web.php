<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/restaurantes', 'RestauranteController@index');
Route::post('/restaurantes/guardar', 'RestauranteController@save');
Route::get('/restaurantes/borrar', 'RestauranteController@delete');
Route::post('/restaurantes/modificar', 'RestauranteController@modify');

Route::get('/reservas', 'ReservaController@index');
Route::post('/reservas/guardar', 'ReservaController@save');
Route::get('/reservas/borrar', 'ReservaController@delete');
Route::post('/reservas/modificar', 'ReservaController@modify');
