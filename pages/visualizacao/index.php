<?php
session_start();
include '../painel/header.php';
?>
    <body>
        <a href="<?=$urlPainel?>">MENU</a>
        <div class="index-visualizacao">
            <h1>Escolha Um grupo</h1>
            <ul>
                <?php Visualizacao::listarGrupos("listaGrupo")?>
            </ul>
        </div>
    </body>
</html>