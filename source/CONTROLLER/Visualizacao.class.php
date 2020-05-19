<?php
class Visualizacao {
    public static function listarGrupos($template = "listaGrupo") {
        global $QueryController;
        $grupoDAO = GrupoDAO::getInstance();
        $grupos = $grupoDAO->consultaPorIdUsuario($_SESSION['usuario']);

        if(!$grupos) {
            return false;
        }

        foreach($grupos as $grupo) {
            include Util::$caminhoVisualizacao . $template . ".php";
        }
    }
}
?>