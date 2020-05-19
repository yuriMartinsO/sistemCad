<?php
    include "autoload.php";
    include "sessao.php";

    if(!isset($_GET['id'])) {
        $_SESSION['mensagem'] = "Erro, verifique os dados!!!";;
        echo "<script>window.location='".$index."/pages/painel/produto/ConfCadastro.php"."';</script>";
        die;
    }

    $bancoDeDados = BancoDados::getInstance();
    $conexaoController = ConexaoController::getInstance();
    $conexaoController->setBancoDados($bancoDeDados);
    $conexaoController->conectarBancoDados();
    global $QueryController;
    $QueryController = QueryController::getInstance();
    $QueryController->setConexao($conexaoController);

    if (!$conexaoController->getConexao()) {
        echo "Falha ao conectar banco de dados!";
        die;
    }

    $campoDAO = CampoDAO::getInstance();
    $campo = $campoDAO->consultaPorIdCampo($_GET['id'])[0];
    $campo->setAtivo(0);

    if($campo->GetIdusuario() != $_SESSION['usuario']) {
        $_SESSION['mensagem'] = "Grupo não pertencer a este usuario!!!";;
        echo "<script>window.location='".$index."/pages/painel/produto/ConfCadastro.php"."';</script>";
        die;
    }

    $campoDAO->setObject($campo);
    $retorno = $QueryController->update($campoDAO,"idcampo",$campo->getIdcampo());

    if($retorno) {
        $_SESSION['mensagem'] = "Desativação concluida!";
    }

    echo "<script>window.location='".$index."/pages/painel/produto/ConfCadastro.php"."';</script>";
    die;
?>