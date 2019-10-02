<?php
//Ruta inicial
Route::get('/', function () {
    return view('welcome');
});

//Clientes
Route::get('clientes', 'ClienteController@index');
Route::get('clientes/create', 'ClienteController@create');
Route::get('clientes/store', 'ClienteController@store');
Route::get('clientes/all', 'ClienteController@sll');
Route::get('clientes/{cliente}', 'ClienteController@show');
Route::get('clientes/{cliente}/edit', 'ClienteController@edit');
Route::put('clientes/{cliente}', 'ClienteController@update');
Route::delete('clientes/{cliente}', 'ClienteController@destroy');

//Citas
Route::get('citas', 'CitaController@index');
Route::get('citas/create', 'CitaController@create');
Route::get('citas/store', 'CitaController@store');
Route::get('citas/all', 'CitaController@all');
Route::get('citas/{cita}', 'CitaController@show');
Route::get('citas/{cita}/edit', 'CitaController@edit');
Route::put('citas/{cita}', 'CitaController@update');
Route::get('citas/confirmReserve', 'CitaController@confirmReserve');
Route::delete('citas/{cita}', 'CitaController@destroy');
