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

    $campo = Campo::getInstance();
    $campo->getDadosPorPost($_POST);
    $campo->setIdusuario($_SESSION['usuario']);

    $possuiCamposVazios = count($campo->getCamposVazios(array('nomecampo','tipocampo','idgrupo','obrigatorio')));

    if ($possuiCamposVazios > 0) {
        $_SESSION['mensagem'] = "campos não preenchidos!!!";;
        echo "<script>window.location='".$index."/pages/painel/produto/ConfCadastro.php"."';</script>";
        die;
    }

    $campoDAO = CampoDAO::getInstance();
    $campoDAO->setObject($campo);
    $QueryController = QueryController::getInstance();
    $QueryController->setConexao($conexaoController);

    $QueryController->create($campoDAO);

    $retornoQuery =  $QueryController->getConexao()->error;

    $QueryException = QueryException::getInstance();
    $QueryException->setRetornoQuery($retornoQuery);

    $_SESSION['mensagem'] = $QueryException->verificar($retornoQuery);
    echo "<script>window.location='".$index."/pages/painel/produto/ConfCadastro.php"."';</script>";
    die;
?>