<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;

class VendaController extends Controller
{
    public function telaListarVendaGeral(){
        $lista = Venda::all();
        return view('venda.listarVendasGeral', ['lista' => $lista]);
    }}