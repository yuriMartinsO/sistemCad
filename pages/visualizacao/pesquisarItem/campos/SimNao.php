<div class="card tipo-campo-texto">
    <div class="card-header">
        <?=$dadosItem->getNome()?>
    </div>
    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="<?=$dadosItem->getNome()?>///###///<?=$dadosItem->getTipo()?>" id="inlineRadio1" value="Sim" checked>
            <label class="form-check-label" for="inlineRadio1">Sim</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="<?=$dadosItem->getNome()?>///###///<?=$dadosItem->getTipo()?>" id="inlineRadio2" value="Nao">
            <label class="form-check-label" for="inlineRadio2">Não</label>
        </div>
    </div>
</div>