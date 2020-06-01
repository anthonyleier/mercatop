<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\Endereco;
use Auth;

class EnderecoController extends Controller
{
    public function telaAdicionarEndereco(){
    	$lista = Cidade::all();
    	return view('endereco.cadastroEndereco', ["lista" => $lista]);
    }

    public function telaAlterarEndereco($id){
        $endereco = Endereco::find($id);
        $lista = Cidade::all();
        return view('endereco.alterarEndereco', ["endereco" => $endereco, "lista" => $lista]);
    }

    public function telaListarEndereco(){
        return view('endereco.listarEnderecos');
    }

    public function addEndereco(Request $req){

        $req->validate([
            'descricao' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'numeric', 'max:999'],
            'bairro' => ['required', 'string', 'max:255']
        ]);

    	$e = new Endereco();

    	$e->descricao = $req->input('descricao');
    	$e->logradouro = $req->input('logradouro');
    	$e->numero = $req->input('numero');
    	$e->bairro = $req->input('bairro');
    	$e->id_cidade = $req->input('cidade');
    	$e->id_cliente = Auth::user()->id;

    	if($e->save()){
    		session([
                'mensagem' => 'Endereço registrado com sucesso.'
            ]); 
    	}else{
    		session([
                'mensagem' => 'O endereço não foi registrado.'
            ]);
    	}
    	return redirect()->route('tela_listar_endereco');
    }

    public function updateEndereco($id, Request $req){

        $req->validate([
            'descricao' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:10'],
            'bairro' => ['required', 'string', 'max:255']
        ]);

        $e = Endereco::find($id);

        $e->descricao = $req->input('descricao');
        $e->logradouro = $req->input('logradouro');
        $e->numero = $req->input('numero');
        $e->bairro = $req->input('bairro');
        $e->id_cidade = $req->input('cidade');
        $e->id_cliente = Auth::user()->id;

        if($e->save()){
            session([
                'mensagem' => 'Endereço atualizado com sucesso.'
            ]); 
        }else{
            session([
                'mensagem' => 'O endereço não foi atualizado.'
            ]);
        }
        return redirect()->route('tela_listar_endereco');
    }

    public function deleteEndereco($id){
        $e = Endereco::find($id);

        if($e->delete()){
            session([
                'mensagem' => 'Cidade deletada com sucesso.'
            ]); 
        }else{
            session([
                'mensagem' => 'A cidade não foi apagada.'
            ]);
        }
        return redirect()->route('tela_listar_endereco');
    }
}
