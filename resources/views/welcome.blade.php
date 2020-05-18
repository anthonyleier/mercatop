@extends('layouts.template')

@section('pagina')
<div class='mt-4 text-center'>
    <h2>Seja bem-vindo ao Mercatop</h2>
    @if (Auth::check())
    	<h4>Olá, {{Auth::user()->name}}</h4>
    @endif
    <h4>😉</h4>
</div>

@endsection