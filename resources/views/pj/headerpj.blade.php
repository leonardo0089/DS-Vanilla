<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../res/site/css/cadGlobal.css">
    <link rel="stylesheet" href="../../res/site/css/cadastroHeader.css">
    <link rel="stylesheet" href="../../res/site/css/cadformulario.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../res/site/css-Perfil/perfil.css">
    <link rel="stylesheet" href="../../res/site/css-Perfil/perfilPJ.css">
    <link rel="stylesheet" href="../../res/site/css-Perfil/perfil-m.css">
    <link rel="stylesheet" href="../../res/site/css-Vaga/sobreVaga.css">
    <link rel="stylesheet" href="../../res/css-PJ/perfil-PJ.css">
    <title>@yield('titulopagina')</title>
</head>

<body>
    <header>
        <div class="navegacao">
            <div class="containerFoto1">
                <img src="../../res/shop/img/pp.jpg" alt="" style="width: 110px; height: 110px;">
            </div>
            <div class="links">
                <ul>
                    <li><a href="{{ route('dash.perfil') }}">Inicio</a></li>
                    <li><a href="{{ route('perfil.vagas-postadas-pj') }}">Vagas</a></li>
                    <li><a href="{{ route('perfil.postar-vaga') }}">Postar Vaga</a></li>
                    <li><a href="{{ route('perfil.chat-pj') }}">Chat</a></li>
                    <li><a href="{{ route('perfil.busca-funcionario') }}">Buscar</a></li>
                    <li><a href="{{ route('logout')}}">Sair</a></li>
                </ul>
            </div>
        </div>
    </header>

    