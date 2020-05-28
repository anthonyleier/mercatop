@extends('layouts.template')

@section('pagina')

<table class="table table-bordered table-striped mt-4">
	<thead>
		<th>Nome do Produto</th>
		<th>Valor</th>
		<th>Categoria</th>
		<th>Comprar</th>
	</thead>
	@foreach($listaProdutos as $produto)	
	<tbody>
		<td>{{$produto->nome}}</td>
		<td>{{$produto->valor}}</td>
		<td>{{$produto->categoria_produto->nome}}</td>
		<td><a href="{{route('detalhes', ['id' => $produto->id])}}">Ver Mais</a></td>
	</tbody>
	@endforeach
</table>

@endsection