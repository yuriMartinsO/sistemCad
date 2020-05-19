<?php
    class GrupoController {
        private static $instance;

        public static function listaOpcoesGrupo() {
            global $QueryController;
            $grupoDAO = GrupoDAO::getInstance();
            $grupos = $grupoDAO->consultaPorIdUsuario($_SESSION['usuario']);

            foreach($grupos as $grupo) {
                if($grupo->getAtivo() == 0) {
                    continue;
                }

                include Util::$caminhoPainel."produto/grupoItens/blocoGrupoOpcao.php";
            }
        }

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

                include Util::$caminhoPainel."produto/grupoItens/itemGrupoLista.php";
            }
        }

        public static function listaItemGrupoPainel() {
            global $QueryController;
            $grupoDAO = GrupoDAO::getInstance();
            $grupos = $grupoDAO->consultaPorIdUsuario($_SESSION['usuario']);

            if(!$grupos) {
                return false;
            }

            foreach($grupos as $grupo) {
                include Util::$caminhoPainel."produto/grupoItens/itemGrupoPainel.php";
            }
        }

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new GrupoController;
            }

            return self::$instance;
        }
    }
?>