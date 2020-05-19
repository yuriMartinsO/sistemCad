<div class="tab-pane fade show" id="<?=$grupo->getNomegrupo()?>" role="tabpanel" aria-labelledby="<?=$grupo->getNomegrupo()?>-list">
    <div class="card tipo-campo-texto">
        <div class="card-header">
            Nome: Nome
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Tipo de Valor: Texto</li>
        </ul>
    </div>
    <?php CampoController::listaCampos($grupo)?>
    <div class="botao-container-adicionar-campo">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddCampo" onclick="mudarValorAddCampo('<?=$grupo->getIdgrupo()?>')">
            Adicionar Campo
        </button>
    </div>
</div>