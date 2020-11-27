@include('pf.header')
<div class="containerPagamentoBoleto">
    <div class="containerPagEsquerda">
        <div class="tituloPlano">
            <h3>Comprar/Renovar</h3>
        </div>
        <div class="opcoesPlano">
            <div class="tituloEndereco">
                <h4>Endereço de Faturamento</h4>
            </div>
            <div class="containerSelectc">
                <select class="form-control form-control-md col-md-5">
                    <option> Opções</option>
                    <option>Brasil</option>
                    <option>Estados Unidos</option>
                  </select>
                  <div class="tituloEndereco">
                    <h4>Tipo de Pagamento</h4>
                </div>
                  <select class="form-control form-control-md col-md-5">
                    <option> Opções</option>
                    <option>Boleto</option>
                    <option disabled>Deposito Bancario</option>
                  </select>
                  <div class="tituloEndereco">
                    <h4>Parcelar em </h4>
                </div>
                  <select class="form-control form-control-md col-md-3">
                    <option selected disabled> Opções</option>
                    <option>1x</option>
                    <option disabled>2x</option>
                    <option disabled>3x</option>
                  </select>
            </div>
        </div>
        <div class="jumbotronCompra">
            <div class="tituloJumboCompra">
                <h5 style="font-weight: 350">Todas as compras serão feitas via Boleto.</h5>
            </div>
            <div class="paragrafosJumbo">
                <p style="font-weight: 320">As compras poderão ser parceladas em até 3x vezes!</p>
                <p style="font-weight: 300">O pagamento tem o prazo de aproximadamente 3 dias uteis para cair no sistema após o pagamento!</p>
            </div>
        </div>

        <div class="tituloPlano detalhesPedidoTitulo">
            <h3>Detalhes do Pedido</h3>
        </div>

        <div class="separador2"></div>

        <div class="detalhesContainerPedido">
            <div class="container-foto">
                <div class="fotoDetalhesP">
                    Foto
                </div>
            </div>
            <div class="conteudoTextosDetalhes">
                <div class="tituloDetalhesProd">
                    <h6>{{ $prod->nome_prod }}</h6>
                </div>
                <div class="descProdutoPremium">
                    <p>{{ $prod->descricao }}</p>
                </div>
            </div>
        </div>
        
    </div>
    <div class="containerPagDireita">
        <div class="carddaCompra">
            <div class="titulodoCardCompra">
                <h3>Resumo</h3>
            </div>
            <div class="descPrecoContainer">
                <div class="descPrecoPremium">
                    <p>Preço Original:</p>
                    <p>Preço com Desconto:</p>
                </div>
                <div class="precoDoPremium">
                    <p>R$: {{ $prod->preco }}</p>
                    <p>R$: {{ $prod->preco}}</p>
                </div>
            </div>
            <hr class="my-2 col-md-10 novaHR">
            <div class="total-da-compra-container">
                <div class="titulo-total-compra">
                    <h3>Total:</h3>
                </div>
                <div class="total-da-compra">
                    <p>R$: {{ $prod->preco }}</p>
                </div>
            </div>
            <div class="container-do-jumbo-advertencia">
                <div class="jumbo-advertencias-container">
                   <p>A lei exige que a DS-Vanilla colete impostos sobre transações aplicáveis para compras feitas em determinadas regiões fiscais.</p>
                </div>
            </div>
            
            <div class="aceitar-os-termos">
                <p>Ao comprar você está aceitando os <a href="">Termos de Uso </a> da Empresa DS-Vanilla</p>
            </div>

            <div class="botao-de-comprar ">
                <a href="{{ route('perfil.telaBoleto') }}"><button type="submit" class="btn btn-danger col-md-12">Comprar</button></a>
            </div>
            
        </div>
    </div>
</div>
@include('pf.footer')