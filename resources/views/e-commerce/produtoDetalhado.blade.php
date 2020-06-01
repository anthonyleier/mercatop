@extends('layouts.template') @section('pagina')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{url($produto->fotos->first()->nome)}}" class="d-block w-100" alt="..." />
                    </div>
                    @foreach($produto->fotos as $foto)
                        @if(url($foto->nome) != url($produto->fotos->first()->nome)) 
                            <div class="carousel-item">
                                <img src="{{url($foto->nome)}}" class="d-block w-100" alt="..." />                        
                            </div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
        <div class="col-md-6 text-left">
        		<div>
        			<h2>{{$produto->nome}}</h2>
	            	<p>{{$produto->categoria->nome}}</p> <!-- Arrumar relacionamento e colocar o nome real -->
        		</div>
        		<div class="mt-5">
                    <form method="POST" action="{{ route('adicionar_carrinho') }}">
                        @csrf
                        <div class="row mt-5">
                            <div class="col-md-6"><h4 style="font-size:55px;" class="mb-5">R$ {{$produto->valor}}</h4></div>
                            <div class="col-md-6 mt-3"><input type="text" class="form-control" placeholder="Quantidade" name="quantidade"></div>
                        </div>                        
                        <input type="text" class="form-control" value="{{$produto->id}}" name="id_produto" hidden>
            		    <button type="submit" id="botao_verde" class="btn btn-primary btn-block btn-lg mt-5">Adicionar ao Carrinho</button>
                    </form>
        		</div>
                <div class="mt-4">
                    <p style="font-size:20px;">{{$produto->descricao}}</p>
                </div>
        	</div>
        </div>
    </div>
</div>
@endsection