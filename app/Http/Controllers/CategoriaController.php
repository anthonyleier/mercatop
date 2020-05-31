<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function telaAdicionarCategoria(){
        $categorias = Categoria::all();
    	return view('categoria.cadastroCategoria', ['categorias' => $categorias]);
    }

    public function telaAlterarCategoria($id){
        $categoria = Categoria::find($id);
        $listaCategorias = Categoria::all();
        return view('categoria.alterarCategoria', ['categoria' => $categoria, 'listaCategorias' => $listaCategorias]);        
    }

    public function telaListarCategoria(){
        $lista = Categoria::all();
        return view('categoria.listarCategoria', ['lista' => $lista]);
    }

    public function addCategoria(Request $req){

        $req->validate([
            'nome' => ['required', 'string', 'max:255']
        ]);

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

        $req->validate([
            'nome' => ['required', 'string', 'max:255']
        ]);
        
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
