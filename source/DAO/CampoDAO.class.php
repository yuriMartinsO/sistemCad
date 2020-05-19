<?php
class CampoDAO extends DAO {
    private $idcampo;
    private $nomecampo;
    private $tipocampo;
    private $idusuario;
    private $idgrupo;
    private $ativo = 1;
    private $obrigatorio;
    public static $instance;

    function getTabela() {
        return " `campo` ";
    }

    public function consultaPorGrupo($grupo) {
        global $QueryController;
        $campos = " * ";
        $nomeTabela = $this->getTabela();
        $where = " `idgrupo`= ". "'" .$grupo->getIdgrupo(). "'";
        $retorno = $QueryController->read($nomeTabela,$where,$campos);

        if (gettype($retorno) == "array") {
            $campos = [];

            foreach($retorno as $linha => $valor) {
                $campo = new Campo;
                $campo->getDadosPorPost($valor);
                $campos[$linha] = $campo;
            }

            return $campos;
        } else {
            return false;
        }
    }

    public function consultaPorIdCampo($campo) {
        global $QueryController;
        $campos = " * ";
        $nomeTabela = $this->getTabela();
        $where = " `idcampo`= ". "'" .$campo . "'";
        $retorno = $QueryController->read($nomeTabela,$where,$campos);

        if (gettype($retorno) == "array") {
            $campos = [];

            foreach($retorno as $linha => $valor) {
                $campo = new Campo;
                $campo->getDadosPorPost($valor);
                $campos[$linha] = $campo;
            }

            return $campos;
        } else {
            return false;
        }
    }

    public function consultaPorIdsCampos(string $idCampos,$incluirInativos = false) {
        global $QueryController;
        $consultaAtivos = " and `ativo`=1";
        if($incluirInativos == true) {
            $consultaAtivos = "";
        }

        $campos = " * ";
        $nomeTabela = $this->getTabela();
        $where = " `idcampo` in " . "(" . $idCampos . ")" . $consultaAtivos;
        $retorno = $QueryController->read($nomeTabela,$where,$campos);

        if (gettype($retorno) == "array") {
            $campos = [];

            foreach($retorno as $linha => $valor) {
                $campo = new Campo;
                $campo->getDadosPorPost($valor);
                $campos[$campo->getIdcampo()] = $campo;
            }

            return $campos;
        } else {
            return false;
        }
    }

    function listarNomeValor() {
        $retorno = "";
        foreach ($this as $atributo => $valor) {
            if($atributo == "idcampo") {
                continue;
            }

            $retorno = $retorno . "`" . $atributo . "`" . "=" . "'" . $valor . "'";
            $retorno = $retorno . " ,";
        }

        $removerUltimaVirg = substr($retorno,0,-1);
        return  $removerUltimaVirg;
    }

    function listarNomeAtributos($incluirId = false) {
        $retorno = "";
        foreach ($this as $atributo => $valor) {
            if($atributo == "idcampo" && $incluirId == false) {
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
            if($atributo == "idcampo" && $incluirId == false) {
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

    function setObject($classObject) {
        $this->nomecampo = $classObject->getNomecampo();
        $this->tipocampo = $classObject->getTipocampo();
        $this->idusuario = $classObject->getIdusuario();
        $this->idgrupo = $classObject->getIdgrupo();
        $this->ativo = $classObject->getAtivo();
        $this->obrigatorio = $classObject->getObrigatorio();
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new CampoDAO;
        }

        return self::$instance;
    }
}
?>