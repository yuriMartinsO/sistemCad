<a class="list-group-item list-group-item-action" id="<?=$grupo->getNomegrupo()?>-list" data-toggle="list" href="#<?=$grupo->getNomegrupo()?>" role="tab" aria-controls="<?=$grupo->getNomegrupo()?>">
    <?=$grupo->getNomegrupo()?>
    <span onclick="confirmarDesativacao('<?=$grupo->getIdgrupo()?>','Grupo','/source/ACTION/desativar')"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
</a>