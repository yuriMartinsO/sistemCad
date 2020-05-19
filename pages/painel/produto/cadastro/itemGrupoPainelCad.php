<div class="tab-pane fade show" id="<?=$grupo->getNomegrupo()?>" role="tabpanel" aria-labelledby="<?=$grupo->getNomegrupo()?>-list">
    <form enctype="multipart/form-data" method="post" action="<?=$urlAction?>cadastrarProduto.php">
        <input id="idgrupo" type="text" name="idgrupo" class="form-control" style="display:none" value="<?=$grupo->getIdgrupo()?>">
        <div class="card tipo-campo-texto-container">
            <div class="card-header">
                Nome
            </div>
            <ul class="list-group list-group-flush tipo-campo-texto">
                <input name="nome"></input>
            </ul>
        </div>
        <?php CampoController::listaCamposCadastro($grupo)?>
        <div class="botao-container-adicionar-campo">
            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modalAddCampo">
                CADASTRAR
            </button>
        </div>
    </form>
</div>