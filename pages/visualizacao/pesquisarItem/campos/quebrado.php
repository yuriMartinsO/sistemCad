<div class="card itemModal itemModalQuebrado">
    <div class="card-header">
        <?=$dadosItem->getNome()?>
    </div>
    <div>
        <p>
            <input class="input-campo-quebrado form-control text-center" value="<?=$dadosItem->getValor()?>" type="text" name="<?=$dadosItem->getNome()?>///###///<?=$dadosItem->getTipo()?>">
        </p>
    </div>
</div>