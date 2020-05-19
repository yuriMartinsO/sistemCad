<?php
class Campo {
    private $idcampo;
    private $nomecampo;
    private $tipocampo;
    private $idusuario;
    private $idgrupo;
    private $ativo = 1;
    private $obrigatorio;
    public static $instance;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Campo;
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
    public function getIdcampo(){
		return $this->idcampo;
	}

	public function setIdcampo($idcampo){
		$this->idcampo = $idcampo;
	}

	public function getNomecampo(){
		return $this->nomecampo;
	}

	public function setNomecampo($nomecampo){
		$this->nomecampo = $nomecampo;
	}

	public function getTipocampo(){
		return $this->tipocampo;
	}

	public function setTipocampo($tipocampo){
		$this->tipocampo = $tipocampo;
    }

    public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
    }

    public function getIdgrupo(){
		return $this->idgrupo;
	}

	public function setIdgrupo($idgrupo){
		$this->idgrupo = $idgrupo;
    }

    public function getAtivo(){
		return $this->ativo;
	}

	public function setAtivo($ativo){
		$this->ativo = $ativo;
    }

    public function getObrigatorio(){
		return $this->obrigatorio;
	}

	public function setObrigatorio($obrigatorio){
		$this->obrigatorio = $obrigatorio;
	}
}
?>