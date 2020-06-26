@extends('layouts.template')

@section('pagina')
<div class='mt-4 text-center'>
    @if($codigo >= 200 && $codigo < 300)
        <h2>Seu pedido foi finalizado com sucesso.</h2>
        <h4>😉</h4>
        <h6>Código da Solicitação: {{$codigo}}</h6>
    @else
        <h2>Infelizmente, houve um erro ao contatar o Caçapay</h2>
        <h6>Código da Solicitação: {{$codigo}}</h6>
    @endif
</div>

@endsection