<?php   
include '../header.php';
?>
    <body>
        <div class="pag-conf-cad-prod">
            <a href="<?=$urlPainel?>">MENU</a>
            <div id="MENSAGEMRETORNO"></div>
            <div class="title">
                <h1>CONFIGURAÇÕES DE CADASTRO</h1>
            </div>
            <h3><i class="fas fa-cog fa-lg"></i>CONFIGURAÇÃO</h3>
            <?php include "grupoItens/addCampo.php"?>
            <?php include "grupoItens/addGrupo.php"?>
            <?php include "grupoItens/parteGrupoItens.php"?>
            <?php Util::exibeMensagem()?>
        </div>
    </body>
</html>