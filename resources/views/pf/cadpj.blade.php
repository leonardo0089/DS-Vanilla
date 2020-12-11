<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../res/site/css/global.css">
    <link rel="stylesheet" href="../res/site/css/header.css">
    <link rel="stylesheet" href="../res/site/css/main.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>DS-Vanilla</title>
</head>
<body>
    <header>
        <div class="fundo">
            <div class="lista">
                <div class="titulo">
                    <h3>O Funcionario que procura está aqui</h3>
                </div>
                <div class="conteudoL">
                    <ul style="list-style-image: url('../res/site/img/check.png');">
                        <li>Procure e ache os melhores funcionario do país.</li>
                        <li>Fique visível para milhares funcionarios.</li>
                        <li>Receba cv de varios funcionarios.</li>
                        <li>Entre em contato com funcionarios na hora.</li>
                    </ul>
                </div>
            </div>  
            <p style="font-weight: 100; margin: 0;">Os melhores funcionarios estão aqui!</p>
            <div class="empresas">
                
            </div>
        </div>
    </header>
    <main>
        <div class="conteudoMain">
            <div class="navegacao">
                <img src="../res/shop/img/pp.jpg" alt=""> <p>Já usa o DS-Vanilla? <a href="{{ route('site.login') }}">Login</a></p>
            </div>
            <div class="containerFormulario">
                <div class="containerInterno">
                    <div class="tituloContainer">
                        <h2>Cadastre sua empresa GRÁTIS!</h2>
                    </div>
                <div class="containerForm">
                    <form method="POST" action="{{ route('cad-pj') }}" >
                        {!! csrf_field() !!}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="inputEmail4">Nome Fantasia</label>
                              <input type="text" class="form-control" id="inputEmail4" name="nome_f">
                            </div>
                            
                          </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">E-mail</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email_pj">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Senha</label>
                            <input type="password" class="form-control" id="inputPassword4" name="senha_pj">
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">CNPJ</label>
                                <input type="text" class="form-control" onkeypress="mascara(this, '##.###.###.####-##')" maxlength="18" id="inputEmail4" name="cnpj">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-danger col-md-12">Cadastrar</button>
                      </form>
                </div>

                </div>
            </div>
            <div class="rodape">

            </div>
        </div>
    </main>
    <script type="text/javascript" src="/js/function.js"></script>
</body>
</html>