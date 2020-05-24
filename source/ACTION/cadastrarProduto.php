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

    $idcampos = "";
    foreach($_POST as $chave => $valor) {
        if($chave != "idgrupo" && $chave != "nome") {
            $idcampos .= $chave;
            $idcampos .= ",";
        }
    }
    foreach($_FILES as $chave => $valor) {
        $idcampos .= $chave;
        $idcampos .= ",";
    }
    $idcampos = Util::retirarUltimaVirgula($idcampos);;

    $campoDAO = CampoDAO::getInstance();
    $campos = $campoDAO->consultaPorIdsCampos($idcampos);

    $camposNaoPreenchidos = "";
    foreach($campos as $chave => $campo) {
        $valor = array_key_exists($chave,$_POST) ? $_POST[$chave] : $_FILES[$chave]['name'];

        if($campo->getObrigatorio() && $valor == "") {
            $camposNaoPreenchidos .= $campo->getNomecampo();
            $camposNaoPreenchidos .= ",";
        }
    }
    $camposNaoPreenchidos = Util::retirarUltimaVirgula($camposNaoPreenchidos);
    $camposNaoPreenchidos = $_POST['nome'] == "" ? ($camposNaoPreenchidos . ", Nome") : $camposNaoPreenchidos;

    if($camposNaoPreenchidos != "") {
        $_SESSION['mensagem'] = "campos não preenchidos: " . $camposNaoPreenchidos;
        echo "<script>window.location='".$index."/pages/painel/produto/cadastro.php"."';</script>";
        die;
    }

    $ArquivosSalvos = ArquivoController::SalvarArquivos();

    $dados = Dados::getInstance();
    $dados->receberDados($campos, $ArquivosSalvos);
    $item = Item::getInstance();
    $item->receberDados($dados);
    $itemDAO = ItemDAO::getInstance();
    $itemDAO->setObject($item);
    $QueryController->create($itemDAO);

    $retornoQuery =  $QueryController->getConexao()->error;

    $QueryException = QueryException::getInstance();
    $QueryException->setRetornoQuery($retornoQuery);

    $_SESSION['mensagem'] = $QueryException->verificar($retornoQuery);
    echo "<script>window.location='".$index."/pages/painel/produto/cadastro.php"."';</script>";
    die;
?>