@extends('layouts.template')

@section('pagina')

@php
$carrinho = session()->get('vetorProdutos');

@endphp
@foreach($carrinho as $item)
{{$item}}
@endforeach

@endsection