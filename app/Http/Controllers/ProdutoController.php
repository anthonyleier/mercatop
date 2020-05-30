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
        $cp = Categoria::all();
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

    public function telaProdutoGrade(Request $req){

        $tamanhoPag = 16;
        $busca = "";
        

        if($req->query('busca')){
            $busca = $req->query('busca');

            $listaProdutos = Produto::where('nome', 'LIKE', "%$busca%"); 
            $listaProdutos = $listaProdutos->paginate($tamanhoPag);
        }else{
            $listaProdutos = Produto::paginate($tamanhoPag);
        }

        if($busca != null) {
            $parametros["busca"] = $busca;
            $listaProdutos = $listaProdutos->appends($parametros);
        }



        return view('e-commerce.produtoGrade', ['listaProdutos' => $listaProdutos]);        
    }

    public function telaDetalhes($slug){
        $produto = Produto::where('slug', '=', $slug)->get();
        $produto = $produto[0];
        return view('e-commerce.produtoDetalhado', ['produto' => $produto]);        
    }

    public function addProduto(Request $req){

        $req->validate([
            'nome' => ['required', 'string', 'max:255'],
            'quantidade' => ['required'],
            'valor' => ['required'],
            'descricao' => ['required', 'string', 'max:255'],
        ]);

    	$p = new Produto();

    	$nome = $req->input('nome');
    	$quantidade = $req->input('quantidade');
    	$valor = $req->input('valor');
    	$descricao = $req->input('descricao');
    	$id_categoria = $req->input('id_categoria');
    	$slug = Str::of($nome)->slug('-');

        $imagem1 = $req->file('imagem1'); 
        $imagem2 = $req->file('imagem2'); 
        $imagem3 = $req->file('imagem3'); 
        $imagem4 = $req->file('imagem4'); 
        $imagem5 = $req->file('imagem5'); 

        $p->nome = $nome;
        $p->quantidade = $quantidade;
        $p->valor = $valor;
        $p->descricao = $descricao;
        $p->id_categoria = $id_categoria;
        $p->slug = $slug;

        $p->save();

        if(isset($imagem1)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 1";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem1->extension();

            $nome_foto = $imagem1->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        if(isset($imagem2)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 2";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem2->extension();

            $nome_foto = $imagem2->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        if(isset($imagem3)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 3";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem3->extension();

            $nome_foto = $imagem3->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        if(isset($imagem4)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 4";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem4->extension();

            $nome_foto = $imagem4->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        if(isset($imagem5)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 5";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem5->extension();

            $nome_foto = $imagem5->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        $linkSlug = $p->nome." ".$p->id;
        $linkSlug = Str::of($linkSlug)->slug('-');
        $p->slug = $linkSlug;

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

        $req->validate([
            'nome' => ['required', 'string', 'max:255'],
            'quantidade' => ['required'],
            'valor' => ['required'],
            'descricao' => ['required', 'string', 'max:255'],
        ]);
        
        $p = Produto::find($id);

        $nome = $req->input('nome');
        $quantidade = $req->input('quantidade');
        $valor = $req->input('valor');
        $descricao = $req->input('descricao');
        $id_categoria = $req->input('id_categoria');
        $slug = Str::of($nome)->slug('-');

        $imagem1 = $req->file('imagem1'); 
        $imagem2 = $req->file('imagem2'); 
        $imagem3 = $req->file('imagem3'); 
        $imagem4 = $req->file('imagem4'); 
        $imagem5 = $req->file('imagem5'); 

        $p->nome = $nome;
        $p->quantidade = $quantidade;
        $p->valor = $valor;
        $p->descricao = $descricao;
        $p->id_categoria = $id_categoria;
        $p->slug = $slug;

        $p->save();

        if(isset($imagem1)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 1";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem1->extension();

            $nome_foto = $imagem1->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        if(isset($imagem2)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 2";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem2->extension();

            $nome_foto = $imagem2->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        if(isset($imagem3)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 3";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem3->extension();

            $nome_foto = $imagem3->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        if(isset($imagem4)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 4";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem4->extension();

            $nome_foto = $imagem4->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        if(isset($imagem5)){
            $f = new Foto();

            $nome_foto = $p->nome." ".$p->id." 5";
            $nome_foto = Str::of($nome_foto)->slug('-');
            $nome_foto = $nome_foto . "." . $imagem5->extension();

            $nome_foto = $imagem5->storeAs('foto_produto', $nome_foto);
            $f->nome = "storage/$nome_foto";
            $f->id_produto = $p->id;
            $f->save();
        }

        $linkSlug = $p->nome." ".$p->id;
        $linkSlug = Str::of($linkSlug)->slug('-');
        $p->slug = $linkSlug;

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


    public function deleteProduto($id){
        $p = Produto::find($id);

        foreach($p->fotos as $foto){
            $foto->delete();
        }     

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
