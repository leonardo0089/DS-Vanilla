<style>
    :root {
        --bg-dark: #1a2f3a;

        --logo-height: 100px;
        --header-height: 150px;
        --aside-width: 100%;
        --footer-height: 40px;
        --menu-top-height: 75px;

        --shadow:
            0 0px 23px 0 rgba(0, 0, 0, 0.2),
            0 0px 40px 0px rgba(0, 0, 0, 0.06);
    }

    .containerVaga {
        display: flex;
        height: auto;
        background-color: white;
        border-radius: 5px;
        margin-top: 15px;
        overflow: hidden;
    }

    .containerFotoVaga 
    {
       border-right: 1px solid rgba(211, 211, 211, 0.74);
       border-radius: 20px;
       width: 45%;
       height: auto;
    }

    .containerFotoVaga img
    {
        border-radius: 20px;
    }

    .textosdaVaga {
        display: flex;
        flex-direction: column;
        padding-left: 0px;
        width: 100%;
        height: 100%;
    }

    .primeiroTextoVaga {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: auto;
        align-items: baseline;
        justify-content: center;
    }
    .primeiroTextoVaga a
    {
        text-decoration: none;
        color: black;
    }
    .primeiroTextoVaga a:hover
    {
        text-decoration: none;
        color: #dc3545;
    }

    .seguntoTextoVaga
    {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
        padding-left: 15px;
        flex-wrap: wrap;
        overflow: hidden;
    }

    .primeiroTextoVaga h2
    {
        font-weight: 300;
    }
    .titulo-sobre
    {
        display: flex;
        width: 100%;
        height: auto;
        display: flex;
    }

    .sobre-a-vaga
    {
        display: flex;
        flex-wrap: wrap;
        height: auto;
        width: 100%;
        flex-wrap: wrap;
    }
    .fonte300
    {
        font-weight: 300;
    }
</style>

@foreach ($vaga as $key)
<div class="containerVaga">
    <div class="containerFotoVaga">
        <img src="http://localhost/DS-Vanilla/ds-vanilla/public/storage/{{$key->foto}}" alt="" height="100%" width="100%" style="border-radius: 5px 0px 0px 5px;">
    </div>
    <div class="textosdaVaga">
        <div class="primeiroTextoVaga">
        <a target="_parent"  href="{{ route('perfil.detalhesvaga', [$key->id_nova_vaga, $key->nome_fantasia]) }}" style="padding-right: 5px; font-weight: 300"><H2>{{ $key->nome_fantasia}} :{{ $key->titulo_vaga }}</H2></a>
        </div>
        <div class="seguntoTextoVaga">
            <div class="titulo-sobre fonte300">
                Sobre a Vaga:
            </div>
            <div class="sobre-a-vaga fonte300">
                <p class="fonte300">{{$key->atividades}}</p>
            </div>
        </div>
    </div>

</div>

@endforeach
