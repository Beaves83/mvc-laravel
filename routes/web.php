<?php
//Ruta inicial
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Clientes
Route::get('clientes', 'ClienteController@index')->name('clientes.index');//->middleware(ApiAuthMiddleware::class);
Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');
Route::post('clientes', 'ClienteController@store')->name('clientes.store');
Route::get('clientes/{cliente}', 'ClienteController@show')->name('clientes.show');
Route::get('clientes/{cliente}/edit', 'ClienteController@edit')->name('clientes.edit');
Route::put('clientes/{cliente}', 'ClienteController@update')->name('clientes.update');
Route::delete('clientes/{cliente}', 'ClienteController@destroy')->name('clientes.destroy');
Route::get('clientslist', 'ClienteController@clientslist')->name('clientes.clientslist');

//Citas
Route::get('citas', 'CitaController@index')->name('citas.index');
Route::get('citas/create', 'CitaController@create')->name('citas.create');
Route::post('citas', 'CitaController@store')->name('citas.store');
Route::get('citas/{cita}', 'CitaController@show')->name('citas.show');
Route::get('citas/{cita}/edit', 'CitaController@edit')->name('citas.edit');
Route::put('citas/{cita}', 'CitaController@update')->name('citas.update');
Route::delete('citas/{cita}', 'CitaController@destroy')->name('citas.destroy');

Route::get('citas/confirmReserve', 'CitaController@confirmReserve')->name('citas.confirmReserve');

//Usuario
Route::get('usuarios', 'UserController@index')->name('usuarios.index');
Route::get('usuarios/register', 'UserController@register')->name('usuarios.register');
Route::put('usuarios/update', 'UserController@update')->name('usuarios.update');
Route::post('usuarios/store', 'UserController@store')->name('usuarios.store');
Route::delete('usuarios/destroy/{id}', 'UserController@destroy')->name('usuarios.destroy');
Route::get('usuarios/listado', 'UserController@all')->name('usuarios.all');
Auth::routes();

//Listados
Route::get('municipios', 'MunicipioController@index');
Route::get('provincias', 'ProvinciaController@index');

Route::get('/home', 'HomeController@index')->name('home');
