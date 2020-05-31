@extends('layouts.template')
@section('pagina')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alteração de Categoria') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('alterar_categoria', ["id" => $categoria->id]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" required autocomplete="nome" value="{{$categoria->nome}}" autofocus />

                                @error('nome')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="categoria_pai" class="col-md-4 col-form-label text-md-right">{{ __('Categoria Pai') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="categoria_pai" name="categoria_pai">
                                      <option value=""></option>
                                @foreach($listaCategorias as $c)                                    
                                    @if($c->nome == $categoria->categoria_pai)
                                        <option selected>{{$c->nome}}</option>
                                    @else
                                        <option>{{$c->nome}}</option>
                                    @endif
                                @endforeach                            
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning btn-block">
                                    {{ __('Alterar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection