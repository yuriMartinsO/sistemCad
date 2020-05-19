<?php
class Usuario {
    private $idusuario;
    private $email;
    private $senha;
    public static $instance;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Usuario;
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
    public function getId(){
		return $this->idusuario;
	}

    public function setId($idusuario){
		$this->idusuario = $idusuario;
	}

    public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}
}
?>