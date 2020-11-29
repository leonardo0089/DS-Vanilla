@include('pj.headerpj')

<div class="container-do-perfil-pf">

    <div class="conteudo-interno-perfil">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$pesq->foto ?? ''}}" alt="Avatar" height="220" width="295"">
          </div>
          <div class="flip-card-back">
          <h1>{{$pesq->nome_sobrenome}}</h1>
            <p>{{$pesq->cargo}}</p>
          <p>{{$pesq->data_nasc}}</p>
          </div>
        </div>
      </div>
      <div class="container-stars">
          <span class="fa fa-star fa-lg checked spc"></span>
          <span class="fa fa-star fa-lg checked spc"></span>
          <span class="fa fa-star fa-lg checked spc"></span>
          <span class="fa fa-star fa-lg spc"></span>
          <span class="fa fa-star fa-lg"></span>
      </div>
      <div class="new1"></div>

      <div class="conteudo-body">
        <div class="titulo-body">
          <h5>Sobre {{$pesq->nome_sobrenome}}</h5>
        </div>
        <div class="content-do-body">
          <div class="primeiro-titulo-body">
            <h5>Informações Basicas:</h5>
            <div class="linha-tt">
              <h6>Endereço: {{$pesq->endereco}}</h6>
              <h6>Telefone: {{$pesq->telefone}}</h6>
              <h6>E-mail: {{$pesq->email}}</h6>
              <h6>Categoria: {{$pesq->nome_categoria}}</h6>
              <h6>Premium ?: Não</h6>
            </div>
            <h5>Redes Sociais:</h5>
            <div class="coluna-tt">
              <h6>Facebook: <a href="">{{$pesq->link_facebook}}</a></h6>
              <h6>Linkedin: <a href="">{{$pesq->link_linkedin}}</a></h6>
              <h6>Google: <a href="">{{$pesq->link_google}}</a></h6>
              <h6>Instagram: <a href="">{{$pesq->link_insta}}</a></h6>
              <h6 style="margin-bottom: 40px">Twitter: <a href="">{{$pesq->link_twitter}}</a></h6>
            </div>
            <h5>Ultima Experiencia:</h5>
            <div class="coluna-tt">
              <h6>Nome Empresa: {{$pesq->nome_empresa}}</h6>
              <h6>Cargo: {{$pesq->cargo}}</h6>
              <h6>Nivel Hirarquico: {{$pesq->nivel_hirarquico}}</h6>
              <h6>Periodo: {{$pesq->periodo}}</h6>
              <h6>Saida da Empresa: {{$pesq->termino}}</h6>
            </div>
          </div>
        </div>
        
      </div>
      <div class="new1"></div>

      <div class="footer-acoes-container">
        <div class="footer-titulo">
          <h5>Ações</h5>
        </div>
        <div class="footer-botoes">
          <a href=""><button type="button" class="btn btn-outline-danger">Voltar</button></a>
          <a href=""><button type="button" class="btn btn-outline-danger" style="margin-left: 15px">Conversar</button></a>
        </div>
      </div>
    </div>

</div>

@include('pj.footerpj')