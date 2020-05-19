<?php
session_start();
include 'header.php';
?>
    <body>
        <div class="menu-container">
            <ul class="menu-categorias">
                <h1 class="text-center">MENU</h1>
                    <a href=<?=$urlPainel."produto/cadastro.php"?>>
                        <li>
                            <p>CADASTRAR ITEM</p>
                            <img caminho=<?=$urlPublicImgs."icones/icoCadastrar.png".$versao?> alt="Icon made by Pixel perfect from www.flaticon.com"/>
                        </li>
                    </a>
                    <a href=<?=$urlPainel."produto/ConfCadastro.php"?>>
                        <li>
                            <p>CONF. CADASTRO</p>
                            <img caminho=<?=$urlPublicImgs."icones/icoConfiguracao.png".$versao?> alt="Icon made by Pixel perfect from www.flaticon.com"/>
                        </li>
                    </a>
                    <a href=<?=$urlVisualizacao?>>
                        <li>
                            <p>PROCURAR ITEM</p>
                            <img caminho=<?=$urlPublicImgs . "icones/icoListarProduto.png".$versao?> alt="Icon made by Pixel perfect from www.flaticon.com"/>                        
                        </li>
                    </a>
            </ul>
        </div>
    </body>
</html>