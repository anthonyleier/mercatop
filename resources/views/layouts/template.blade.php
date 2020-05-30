<!DOCTYPE html>
<html>
    <head>
        <title>Mercatop</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    </head>
    <body class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-dark">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="{{route('tela_produtos_lista')}}">Mercatop</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    @if (Auth::check())
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            @if (Auth::user()->verificaCliente())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_adicionar_endereco')}}">Cadastrar Endereço</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_listar_endereco')}}">Meus Endereços</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_carrinho')}}">Carrinho</a>
                            </li>
                            @endif @if (Auth::user()->verificaAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_listar_users')}}">Listar Usuários</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_adicionar_cidade')}}">Cadastrar Cidade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_listar_cidade')}}">Listar Cidades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_adicionar_categoria')}}">Cadastrar Categoria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_listar_categoria')}}">Listar Categoria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_adicionar_produto')}}">Cadastrar Produto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_listar_produto')}}">Listar Produto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tela_listar_venda_geral')}}">Listar Vendas</a>
                            </li>
                            @endif
                        </ul>
                        <div class="text-light mr-4">
                            {{Auth::user()->name}}
                        </div>
                        <div class="text-light">
                            <a class="btn btn-primary btn-sm" href="{{route('logout')}}">Sair</a>
                        </div>
                        @endif
                    </div>
                </nav>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        @if (session()->has('mensagem'))
                        <div class="alert alert-dark mt-4">{{session('mensagem')}}</div>
                        {{ session()->forget('mensagem') }} 
                        @endif 
                        @yield('pagina')
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>