<?php
class UsuarioDAO extends DAO {
    private static $instance;
    private $idusuario;
    private $email;
    private $senha;

    function getTabela() {
        return " `usuario` ";
    }

    function setObject($classObject) {
        $this->email = $classObject->getEmail();
        $this->senha = $classObject->getSenha();
    }

    function getIdporEmail($email) {
        global $QueryController;
        $campos = " `idusuario`";
        $nomeTabela = $this->getTabela();
        $where = " `email`= ". "'" . $email. "'";
        $retorno = $QueryController->read($nomeTabela,$where,$campos);

        if ($retorno) {
            return $retorno[0]['idusuario'];
        } else {
            return false;
        }
    }

    function fazerLogin($email, $senha) {
        global $QueryController;
        $campos = " `email`,`senha` ";
        $nomeTabela = $this->getTabela();
        $where = " `email`= ". "'" . $email. "'" . " and " . " `senha`=" . "'" . $senha . "'";
        $retorno = $QueryController->read($nomeTabela,$where,$campos);

        if (gettype($retorno) == "array") {
            return true;
        } else {
            return false;
        }
    }

    function listarNomeAtributos($incluirId = false) {
        $retorno = "";
        foreach ($this as $atributo => $valor) {
            if($atributo == "idusuario" && $incluirId == false) {
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
            if($atributo == "idusuario" && $incluirId == false) {
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
            self::$instance = new UsuarioDAO;
        }

        return self::$instance;
    }

    //ENCAPSULAMENTO
    public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
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

}
?>