<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Produto;

class VendaController extends Controller
{
	public function telaCarrinho(){
		return view('e-commerce.carrinho');
	}

	public function addCarrinho($id){
		$produto = Produto::find($id);

		$vetorProdutos[] = $produto;
		
		session(['vetorProdutos' => $vetorProdutos]);

		return redirect()->route('carrinho');
	}
	
    public function telaListarVendaGeral(){
        $lista = Venda::all();
        return view('venda.listarVendasGeral', ['lista' => $lista]);
    }}