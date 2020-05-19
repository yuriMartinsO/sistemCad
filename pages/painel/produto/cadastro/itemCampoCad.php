<div class="card tipo-campo-<?=$campo->getTipocampo()?>-container">
    <div class="card-header">
        <?=$campo->getNomecampo()?>
    </div>
    <ul class="list-group list-group-flush tipo-campo-<?=$campo->getTipocampo()?>">
        <?php CampoController::listaTipoCampo($campo)?>
    </ul>
</div>