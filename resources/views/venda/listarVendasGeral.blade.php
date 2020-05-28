@extends('layouts.template')
@section('pagina')

<table class="table table-bordered table-striped mt-4">
	<thead>
		<th>ID</th>
		<th>Nome do Cliente</th>
		<th>Valor</th>
		<th>Produtos</th>
	</thead>
	<!-- @foreach($lista as $venda)-->
	<tbody>
		<td>{{$produto->id}}</td>
		<td>{{$venda->id_cliente>nome}}</td>
		<td>{{$produto->quantidade}}</td>
		<td><a href="#" class="btn btn-warning btn-block"ss>Produtos</a></td>
	</tbody>
	<!--@endforeach-->

</table>
@endsection