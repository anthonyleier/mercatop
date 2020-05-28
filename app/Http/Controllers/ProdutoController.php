<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Produto;
use App\CategoriaProduto;

class ProdutoController extends Controller
{
    public function telaAdicionarProduto(){
    	$cp = CategoriaProduto::all();
    	return view('produto.cadastroProduto', ["cp" => $cp]);
    }

    public function telaAlterarProduto($id){
        $produto = Produto::find($id);
        $cp = CategoriaProduto::all();
        return view('produto.alterarProduto', ['produto' => $produto, "cp" => $cp]);        
    }

     public function telaListarProduto(){
        $lista = Produto::all();
        return view('produto.listarProduto', ['lista' => $lista]);
    }

    public function telaProdutoLista(){
        $listaProdutos = Produto::all();
        return view('e-commerce.produtoLista', ['listaProdutos' => $listaProdutos]);
    }

    public function telaProdutoGrade(){
        
    }

    public function telaDetalhes($id){
        $produto = Produto::find($id);
        return view('e-commerce.produtoDetalhado', ['produto' => $produto]);        
    }

    public function addProduto(Request $req){
    	$p = new Produto();

    	$nome = $req->input('nome');
    	$quantidade = $req->input('quantidade');
    	$valor = $req->input('valor');
    	$descricao = $req->input('descricao');
    	$id_categoria = $req->input('id_categoria');
    	$slug = Str::of($nome)->slug('-');


        $p->nome = $nome;
        $p->quantidade = $quantidade;
        $p->valor = $valor;
        $p->descricao = $descricao;
        $p->id_categoria = $id_categoria;
        $p->slug = $slug;

    	if($p->save()){
    		session([
                'mensagem' => 'Produto registrado com sucesso.'
            ]);
            $p->slug = Str::of($p->nome." ".$p->id)->slug('-');
            $p->save();
    	}else{
    		session([
                'mensagem' => 'O produto não foi registrado.'
            ]);
    	}
    	return redirect()->route('tela_listar_produto');
    }

    public function updateProduto($id, Request $req){
        $p = Produto::find($id);

        $nome = $req->input('nome');
    	$quantidade = $req->input('quantidade');
    	$valor = $req->input('valor');
    	$descricao = $req->input('descricao');
    	$id_categoria = $req->input('id_categoria');
    	$slug = Str::of($p->nome." ".$p->id)->slug('-'); 


        $p->nome = $nome;
        $p->quantidade = $quantidade;
        $p->valor = $valor;
        $p->descricao = $descricao;
        $p->id_categoria = $id_categoria;
        $p->slug = $slug;

        if($p->save()){
            session([
                'mensagem' => 'Categoria atualizada com sucesso.'
            ]);
        }else{
            session([
                'mensagem' => 'A categoria não foi atualizada.'
            ]);
        }
        return redirect()->route('tela_listar_produto');
    }


    public function deleteProduto($id){
        $p = Produto::find($id);     

        if($p->delete()){
            session([
                'mensagem' => 'Produto deletado com sucesso.'
            ]); 
        }else{
            session([
                'mensagem' => 'O produto não foi apagada.'
            ]);
        }
        return redirect()->route('tela_listar_produto');
    }
}
