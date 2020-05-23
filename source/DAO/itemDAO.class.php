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

        public function consultaPorIdItem($item) {
            global $QueryController;
            $campos = " * ";
            $nomeTabela = $this->getTabela();
            $where = " `iditem`= ". "'" .$item . "'";
            $retorno = $QueryController->read($nomeTabela,$where,$campos);
    
            if (gettype($retorno) == "array") {
                $itens = [];
    
                foreach($retorno as $linha => $valor) {
                    $item = new Item;
                    $item->getDadosPorPost($valor);
                    $itens[$linha] = $item;
                }
    
                return $itens;
            } else {
                return false;
            }
        }    

        function setObject($classObject) {
            $this->iditem = $classObject->getIditem();
            $this->nome = $classObject->getNome();
            $this->idgrupo = $classObject->getIdgrupo();
            $this->dados = $classObject->getDados();
        }

        function consultarPorPesquisa($idgrupo,$pesquisa, $campos = " * ") {
            global $QueryController;
            $nomeTabela = $this->getTabela();

            $where = "(";
            foreach ($pesquisa as $palavra) {
                if(strlen($palavra) != 2) {
                    $where .= " `dados` LIKE ". "'%" . $palavra . "%' OR";
                    $where .= " `nome` LIKE ". "'%" . $palavra . "%' OR";
                }
            }

            $where = substr($where, 0, -2);
            $where .= ")";
            $where .= " AND `idgrupo` = ". "'" .$idgrupo. "'";
            $retorno = $QueryController->read($nomeTabela,$where,$campos);

            if (gettype($retorno) == "array") {
                $itens = [];

                foreach($retorno as $linha => $valor) {
                    $item = new Item;
                    $item->getDadosPorPost($valor);
                    $itens[$linha] = $item;
                }

                return $itens;
            } else {
                return false;
            }
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
