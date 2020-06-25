<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinkController extends Controller
{
    public function telaListarLink(){
        $lista = Link::all();
        return view('links.listarLink', ['lista' => $lista]);
    }

    public function telaAdicionarLink(){
        return view('links.criarLink');
    }

    public function telaAlterarLink($id){
        $link = Link::find($id);
        return view('links.alterarLink', ['link' => $link]);
    }

    public function addLink(Request $req){
        $link = new Link;

        $link->nome = $req->input('nome');
        $link->endereco = $req->input('endereco');
        $link->token = $req->input('token');

        if($link->save()){
            session([
                'mensagem' => "Link adicionado com sucesso"
            ]);
        }else{
            session([
            'mensagem' => "Link não adicionado"
            ]);
        }

        return redirect()->route('tela_listar_link');
    }

    public function updateLink($id, Request $req){
        $link = Link::find($id);

        $link->nome = $req->input('nome');
        $link->endereco = $req->input('endereco');
        $link->token = $req->input('token');

        if($link->save()){
            session([
                'mensagem' => "Link alterado com sucesso"
            ]);
        }else{
            session([
            'mensagem' => "Link não alterado"
            ]);
        }

        return redirect()->route('tela_listar_link');
    }

    public function deleteLink($id){
        $link = Link::find($id);

        if($link->delete()){
            session([
                'mensagem' => "Link deletado com sucesso"
            ]);
        }else{
            session([
            'mensagem' => "Link não deletado"
            ]);
        }

        return redirect()->route('tela_listar_link');
    }
}
