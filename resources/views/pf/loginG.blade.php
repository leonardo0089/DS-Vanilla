<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../res/login/css/global.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <title>DS-Vanilla</title>
</head>
<body>
    <div class="caixaConteudo">
        <div class="dentroCaixa">
            <div class="formulario">
                <div class="fundored"></div>
                <h2>DS-Vanilla</h2>
                <div class="formularioContent">
                    <form class="form1" method="POST" action="{{ route('logar_pf') }}">
                      {!! csrf_field() !!}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Seu e-mail:</label>
                          <input type="email" class="form-control col-md-12" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" style="width: 365px;">
                          <small id="emailHelp" class="form-text text-muted">Entre com seu e-mail cadastrado</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Sua senha:</label>
                          <input type="password" class="form-control col-md-12" id="exampleInputPassword1" name="password" style="width: 358px;">
                        </div>
                        <div class="form-group form-check separar1">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Lembrar-me</label>
                        </div>
                        <button type="submit" class="btn btn-danger">Entrar</button>
                        <div class="form-row espaco">
                            <a href="">Esqueceu a senha?</a>
                            <a href="{{ route('site.inicio') }}">Cadastre-se</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>