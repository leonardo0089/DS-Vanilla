@section('titulopagina')
    chat-pj
@endsection

@include('headerpj')

<div class="containerDoChat">

    <div class="conversasChat">
        @foreach ($usuario as $key)
       <a href="{{route('na.conversa', [$key->nome_sobrenome, $key->id_chat])}}" style="text-decoration: none; color: black"><div class="conversas1">
            <div class="fotoPessoa">
                <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$key->foto ?? ''}}" alt="" width="100%" height="100%">
            </div>
            <div class="colunaChat">
                <div class="nomePessoa">
                    <h6 style="font-weight: 300;">{{$key->nome_sobrenome}}</h6>
                </div>
                <div class="trechoConversa">
                    <p>Mensagens para esta pessoa</p>
                </div>
            </div>
            
        </div>
    </a>
        @endforeach
    </div>
    <div class="conteudoConversas">
        <div class="containerChatConversas">

            <div class="conteudo-das-conversas">
    
                
             
                 @if ($dados1 ?? '0'[0] > 0 && $dados1 ?? '0'[0]->type == 2)
                     
                  @foreach ($dados1 as $item)
                      
                  
                    <div class="balao-da-conversa">
                        <div class="nome-da-pessoa">
                        <h6>{{$item->nome_fantasia}}</h6>
                        </div>
                        <div class="msg-pessoa">
                        <p>{{$item->msg}}</p>
                        </div>
                    </div>

                    @endforeach

                 @endif

                @if ($dados2 ?? '0'[0] > 0 && $dados2 ?? '0'[0]->type == 1)

                    @foreach ($dados2 as $item2)
                        
                    <div class="funcionario">
                        <div class="mensagemE">
                            <div class="tituloChats">
                                <h6>{{$item2->nome_sobrenome}}</h6>
                                <p>{{$item2->msg}}</p>
                            </div>
                            
                        </div>
                    </div>

                    @endforeach

                @endif

           
            
            </div>
                    <div class="navegacaoChat">
                        <div class="input-group mt-3 col-md-12" >
                        <form class="form-row col-md-12 alin" action="{{route('enviar.msg', [$id_conversa ?? '0', $id_pessoa ?? '0', $nome ?? '', $id_do_chat ?? ''])}}" method="post">
                                {!! csrf_field() !!}
                                <input type="text" name="msg" class="form-control col-md-10" placeholder="  Digite sua Mensagem" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-radius: 30px 0px 0px 30px;">
                                <div class="input-group-append">
                                  <button class="btn btn-danger" type="submit" id="button-addon2" style="border-radius: 0px 30px 30px 0px;">Enviar</button>
                                </div>
                            </form>
                          </div>
                    </div>          
            
           
        </div>
    </div>
    <div class="propagandasChat propagandaBusca">
        Propagandas
    </div>
</div>




@include('footerpj')