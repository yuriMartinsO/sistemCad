<?php
    class itemDAO extends DAO {
        private $iditem;
        private $nome;
        private $idgrupo;
        private $dados;
        private static $instance;

        function getTabela() {
            return " `item` ";
        }

        function setObject($classObject) {
            $this->iditem = $classObject->getIditem();
            $this->nome = $classObject->getNome();
            $this->idgrupo = $classObject->getIdgrupo();
            $this->dados = $classObject->getDados();
        }

        function listarNomeAtributos($incluirId = false) {
            $retorno = "";
            foreach ($this as $atributo => $valor) {
                if($atributo == "iditem" && $incluirId == false) {
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
                if($atributo == "iditem" && $incluirId == false) {
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
                self::$instance = new ItemDAO;
            }

            return self::$instance;
        }
    }
?>
