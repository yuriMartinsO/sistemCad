<?php
    class DadosItem {
        private $nome;
        private $tipo;
        private $valor;
        public static $instance;

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new DadosItem;
            }
            return self::$instance;
        }

        public function getNome(){
            return $this->nome;
        }
    
        public function setNome($nome){
            $this->nome = $nome;
        }
    
        public function getTipo(){
            return $this->tipo;
        }
    
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
    
        public function getValor(){
            return $this->valor;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }
    }
?>