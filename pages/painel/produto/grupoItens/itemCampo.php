<?php
$simOuNao = array("não","sim");
$chave = $campo->getObrigatorio();

$campo->setObrigatorio($simOuNao[$chave]);
?>

<div class="card tipo-campo-<?=$campo->getTipocampo()?>">
    <div class="card-header">
        Nome: <?=$campo->getNomecampo()?>
        <span onclick="confirmarDesativacao('<?=$campo->getIdcampo()?>','Campo','/source/ACTION/desativar')"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Tipo de Valor: <?=$campo->getTipocampo()?></li>
        <li class="list-group-item">Obrigatorio: <?=$campo->getObrigatorio()?></li>
    </ul>
</div>