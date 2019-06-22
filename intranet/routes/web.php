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
	Route::resource('proyectos', 'ProyectosController');
	Route::get('/downloadfileProyectos/download/{id}','ProyectosController@file')->name('downloadfileProyectos');

	Route::get('proyectos/{id}/carpetas/', 'CarpetasController@index')->name('carpetasProyectos');
	Route::get('carpetas/file/{id}', 'CarpetasController@files')->name('fileCarpetasProyectosCreate');
	Route::get('proyectos/{proyecto}/carpetas/{id?}/folder/show/', 'CarpetasController@listfolder')->name('carpetasProyectosList');
	Route::get('carpetas/folder/edit/{id}', 'CarpetasController@edit')->name('carpetasProyectosEdit');

	Route::put('carpetas/folder/edit/{id}', 'CarpetasController@update')->name('carpetasProyectosUpdate');

	Route::delete('carpetas/folder/delete/{id}', 'CarpetasController@destroyfolder')->name('carpetasProyectosDelete');
	Route::get('carpetas/file/{id}', 'CarpetasController@files')->name('fileCarpetasProyectosCreate');
	Route::get('carpetas/{id}/file/show/', 'CarpetasController@show')->name('fileCarpetasProyectosShow');
	Route::delete('carpetas/{id}', 'CarpetasController@destroy')->name('carpetas.destroy');



	Route::post('carpetas/file', 'CarpetasController@filestore')->name('fileStore');
	Route::post('carpetas/create', 'CarpetasController@store')->name('folderStore');
	Route::get('carpetas/create/{id}', 'CarpetasController@create')->name('carpetasProyectosCreate');
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

	Route::resource('operadores', 'OperadoresController');


	Route::resource('cargos', 'CargosController');

	Route::resource('usuarios', 'UsuariosController');

	Route::resource('consultas', 'ConsultasController');


});
