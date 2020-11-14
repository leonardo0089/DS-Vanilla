<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/inicio/inicio.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <title>DS-Vanilla</title>
</head>
<body>
    <header>
        <div class="containerConteudo">
            <div class="containerInterno">
                <div class="titulo">
                    <h3>DS-Vanilla para pessoas Fisicas!</h3>
                </div>
                <div class="textosContainer">
                    <div class="textos">
                        <p>Crie já sua conta em nosso site e seja encontrado pelas melhores empresas do país
                            com total segurança, e GRATÍS!
                        </p>
                    </div>
                </div>
                <div class="botao">
                    <button type="submit" class="btn-grad"><a href="{{ route('site.cadpf') }}">Cadastre-se</a></button>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="containerConteudo">
            <div class="containerInterno">
                <div class="titulo">
                    <h3>DS-Vanilla para Empresas!</h3>
                </div>
                <div class="textosContainer">
                    <div class="textos">
                        <p>Crie sua conta hoje e contrate o melhor funcionario para sua empresa ou poste suas vagas
                        tudo isso GRATÍS!</p>
                    </div>
                </div>
                <div class="botao">
                    <button type="submit" class="btn-grad"><a href="{{ route('site.cadpj') }}">Cadastre-se</a></button>
                </div>
            </div>
    </main>
</body>
</html>