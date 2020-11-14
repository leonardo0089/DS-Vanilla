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
        height: 25%;
        background-color: white;
        border-radius: 5px;
        margin-top: 15px;
    }

    .containerFotoVaga 
    {
       border-right: 1px solid rgba(211, 211, 211, 0.74);
       border-radius: 20px;
       width: 30%;
    }

    .containerFotoVaga img
    {
        border-radius: 20px;
    }

    .textosdaVaga {
        display: flex;
        flex-direction: column;
        padding-left: 5px;
        flex-grow: 1;
    }

    .primeiroTextoVaga {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 50px;
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
        flex-grow: 1;
        flex-wrap: wrap;
    }

    .primeiroTextoVaga h2
    {
        font-weight: 300;
    }
</style>

<div class="containerVaga">
    <div class="containerFotoVaga">
        <img src="../res/shop/img/pp.jpg" alt="" height="100%" width="100%" style="border-radius: 5px 0px 0px 5px;">
    </div>
    <div class="textosdaVaga">
        <div class="primeiroTextoVaga">
        <a target="_parent"  href="{{ route('perfil.detalhesvaga') }}" style="padding-right: 5px;"><H2>DS-Vanilla : programador mobile</H2></a>
        </div>
        <div class="seguntoTextoVaga">
            
        </div>
    </div>

</div>

