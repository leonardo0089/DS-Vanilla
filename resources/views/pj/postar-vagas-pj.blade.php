@include('headerpj')

    <div class="container-postar-nova-vaga">
        <div class="container-interno-postar-vaga">
            <div class="container-titulo-postar-vaga">
                <h3 class="pesodaFonte300">Nova Vaga+</h3>
            </div>
            <div class="formulario-nova-vaga">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                      <div class="col-md-11 mb-3">
                        <label for="validationCustom01">Área e especialização profissional:</label>
                        <input type="text" class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Número de vagas:</label>
                        <input type="text" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Local de Trabalho:</label>
                        <select class="custom-select" id="validationCustom04" required>
                          <option selected disabled value="">Opções</option>
                          <option>São Paulo</option>
                          <option>Rio de Janeiro</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a valid state.
                        </div>
                      </div>
                      
                    </div>


                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label for="validationCustom03">Apresentamos oportunidades para:</label>
                        <input type="text" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>  
                    </div>


                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Salário:</label>
                        <input type="text" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>  
                    </div>


                    <div class="form-row">
                      <div class="col-md-10 mb-3">
                        <label for="validationTextarea">Beneficios:</label>
                        <textarea class="form-control" id="validationTextarea" rows="5" placeholder="Digite aqui os beneficios que sua empresa oferece." required></textarea>
                        <div class="invalid-feedback">
                        Please enter a message in the textarea.
                        </div>
                      </div>  
                    </div>

                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationTextarea">Horário de Trabalho:</label>
                        <input type="text" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>  
                    </div>

                    <div class="form-row">
                      <div class="col-md-10 mb-3">
                        <label for="validationTextarea">Atividades:</label>
                        <textarea class="form-control" id="validationTextarea" rows="5" placeholder="Digite aqui as atividades que o funcionario ira exercer." required></textarea>
                        <div class="invalid-feedback">
                        Please enter a message in the textarea.
                        </div>
                      </div>  
                    </div>


                    <div class="form-row">
                      <div class="col-md-10 mb-3">
                        <label for="validationTextarea">Pré requisitos:</label>
                        <textarea class="form-control" id="validationTextarea" rows="5" placeholder="Digite aqui os pré requisitos que o funcionario devera ter." required></textarea>
                        <div class="invalid-feedback">
                        Please enter a message in the textarea.
                        </div>
                      </div>  
                    </div>


                    <div class="form-row">
                      <div class="col-md-10 mb-3">
                        <label for="validationTextarea">Exigencias:</label>
                        <textarea class="form-control" id="validationTextarea" rows="5" placeholder="Digite aqui suas exigencias." required></textarea>
                        <div class="invalid-feedback">
                        Please enter a message in the textarea.
                        </div>
                      </div>  
                    </div>
                    
                    <button class="btn btn-danger col-md-12" type="submit">Nova Vaga+</button>
                  </form>
            </div>
        </div>
    </div>








@include('footerpj')