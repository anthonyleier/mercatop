@extends('layouts.template')
@section('pagina')

<table class="table table-bordered table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Categoria</th>
		<th>Categoria Pai</th>
		<th>Alteração</th>
		<th>Exclusão</th>
	</thead>
	@foreach($lista as $elemento)	
	<tbody>
		<td>{{$elemento->id}}</td>
		<td>{{$elemento->nome}}</td>
		<td>{{$elemento->categoria_pai}}</td>
		<td><a href="{{route('tela_alterar_categoria', ["id" => $elemento->id])}}" class="btn btn-warning btn-block">Alterar</a></td>
		<td><a href="#" onclick="exclui({{$elemento->id}})" class="btn btn-danger btn-block">Excluir</a></td>
	</tbody>
	@endforeach
</table>
<a href="{{route('tela_adicionar_categoria')}}" class="btn btn-primary btn-block">Nova Categoria</a>

<script>
    function exclui(id) {
        if (confirm("Deseja excluir a cidade de id: " + id + "?")) {
            location.href = "/categoria/excluir/" + id;
        }
    }
</script>
@endsection