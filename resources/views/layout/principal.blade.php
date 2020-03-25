<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap.css">
    <script src="/jquery.js"></script>
    <script src="/popper.js"></script>
    <script src="/bootstrap.js"></script>
    <title>Controle de estoque</title>
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="{{action('ProdutoController@lista')}}">Estoque</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{action('ProdutoController@lista')}}">Lista</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{action('ProdutoController@novo')}}">Novo</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @yield('conteudo')
        <footer class="navbar text-white bg-dark">
            Desenvolvido por Lucas Novaes Dragojevic
        </footer>
    </div>
</body>
</html>