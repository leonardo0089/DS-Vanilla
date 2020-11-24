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
                    <i class="fa fa-money fa-lg" ></i></i><a href="{{ route('perfil.dadosAtt') }}"><p>Atualizar dados de Pagamento</p></a>
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
@include('pf.footer')

