@extends('layouts.template')

@section('pagina')
{{$produto->nome}}
<a href="{{route('addCarrinho', ['id' => $produto->id])}}">Comprar Agora</a>

@endsection