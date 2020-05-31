@extends('layouts.template')
@section('pagina')

<table class="table table-bordered table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Nome do Produto</th>
		<th>Quantidade</th>
		<th>Valor</th>
		<th>Categoria</th>
		<th>Quantidade de Fotos</th>
		<th>Descrição</th>
		<th>Alteração</th>
		<th>Exclusão</th>
	</thead>
	@foreach($lista as $produto)	
	<tbody>
		<td>{{$produto->id}}</td>
		<td>{{$produto->nome}}</td>
		<td>{{$produto->quantidade}}</td>
		<td>{{$produto->valor}}</td>
		@if(isset($produto->categoria->nome))<td>{{$produto->categoria->nome}}</td>@else<td>Categoria Deletada</td>@endif
		@php
			$qtdFotos = 0;
			foreach($produto->fotos as $foto){
				$qtdFotos++;
			}
		@endphp
		<td>{{$qtdFotos}}</td>
		<td>{{$produto->descricao}}</td>
		<td><a href="{{route('tela_alterar_produto', ["id" => $produto->id])}}" class="btn btn-warning btn-block">Alterar</a></td>
		<td><a href="#" onclick="exclui({{$produto->id}})" class="btn btn-danger btn-block">Excluir</a></td>
	</tbody>
	@endforeach
</table>
<a href="{{route('tela_adicionar_produto')}}" class="btn btn-primary btn-block">Novo Produto</a>

<script>
    function exclui(id) {
        if (confirm("Deseja excluir o produto de id: " + id + "?")) {
            location.href = "/produto/excluir/" + id;
        }
    }
</script>
@endsection