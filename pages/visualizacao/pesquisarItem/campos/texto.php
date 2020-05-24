<div class="card itemModal itemModalTexto">
    <div class="card-header">
        <?=$dadosItem->getNome()?>
    </div>
    <div>
        <p>
            <textarea name="<?=$dadosItem->getNome()?>///###///<?=$dadosItem->getTipo()?>" rows="2" cols="30"><?=$dadosItem->getValor()?></textarea>
        </p>
    </div>
</div>