<?php
session_start();
include '../painel/header.php';
?>
    <body>
        <div class="index-visualizacao">
            <a href="<?=$urlPainel?>">MENU</a>
            <div id="MENSAGEMRETORNO"></div>
            <h1>Escolha Um grupo</h1>
            <ul>
                <?php Visualizacao::listarGrupos("listaGrupo")?>
            </ul>
        </div>
        <?php Util::exibeMensagem()?>
    </body>
</html>