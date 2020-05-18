<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;

class CidadeController extends Controller
{
    function telaAdicionarCidade(){
    	return view('cidade.cadastroCidade');
    }

    function telaAlterarCidade($id){
        $cidade = Cidade::find($id);
        return view('cidade.alterarCidade', ['cidade' => $cidade]);        
    }

    function telaListarCidade(){
        $lista = Cidade::all();
        return view('cidade.listarCidades', ['lista' => $lista]);
    }

    function addCidade(Request $req){
    	$c = new Cidade();

    	$c->nome = $req->input('nome');
    	$c->estado = $req->input('estado');

    	$req->validate([
    	    'nome' => ['required', 'string', 'max:75', 'alpha'],
    	    'estado' => ['required', 'string', 'max:75', 'alpha']
    	]);

    	if($c->save()){
    		session([
                'mensagem' => 'Cidade registrada com sucesso.'
            ]); 
    	}else{
    		session([
                'mensagem' => 'A cidade não foi registrada.'
            ]);
    	}
    	return redirect()->route('tela_listar_cidade');
    }

    function updateCidade($id, Request $req){
        $c = Cidade::find($id);

        $c->nome = $req->input('nome');
        $c->estado = $req->input('estado');

        $req->validate([
            'nome' => ['required', 'string', 'max:75', 'alpha'],
            'estado' => ['required', 'string', 'max:75', 'alpha']
        ]);

        if($c->save()){
            session([
                'mensagem' => 'Cidade atualizada com sucesso.'
            ]); 
        }else{
            session([
                'mensagem' => 'A cidade não foi atualizada.'
            ]);
        }
        return redirect()->route('tela_listar_cidade');
    }

    function deleteCidade($id){
        $c = Cidade::find($id);     

        if($c->delete()){
            session([
                'mensagem' => 'Cidade deletada com sucesso.'
            ]); 
        }else{
            session([
                'mensagem' => 'A cidade não foi apagada.'
            ]);
        }
        return redirect()->route('tela_listar_cidade');
    }
}
