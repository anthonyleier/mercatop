@extends('layouts.template')
@section('pagina')

<div class="container-fluid mt-3">
	<h3>Seu Carrinho de Compras</h3>

	<table class="table table-bordered table-striped mt-4">
		<thead>
			<th>Nome do Produto</th>
			<th>Categoria</th>
			<th>Descrição</th>
			<th>Valor Individual</th>
			<th>Quantidade</th>
			<th>Subtotal</th>
			<th>Remover</th>
		</thead>
		@foreach($carrinho as $item)	
		<tbody>
			<td>{{$item->nome}}</td>
			<td>{{$item->id_categoria}}</td>
			<td>{{$item->descricao}}</td>
			<td>{{$item->valor}}</td>
			<td>{{$item->pivot->quantidade}}</td>
			<td>{{$item->pivot->subtotal}}</td>
			<td><a href="#" onclick="remover({{$item->pivot->id}})" class="btn btn-danger btn-block">Excluir</a></td>
		</tbody>
		@endforeach
	</table>
	<div class="text-right">
		<p class="font-weight-bolder">Total da Venda: R${{$total}}</p>
		<a href="{{route('tela_finalizar_venda')}}" class="btn btn-primary btn-block">Finalizar Venda</a>
	</div>

	<script>
	    function remover(id) {
	        if (confirm("Deseja remover o produto de id: " + id + "?")) {
	            location.href = "/carrinho/remover/" + id;
	        }
	    }
	</script>
</div>
@endsection