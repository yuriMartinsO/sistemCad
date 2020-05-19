<?php
    include "autoload.php";

    $bancoDeDados = BancoDados::getInstance();

    $conexaoController = ConexaoController::getInstance();
    $conexaoController->setBancoDados($bancoDeDados);
    $conexaoController->conectarBancoDados();

    if (!$conexaoController->getConexao()) {
        echo "Falha ao conectar banco de dados!";
        die;
    }

    $usuario = Usuario::getInstance();
    $usuario->getDadosPorPost($_POST);
    $possuiCamposVazios = count($usuario->getCamposVazios(array('email','senha')));

    if ($possuiCamposVazios == 2) {
        echo "Campo email e senha não preenchidos!!!";
        die;
    } elseif ($possuiCamposVazios == 1) {
        echo "Campo email ou senha não preenchidos!!!";
        die;
    }

    $UsuarioDAO = UsuarioDAO::getInstance();
    $UsuarioDAO->setObject($usuario);
    $QueryController = QueryController::getInstance();
    $QueryController->setConexao($conexaoController);
    $QueryController->create($UsuarioDAO);

    $retornoQuery =  $QueryController->getConexao()->error;

    $QueryException = QueryException::getInstance();
    $QueryException->setRetornoQuery($retornoQuery);
    echo $QueryException->verificar($retornoQuery);
    die;
    
?>