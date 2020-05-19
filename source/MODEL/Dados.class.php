<?php
    class Dados {
        private $dados = [];
        public static $instance;

        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new Dados;
            }
            return self::$instance;
        }

        public function receberDados($campos, $ArquivosSalvos) {
            foreach($campos as $id => $campo) {
                $nome = $campo->getNomecampo();

                if(array_key_exists($id,$_POST)) {
                    if($_POST[$id] != "") {
                        $this->dados[$nome]["valor"] = $_POST[$id];
                        $this->dados[$nome]["tipo"] = $campo->getTipocampo();
                    }
                }

                if(array_key_exists($id,$ArquivosSalvos)) {
                    $this->dados[$nome]["valor"] = $ArquivosSalvos[$id];
                    $this->dados[$nome]["tipo"] = $campo->getTipocampo();
                }
            }
        }
        public function getDados() {
            return json_encode($this->dados);
        }
    }
?>