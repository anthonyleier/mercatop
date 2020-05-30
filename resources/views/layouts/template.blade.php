<!DOCTYPE html>
<html>
    <head>
        <title>Mercatop</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
        <style type="text/css">
            #inputpesquisa {
                margin-left: 150px;
                width: 500px;
            }
            #menu {
                padding-left: 50px;
            }
            #carrinho{
                margin-left: 200px;
                padding-top: 4px;
            }
        </style>
    </head>
    <body class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-dark">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="{{route('inicial')}}">Mercatop</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    @if (Auth::check())
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li>
                            <form class="form-inline" action="{{route('inicial')}}">
                                <input id="inputpesquisa" class="form-control mr-sm-2" type="search" placeholder="O que você quer agora?" aria-label="Search" name="busca" />
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                        </li>
                            <li class="d-sm-none d-md-block d-none">
                               <a href="{{route('tela_carrinho')}}"><img id="carrinho" src="/storage/carrinho.png" width="30"></a>
                            </li>
                            <div class="dropdown text-light" id="menu">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name." "}}</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    @if (Auth::user()->verificaCliente())
                                    <a href="{{route('tela_listar_endereco')}}"><button class="dropdown-item" type="button">Meus Endereços</button></a>
                                    @endif @if (Auth::user()->verificaAdmin())
                                    <a href="{{route('tela_listar_users')}}"><button class="dropdown-item" type="button">Usuários</button></a>
                                    <a href="{{route('tela_listar_cidade')}}"><button class="dropdown-item" type="button">Cidades</button></a>
                                    <a href="{{route('tela_listar_categoria')}}"><button class="dropdown-item" type="button">Categorias</button></a>
                                    <a href="{{route('tela_listar_produto')}}"><button class="dropdown-item" type="button">Produtos</button></a>
                                    <a href="{{route('tela_listar_venda_geral')}}"><button class="dropdown-item" type="button">Vendas</button></a>
                                    @endif
                                    <a href="{{route('logout')}}"><button class="dropdown-item" type="button">Sair</button></a>
                                </div>
                            </div>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        @if (session()->has('mensagem'))
                        <div class="alert alert-dark mt-4">{{session('mensagem')}}</div>
                        {{ session()->forget('mensagem') }} @endif @yield('pagina')
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
