<?php
class Grupo {
    private $idgrupo;
    private $nomegrupo;
    private $idusuario;
    private $ativo = 1;
    public static $instance;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Grupo;
        }
        return self::$instance;
    }

    public function getDadosPorPost($dataPost) {
        foreach ($dataPost as $key => $value) {
            $this->$key = $value;
        }
    }

    public function getCamposVazios($campos = null) {
            $resultadoEspecifico = array();
            $resultadoGeral = array();

            foreach ($this as $atributo => $valor) {
                if ($valor == null) {
                    $resultadoGeral[$atributo] = $valor;
                }

                if ($valor == null && $campos !== null &&  in_array($atributo, $campos) !== false) {
                    $resultadoEspecifico[$atributo] = $valor;
                }
            }

            $retorno = ($campos == null)?$resultadoGeral:$resultadoEspecifico;
            return $retorno;
    }

    //Encapsulamento
    public function getIdgrupo(){
		return $this->idgrupo;
	}

	public function setIdgrupo($idgrupo){
		$this->idgrupo = $idgrupo;
	}

	public function getNomegrupo(){
		return $this->nomegrupo;
	}

	public function setNomegrupo($nomegrupo){
		$this->nomegrupo = $nomegrupo;
	}

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
    }

    public function getAtivo(){
		return $this->ativo;
	}

	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
}
?>