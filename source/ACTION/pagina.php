<?php
global $mensagem;
$mensagem = empty($_GET["mensagem"]) ? "NÃO FOI" : $_GET["mensagem"];
echo $mensagem;
?>