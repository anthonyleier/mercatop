@extends('layouts.template')

@section('pagina')

<table class="table table-bordered table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Nome</th>
		<th>Link</th>
		<th>Alteração</th>
		<th>Exclusão</th>
	</thead>
	@foreach($lista as $link)	
	<tbody>
		<td>{{$link->id}}</td>
		<td>{{$link->nome}}</td>
		<td>{{$link->endereco}}</td>
		<td><a href="{{route('tela_alterar_link', ['id' => $link->id])}}" class="btn btn-warning btn-block">Alterar</a></td>
		<td><a href="#" onclick="exclui({{$link->id}})" class="btn btn-danger btn-block">Excluir</a></td>
	</tbody>
	@endforeach
</table>
<a href="{{route('tela_adicionar_link')}}" class="btn btn-primary btn-block">Adicionar Link</a>

<script>
    function exclui(id) {
        if (confirm("Deseja excluir o produto de id: " + id + "?")) {
            location.href = "/link/excluir/" + id;
        }
    }
</script>
@endsection