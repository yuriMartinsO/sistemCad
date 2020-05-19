<?php
class GrupoDAO extends DAO {
    private $idgrupo;
    private $nomegrupo;
    private $idusuario;
    private $ativo;
    public static $instance;

    function getTabela() {
        return " `grupo` ";
    }

    function consultaPorIdGrupo($idgrupo) {
        global $QueryController;
        $campos = " * ";
        $nomeTabela = $this->getTabela();
        $where = " `idgrupo`= ". "'" .$idgrupo. "'";
        $retorno = $QueryController->read($nomeTabela,$where,$campos);

        if (gettype($retorno) == "array") {
            $campos = [];

            foreach($retorno as $linha => $valor) {
                $campo = new Grupo;
                $campo->getDadosPorPost($valor);
                $campos[$linha] = $campo;
            }

            return $campos;
        } else {
            return false;
        }
    }

    function consultaPorIdUsuario($idusuario) {
        global $QueryController;
        $campos = " * ";
        $nomeTabela = $this->getTabela();
        $where = " `idusuario`= ". "'" .$idusuario. "'";
        $retorno = $QueryController->read($nomeTabela,$where,$campos);

        if (gettype($retorno) == "array") {
            $campos = [];

            foreach($retorno as $linha => $valor) {
                $campo = new Grupo;
                $campo->getDadosPorPost($valor);
                $campos[$linha] = $campo;
            }

            return $campos;
        } else {
            return false;
        }
    }

    function listarNomeValor() {
        $retorno = "";
        foreach ($this as $atributo => $valor) {
            if($atributo == "idgrupo") {
                continue;
            }

            $retorno = $retorno . "`" . $atributo . "`" . "=" . "'" . $valor . "'";
            $retorno = $retorno . " ,";
        }

        $removerUltimaVirg = substr($retorno,0,-1);
        return  $removerUltimaVirg;
    }

    function setObject($classObject) {
        $this->nomegrupo = $classObject->getNomegrupo();
        $this->idusuario = $classObject->getIdusuario();
        $this->ativo = $classObject->getAtivo();
    }

    function listarNomeAtributos($incluirId = false) {
        $retorno = "";
        foreach ($this as $atributo => $valor) {
            if($atributo == "idgrupo" && $incluirId == false) {
                continue;
            }
            $retorno = $retorno . "`" . $atributo . "`";
            $retorno = $retorno . " ,";
        }

        $removerUltimaVirg = substr($retorno,0,-1);
        return  $removerUltimaVirg;
    }

    function listarValorAtributos($incluirId = false) {
        $retorno = "";
        foreach ($this as $atributo => $valor) {
            if($atributo == "idgrupo" && $incluirId == false) {
                continue;
            }

            if (is_null($valor)) {
                $retorno = $retorno . "NULL";
            } else {
                $retorno = $retorno . "'" . $valor . "'";
            }

            $retorno = $retorno . " ,";
        }

        $removerUltimaVirg = substr($retorno,0,-1);
        return  $removerUltimaVirg;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new GrupoDAO;
        }

        return self::$instance;
    }
}
?>