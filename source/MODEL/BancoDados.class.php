<?php

class BancoDados {
    private $host = "localhost";
    private $usuario = "root"; // em producao "id10500133_adm" em dev: "root"
    private $senha = "";// em producao: "naoseiasenha" em dev: ""
    private $nomeBanco = "id10500133_bancounico";
    
    private static $instance;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new BancoDados;
        }

        return self::$instance;
    }

    //Encapsulamento
    
    public function getHost(){
		return $this->host;
	}

	public function setHost($host){
		$this->host = $host;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getNomeBanco(){
		return $this->nomeBanco;
	}

	public function setNomeBanco($nomeBanco){
		$this->nomeBanco = $nomeBanco;
	}
}

?>