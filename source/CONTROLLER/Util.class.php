<?php
    class Util {
        public static $caminhoPainel = __DIR__."/../../pages/painel/";
        public static $caminhoVisualizacao = __DIR__."/../../pages/visualizacao/";

        public static function exibeMensagem() {
            global $mensagem;

            if($mensagem) {
                echo "<script>$(function() { $('#MENSAGEMRETORNO').text('".$mensagem."') })</script>";
                unset($_SESSION['mensagem']);
            }
        }

        public static function retirarUltimaVirgula($string) {
            return substr($string,0,-1);
        }
    }
?>