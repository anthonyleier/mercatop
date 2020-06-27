@extends('layouts.template')

@section('pagina')
<div class='mt-4 text-center'>
    <h2>{{$venda->statusPagamento}}</h2>
    <h6>Código: {{$codigo}}</h6>
</div>

@endsection