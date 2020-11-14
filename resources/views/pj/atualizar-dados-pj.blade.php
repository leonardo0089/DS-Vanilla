@extends('pj.perfilPJ')

@section('titulopagina')
    Atualizar dados de pagamento  
@endsection

@section('conteudoMenuLateral')
<div class="containerAtualizador">
    <div class="conteudoAtualizador">
        <div class="tituloAtualizador">
            <h3>Atualizar Dados Pagamento</h3>
        </div>
        <div class="formularioAtualizador">
            <form action="" method="post">
                <div class="form-row col-md-12">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">Nome:</label>
                      <input type="text" class="form-control" id="inputEmail4">
                    </div>
                </div>
                <div class="form-row col-md-12">
                    <div class="form-group col-md-5">
                        <label for="inputEmail4">Tipo de Pagamento:</label>
                        <select class="form-control">
                            <option>Boleto Bancario</option>
                            <option>Deposito em Conta</option>
                            <option>Cartão de Credito</option>
                        </select>
                    </div>
                </div>
                <div class="form-row col-md-12">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">Endereço:</label>
                      <input type="text" class="form-control" id="inputEmail4">
                    </div>
                </div>
                <div class="form-row col-md-12">
                    <div class="form-group col-md-5">
                        <label for="inputEmail4">CNPJ:</label>
                      <input type="text" class="form-control" id="inputEmail4" maxlength="11">
                    </div>
                    <div class="form-group col-md-2 mt-2">
                        <label for="inputEmail4">  </label>
                        <input type="text" class="form-control" id="inputEmail4" maxlength="2">
                      </div>
                </div>
                <div class="form-row col-md-12">
                    <div class="form-group col-md-5">
                        <label for="inputEmail4">Estado:</label>
                        <select class="form-control">
                            <option>São Paulo</option>
                            <option>Rio de Janeiro</option>
                            <option>Santa Catarina</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Celular:</label>
                      <input type="text" class="form-control" id="inputEmail4" maxlength="2">
                    </div>
                    <div class="form-group col-md-5 mt-2">
                        <label for="inputEmail4"></label>
                      <input type="text" class="form-control" id="inputEmail4" maxlength="9">
                    </div>
                    
                </div>
                

                <div class="containerBotaoAtualizador">
                    <button class="btn btn-danger" type="submit">Atualizar</button>
                </div>

            </form>
            
        </div>
    </div>
</div>
@endsection