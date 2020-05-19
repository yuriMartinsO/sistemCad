<?php
    include "autoload.php";
    include "sessao.php";

    $index = "http://" . $_SERVER['HTTP_HOST'];

    $bancoDeDados = BancoDados::getInstance();
    $conexaoController = ConexaoController::getInstance();
    $conexaoController->setBancoDados($bancoDeDados);
    $conexaoController->conectarBancoDados();

    if (!$conexaoController->getConexao()) {
        echo "Falha ao conectar banco de dados!";
        die;
    }

    $grupo = Grupo::getInstance();
    $grupo->getDadosPorPost($_POST);
    $grupo->setIdusuario($_SESSION['usuario']);

    $possuiCamposVazios = count($grupo->getCamposVazios(array('nomegrupo')));

    if ($possuiCamposVazios == 1) {
        $_SESSION['mensagem'] = "campo não preenchido!!!";;
        echo "<script>window.location='".$index."/pages/painel/produto/ConfCadastro.php"."';</script>";
        die;
    }

    $grupoDAO = GrupoDAO::getInstance();
    $grupoDAO->setObject($grupo);
    $QueryController = QueryController::getInstance();
    $QueryController->setConexao($conexaoController);
    $QueryController->create($grupoDAO);

    $retornoQuery =  $QueryController->getConexao()->error;

    $QueryException = QueryException::getInstance();
    $QueryException->setRetornoQuery($retornoQuery);

    $_SESSION['mensagem'] = $QueryException->verificar($retornoQuery);
    echo "<script>window.location='".$index."/pages/painel/produto/ConfCadastro.php"."';</script>";
    die;
?>