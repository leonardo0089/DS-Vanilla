@include('pf.header')
<div class="containerDoChat">
    <div class="conversasChat">
        @if ($pesq ?? '' > 0)
            
        
        @foreach ($pesq as $key)
            
            <a href="{{route('clicando.na.conversa', [$key->id_conversa, $key->fk_pj, $key->fk_pf])}}" style="text-decoration: none; color: black"><div class="conversas1">
            <div class="fotoPessoa">
                <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$key->foto ?? ''}}" alt="" width="100%" height="100%">
            </div>
            <div class="colunaChat">
                <div class="nomePessoa">
                    <h6 style="font-weight: 300;">{{$key->nome_fantasia}}</h6>
                </div>
                <div class="trechoConversa">
                    <p>Mensagens da Empresa</p>
                </div>
            </div>
            
        </div>
        </a>
        @endforeach
        @endif

        
    </div>
    <div class="conteudoConversas">
        <div class="containerChatConversas">
            <div class="conversasInternas">
                @if ($dados ?? '0'[0] > 0)
                    
                @foreach ($dados as $item)
                    
                
                <div class="empresa">
                    <div class="mensagemE">
                        <div class="tituloChats">
                        <h6>{{$item->nome_sobrenome}}</h6>
                            <p>{{$item->msg}}</p>
                        </div>

                    </div>
                </div>

                @endforeach

                @endif

                @if ($dados2 ?? '0'[0] > 0)
                    
                @foreach ($dados2 as $item2)
                <div class="funcionario">
                    <div class="mensagemE">
                        <div class="tituloChats">
                            <h6>{{$item2->nome_fantasia}}</h6>
                            <p>{{$item2->msg}}</p>
                        </div>
                        
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="navegacaoChat">
                <div class="input-group mt-3 col-md-12" >
                    @if (count($pesq ?? '') > 0)
                        
                    
                    <form class="form-row col-md-12 alin" action="{{route('enviar.msg.pf',[$pesq[0]->id_conversa, $pesq[0]->fk_id_usuario])}}" method="post">
                        {!! csrf_field() !!}
                    <input type="text" name="msg" class="form-control col-md-10 " placeholder="Digite sua Mensagem" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-radius: 30px 0px 0px 30px;">
                    <div class="input-group-append">
                      <button class="btn btn-danger" type="submit" id="button-addon2" style="border-radius: 0px 30px 30px 0px;">Enviar</button>
                    </div>
                </form>
                @endif
                  </div>
            </div>
        </div>
    </div>
    <div class="propagandasChat propagandaBusca">
        Propagandas
    </div>
</div>
@include('pf.footer')