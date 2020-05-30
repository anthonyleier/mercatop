@extends('layouts.template')
@section('pagina')

<table class="table table-bordered table-striped mt-4">
	<thead>
		<th>ID da Venda</th>
		<th>Nome do Cliente</th>
		<th>Valor</th>
		<th>Endereço de Destino</th>
	</thead>
	@foreach($lista as $venda)
	<tbody>
		<td>{{$venda->id}}</td>
		<td>{{$venda->user->name}}</td>
		<td>{{$venda->valor}}</td>
		@if(isset($venda->endereco))
			<td>{{$venda->endereco->logradouro}}</td>
		@else
			<td>Endereço Inválido</td>
		@endif
	</tbody>
	@endforeach

</table>
@endsection