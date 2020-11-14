    <link rel="stylesheet" href="/res/site/css/cadGlobal.css">
    <link rel="stylesheet" href="/res/site/css/cadastroHeader.css">
    <link rel="stylesheet" href="/res/site/css/cadformulario.css">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/res/site/css-Perfil/perfil.css">
    <link rel="stylesheet" href="/res/site/css-Perfil/perfilPJ.css">
    <link rel="stylesheet" href="/res/site/css-Vaga/sobreVaga.css">
<main>
    <div class="containerFora">
        <div class="descr">
            <h4>Dados Pessoais</h4>
            <p> Segurança e Confidencialidade
                DS-Vanilla garante a segurança e a
                confidencialidade de todos os dados
                pessoais introduzidos em seu cadastro.</p>
        </div>
        <div class="primeiroContainer">
            <div class="orientacao">
                <h2>Dados do CV</h2>
            </div>
            <div class="formulario">
                <form method="POST" action="{{ route('cadCV') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Descrição das Atividades</label>
                            <textarea id="" cols="35" rows="5" name="dados_do_usuario"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nacionalidade</label>
                            <select class="form-control" name="nacionalidade">
                                <option>Selecione uma Opção</option>
                                <option>Brasil</option>
                                <option>Austrália</option>
                                <option>Estados Unidos</option>
                                <option>Holanda</option>
                                <option>Itália</option>
                                <option>Japão</option>
                                <option>Líbia</option>
                                <option>México</option>
                                <option>Nigéria</option>
                                <option>Portugal</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Telefone(Celular)</label>
                            <input type="text" class="form-control" onkeypress="mascara(this, '## #####-####')" maxlength="14" id="inputEmail4" name="cel">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Foto Usuario</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto_user">
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                          </div>
                    </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nascimento</label>
                        <div >
                          <input class="form-control" type="date" value="Coloque a data" id="example-date-input" name="nascimento">
                        </div>
                    </div>
                </div>
                <div class="form-row pb-1">
                    <label for="">Receber mensagens por WhatsApp?</label>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                    
                            <select class="form-control" name="receberMsg">
                                <option>Escolha uma opção</option>
                                <option>Sim</option>
                                <option>Nao</option>
                            </select>
  
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="">Estado Civil</label>
                        <select class="form-control" name="estado_civil">
                            <option>Escolha uma opção</option>
                            <option>Casado(a)</option>
                            <option>Solteiro(a)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="">Sexo</label>
                        <select class="form-control" name="sexo">
                            <option>Escolha uma opção</option>
                            <option>Masculino</option>
                            <option>Feminino</option>
                        </select>
                    </div>
                   
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 ">
                        <label for="">Possui deficiencia? se sim Qual?</label>
                        <select class="form-control" name="deficiencia">
                            <option>Escolha</option>
                            <option>Não possuo</option>
                            <option>Auditiva</option>
                            <option>Fisica</option>
                            <option>Visual</option>
                            <option>Intelectual</option>
                            <option>Deficiência Psicossocial</option>
                            <option>Reabilitados</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
</main>
<div class="main2">
    <hr>
    <div class="containerFora">
        <div class="descr">
            <h4>Redes Sociais</h4>
        </div>
        <div class="primeiroContainer">
            <div class="formulario">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">LinkedIn</label>
                        <input type="text" class="form-control" id="inputEmail4" name="redeLink">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Facebook</label>
                        <input type="text" class="form-control" id="inputEmail4" name="redeFace">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Twitter</label>
                        <input type="text" class="form-control" id="inputEmail4" name="redeTW">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Google+</label>
                        <input type="text" class="form-control" id="inputEmail4" name="redeGoogle">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">YouTube</label>
                        <input type="text" class="form-control" id="inputEmail4" name="redeYou">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Instagram</label>
                        <input type="text" class="form-control" id="inputEmail4" name="redeInsta">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Blog</label>
                        <input type="text" class="form-control" id="inputEmail4" name="redeBlog">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main3">
    <hr>
    <div class="containerFora">
        <div class="descr">
            <h4>Formação Academica</h4>
        </div>
        <div class="primeiroContainer">
            <div class="formulario">
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">Instituição</label>
                      <input type="text" class="form-control" id="inputEmail4" name="instituicao">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>País</label>
                        <select class="form-control" name="pais">
                            <option>Selecione o País</option>
                                <option>Brasil</option>
                                <option>Austrália</option>
                                <option>Estados Unidos</option>
                                <option>Holanda</option>
                                <option>Itália</option>
                                <option>Japão</option>
                                <option>Líbia</option>
                                <option>México</option>
                                <option>Nigéria</option>
                                <option>Portugal</option>
                          </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cidade</label>
                        <select class="form-control" name="cidade">
                            <option>Selecione a cidade</option>
                                <option>São Paulo</option>
                                <option>Austrália</option>
                                <option>Estados Unidos</option>
                                <option>Holanda</option>
                                <option>Itália</option>
                                <option>Japão</option>
                                <option>Líbia</option>
                                <option>México</option>
                                <option>Nigéria</option>
                                <option>Portugal</option>
                          </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">Formação</label>
                      <input type="text" class="form-control" id="inputEmail4" name="formacao">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nivel</label>
                        <select class="form-control" name="nivel">
                            <option>Selecione o nivel</option>
                            <option>Ensino Fundamental (1º grau)</option>
                            <option>Curso extra-curricular / Profissionalizante</option>
                            <option>Curso Técnico</option>
                            <option>Ensino Superior</option>
                            <option>Pós-graduação - Especialização/MBA</option>
                            <option>Pós-graduação - Mestrado</option>
                            <option>Pós-graduação - Doutorado</option>
                          </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Periodo</label>
                        <select class="form-control" name="periodo">
                            <option>Selecione o periodo</option>
                            <option>Noite</option>
                            <option>Manhã</option>
                            <option>Tarde</option>
                          </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Data Inicio</label>
                        <div >
                          <input class="form-control" type="date" value="Coloque a data" id="example-date-input" name="data_inicio">
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Conclusão</label>
                        <div >
                          <input class="form-control" type="date" value="Coloque a data" id="example-date-input" name="conclusao_data">
                        </div>
                      </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Situação:</label>
                        <select class="form-control" name="statuses">
                            <option>Selecione</option>
                                <option>Cursando</option>
                                <option>Trancado</option>
                                <option>Completo</option>
                          </select>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="main4">
    <hr>
    <div class="containerFora">
        <div class="descr">
            <h4>Experiencias Profissionais</h4>
        </div>
        <div class="primeiroContainer">
            <div class="formulario">
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">Nome Empresa</label>
                      <input type="text" class="form-control" id="inputEmail4" name="nome_empresa">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Cargo</label>
                      <input type="text" class="form-control" id="inputEmail4" name="cargo">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nivel Hirárquico</label>
                        <select class="form-control" name="nivelH">
                            <option>Selecione o Nivel</option>
                                <option>Estagiario</option>
                                <option>Operacional</option>
                                <option>Auxiliar</option>
                                <option>Assistente</option>
                                <option>Analista</option>
                                <option>Encarregado</option>
                                <option>Supervisor</option>
                                <option>Consultor</option>
                                <option>Especialista</option>
                                <option>Coordenador</option>
                                <option>Gerente</option>
                                <option>Diretor</option>
                          </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>País</label>
                        <select class="form-control" name="paisE">
                            <option>Selecione o País</option>
                                <option>Brasil</option>
                                <option>Austrália</option>
                                <option>Estados Unidos</option>
                                <option>Holanda</option>
                                <option>Itália</option>
                                <option>Japão</option>
                                <option>Líbia</option>
                                <option>México</option>
                                <option>Nigéria</option>
                                <option>Portugal</option>
                          </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cidade</label>
                        <select class="form-control" name="cidadeE">
                            <option>Selecione a cidade</option>
                                <option>São Paulo</option>
                                <option>Austrália</option>
                                <option>Estados Unidos</option>
                                <option>Holanda</option>
                                <option>Itália</option>
                                <option>Japão</option>
                                <option>Líbia</option>
                                <option>México</option>
                                <option>Nigéria</option>
                                <option>Portugal</option>
                          </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nivel</label>
                        <select class="form-control" name="nivelE">
                            <option>Selecione o nivel</option>
                            <option>Ensino Fundamental (1º grau)</option>
                            <option>Curso extra-curricular / Profissionalizante</option>
                            <option>Curso Técnico</option>
                            <option>Ensino Superior</option>
                            <option>Pós-graduação - Especialização/MBA</option>
                            <option>Pós-graduação - Mestrado</option>
                            <option>Pós-graduação - Doutorado</option>
                          </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Descrição das Atividades</label>
                        <textarea id="" cols="50" rows="5" name="atividadeE"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Periodo</label>
                        <select class="form-control" name="periodoE">
                            <option>Selecione o periodo</option>
                            <option>Noite</option>
                            <option>Manhã</option>
                            <option>Tarde</option>
                          </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Data Inicio</label>
                        <div >
                          <input class="form-control" type="date" value="Coloque a data" id="example-date-input" name="data_inicioE">
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Termino</label>
                        <div >
                          <input class="form-control" type="date" value="Coloque a data" id="example-date-input" name="termino">
                        </div>
                      </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="botaoGuarda">
   
    <div class="containerBtn">
        <button type="submit" class="btn btn-danger">Guardar CV</button>
    </div>
    <hr>
</div>
</form>

@include('pf.footer')
