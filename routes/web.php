<?php
//Ruta inicial
Route::get('/', function () {
    return view('welcome');
});

//Clientes
Route::get('clientes', 'ClienteController@index')->name('clientes.index');//->middleware(ApiAuthMiddleware::class);
Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');
Route::get('clientes/store', 'ClienteController@store');
Route::get('clientes/all', 'ClienteController@all');
Route::post('clientes/excel', 'ClienteController@toexcel')->name('clientes.excel');
Route::get('clientes/{cliente}', 'ClienteController@show');
Route::get('clientes/{cliente}/edit', 'ClienteController@edit');
Route::get('clientes/update/{cliente}', 'ClienteController@update');
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
Route::get('citas/update', 'ClienteController@update');

//Usuario
Route::get('usuarios', 'UserController@index');
Route::get('usuarios/listado', 'UserController@all');
Route::get('usuarios/register', 'UserController@register');
Route::get('usuarios/update', 'UserController@update');
Route::get('usuarios/store', 'UserController@store');
Route::get('usuarios/destroy/{id}', 'UserController@destroy');