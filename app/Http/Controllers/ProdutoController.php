<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Produto;
use App\Categoria;
use App\Foto;

class ProdutoController extends Controller
{
    public function telaAdicionarProduto(){
    	$cp = Categoria::all();
    	return view('produto.cadastroProduto', ["cp" => $cp]);
    }

    public function telaAlterarProduto($id){
        $produto = Produto::find($id);
        $cp = CategoriaProduto::all();
        return view('produto.alterarProduto', ['produto' => $produto, "cp" => $cp]);        
    }

     public function telaListarProduto(){
        $lista = Produto::all();
        $foto = Foto::all();
        return view('produto.listarProduto', ['lista' => $lista, 'foto' => $foto]);
    }

    public function telaProdutoLista(){
        $listaProdutos = Produto::all();
        return view('e-commerce.produtoLista', ['listaProdutos' => $listaProdutos]);
    }

    public function telaProdutoGrade(){
        
    }

    public function telaDetalhes($slug){
        $produto = Produto::where('slug', '=', $slug)->get();
        $produto = $produto[0];
        return view('e-commerce.produtoDetalhado', ['produto' => $produto]);        
    }

    public function addProduto(Request $req){
    	$p = new Produto();
        $f = new Foto();

    	$nome = $req->input('nome');
    	$quantidade = $req->input('quantidade');
    	$valor = $req->input('valor');
    	$descricao = $req->input('descricao');
    	$id_categoria = $req->input('id_categoria');
    	$slug = Str::of($nome)->slug('-');

        $nome_arq = $req->file('upload'); 

        $p->nome = $nome;
        $p->quantidade = $quantidade;
        $p->valor = $valor;
        $p->descricao = $descricao;
        $p->id_categoria = $id_categoria;
        $p->slug = $slug;

        $f->nome = $nome_arq;
        $p->save();
        $f->id_produto = $p->id;
        $f->save();

        $nome_foto = $p->nome." ".$p->id;
        $nome_foto = Str::of($nome_foto)->slug('-');
        $p->slug = $nome_foto;
        $nome_foto = $nome_foto . "." . $nome_arq->extension();

        $nome_foto = $nome_arq->storeAs('foto_produto', $nome_foto);

        $f->nome = "storage/$nome_foto";
    	if($p->save()){
    		session([
                'mensagem' => 'Produto registrado com sucesso.'
            ]);
            $f->save();
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
