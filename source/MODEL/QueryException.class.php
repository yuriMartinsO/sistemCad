<?php
class QueryException {
    public $retornoQuery;
    public static $instance;

    public function verificar($retornoQuery = "false") {
        $verificar = $this->verificarTudoCerto($retornoQuery);
        $verificar = $this->verificarChaveDuplicada($verificar);
        
        return $verificar;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new QueryException;
        }

        return self::$instance;
    }

    //Verificações
    public function verificarTudoCerto($retornoQuery) {
        if( strlen($retornoQuery) == 0) {
            return $msg = "Cadastro Realizado";
        }
        return $retornoQuery;
    }


    public function verificarChaveDuplicada($retornoQuery) {
        if(substr_count($retornoQuery, 'Duplicate') > 0) {
            return $msg = "Já existente";
        }

        return $retornoQuery;
    }

    //Encapsulamento
    public function setRetornoQuery($retornoQuery) {
        $this->retornoQuery = $retornoQuery;;
    }

    public function getRetornoQuery() {
        return $this->retornoQuery;
    }
}
?>