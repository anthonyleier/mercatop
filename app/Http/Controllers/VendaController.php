<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Produto;
use Auth;

class VendaController extends Controller
{
	public function telaCarrinho(){

		if(session()->has('idVenda')){
			$idVenda = session()->get('idVenda');
			$venda = Venda::find($idVenda);
			$carrinho = $venda->produtos;
			$total = $venda->valor;
			return view('e-commerce.carrinho', ['carrinho' => $carrinho, 'total' => $total]);
		}else{
			session([
                'mensagem' => 'Seu carrinho está vazio.'
            ]);         
            return back();
		}	
	}

	public function addCarrinho(Request $req){

		$id_cliente = Auth::user()->id;

		if(session()->has('idVenda')){
			$idVenda = session()->get('idVenda');
			$v = Venda::find($idVenda);
		}else{
			$v = new Venda();
			$v->valor = 0;
		}
        
        $v->id_cliente = $id_cliente;
        $v->finalizada = false;

        $v->save();

        $id_produto = $req->input('id_produto');
        $qtde = $req->input('quantidade');

        if($qtde == 0) $qtde = 1;
        
        $p = Produto::find($id_produto);

        $subtotal = $p->valor * $qtde;

        $colunas_pivot = ['quantidade' => $qtde, 'subtotal' => $subtotal];

        $v->produtos()->attach($id_produto, $colunas_pivot);
        $v->valor += $subtotal;
        $v->save();
		
		session(['idVenda' => $v->id]);

		return redirect()->route('tela_carrinho');
	}

	public function removerCarrinho($id_pivot){

		$idVenda = session()->get('idVenda');
		$venda = Venda::find($idVenda);

		$valorRetirar = 0;

		foreach ($venda->produtos as $vp) {
			if($vp->pivot->id == $id_pivot){
				$valorRetirar = $vp->pivot->subtotal;
				break;
			}
		}

		$venda->valor = $venda->valor - $valorRetirar;
		$venda->produtos()->wherePivot('id', '=', $id_pivot)->detach();
		$venda->save();

		return redirect()->route('tela_carrinho');		
	}
	
    public function telaListarVendaGeral(){
        $lista = Venda::all();
        return view('venda.listarVendasGeral', ['lista' => $lista]);
    }

    public function telaFinal(){

		$idVenda = session()->get('idVenda');
		$venda = Venda::find($idVenda);

		$venda->finalizada = true;

		$venda->save();

		session()->forget('idVenda');

    	return view('venda.finalizarVenda');
    }
}