<div class="card itemModal itemModalArquivo">
    <div class="card-header">
        <?=$dadosItem->getNome()?>
    </div>
    <div>
        <p>
            <a href="<?="/".$dadosItem->getValor()?>" download>Baixar</a>
        </p>
    </div>
    <div>
        <p>
            <span>Alterar Arquivo</span>
            <input type="hidden" name="<?=$dadosItem->getNome()?>///###///<?=$dadosItem->getTipo()?>" value="<?=$dadosItem->getValor()?>">
            <input type="file" class="form-control-file" id="customFile" name="<?=$dadosItem->getNome()?>///###///<?=$dadosItem->getTipo()?>">
        </p>
    </div>
</div>