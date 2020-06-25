@extends('layouts.template')
@section('pagina')

<table class="table table-bordered table-striped mt-4">
	<thead>
		<th>ID da Venda</th>
		<th>Nome do Cliente</th>
		<th>Valor</th>
		<th>Endereço de Destino</th>
		<th>Pagamento</th>
		<th>Entrega</th>
	</thead>
	<tbody>
	@foreach($lista as $venda)	
	<tr>
		@if($venda->finalizada)
			<td>{{$venda->id}}</td>
			<td>{{$venda->user->name}}</td>
			<td>{{$venda->valor}}</td>
			@if(isset($venda->endereco))
				<td>{{$venda->endereco->logradouro.", ".$venda->endereco->numero}}</td>
			@else
				<td>Endereço Deletado ou Inválido</td>
			@endif
			<td>{{$venda->statusPagamento}}</td>
			<td>{{$venda->statusEntrega}}</td>
		@endif
	</tr>	
	@endforeach
	</tbody>
</table>
@endsection