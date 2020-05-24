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

$id = $_GET['id'];

$itemDAO = ItemDAO::getInstance();
$item = $itemDAO->consultaPorIdItem($id)[0];

$grupoDAO = GrupoDAO::getInstance();
$grupo = $grupoDAO->consultaPorIdGrupo($item->getIdgrupo())[0];

if($grupo->getIdusuario() != $_SESSION['usuario']) {
    $_SESSION['mensagem'] = "item não pertence a este usuario!!!";
    echo "<script>window.location='".$index."/pages/visualizacao/"."';</script>";
    die;
}

$dados = [];

foreach ($_POST as $nomeTipo => $valor) {
    $arrayNomeTipo = explode("///###///", $nomeTipo);
    $nome = $arrayNomeTipo[0];
    $tipo = $arrayNomeTipo[1];
    $dados[$nome]["valor"] = $valor;
    $dados[$nome]["tipo"] = $tipo;
}

$arquivosSalvos = ArquivoController::SalvarArquivos();
foreach ($arquivosSalvos as $nomeTipo => $valor) {
    $arrayNomeTipo = explode("///###///", $nomeTipo);
    $nome = $arrayNomeTipo[0];
    $tipo = $arrayNomeTipo[1];
    $dados[$nome]["valor"] = $valor;
    $dados[$nome]["tipo"] = $tipo;
}
$dados = json_encode($dados);
$query = "update " . "`item`" . " set " . " `dados` " . " = '"  . $dados . "' where " . "`iditem` = '" . $id . "'";

$QueryController->queryDireta($query);
$retorno =  $QueryController->getConexao()->error;
$possuiErro = (strlen($retorno) > 1);

if(!$possuiErro) {
    $_SESSION['mensagem'] = "Alteração realizado com sucesso";
    echo "<script>window.location='".$index."/pages/visualizacao/"."';</script>";
    die;
} else {
    echo "SERVIDOR COM ERRO OU FORA DO AR!, contacte Yuri Martins";
}
?>