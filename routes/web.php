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
Route::get('obtener', 'UserController@obtener')->name('obtener');
Route::get('user/eliminar/{id}', 'UserController@eliminar');
Route::post('user/actualizar', 'UserController@actualizar')->name('actualizaruser');
Route::resource('user', 'UserController');

Route::get('/', function () {
    return redirect()->route('obtener');
});
