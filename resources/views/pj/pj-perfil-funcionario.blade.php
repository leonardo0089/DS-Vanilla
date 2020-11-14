<link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
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

    html, body
    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        background-color: rgba(238, 235, 235, 0.479)
    }

    .containerVaga {
        display: flex;
        height: 19%;
        background-color: white;
        border-radius: 6px;
        margin-top: 15px;
        margin-left: 10px;
        width: 95%;
        border: 1px solid rgba(134, 134, 134, 0.486);
    }

    .containerFotoVaga {
        border-right: 1px solid rgba(226, 226, 226, 0.74);
        border-radius: 5px;
        width: 30%;
    }

    .containerFotoVaga img {
        border-radius: 6px 0px 0px 6px;
    }

    .textosdaVaga {
        display: flex;
        flex-direction: column;
        padding-left: 5px;
        width: 70%;
        height: 100%;
        justify-content: flex-start;
        border-left: 1px solid rgba(134, 134, 134, 0.486);
    }

    .primeiroTextoVaga {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 30%;
        align-items: center;
        justify-content: center;
        margin-top: 5px;
    }

    .textos-de-descricao
    {
        display: flex;
        width: 100%;
        height: 70%;
        align-items: flex-start;
        padding-left: 10px;
    }

    .primeiroTextoVaga a {
        text-decoration: none;
        color: black;
    }

    .primeiroTextoVaga a:hover {
        text-decoration: none;
        color: #dc3545;
    }

    .primeiroTextoVaga h4 {
        font-weight: 300;
    }

</style>

<div class="containerVaga">
    <div class="containerFotoVaga">
        <img src="../res/site/img/foto1.jpg" alt="" height="100%" width="100%">
    </div>
    <div class="textosdaVaga">
        <div class="primeiroTextoVaga">
            <a target="_parent" href="{{ route('perfil.detalhesvaga') }}" style="padding-right: 5px;">
                <H4>Leonardo Magnon : programador back-end</H4>
            </a>
        </div>
        <div class="textos-de-descricao">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sapien quam, tempus ac pulvinar et, congue eget est. Maecenas ac enim vitae sapien placerat mattis. Nulla eros dui, placerat in nibh quis, varius auctor lacus.  </p>
        </div>
    </div>
</div>





