@section('titulopagina')
    Perfil PJ
@endsection
@include('pj.headerpj')

<div class="conteudoPerfilPJ">
    <div class="conteudoSobrePJ">
        <div class="areaUserPJ">
            <div class="areadaFotoPJ">
                <div class="containerFotoUserPJ">
                    <img src="../../res/site/img/stefany.jpg" width="150" height="140" alt="">
                </div>
            </div>
            <div class="dadosComplementaresPJ">
                <div class="tituloAreaComplementarPJ">
                    <h5 style="font-weight: 300;">Ola!<br>Nome da Empresa</h5>
                </div>
                <div class="linkparaAlterarDados">
                    <a href="{{ route('site.cadastroPJc') }}"><p class="fa fa-user  fonteParagrafo">  Alterar Cadastro</p></a>
                </div>
                <div class="linkparaAlterarDados">
                    <a href=""><p class="fa fa-envelope  fonteParagrafo">  Verificar E-mails</p></a>
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
                    <p class="fa fa-calendar  ">  Dias Premium Restantes: 30 dias !</p>
                </div>
                <div class="linkparaAlterarDados">
                    <a href="{{ route('perfil.atualizar-dados-pj') }}"><p class="fa fa-money  fonteParagrafo">  Atualizar Forma de Pagamento</p></a>
                </div>
                <div class="linkparaAlterarDados">
                    <a href="{{ route('perfil.comprar-premium-pj') }}"><p class="fa fa-dollar  fonteParagrafo">  Comprar Premium</p></a>
                </div>
                <div class="containerTituloPJFinanceiro">
                    <h4>Contrato</h4>
                </div>
                <div class="linkparaAlterarDados">
                    <a href=""><p class="fa fa-file  fonteParagrafo">  Gerar Contrato</p></a>
                </div>
                <div class="linkparaAlterarDados">
                    <a href=""><p class="fa fa-list  fonteParagrafo">  Lista de Contratos</p></a>
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