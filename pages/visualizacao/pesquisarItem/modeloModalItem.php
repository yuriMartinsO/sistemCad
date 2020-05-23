<?php global $urlAction?>

<div id="modalItem">
    <!-- Button trigger modal -->
    <button id="botaoModal" type="button" class="btn hidden" data-toggle="modal" data-target="#exampleModalLong">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Item: <?= $item->getNome()?></h5>
                <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" method="post" action="<?=$urlAction?>alterarProduto.php?id=<?=$id?>">
                <div class="modal-body">
                    <?php Visualizacao::listarItensModal()?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="confirmarExclusaoItem(<?=$id?>)">Excluir</button>
                    <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>