<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Link;
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
            return redirect()->route('inicial');
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
		$v->statusEntrega = "Preparando";
		$v->statusPagamento = "Aguardando Pagamento";

        $v->save();

        $id_produto = $req->input('id_produto');
        $qtde = $req->input('quantidade');

        if($qtde <= 0) $qtde = 1;

        if($qtde >= 9999) {
        	$qtde = 9999;
        	session([
                'mensagem' => 'Como a quantidade para este produto é muito alta, ela foi automaticamente definida como "9999", pois o limite de compra é de 10000'
            ]);
        }
        
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

		$cacalog = Link::where('nome', '=', 'CaçaLog')->first();

		foreach ($lista as $venda){			
			$requisicaoCacalog = Http::post($cacalog->endereco, 
			["token" => $cacalog->token		
			]);

			if(isset($requisicaoCacalog['status'])) $venda->statusEntrega = $requisicaoCacalog['status'];

			$venda->save();
		}     
		
		return view('venda.listarVendasGeral', ['lista' => $lista]);
	}
	
	public function telaListarVendaEspecifico(){
		$lista = Venda::where('id_cliente', '=', Auth::user()->id)->get();

		$cacalog = Link::where('nome', '=', 'CaçaLog')->first();

		foreach ($lista as $venda){			
			$requisicaoCacalog = Http::post($cacalog->endereco, 
			["token" => $cacalog->token		
			]);

			if(isset($requisicaoCacalog['status'])) $venda->statusEntrega = $requisicaoCacalog['status'];

			$venda->save();
		}     
		
		return view('venda.listarVendasEspecifico', ['lista' => $lista]);
    }

    public function finalizar(Request $req){

		$idVenda = session()->get('idVenda');

		$endereco = $req->input('endereco_id');

		$venda = Venda::find($idVenda);

		if($venda->produtos->first()){
			$venda->id_endereco = $endereco;
			$venda->finalizada = true;

			$cacapay = Link::where('nome', '=', 'CaçaPay')->first();

			$requisicaoCacapay = Http::post($cacapay->endereco, 
			["token" => $cacapay->token,
			"cpf" => Auth::user()->cpf,
			"valor" => $venda->valor,
			"nome" => Auth::user()->name,
			"senha" => Auth::user()->password,
			"email" => Auth::user()->email			
			]);

			if($requisicaoCacapay->status() == 201){
				$venda->statusPagamento = "Pagamento Confirmado";
			}else if($requisicaoCacapay->status() == 401){
				$venda->statusPagamento = "Pagamento Negado";
			}else if($requisicaoCacapay->status() == 402 || $requisicaoCacapay->status() == 403 || $requisicaoCacapay->status() == 404){
				$venda->statusPagamento = "Problema de Conexão, tente novamente";
			}

			$venda->save();

			session()->forget('idVenda');

    		return view('venda.finalizarVenda', ['codigo' => $requisicaoCacapay->status(), 'venda' => $venda]);
		}else{
			session(['mensagem' => 'Não é possível finalizar a compra com o carrinho vazio.']);

            return redirect()->route('tela_carrinho');
		}		
    }
}