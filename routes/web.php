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

	//Todas as rotas aqui dentro, o usuário precisará estar cadastrado

	Route::get('/', function () {return view('welcome');})->name('welcome');
	Route::get('/logout', 'UserController@logout');

	Route::middleware(['permissaoCliente'])->group(function(){
		//Todas as rotas aqui dentro, o usuário precisará estar cadastrado e ser cliente (Usuario Cliente)

		/* Endereços */
		/* Telas */		
		Route::get('/tela/endereco/adicionar', 'EnderecoController@telaAdicionarEndereco')->name('tela_adicionar_endereco');
		Route::get('/tela/endereco/alterar/{id}', 'EnderecoController@telaAlterarEndereco')->name('tela_alterar_endereco');				
		Route::get('/tela/endereco/listar', 'EnderecoController@telaListarEndereco')->name('tela_listar_endereco');

		/* Funções */
		Route::post('/endereco/registrar', 'EnderecoController@addEndereco')->name('registrar_endereco');		
		Route::post('/endereco/atualizar/{id}', 'EnderecoController@updateEndereco')->name('alterar_endereco');		
		Route::get('/endereco/excluir/{id}', 'EnderecoController@deleteEndereco')->name('excluir_endereco');
	});

	Route::middleware(['permissaoAdmin'])->group(function(){
		//Todas as rotas aqui dentro, o usuário precisará estar cadastrado e ser administrador (Usuario Administrador)

		//* Usuários *//
		/* Telas */	
		Route::get('/tela/user/listar', 'UserController@telaListarUsers')->name('tela_listar_users');


		//* Cidades *//
		/* Telas */
		Route::get('/tela/cidade/adicionar', 'CidadeController@telaAdicionarCidade')->name('tela_adicionar_cidade');
		Route::get('/tela/cidade/alterar/{id}', 'CidadeController@telaAlterarCidade')->name('tela_alterar_cidade');				
		Route::get('/tela/cidade/listar', 'CidadeController@telaListarCidade')->name('tela_listar_cidade');
		/* Funções */
		Route::post('/cidade/registrar', 'CidadeController@addCidade')->name('registrar_cidade');
		Route::post('/cidade/atualizar/{id}', 'CidadeController@updateCidade')->name('alterar_cidade');		
		Route::get('/cidade/excluir/{id}', 'CidadeController@deleteCidade')->name('excluir_cidade');

		//* Categorias *//
		/* Telas */
		Route::get('/tela/categoria/adicionar', 'CategoriaProdutoController@telaAdicionarCategoria')->name('tela_adicionar_categoria');
		Route::get('/tela/categoria/alterar/{id}', 'CategoriaProdutoController@telaAlterarCategoria')->name('tela_alterar_categoria');
		Route::get('/tela/categoria/listar', 'CategoriaProdutoController@telaListarCategoria')->name('tela_listar_categoria');
		/* Funções */
		Route::post('/categoria/registrar', 'CategoriaProdutoController@addCategoria')->name('registrar_categoria');
		Route::post('/categoria/atualizar/{id}', 'CategoriaProdutoController@updateCategoria')->name('alterar_categoria');

		Route::get('/categoria/excluir/{id}', 'CategoriaProdutoController@deleteCategoria')->name('excluir_cidade');
	});			
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');