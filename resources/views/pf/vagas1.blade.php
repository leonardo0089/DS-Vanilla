
<style>
    body
    {
        background-color: rgba(194, 194, 194, 0.452));
    }
 </style>
 
 <link rel="stylesheet" href="{{asset('/css/app.css')}}">
 <link rel="stylesheet" href="/res/site/css-Perfil/perfil.css">
 @foreach ($vaga as $item)
     
 
 <div class="conteiner-das-vagas">
 
     <div class="conteiner-da-foto">
         <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$item->foto}}" alt="" height="100%" width="100%">
     </div>
 
     <div class="conteiner-textos-sobre-vaga">
 
         <div class="primeiro-texto-sobre-vaga">
             <a target="_parent" href="{{ route('perfil.detalhesvaga', [$item->id_nova_vaga, $item->nome_fantasia]) }}"><H5>{{ $item->nome_fantasia}} :{{ $item->titulo_vaga }}</H5></a>
         </div>
 
         <div class="segundo-texto-sobre-vaga">
             <p>{{$item->atividades}}</p>
         </div>
 
     </div>
 
 </div>
 
 @endforeach
 
 
 
 
 
 <script type="text/javascript" src="/js/function.js"></script>
 <script type="text/javascript" src="{{asset("/js/app.js")}}"></script>