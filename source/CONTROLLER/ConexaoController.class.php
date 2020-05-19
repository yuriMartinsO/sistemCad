<?php
class ConexaoController {
    private static $instance;
    private $BancoDados;
    private $conexao;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new ConexaoController;
        }

        return self::$instance;
    }

    //Encapsulamento
    public function setBancoDados($BancoDados) {
        $this->BancoDados = $BancoDados;
    }

    function getBancoDados() {
        return $this->BancoDados;
    }

    function setConexao($conexao) {
        return $this->conexao = $conexao;
    }

    function getConexao() {
        return $this->conexao;
    }

    function conectarBancoDados() {
        $bancoDados = $this->BancoDados;
        $this->conexao = new mysqli($bancoDados->getHost(), $bancoDados->getUsuario(), $bancoDados->getSenha(), $bancoDados->getNomeBanco());
        if ($this->conexao) {
            return true;
        } else {
            return false;
        }
        
    }

    }
?>