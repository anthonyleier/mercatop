@extends('layouts.template') 
@section('pagina')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alteração de Produto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('alterar_produto', ['id' => $produto->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Produto') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" required autocomplete="nome" autofocus value="{{$produto->nome}}"/>

                                @error('nome')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantidade" class="col-md-4 col-form-label text-md-right">{{ __('Quantidade') }}</label>
                            <div class="col-md-6">
                                <input id="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" required autocomplete="quantidade" autofocus value="{{$produto->quantidade}}"/>

                                @error('quantidade')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>
                            <div class="col-md-6">
                                <input id="valor" type="number" step="0.01" class="form-control @error('valor') is-invalid @enderror" name="valor" required autocomplete="valor" autofocus value="{{$produto->valor}}"/>

                                @error('valor')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <select class="custom-select" name="id_categoria" value="{{$produto->id_categoria}}">
                                    @foreach($cp as $p)
                                    <option value="{{ $p->id }}">{{ $p->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <input name="descricao" type="text" class="form-control" value="{{$produto->descricao}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imagem1" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 1') }}</label>
                            <div class="col-md-6">
                                <input name="imagem1" type="file" class="form-control" id="imagem1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imagem2" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 2') }}</label>
                            <div class="col-md-6">
                                <input name="imagem2" type="file" class="form-control" id="imagem2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imagem3" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 3') }}</label>
                            <div class="col-md-6">
                                <input name="imagem3" type="file" class="form-control" id="imagem3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imagem4" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 4') }}</label>
                            <div class="col-md-6">
                                <input name="imagem4" type="file" class="form-control" id="imagem4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imagem5" class="col-md-4 col-form-label text-md-right">{{ __('Imagem 5') }}</label>
                            <div class="col-md-6">
                                <input name="imagem5" type="file" class="form-control" id="imagem5">
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