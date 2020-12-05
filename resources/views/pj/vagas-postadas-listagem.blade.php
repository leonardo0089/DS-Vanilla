<link rel="stylesheet" href="../../res/css-PJ/perfil-PJ.css">
<link rel="stylesheet" href="{{asset('/css/app.css')}}">
<style>
    html, body
    {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .btnm
    {
        width: 100%;
        margin-top: 10px
    }
</style>

@foreach ($vagas as $vaga)
<div class="conteudo-listando-vagas-postadas">
    <div class="card-da-vaga-postada">
        <div class="conteudo-da-top">
            <div class="container-titulo-vaga-postada">
                <a href="" class="configLinks"><h4 class="pesodaFonte300">{{ $vaga->titulo_vaga }}</h4></a>
                <div class="badges-propostas">
                    <a target="_parent" href="{{route('candidaturas.view', [$vaga->id_nova_vaga, $vaga->fk_id_user_pj])}}"><button type="button" class="badge badge-pill btn btn-light ">
                    Propostas <span class="badge badge-pill badge-danger">{{ $vaga->n_candidaturas }}</span>
                        <span class="sr-only">Mensagens não lidas</span>
                    </button></a>
                    <button type="button" class="badge badge-pill btn btn-light ">
                        Expira em <span class="badge badge-pill badge-danger">{{ $vaga->expira_em }}</span> dias
                        <span class="sr-only">Mensagens não lidas</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="conteudo-da-bottom">
            <div class="informacoes-da-vaga-postada">
                <div class="titulo-das-infos">
                    <h5 class="pesodaFonte300">Informações da Vaga:</h5>
                </div>
                <div class="informacoes-sobre-vaga flex-container">
                <p class="pesodaFonte300">{{ $vaga->atividades }}</p>
                </div>
            </div>
            <div class="botoes-de-controle-vaga-postada">
            <a target="_parent" href="{{ route('carregar.alterar', $vaga->id_nova_vaga)}}" ><button type="button" class="btn btn-outline-danger  btnm">Alterar</button></a>
            <a target="_parent" href="{{ route('perfil.pj.detalhesVaga', $vaga->id_nova_vaga)}}"><button type="button" class="btn btn-outline-danger  btnm">Visualizar</button></a>
            </div>
        </div>
    </div>
    @endforeach

    <script type="text/javascript" src="/js/function.js"></script>
    <script type="text/javascript" src="{{asset("/js/app.js")}}"></script>




