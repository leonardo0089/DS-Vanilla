<style>
.container-do-chat
{
    display: flex;
    flex-direction: column;
    background-color: white;
    margin-bottom: 15px;
    width: 60%;
    margin-left: 30px;
    height: 50%;
    margin-top: 10px;
    border-radius: 15px
}

html, body
{
    width: 100%;
    height: 100%;
}

.nome-do-balao
{
    display: flex;
    width: auto;
    background-color: rgba(242, 246, 250, 0);
    height: auto;
    padding-left: 5px;
    margin: 0px 0px 5px 1px;
}

.fontes
{
    margin: 10px 0px 0px 1px;
}

.fontes2
{
    font-weight: 300;
    padding-left: 15px;
}
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../res/site/css/cadGlobal.css">
<link rel="stylesheet" href="../../res/site/css/cadastroHeader.css">
<link rel="stylesheet" href="../../res/site/css/cadformulario.css">
<script type="text/javascript" src="{{asset("/css/app.css")}}"></script>
<link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../../res/site/css-Perfil/perfil.css">
<link rel="stylesheet" href="../../res/site/css-Perfil/perfilPJ.css">
<link rel="stylesheet" href="../../res/site/css-Perfil/perfil-m.css">
<link rel="stylesheet" href="../../res/site/css-Vaga/sobreVaga.css">
<link rel="stylesheet" href="../../res/css-PJ/perfil-PJ.css">




<div class="conversasInternas" id="cont">

    
</div>

<script type="text/javascript" src="/js/function.js"></script>
<script type="text/javascript" src="{{asset("/js/app.js")}}"></script>

<script>
   function montarChat(p)
  {
    balaoEmpresa = '<div class="container-do-chat">'
        +
        '<div class="nome-do-balao">'
        +
        '<p class="fontes">'+p.nome_fantasia+':'+'</p>'
        +
        '</div>'
        +
        '<div class="mensagens-chat">'
        +
            '<p class="fontes2 fontes">'+p.msg+'</p>'
        +
        '</div>'
        +
        '</div>'
    return balaoEmpresa;
  }


  function mandar()
  {
    $.getJSON('/mensagens', function(data)
    {
      for(i = 0; i<data.length; i++)
      {
        linha = montarChat(data[i])
        $('#cont').append(linha)
      }
    })
  }

  $(function()
  {
    mandar()
  })

</script>