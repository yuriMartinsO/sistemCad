<?php   
include '../header.php';
?>
    <body>
        <div class="pagina-cadastro-produto">
            <a href="<?=$urlPainel?>">MENU</a>
            <div id="MENSAGEMRETORNO" style="color: red"></div>
            <div class="title">
                <h1>CADASTRO</h1>
            </div>
            <?php include "cadastro/parteGrupoCad.php"?>
            <?php Util::exibeMensagem()?>
        </div>
    </body>
</html>