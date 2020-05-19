<?php
    class CadastroController {
        private static $instance;

        public static function listaItemGrupoLista() {
            global $QueryController;
            $grupoDAO = GrupoDAO::getInstance();
            $grupos = $grupoDAO->consultaPorIdUsuario($_SESSION['usuario']);

            if(!$grupos) {
                return false;
            }

            foreach($grupos as $grupo) {
                if($grupo->getAtivo() == 0) {
                    continue;
                }

                include Util::$caminhoPainel."produto/cadastro/itemGrupoListaCad.php";
            }
        }    

        public static function listaItemGrupoPainel() {
            global $QueryController;
            $grupoDAO = GrupoDAO::getInstance();
            $grupos = $grupoDAO->consultaPorIdUsuario($_SESSION['usuario']);

            if(!$grupos) {
                return false;
            }

            global $urlAction;

            foreach($grupos as $grupo) {
                include Util::$caminhoPainel."produto/cadastro/itemGrupoPainelCad.php";
            }
        }

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new CadastroController;
            }

            return self::$instance;
        }
    }
?>