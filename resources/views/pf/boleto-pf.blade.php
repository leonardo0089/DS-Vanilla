@include('pf.header')
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="container-do-boleto">
                
                <h1>Pagamento N°</h1>

                <button type="submit" id="btn-print" class="button alt btn btn-danger" style="margin-bottom:10px">Imprimir</button>

                <iframe src="{{ route('boletoNa.tela') }}" name="boleto" frameborder="0" style="width:65%; height:80%; min-height:1000px; border:1px solid #CCC; padding:20px;"></iframe>

                <script>
                document.querySelector("#btn-print").addEventListener("click", function(event){

                    event.preventDefault();

                    window.frames["boleto"].focus();
                    window.frames["boleto"].print();

                });                
                </script>
        </div>
        </div>
    </div>
</div>
