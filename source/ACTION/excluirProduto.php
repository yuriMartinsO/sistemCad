<?php
include "autoload.php";
include "sessao.php";

$bancoDeDados = BancoDados::getInstance();

$conexaoController = ConexaoController::getInstance();
$conexaoController->setBancoDados($bancoDeDados);
$conexaoController->conectarBancoDados();

if (!$conexaoController->getConexao()) {
    echo "Falha ao conectar banco de dados!";
    die;
}

global $QueryController;
$QueryController = QueryController::getInstance();
$QueryController->setConexao($conexaoController);

$id = $_POST['id'];

$itemDAO = ItemDAO::getInstance();
$item = $itemDAO->consultaPorIdItem($id)[0];

$grupoDAO = GrupoDAO::getInstance();
$grupo = $grupoDAO->consultaPorIdGrupo($item->getIdgrupo())[0];

if($grupo->getIdusuario() != $_SESSION['usuario']) {
    echo "item não pertence a este usuario!!!";
    die;
}

$query = "delete FROM `item` WHERE `iditem` = '". $id ."'";

$QueryController->queryDireta($query);
$retorno =  $QueryController->getConexao()->error;
$possuiErro = (strlen($retorno) > 1);

if(!$possuiErro) {
    echo "Exclusão realizada com sucesso";
    die;
}



?>