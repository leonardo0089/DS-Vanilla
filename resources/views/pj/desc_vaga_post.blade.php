@include('pj.headerpj')
<link rel="stylesheet" href="/res/site/css/cadGlobal.css">
<link rel="stylesheet" href="/res/site/css/cadastroHeader.css">
<link rel="stylesheet" href="/res/site/css/cadformulario.css">
<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/node_modules/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/res/site/css-Perfil/perfil.css">
<link rel="stylesheet" href="/res/site/css-Perfil/perfilPJ.css">
<link rel="stylesheet" href="/res/site/css-Vaga/sobreVaga.css">
<div class="sobreVaga">
    <div class="primeiroSobreC">
        <div class="containerDetalhes">
            <div class="tituloDescricao">
                <h2 style="font-weight: 400; margin-right: 50px;">Descrição</h2>
            </div>
            <div class="listasDetalhes">
                <ul>
                <li>Área e especialização profissional :   {{$vaga->titulo_vaga}}</li>
                    <li>Número de vagas: {{ $vaga->numero_vagas }}</li>
                    <li>Local de trabalho: {{  $vaga->local_trabalho }}</li>
                    <li>Apresentamos oportunidades para:</li>
                    <li>{{$vaga->oport_para}}</li>
                    <li>Salário: R$ : {{  $vaga->salario  }}</li>
                    <li>Os Benefícios São: {{$vaga->beneficios}}</li>
                    <li>Horário de Trabalho: {{$vaga->horario_trab}}</li>
                    <li>Atividades: {{$vaga->atividades}}</li>
                    <li>Pré requisitos:</li>
                    <li>{{ $vaga->pre_requisitos }}</li>
                </ul>
            </div>
            <div class="tituloDescricao">
                <h3 style="font-weight: 400; margin-right: 50px;">Exigencias</h3>
            </div>
            <div class="listasDetalhes">
                <ul>
                    <li>{{ $vaga->exigencias }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="segundoSobreC">
        <div class="containerSEmp">
            <div class="fotoEmpresaS">
                <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$foto}}"  alt="" width="300" height="150" >
            </div>
            <div class="tituloVaga">
                <h5>Título da vaga</h5>
                <p>{{$vaga->titulo_vaga}}</p>
            </div>
            <hr>
            <div class="tituloVaga">
                <h5>Empresa</h5>
                <p>Empresa Confidencial</p>
            </div>
            <hr>
            <div class="tituloVaga">
                <h5>Salario</h5>
                <p>R$ {{  $vaga->salario  }}</p>
            </div>
            <hr>
            <div class="tituloVaga">
                <h5>Localidade</h5>
                <p>{{  $vaga->local_trabalho }}</p>
            </div>
            <hr>
            <div class="botaoSobre ">
                <a target="_parent" href="{{ route('carregar.alterar', $vaga->id_nova_vaga)}}"><button class="btn btn-danger" style=" width: 120px;">Alterar</button></a>
            </div>
        </div>
    </div>

</div>

@include('pj.footerpj')