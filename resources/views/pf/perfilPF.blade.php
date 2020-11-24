@section('titulopagina')
   Perfil - Usuario PF
@endsection
@include('pf.header')
<div class="conteudoForm">
<div class="containerUser">
    <div class="containerInterno">
        <div class="containerFotoUser">
            <div class="foto">
            <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$foto}}"  alt="" width="150" height="140">
                
            </div>
            <div class="contTextos">
                    <p class="nomeP">Ola {{$ds}}!</p>
                <p class="progressP">Progresso CV</p>
                <div class="containerProgresso">
                    <div class="progress">
                        <div id="progresso" class="progress-bar bg-danger" role="progressbar" style="width: {{ $percent.'%' }};"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{ $percent.'%' }}</div>
                    </div>
                </div>
                <hr>
                <a href="{{ route('perfil.atualizarCV') }}">Atualizar CV</a>
                <a href="#" data-toggle="modal" data-target="#siteModal">Meu Perfil</a>
                <a href="{{ route('logout') }}">Sair</a>
                
                
            </div>
        </div>
    </div>
        <div class="conteudoOp">
            <div class="op1">
                <div class="containerTxt1">
                    <h3 style="font-weight: 300;">Financeiro</h3>
                </div>
                <div class="containerTxt1">
                    <i class="fa fa-calendar fa-lg"></i><p>Dias Premium <p style="padding-left: 10px;"> {{$dias}} dias!</p></p>
                </div>
                <div class="containerTxt1">
                    <i class="fa fa-money fa-lg" ></i></i><a href="{{ route('perfil.pf.att.pgt') }}"><p>Atualizar dados de Pagamento</p></a>
                </div>
                <div class="containerTxt1">
                    <i class="fa fa-shopping-cart fa-lg"></i><a href="{{ route('perfil.comprar-premium') }}"><p>Renovar/Comprar Premium</p></a>
                </div>
            </div>
        </div>
        <div class="anuncio1">
            <div class="conteudoAnuncio">
                Anuncio!
            </div>   
        </div>
</div>

<div class="containerVagas">
    <div class="containerIframe">
        <iframe  src="{{ route('perfil.vagas1') }}" frameborder="0">
        </iframe>
    </div>
</div>

<div class="containerProps" style="background-color: rgba(194, 194, 194, 0.219);">

</div>

</div>

<div class="modal fade" id="siteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header header-modal">
                <div class="foto-modal">
                    <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$foto}}"  alt="" width="150" height="140">    
                </div>
                <div class="nome-pessoa-modal">
                    <h5>{{$ds}}</h5>
                </div>
                <div class="estrelas">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                </div>
            </div>

            <div class="modal-body">
                <div class="titulo-modal-user">
                    <h5>Sobre {{$ds}} :</h5>
                </div>
                <div class="infos-basicas">
                    <h5 class="pesoFonte300">Nacionalidade: {{$listagem->nacionalidade}}</h5>
                    <h5 class="pesoFonte300">Sexo: {{$listagem->sexo}}</h5>
                    <h5 class="pesoFonte300">Telefone: {{$listagem->telefone}}</h5>
                </div>
                <hr>
                <div class="ultimas-exp">
                    <h5>Ultimas Experiencias:</h5>
                </div>
                <div class="ultimas-exp-cont">
                    <h5 class="pesoFonte300">Nome Empresa: {{$listagem->nome_empresa}}</h5>
                    <h5 class="pesoFonte300">Cargo: {{$listagem->cargo}}</h5>
                    <h5 class="pesoFonte300">Nivel Hirarquico: {{$listagem->nivel_hirarquico}}</h5>
                    <h5 class="pesoFonte300">Cidade: {{$listagem->cidade_exp}}</h5>
                </div>
                <hr>
                <div class="redes-sociais-modal">
                    <h5>Redes Sociais:</h5>
                </div>
                <div class="ultimas-exp-cont">
                    <h5 class="pesoFonte300">Facebook: <a href="">{{$listagem->link_facebook}}</a></h5>
                    <h5 class="pesoFonte300">Linkedin: <a href="">{{$listagem->link_linkedin}}</a></h5>
                    <h5 class="pesoFonte300">Twitter: <a href="">{{$listagem->link_twitter}}</a></h5>
                    <h5 class="pesoFonte300">Google: <a href="">{{$listagem->link_google}}</a></h5>
                    <h5 class="pesoFonte300">Youtube: <a href="">{{$listagem->link_youtube}}</a></h5>
                    <h5 class="pesoFonte300">Instagram: <a href="">{{$listagem->link_insta}}</a></h5>
                    <h5 class="pesoFonte300">Blog: <a href="">{{$listagem->link_blog}}</a></h5>
                    
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>


        </div>
    </div>
</div>
@include('pf.footer')

