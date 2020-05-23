<?php
    include "autoload.php";
    include "sessao.php";

    $bancoDeDados = BancoDados::getInstance();
    $conexaoController = ConexaoController::getInstance();
    $conexaoController->setBancoDados($bancoDeDados);
    $conexaoController->conectarBancoDados();
    $QueryController = QueryController::getInstance();
    $QueryController->setConexao($conexaoController);

    $id = $_POST['id'];
    $itemDAO = ItemDAO::getInstance();
    global $item;
    $item = $itemDAO->consultaPorIdItem($id)[0];

    $urlRaiz = "http://" . $_SERVER['HTTP_HOST'];
    $urlAction = $urlRaiz . "/source/ACTION/";  

    include Util::$caminhoVisualizacao."pesquisarItem/modeloModalItem.php";
?>