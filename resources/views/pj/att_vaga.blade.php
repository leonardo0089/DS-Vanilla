@section('titulopagina')
    Alterar Vaga
@endsection
@include('headerpj')

    <div class="container-postar-nova-vaga">
        <div class="container-interno-postar-vaga">
            <div class="container-titulo-postar-vaga">
                <h3 class="pesodaFonte300" style="padding-top: 10px">Alterar Vaga</h3>
            </div>
            <div class="formulario-nova-vaga">
            <form class="needs-validation" novalidate  method="POST" action="{{ route('carregar.salvando.alteracao', $vaga->id_nova_vaga) }}">
                {!! csrf_field() !!}
                    <div class="form-row">
                      <div class="col-md-11 mb-3">
                        <label for="validationCustom01">Titulo da Vaga:</label>
                        <input type="text" class="form-control" value="{{ $vaga->titulo_vaga }}" id="validationCustom01" required name="titulo_vaga">
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-11 mb-3">
                        <label for="validationCustom01">Área e especialização profissional:</label>
                        <input type="text" class="form-control" value="{{ $vaga->area_profissao }}" id="validationCustom01" required name="esp_area">
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Número de vagas:</label>
                        <input type="text" class="form-control" value="{{ $vaga->numero_vagas }}" id="validationCustom03" required name="n_vagas">
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Local de Trabalho:</label>
                        <select class="custom-select"  id="validationCustom04" required name="l_trabalho">
                          <option selected disabled value="">Opções</option>
                          <option>São Paulo</option>
                          <option>Rio de Janeiro</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a valid state.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Para Premium ?</label>
                        <select class="custom-select" id="validationCustom04" required name="p_premium">
                          <option selected disabled value="">Opções</option>
                          <option>Sim</option>
                          <option>Nao</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a valid state.
                        </div>
                      </div>
                      
                    </div>


                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label for="validationCustom03">Apresentamos oportunidades para:</label>
                        <input type="text" class="form-control" value="{{ $vaga->oport_para }}" id="validationCustom03" required name="opt">
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>  
                    </div>


                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Salário:</label>
                        <input type="text" class="form-control" value="{{ $vaga->salario }}" id="validationCustom03" required name="sal">
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>  
                    </div>


                    <div class="form-row">
                      <div class="col-md-10 mb-3">
                        <label for="validationTextarea">Beneficios:</label>
                        <textarea class="form-control" name="beneficios" id="validationTextarea" rows="5" placeholder="Digite aqui os beneficios que sua empresa oferece." required>{{ $vaga->beneficios }}</textarea>
                        <div class="invalid-feedback">
                        Please enter a message in the textarea.
                        </div>
                      </div>  
                    </div>

                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationTextarea">Horário de Trabalho:</label>
                        <input type="text" class="form-control" value="{{ $vaga->horario_trab }}" id="validationCustom03" required name="horario">
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>  
                    </div>

                    <div class="form-row">
                      <div class="col-md-10 mb-3">
                        <label for="validationTextarea">Atividades:</label>
                      <textarea class="form-control" name="atividades" id="validationTextarea" rows="5" placeholder="Digite aqui as atividades que o funcionario ira exercer." required>{{ $vaga->atividades }}</textarea>
                        <div class="invalid-feedback">
                        Please enter a message in the textarea.
                        </div>
                      </div>  
                    </div>


                    <div class="form-row">
                      <div class="col-md-10 mb-3">
                        <label for="validationTextarea">Pré requisitos:</label>
                      <textarea class="form-control" name="p_requisitos" id="validationTextarea" rows="5" placeholder="Digite aqui os pré requisitos que o funcionario devera ter." required>{{ $vaga->pre_requisitos }}</textarea>
                        <div class="invalid-feedback">
                        Please enter a message in the textarea.
                        </div>
                      </div>  
                    </div>


                    <div class="form-row">
                      <div class="col-md-10 mb-3">
                        <label for="validationTextarea">Exigencias:</label>
                        <textarea class="form-control" name="exigencias" id="validationTextarea" rows="5" placeholder="Digite aqui suas exigencias." required>{{ $vaga->exigencias }}</textarea>
                        <div class="invalid-feedback">
                        Please enter a message in the textarea.
                        </div>
                      </div>  
                    </div>
                    
                   <button class="btn btn-danger col-md-12" type="submit">Alterar</button>
                  </form>
            </div>
        </div>
    </div>

@include('footerpj')