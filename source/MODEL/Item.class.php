<?php
    class Item {
        private $iditem;
        private $nome;
        private $idgrupo;
        private $dados;
        public static $instance;

        public function receberDados($dadosJson) {
            $this->nome = $_POST['nome'];
            $this->idgrupo = $_POST['idgrupo'];
            $this->dados = $dadosJson->getDados();
        }

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new Item;
            }
            return self::$instance;
        }

        // ENCAPSULAMENTO
        public function getIditem(){
            return $this->iditem;
        }
    
        public function setIditem($iditem){
            $this->iditem = $iditem;
        }

        public function getNome(){
            return $this->nome;
        }
    
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getIdgrupo(){
            return $this->idgrupo;
        }
    
        public function setIdgrupo($idgrupo){
            $this->idgrupo = $idgrupo;
        }

        public function getDados(){
            return $this->dados;
        }
    
        public function setDados($dados){
            $this->dados = $dados;
        }
        
    }
?>