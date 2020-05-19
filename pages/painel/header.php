<?php
include 'utilitarios.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src=<?=$urlPublicJS . "bootstrap.js"?> ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
        <script src="https://files.rafaelwendel.com/jquery.maskMoney.js" ></script>
        <script type="text/javascript" src=<?=$urlPublicJS . "initMask.js" . $versao?> ></script>
        <script type="text/javascript" src=<?=$urlPublicJS . "mask/src/jquery.maskedinput.js" . $versao?> ></script>
        <script type="text/javascript" src=<?=$urlPublicJS . "main.js" . $versao?> ></script>
        <?=carregarCss()?>
    </head>