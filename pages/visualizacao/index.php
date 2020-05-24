<?php
session_start();
include '../painel/header.php';
?>
    <body>
        <div class="index-visualizacao">
            <h4 class="menu">
                <a href="<?=$urlPainel?>">MENU</a>
            <h4>
            <div id="MENSAGEMRETORNO"></div>
            <h1>Escolha Um grupo</h1>
            <ul class="lista-de-grupo">
                <?php Visualizacao::listarGrupos("listaGrupo")?>
            </ul>
        </div>
        <?php Util::exibeMensagem()?>
    </body>
</html>