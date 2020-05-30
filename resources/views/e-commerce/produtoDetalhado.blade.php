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
        <div class="col-md-6 text-right">
        		<div>
        			<h2>{{$produto->nome}}</h2>
	            	<p>{{$produto->id_categoria}}</p> <!-- Arrumar relacionamento e colocar o nome real -->
	            	<p style="font-size:20px;">{{$produto->descricao}}</p>
        		</div>
        		<div style="margin-top: 50px;">
        			<h4 style="font-size:55px;" class="mb-5">R$ {{$produto->valor}}</h4>
                    <form method="POST" action="{{ route('adicionar_carrinho') }}">
                        @csrf
                        <input type="text" class="form-control" placeholder="quantidade" name="quantidade">
                        <input type="text" class="form-control" value="{{$produto->id}}" name="id_produto" hidden>
            		    <button type="submit" class="btn btn-primary btn-block btn-lg">Comprar Agora</button>
                    </form>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection