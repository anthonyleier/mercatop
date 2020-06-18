<!DOCTYPE html>
<html>
    <head>
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167936652-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "UA-167936652-1");
        </script>

        <title>Mercatop</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
        <style>
            #navbar {
                background-color: #ff9933 !important;
                border-color: #ff9933 !important;
            }

            #menu, #rodape {
                background-color: #2b2b2b !important;
                border-color: #2b2b2b !important;
            }

            #botao_verde {
                background-color: #339966 !important;
                border-color: #339966 !important;
            }

            #texto_menu {
                color: #e6e6e6 !important;
                text-decoration: none !important;
            }
        </style>
    </head>
    <body class="container-fluid">
        <div class="row">
            <div id="navbar" class="col-md-12 bg-dark">
                <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="{{route('inicial')}}"><img src="/storage/icones/logo.png" width="75" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    @if (Auth::check())
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="form-inline ml-5 pr-5" action="{{route('inicial')}}">
                            <input id="inputpesquisa" class="form-control pr-5" type="search" placeholder="O que você quer?" aria-label="Search" name="busca" />
                            <button id="botao_verde" class="btn btn-outline-success ml-1" type="submit"><img src="/storage/icones/busca.png" width="25" /></button>
                        </form>
                        <a class="ml-auto pl-5" href="{{route('tela_carrinho')}}"><img id="carrinho" src="/storage/icones/carrinho.png" width="30" /></a>

                        <div class="dropdown ml-3">
                            <button id="menu" class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name." "}}</button>
                            <div class="dropdown-menu bg-dark text-light" aria-labelledby="dropdownMenu2">
                                @if (Auth::user()->verificaCliente())
                                <a id="texto_menu" href="{{route('tela_listar_endereco')}}"><button class="dropdown-item bg-dark text-light" type="button">Meus Endereços</button></a>
                                @endif @if (Auth::user()->verificaAdmin())
                                <a id="texto_menu" href="{{route('tela_listar_users')}}"><button class="dropdown-item bg-dark text-light" type="button">Usuários</button></a>
                                <a id="texto_menu" href="{{route('tela_listar_cidade')}}"><button class="dropdown-item bg-dark text-light" type="button">Cidades</button></a>
                                <a id="texto_menu" href="{{route('tela_listar_categoria')}}"><button class="dropdown-item bg-dark text-light" type="button">Categorias</button></a>
                                <a id="texto_menu" href="{{route('tela_listar_produto')}}"><button class="dropdown-item bg-dark text-light" type="button">Produtos</button></a>
                                <a id="texto_menu" id="texto_menu" href="{{route('tela_listar_venda_geral')}}"><button class="dropdown-item bg-dark text-light" type="button">Vendas</button></a>
                                @endif
                                <a id="texto_menu" href="{{route('logout')}}"><button class="dropdown-item bg-dark text-light" type="button">Sair</button></a>
                            </div>
                        </div>
                        @endif
                    </div>
                </nav>
            </div>

            <div class="container-fluid">
                <div class="row">
                    @yield('pre-pagina')
                    <div class="col-md-0"></div>
                    <div class="col-md-12">
                        @if (session()->has('mensagem'))
                        <div class="alert alert-dark mt-4">{{session('mensagem')}}</div>
                        {{ session()->forget('mensagem') }} @endif @yield('pagina')
                    </div>
                    <div class="col-md-0"></div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div id="rodape" class="col-md-12">
                <nav id="rodape" class="navbar fixed-bottom navbar-dark bg-dark justify-content-center">
                    <a class="navbar-brand" href="{{route('inicial')}}"><img src="/storage/icones/texto.png" width="75" /></a>
                </nav>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>