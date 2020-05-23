<?php
$dataAmericana = $dadosItem->getValor();
$data = date("d/m/Y", strtotime($dataAmericana)); 
$dadosItem->setValor($data);
?>

<div class="card tipo-campo-texto">
    <div class="card-header">
        <?=$dadosItem->getNome()?>
    </div>
    <div>
        <p>
            <input value="<?=$dataAmericana?>" class="input-campo-data form-control text-center" type="date" name="<?=$dadosItem->getNome()?>///###///<?=$dadosItem->getTipo()?>">
        </p>
    </div>
</div>