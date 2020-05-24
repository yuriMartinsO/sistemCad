<?php
session_start();
include '../../painel/header.php';
$grupo = isset($_GET['grupo'])?$_GET['grupo']:"semGrupo";
?>
    <body>
        <div class="index-visualizacao">
            <h4 class="menu">
                <a href="<?=$urlPainel?>">MENU</a>
            <h4>
            <h1>
                Pesquise o Item
            </h1>
                <form class="form-inline ml-auto pesquisa-container" action="" method="GET">
                    <input type="hidden" name="grupo" value="<?=$grupo?>">
                    <div class="pesquisaForm">
                        <input name="pesquisa" class="form-control input-pesquisa" type="text" placeholder="Digite aqui uma palavra chave" aria-label="Search">
                        <button type="submit" class="btn btn-dark">Pesquisar</button>
                    </div>
                </form>
                <ul class="listaItens">
                    <?php Visualizacao::listarItensPesquisa();?>
                </ul>                                
        </div>
    </body>
</html>