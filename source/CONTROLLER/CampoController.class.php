<?php
    class CampoController {

    private static $instance;

    public static function listaCampos($grupo) {
        $campoDAO = CampoDAO::getInstance();
        $campos = $campoDAO->consultaPorGrupo($grupo);

        foreach($campos as $campo) {
            if($campo->getAtivo() == 0) {
                continue;
            }

            include Util::$caminhoPainel."produto/grupoItens/itemCampo.php";
        }
    }

    public static function listaTipoCampo($campo) {
        include Util::$caminhoPainel."produto/cadastro/campos/Campo". $campo->getTipocampo() . ".php";
    }

    public static function listaCamposCadastro($grupo) {
        $campoDAO = CampoDAO::getInstance();
        $campos = $campoDAO->consultaPorGrupo($grupo);

        foreach($campos as $campo) {
            if($campo->getAtivo() == 0) {
                continue;
            }

            include Util::$caminhoPainel."produto/cadastro/itemCampoCad.php";
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new CampoController;
        }

        return self::$instance;
    }

    }
?>