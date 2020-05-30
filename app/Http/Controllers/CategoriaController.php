<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function telaAdicionarCategoria(){
    	return view('categoria.cadastroCategoria');
    }

    public function telaAlterarCategoria($id){
        $categoria = Categoria::find($id);
        return view('categoria.alterarCategoria', ['categoria' => $categoria]);        
    }

    public function telaListarCategoria(){
        $lista = Categoria::all();
        return view('categoria.listarCategoria', ['lista' => $lista]);
    }

    public function addCategoria(Request $req){
    	$cp = new Categoria();

    	$nome = $req->input('nome');
    	$categoria_pai = $req->input('categoria_pai');

        $cp->nome = $nome;
        $cp->categoria_pai = $categoria_pai;

    	if($cp->save()){
    		session([
                'mensagem' => 'Categoria de produto registrada com sucesso.'
            ]); 
    	}else{
    		session([
                'mensagem' => 'A categoria de produto não foi registrada.'
            ]);
    	}
    	return redirect()->route('tela_listar_categoria');
    }

    public function updateCategoria($id, Request $req){
        $cp = Categoria::find($id);

        $nome = $req->input('nome');
        $categoria_pai = $req->input('categoria_pai');

        $cp->nome = $nome;
        $cp->categoria_pai = $categoria_pai;

        if($cp->save()){
            session([
                'mensagem' => 'Categoria atualizada com sucesso.'
            ]); 
        }else{
            session([
                'mensagem' => 'A categoria não foi atualizada.'
            ]);
        }
        return redirect()->route('tela_listar_categoria');
    }

    public function deleteCategoria($id){
        $c = Categoria::find($id);     

        if($c->delete()){
            session([
                'mensagem' => 'Categoria deletada com sucesso.'
            ]); 
        }else{
            session([
                'mensagem' => 'A categoria não foi apagada.'
            ]);
        }
        return redirect()->route('tela_listar_categoria');
    }
}
