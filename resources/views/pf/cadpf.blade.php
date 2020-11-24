<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('res/site/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('res/site/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('res/site/css/main.css') }}">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <title>DS-Vanilla</title>
</head>
<body>
    <header>
        <div class="fundo">
            <div class="lista">
                <div class="titulo">
                    <h3>O Emprego que procura está aqui</h3>
                </div>
                <div class="conteudoL">
                    <ul style="list-style-image: url('res/site/img/check.png');">
                        <li>Candidate-se às melhores vagas do país.</li>
                        <li>Fique visível para milhares de empresas.</li>
                        <li>Receba vagas adequadas ao seu perfil.</li>
                        <li>Conheça as empresas por dentro.</li>
                    </ul>
                </div>
            </div>  
            <p style="font-weight: 100; margin: 0;">As Melhores empresas estão aqui</p>
            <div class="empresas">
                <img class="m-8" src="res/site/img/atento.png" height="32" alt="Atento"  />
                <img class="m-8" src="../res/site/img/claro.png" height="32" alt="Claro" />
                <img class="m-8" src="../res/site/img/riachuelo.png" height="32" alt="Riachuelo" />
                <img class="m-8" src="../res/site/img/avianca.png" height="32" alt="Avianca" />
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
                        <h2>Cadastre seu currículo GRÁTIS!</h2>
                    </div>
                <div class="containerForm">
                    <form method="POST" action="cad-pf">
                        {!! csrf_field() !!}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="inputEmail4">Nome e sobrenome</label>
                              <input type="text" class="form-control" id="inputEmail4" name="nome_e_sobrenome">
                            </div>
                            
                          </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">E-mail</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email_pf">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Senha</label>
                            <input type="password" class="form-control" id="inputPassword4" name="senha_pf">
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                              <label for="inputEmail4">CPF</label>
                              <input type="text" class="form-control" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" id="inputEmail4" name="cpf_pf">
                            </div>
                            <div class="col-md-7 mb-3">
                                <label for="validationCustom04">Categoria:</label>
                              <select class="custom-select" id="validationCustom04" required  name="categoria">
                                  <option selected disabled value="">Escolha</option>
                                  <option>Analista de Sistemas</option>
                                  <option>Logistica</option>
                                  <option>Serviços Gerais</option>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                              </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Cargo desejado</label>
                                <input type="text" class="form-control" id="inputEmail4" name="cargo_desejado">
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