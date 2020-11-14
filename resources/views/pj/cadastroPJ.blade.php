    @section('titulopagina')
        Atualizar dados PJ
    @endsection
    @extends('pj.perfilPJ')
    @section('conteudoMenuLateral')   
    <div class="containercadastroPJ1">
        <div class="conteudodoCadastro ">
            <div class="titulodoCadPJ">
                <h3 class="pesoFonte300">Dados Pessoa Juridica</h3>
            </div>
            <div class="formulariosPJ1">
                <form class="needs-validation" novalidate>

                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Endereço:</label>
                        <input type="text" class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Foto Usuario</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Cidade:</label>
                        <input type="text" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Estado:</label>
                        <select class="custom-select" id="validationCustom04" required>
                          <option selected disabled value="">Escolha</option>
                          <option>São Paulo</option>
                          <option>Rio de Janeiro</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a valid state.
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationCustom01">CEP:</label>
                          <input type="text"  class="form-control" onkeypress="mascara(this, '#####-###')" maxlength="9" id="validationCustom01" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationCustom01">Cel:</label>
                          <input type="text"  class="form-control" onkeypress="mascara(this, '## #####-####')" maxlength="14" id="validationCustom01" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Fixo:</label>
                            <input type="text"  class="form-control" onkeypress="mascara(this, '## ####-####')" maxlength="14" id="validationCustom01" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationCustom01">Tipo de Contratação:</label>
                          <select class="custom-select" id="validationCustom04" required>
                            <option selected disabled value="">Opções</option>
                            <option>Efetivo - CLT</option>
                            <option>PJ</option>
                            <option>Temporario</option>
                          </select>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-5 mb-3">
                          <label for="validationCustom01">Tipo de Empresa(Negocio):</label>
                          <select class="custom-select" id="validationCustom04" required>
                            <option selected disabled value="">Opções</option>
                            <option>Empresa de Pequeno Porte (EPP)</option>
                            <option>Empresas de médio e grande porte</option>
                            <option>Microempresa (ME)</option>
                            <option>Sociedade Simples (SS)</option>
                            <option>Sociedade Empresária Limitada (Ltda.)</option>
                          </select>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <label for="validationTextarea">Conte-nos sobre sua empresa:</label>
                        <textarea class="form-control mb-2" id="validationTextarea" rows="5" placeholder="Não é obrigatorio preencher este campo" required></textarea>
                        <div class="invalid-feedback">
                          Please enter a message in the textarea.
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationTextarea">Receber Propostas:</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                                <label class="custom-control-label" for="customControlValidation2">Sim</label>
                              </div>
                              <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
                                <label class="custom-control-label" for="customControlValidation3">Não</label>
                                <div class="invalid-feedback">More example invalid feedback text</div>
                              </div>
                        </div>
                      </div>

                    <div class="contentBTN">
                        <button class="btn btn-danger" type="submit">cadastrar</button>
                    </div>
                  </form>
            </div>
            </div>
        </div>
    </div>
   @endsection