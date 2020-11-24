
@include('pf.header')
<div class="conteudoCandidaturas">
    <div class="candidaturasContainer">
        <div class="candTitulo">
            <h3>Você se cadidatou para {{  $qtde }} vagas!</h3>
        </div>
        <div class="divTitulo">
                <p>Ver somente:</p>
                <select name="" id="">
                    <option value="">Selecione uma Opção</option>
                    <option value="">Todas as candidaturas</option>
                    <option value="">Em processo</option>
                    <option value="">Entrevista</option>


                </select>
                <div class="segundoSelectC">
                    <p class="segundoP">Ordenar:</p>
                    <select class="segundoS" name="" id="">
                        <option value="">Selecione uma Opção</option>
                        <option value=""></option>
                    </select>
                </div>
        </div>

        <div class="containerVagasCandidaturas">
            @foreach ($lista as $item)
            <div class="containerPVga">
                
                <div class="containerColunaTxt">
                    <div class="paraoTitulo">
                    <a href="{{ route('perfil.pf.cands', [$item->id_nova_vaga, $item->nome_fantasia]) }}"><h4>{{ $item->titulo_vaga }}</h4></a>
                    </div>
                    <div class="paraoTituloSecundario">
                        <p>{{ $item->nome_fantasia }}</p>
                    </div>
                    <div class="paraoTituloSecundario">
                        <p style="margin-top: 15px;">Area-Profissão: {{ $item->area_profissao }}</p>
                    </div>

                </div>

                <div class="containerEstadodaVaga">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-danger"  style="font-weight: 250; border-radius: 5px 0px 0px 5px; border-top: 1px solid rgba(150, 150, 150, 0.555); border-left: 1px solid rgba(150, 150, 150, 0.555); border-bottom: 1px solid rgba(150, 150, 150, 0.555);">CV Enviado</button>
                        <button type="button" class="btn btn-light"  style="font-weight: 250; border-radius: 0px 5px 5px 0px; border-top: 1px solid rgba(150, 150, 150, 0.555); border-right: 1px solid rgba(150, 150, 150, 0.555); border-bottom: 1px solid rgba(150, 150, 150, 0.555);">CV Finalista</button>
                      </div>
                </div>
                
            </div>      
            @endforeach
            
    </div>
</div>
</div>

@include('pf.footer')