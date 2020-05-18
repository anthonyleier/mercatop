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

Route::middleware(['auth'])->group(function(){

	//Todas as rotas aqui dentro, o usuário precisará estar cadastrado (Usuario Cliente)

	Route::get('/', function () {return view('welcome');})->name('welcome');
	Route::get('/logout', 'AppController@logout')->name('logout');

	Route::middleware(['permissaoAdmin'])->group(function(){
		//Todas as rotas aqui dentro, o usuário precisará estar cadastrado e ser administrador (Usuario Administrador)

		Route::get('/listarUsers', 'AppController@listarUsers')->name('listarUsers');

	});
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

