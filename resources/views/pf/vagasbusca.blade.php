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
        padding-left: 5px;
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

<div class="containerVaga">
    <div class="containerFotoVaga">
        <img src="../res/shop/img/pp.jpg" alt="" height="100%" width="100%">
    </div>
    <div class="textosdaVaga">
        <div class="primeiroTextoVaga">
            <a target="_parent" href="#" style="padding-right: 5px;"><H2>DS-Vanilla : programador mobile</H2></a>
        </div>
        <div class="seguntoTextoVaga">
            <div class="titulo-sobre fonte300">
                Sobre a Vaga:
            </div>
            <div class="sobre-a-vaga">
                <p class="fonte300">saigdhiuasgdiugas asiudghasuidguasi</p>
            </div>
        </div>
    </div>
</div>
