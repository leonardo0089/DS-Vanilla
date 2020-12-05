@section('titulopagina')
    Perfil PJ
@endsection
@include('pj.headerpj')

<div class="conteudoPerfilPJ">
    <div class="conteudoSobrePJ">
        <div class="areaUserPJ">
            <div class="areadaFotoPJ">
                <div class="containerFotoUserPJ">
                <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$foto ?? ''}}" width="150" height="140" alt="">
                </div>
            </div>
            <div class="dadosComplementaresPJ">
                <div class="tituloAreaComplementarPJ">
                    <h5 style="font-weight: 300;">Ola!<br>{{ $nome ?? '' }}</h5>
                </div>
                <div class="linkparaAlterarDados">
                    <a href="{{ route('site.cadastroPJc') }}"><p class="fa fa-user  fonteParagrafo">  Alterar Cadastro</p></a>
                </div>
                <div class="linkparaAlterarDados">
                    <a href=""><p class="fa fa-lock fonteParagrafo">  Alterar Senha</p></a>
                </div>
            </div>
        </div>

        <div class="areaFinanceiroPJ">
            <div class="containerTituloPJFinanceiro">
                <h4>Financeiro</h4>
            </div>
            <div class="linksdoFinanceiroPJ">
                <div class="linkparaAlterarDados">
                    <p class="fa fa-calendar  ">  Dias Premium Restantes: {{$premium ?? ''}} dias !</p>
                </div>
                <div class="linkparaAlterarDados">
                    <a href="{{ route('perfil.atualizar-dados-pj') }}"><p class="fa fa-money  fonteParagrafo">  Atualizar Forma de Pagamento</p></a>
                </div>
                <div class="linkparaAlterarDados">
                    <a href="{{ route('perfil.comprar-premium-pj') }}"><p class="fa fa-dollar  fonteParagrafo">  Comprar Premium</p></a>
                </div>
                
                <br>
                <div class="linkparaAlterarDados">
                    <p class="fa fa-question-circle  fonteParagrafo">  E-mail de Suporte: ds-Vanilla@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="conteudoFuncionalidades">
        @yield('conteudoMenuLateral')
    </div>
</div>
@include('pj.footerpj')