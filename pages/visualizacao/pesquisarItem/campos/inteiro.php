<div class="card itemModal itemModalInteiro">
    <div class="card-header">
        <?=$dadosItem->getNome()?>
    </div>
    <div>
        <p>
            <input class="input-campo-inteiro form-control text-center" value="<?=$dadosItem->getValor()?>" type="number" name="<?=$dadosItem->getNome()?>///###///<?=$dadosItem->getTipo()?>">
        </p>
    </div>
</div>