@include('pj.headerpj')
<div class="conteudoDeBuscas">
    <div class="containerFiltro">
        <div class="boxDoFiltro">
            <div class="tituloBusca">
                <h5>Refinar Busca</h5>
            </div>
            <div class="inputPesquisa">
                <form class="formularioBusca">
                    <label for="exampleInputEmail1">Paravra-Chave</label>
                    <div class="form-group align-items-center">
                        <input type="text" class="form-control col-md-12" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="botaoDeBusca">
                        <button type="submit" class="btn btn-danger" style="font-weight: 300;">Buscar</button>
                    </div>
                </form>
            </div>

            <div class="separador"></div>

            <div class="inputPesquisa2">
                <form class="formularioBusca2">
                    <label for="exampleInputEmail1">Metodo de Trabalho</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                            value="option1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Home Office
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                            value="option1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Presencial
                        </label>
                    </div>
                </form>
            </div>

            <div class="separador"></div>

            <div class="inputPesquisa2">
                <form class="formularioBusca">
                    <label for="exampleInputEmail1">Cidade</label>
                    <select class="form-control ">
                        <option>Escolha</option>
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
                </form>
            </div>

            <div class="separador"></div>

            <div class="inputPesquisa2">
                <form class="formularioBusca">
                    <label for="exampleInputEmail1">Area Profissional</label>
                    <select class="form-control ">
                        <option>Escolha</option>
                        <option>Telemarketing</option>
                        <option>Programador</option>
                        <option>Serviços Gerais</option>
                        <option>Mecanico</option>
                        <option>Professor(a)</option>
                        <option>Motorista</option>
                        <option>Secretaria(o)</option>
                        <option>Atendente</option>
                        <option>Eletricista</option>

                    </select>
                </form>
            </div>

            <div class="separador"></div>

            <div class="inputPesquisa2">
                <form class="formularioBusca">
                    <label for="exampleInputEmail1">Tipo de Contrato</label>
                    <select class="form-control col-md-9">
                        <option>Escolha</option>
                        <option>Efetivo – CLT</option>
                        <option>Prestador de Serviços (PJ)</option>
                        <option>Outros</option>
                        <option>Temporário</option>
                        <option>Autonomo</option>
                    </select>
                </form>
            </div>

            <div class="separador"></div>

            <div class="inputPesquisa2">
                <form class="formularioBusca2">
                    <label for="exampleInputEmail1">Data de Publicação</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="option1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Últimos 3 dias
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="option1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Última semana
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="option1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Últimos 15 dias
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="option1" >
                        <label class="form-check-label" for="exampleRadios1">
                            Último mês
                        </label>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="containerConteudoBusca">
        <div class="containerVagaBusca">
            <iframe src="{{ route('perfil.perfil-do-funcionario') }}" frameborder="0">
            </iframe>
        </div>
        <nav aria-label="Page navigation example" style="background-color: rgba(194, 194, 194, 0.452);">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
    </div>
    <div class="propagandaBusca">
        Propaganda
    </div>
</div>
@include('pj.footerpj')