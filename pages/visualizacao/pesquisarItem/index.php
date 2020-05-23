<?php
session_start();
include '../../painel/header.php';
$grupo = isset($_GET['grupo'])?$_GET['grupo']:"semGrupo";
?>
    <body>
        <div class="hidden"></div>
        <a href="<?=$urlPainel?>">MENU</a>
        <div class="index-visualizacao">
            <h1>
                Pesquise o Item
            </h1>
                <form class="form-inline ml-auto" action="" method="GET">
                    <input type="hidden" name="grupo" value="<?=$grupo?>">
                    <input name="pesquisa" class="form-control" type="text" placeholder="Digite aqui uma palavra chave" aria-label="Search">
                    <button type="submit" class="btn btn-dark">Pesquisar</button>
                </form>
                <ul>
                    <?php Visualizacao::listarItensPesquisa();?>
                </ul>                                
        </div>
    </body>
</html>