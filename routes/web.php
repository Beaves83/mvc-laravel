<?php
//Ruta inicial
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Clientes
Route::get('clientes', 'ClienteController@index')->name('clientes.index');
Route::get('clientes/historical', 'ClienteController@historical')->name('clientes.historical');
Route::get('clientes/expires', 'ClienteController@expires')->name('clientes.expires');
Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');
Route::post('clientes', 'ClienteController@store')->name('clientes.store');
Route::get('clientes/{cliente}', 'ClienteController@show')->name('clientes.show')->where('cliente', '[0-9]+');
Route::get('clientes/{cliente}/edit', 'ClienteController@edit')->name('clientes.edit');
Route::put('clientes/{cliente}', 'ClienteController@update')->name('clientes.update');
Route::delete('clientes/{cliente}', 'ClienteController@destroy')->name('clientes.destroy');
Route::get('clientslist', 'ClienteController@clientslist')->name('clientes.clientslist');
Route::get('clientes/{cliente}/pdf', 'ClienteController@clientepdf')->name('clientes.pdfonlyone');

//Citas
Route::get('citas', 'CitaController@index')->name('citas.index');
Route::get('citas/historical', 'CitaController@historical')->name('citas.historical');
Route::get('citas/create', 'CitaController@create')->name('citas.create');
Route::post('citas', 'CitaController@store')->name('citas.store');
Route::get('citas/{cita}', 'CitaController@show')->name('citas.show')->where('cita', '[0-9]+');
Route::get('citas/{cita}/edit', 'CitaController@edit')->name('citas.edit');
Route::put('citas/{cita}', 'CitaController@update')->name('citas.update');
Route::delete('citas/{cita}', 'CitaController@destroy')->name('citas.destroy');
Route::get('citas/{cita}/edit', 'CitaController@edit')->name('citas.edit');
Route::get('citas/calendar', 'CitaController@calendar')->name('citas.calendar');
Route::get('citas/{cita}/pdf', 'CitaController@citapdf')->name('citas.pdfonlyone');

//Usuario
Route::get('usuarios', 'UserController@index')->name('usuarios.index');
Route::get('usuarios/create', 'UserController@create')->name('usuarios.create');
Route::post('usuarios', 'UserController@store')->name('usuarios.store');
Route::get('usuarios/{usuario}', 'UserController@show')->name('usuarios.show');
Route::get('usuarios/{usuario}/edit', 'UserController@edit')->name('usuarios.edit');
Route::put('usuarios/{usuario}', 'UserController@update')->name('usuarios.update');
Route::delete('usuarios/{usuario}', 'UserController@destroy')->name('usuarios.destroy');
Route::get('usuarios/{usuario}/pdf', 'UserController@userpdf')->name('usuarios.pdfonlyone');

Auth::routes();

//Listados
Route::get('municipios', 'MunicipioController@index')->name('municipios.alllist');
Route::get('provincias', 'ProvinciaController@index')->name('provincias.alllist');

Route::get('/home', 'HomeController@index')->name('home');
