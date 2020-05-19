<?php
    $index = "http://" . $_SERVER['HTTP_HOST'];

    //SESSÃO DE LOGIN
    if (!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION['usuario'])) {
        echo "<script>window.location='".$index."';</script>";
        die;
    } else {
        $idUsuario = $_SESSION['usuario'];
        global $mensagem;
        $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : null;
        session_destroy();
        session_start();
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['usuario'] = $idUsuario;
    }

    //VARIAVEIS/LINK's COMUNS
    $urlRaiz = "http://" . $_SERVER['HTTP_HOST'];
    $urlPages = $urlRaiz . "/pages";
    $urlVisualizacao = $urlPages . "/visualizacao";
    $urlAction = $urlRaiz . "/source/ACTION/";
    $urlPainel = $urlRaiz . "/pages/painel/";
    $urlPublicJS = $urlRaiz  . "/public/js/";
    $urlPublicCss = $urlRaiz . "/public/css/";
    $urlPublicImgs = "https://testedoyuri.000webhostapp.com" . "/public/img/";
    $versao = "?v=" . rand(0,9000000000000000000).rand(0,9000000000000000000).rand(0,9000000000000000000);

    //CARREGAMENTO DE CSS
    global $arquivosCss;
    $arquivosCss = array();
    $arquivosCss[] = "<link rel='stylesheet' type='text/css' href=".$urlPublicCss."indexPainel.css".$versao.">";
    $arquivosCss[] = "<link rel='stylesheet' type='text/css' href=".$urlPublicCss."produto.css".$versao.">";
    $arquivosCss[] = "<link rel='stylesheet' type='text/css' href=".$urlPublicCss."visualizacao.css".$versao.">";
    $arquivosCss[] = "<link rel='stylesheet' type='text/css' href=".$urlPublicCss."fontawesome/css/all.css".$versao.">";

    function carregarCss() {
        global $arquivosCss;
        foreach($arquivosCss as $arquivo) {
            echo $arquivo;
        }
    }

    //AUTOLOAD DE TODAS AS CLASSES
    spl_autoload_register(function ($class_name) {
        if(file_exists(__DIR__ . '/../../source/CONTROLLER/' . $class_name . '.class.php')) {
            require_once __DIR__ . '/../../source/CONTROLLER/' . $class_name . '.class.php';
        } elseif(file_exists(__DIR__ . '/../../source/MODEL/' . $class_name . '.class.php') ) {
            require_once __DIR__ . '/../../source/MODEL/' . $class_name . '.class.php';
        } elseif(file_exists(__DIR__ . '/../../source/DAO/' . $class_name . '.class.php') ) {
            require_once __DIR__ . '/../../source/DAO/' . $class_name . '.class.php';
        }
    });

    //COLOCAR BANCO DE DADOS E COMUNICAR
    global $QueryController;
    $bancoDeDados = BancoDados::getInstance();
    $conexaoController = ConexaoController::getInstance();
    $conexaoController->setBancoDados($bancoDeDados);
    $conexaoController->conectarBancoDados();
    $QueryController = QueryController::getInstance();
    $QueryController->setConexao($conexaoController);

?>