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
    return view('auth/login');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::get('administracion/usuarios', 'UsuariosController@index');
	Route::resource('administracion/usuarios', 'UsuariosController');


	Route::resource('proyectos', 'ProyectosController');
    Route::get('/fileproyectos/download/{id}','ProyectosController@file')->name('downloadfileProyectos');

	Route::resource('actividades', 'ActividadesController');

	Route::resource('temporales', 'TemporalesController');

	Route::resource('clientes', 'ClientesController');

	Route::resource('carpetas', 'CarpetasController');
	Route::get('proyectos/carpetas/{id}', 'CarpetasController@index')->name('carpetasProyectos');
    Route::get('proyectos/carpetas/create/{id}', 'CarpetasController@create')->name('carpetasProyectosCreate');
    Route::get('proyectos/carpetas/{proyecto}/folder/show/{id?}', 'CarpetasController@listfolder')->name('carpetasProyectosList');
	Route::get('proyectos/carpetas/folder/edit/{id}', 'CarpetasController@edit')->name('carpetasProyectosEdit');
	Route::delete('proyectos/carpetas/folder/delete/{id}', 'CarpetasController@destroyfolder')->name('carpetasProyectosDelete');
	Route::get('proyectos/carpetas/file/{id}', 'CarpetasController@file')->name('fileCarpetasProyectosCreate');
	Route::get('proyectos/carpetas/file/show/{id}', 'CarpetasController@show')->name('fileCarpetasProyectosShow');
	Route::post('proyectos/carpetas/file', 'CarpetasController@filestore')->name('fileStore');
	Route::get('file/carpetas/download/{id}','CarpetasController@downloadFile')->name('downloadArchiveProyectos');
	Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'CarpetasController@carpetasSecundarias']);

	Route::resource('personal', 'PersonalController');
	Route::get('/downloadCv/download/{id}','PersonalController@file')->name('downloadCv');

	Route::get('/personal/{id}/contrato', 'ContratosController@index')->name('contratoPersonal');
	Route::get('/personal/{id}/contrato/create', 'ContratosController@create')->name('contratoPersonalCrear');
	Route::resource('/personal/contrato', 'ContratosController');

	Route::get('/personal/{id}/sctr', 'SctrController@index')->name('sctrPersonal');
	Route::get('/personal/{id}/sctr/create', 'SctrController@create')->name('sctrPersonalCrear');
	Route::resource('/personal/sctr', 'SctrController');

	Route::get('/personal/{id}/inducciones', 'InduccionesController@index')->name('induccionesPersonal');
	Route::get('/personal/{id}/inducciones/create', 'InduccionesController@create')->name('induccionesPersonalCrear');
	Route::get('/downloadfileInducciones/download/{id}','InduccionesController@file')->name('downloadfileInducciones');

	Route::resource('/personal/inducciones', 'InduccionesController');

	Route::get('/personal/{id}/emoa', 'EmoaController@index')->name('emoaPersonal');
	Route::get('/personal/{id}/emoa/create', 'EmoaController@create')->name('emoaPersonalCrear');
	Route::get('/downloadfileEmoa/download/{id}','EmoaController@file')->name('downloadfileEmoa');

	Route::resource('/personal/emoa', 'EmoaController');

	Route::resource('administracion/cargos', 'CargosController');

	Route::resource('conductores', 'ConductoresController');
	Route::resource('vehiculos', 'VehiculosController');


});

	Route::resource('consultas', 'ConsultasController');


