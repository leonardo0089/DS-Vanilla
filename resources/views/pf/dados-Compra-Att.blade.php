@include('pf.header')

<div class="containerAtualizador">
    <div class="conteudoAtualizador">
        <div class="tituloAtualizador">
            <h3>Atualizar Dados Pagamento</h3>
        </div>
        <div class="formularioAtualizador">
        <form action="{{ route('perfil.pf.cadpgto') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-row col-md-12">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">Nome:</label>
                    <input type="text" class="form-control" id="inputEmail4" name="nome" value="{{ $lista->nome_pessoa ?? '' }}">
                    </div>
                </div>
                <div class="form-row col-md-12">
                    <div class="form-group col-md-5">
                        <label for="inputEmail4">Tipo de Pagamento:</label>
                        <select class="form-control" name="tipo_pg">
                            <option>Boleto Bancario</option>
                            <option>Deposito em Conta</option>
                            <option disabled>Cartão de Credito</option>
                        </select>
                    </div>
                </div>
                <div class="form-row col-md-12">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">Endereço:</label>
                    <input type="text" class="form-control" id="inputEmail4" name="end" value="{{ $lista->endereco ?? '' }}">
                    </div>
                </div>
                <div class="form-row col-md-12">
                    <div class="form-group col-md-5">
                        <label for="inputEmail4">CPF:</label>
                    <input type="text" value="{{ $lista->cpf ?? '' }}" class="form-control" id="inputEmail4" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" name="cpf">
                    </div>
                </div>
                <div class="form-row col-md-12">
                    <div class="form-group col-md-5">
                        <label for="inputEmail4">Estado:</label>
                        <select class="form-control" name="estado">
                            <option>São Paulo</option>
                            <option>Rio de Janeiro</option>
                            <option>Santa Catarina</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Celular:</label>
                    <input type="text" value="{{ $lista->celular ?? '' }}" class="form-control" id="inputEmail4" onkeypress="mascara(this, '## #####-####')" maxlength="13" name="celular">
                    </div>
    
                    
                </div>
                

                <div class="containerBotaoAtualizador">
                    <button class="btn btn-danger" type="submit">Atualizar</button>
                </div>

            </form>
            
        </div>
    </div>
</div>

@include('pf.footer')