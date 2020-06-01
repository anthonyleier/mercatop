@extends('layouts.template')

@section('pagina')
<table class="table table-bordered table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Nome</th>
		<th>Email</th>
		<th>CPF</th>
		<th>RG</th>
		<th>Nascimento</th>
		<th>Telefone</th>		
		<th>Administrador</th>
	</thead>
	@foreach($lista as $elemento)	
	<tbody>
		<td>{{$elemento->id}}</td>
		<td>{{$elemento->name}}</td>
		<td>{{$elemento->email}}</td>
		<td>{{$elemento->cpf}}</td>
		<td>{{$elemento->rg}}</td>
		<td>{{$elemento->dataNascimento}}</td>
		<td>{{$elemento->telefone}}</td>
		<td> 
		@if ($elemento->permissao == 0)
			Não
		@else
			Sim
		@endif
		</td>
	</tr>
	</tbody>
	@endforeach
</table>
@endsection