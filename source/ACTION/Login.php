<?php
    include "autoload.php";

    global $mensagem;

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

    $usuario = Usuario::getInstance();
    $usuario->getDadosPorPost($_POST);
    $possuiCamposVazios = count($usuario->getCamposVazios(array('email','senha')));

    $index = "http://" . $_SERVER['HTTP_HOST'];

    if ($possuiCamposVazios == 2) {
        $mensagem = "Campo email e senha não preenchidos!!!";
        echo "<script>window.location='" . $index. "?mensagem=" . $mensagem . "';</script>";
        die;
    } elseif ($possuiCamposVazios == 1) {
        $mensagem = "Campo email ou senha não preenchidos!!!";
        echo "<script>window.location='" . $index. "?mensagem=" . $mensagem . "';</script>";
        die;
    }

    $UsuarioDAO = UsuarioDAO::getInstance();
    $UsuarioDAO->setObject($usuario);
    $email = $usuario->getEmail();
    $senha = $usuario->getSenha();    
    $sucessoLogin = $UsuarioDAO->fazerLogin($email,$senha);

    if($sucessoLogin) {
        session_start();
        $idUsuario = $UsuarioDAO->getIdporEmail($email);
        $usuario->setId($idUsuario);
        $_SESSION['usuario'] = $usuario->getId();
        header('Location:' . $index . '/pages/painel');
    } else {
        $mensagem = "Login incorreto!!!";
        echo "<script>window.location='" . $index. "?mensagem=" . $mensagem . "';</script>";
    }
?>