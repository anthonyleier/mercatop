@extends('layouts.template') 
@section('pagina')

<div class="row mt-3">
    @foreach($listaProdutos as $produto)
    <div class="col-md-3 pr-5">
        <div class="card" style="width: 18rem;">
            <a href="{{route('tela_detalhes', ['slug' => $produto->slug])}}">
            	<img src="{{url($produto->fotos->first()->nome)}}" class="card-img-top" alt="..." width="100" height="200" />
            </a>
            <div class="card-body">
                <h5 class="card-title">{{$produto->nome}}</h5>
                <p class="card-text font-weight-bold">Preço: {{$produto->valor}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection