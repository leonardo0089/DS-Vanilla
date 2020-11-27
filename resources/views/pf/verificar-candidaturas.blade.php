@include('pf.header')
<div class="sobreVaga">
    <div class="primeiroSobreC">
        <div class="containerDetalhes">
            <div class="tituloDescricao">
                <h2 style="font-weight: 400; margin-right: 50px;">Descrição</h2>
            </div>
            <div class="listasDetalhes">
                <ul>
                    <li>Área e especialização profissional: {{ $lista->area_profissao }}</li>
                    <li>Número de vagas: {{ $lista->numero_vagas }}</li>
                    <li>Local de trabalho: {{ $lista->local_trabalho }}</li>
                    <li>Apresentamos oportunidades para:</li>
                    <li>{{ $lista->oport_para }}</li>
                    <li>Salário: R$: {{ $lista->salario }}</li>
                    <li>Os Benefícios São: {{ $lista->beneficios }}</li>
                    <li>Horário de Trabalho: {{ $lista->horario_trab }}</li>
                    <li>Atividades: {{ $lista->atividades }}</li>
                    <li>Pré requisitos:</li>
                    <li>{{ $lista->pre_requisitos }}</li>
                </ul>
            </div>
            <div class="tituloDescricao">
                <h3 style="font-weight: 400; margin-right: 50px;">Exigencias</h3>
            </div>
            <div class="listasDetalhes">
                <ul>
                    <li>{{ $lista->exigencias }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="segundoSobreC">
        <div class="containerSEmp">
            <div class="fotoEmpresaS">
                <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$foto}}"  alt="" width="50%" height="140">
            </div>
            <div class="tituloVaga">
                <h5>Título da vaga</h5>
                <p>{{ $lista->area_profissao }}</p>
            </div>
            <hr>
            <div class="tituloVaga">
                <h5>Empresa</h5>
                <p>{{ $nome ?? '' }}</p>
            </div>
            <hr>
            <div class="tituloVaga">
                <h5>Salario</h5>
                <p>R$ {{ $lista->salario }}</p>
            </div>
            <hr>
            <div class="tituloVaga">
                <h5>Localidade</h5>
                <p>{{ $lista->local_trabalho }}</p>
            </div>
            <hr>
            <div class="botaoSobre ">
                <a href="{{ route('perfil.candidaturas')}} "><button class="btn btn-danger" style=" width: 120px;">Voltar</button></a>
            </div>
        </div>
    </div>

</div>

@include('pf.footer')