@extends('layouts.template')

@section('pagina')

<table class="table table-bordered table-striped mt-4">
	<thead>
		<th></th>
		<th>Nome do Produto</th>
		<th>Valor</th>
		<th>Categoria</th>
		<th>Comprar</th>
	</thead>
	@foreach($listaProdutos as $produto)	
	<tbody>
		<td><img src="https://picsum.photos/50/50"></td>
		<td>{{$produto->nome}}</td>
		<td>{{$produto->valor}}</td>
		<td>{{$produto->id_categoria}}</td>
		<td><a href="{{route('tela_detalhes', ['slug' => $produto->slug])}}">Ver Mais</a></td>
	</tbody>
	@endforeach
</table>

@endsection