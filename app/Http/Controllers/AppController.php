<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Venda;

class AppController extends Controller
{
    function dashboard(){
    	$vendas_hora = Venda::selectRaw('HOUR(created_at) as hora, ROUND(AVG(valor), 2) as media')->groupByRaw('HOUR(created_at)')->orderByRaw('1')->get();

    	$produto = DB::table('produtos')->join('produtos_vendas', 'produtos.id', '=', 'produtos_vendas.id_produto')->selectRaw("produtos.nome as nome, SUM(produtos_vendas.quantidade) as quantidade")->groupByRaw("produtos.id, produtos.nome")->get();

    	return view('dashboard', ['vendas_hora' => $vendas_hora], ['produto' => $produto]);
    }
}
