<div class="card tipo-campo-texto">
    <div class="card-header">
        <?=$dadosItem->getNome()?>
    </div>
    <div>
        <p>
            <input type="color" id="cor" name="<?=$dadosItem->getNome()?>///###///<?=$dadosItem->getTipo()?>" value="<?=$dadosItem->getValor()?>">
            <label for="cor">Cor</label>
        </p>
    </div>
</div>